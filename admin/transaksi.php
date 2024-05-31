<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="userstyle.css">
  <title>Document</title>
</head>

<body>

  <?php include "navbar.php"; ?>

  <h1>Transaksi yang sudah dilakukan:</h1>
  <table>
    <tr>
      <th>Nomor</th>
      <th>Nama Kelas</th>
      <th>Harga</th>
      <th>Nama Pengguna</th>
      <th>Metode Pembayaran</th>
      <th>Tanggal</th>
      <th>Status</th>
      <th>Action</th>
      <th>Edit</th>
      <th>Delete</th>

      <?php
      include '../koneksi.php';
      $query_mysqli = mysqli_query($mysqli, "SELECT *
            FROM transaksi 
            JOIN kelas ON transaksi.id_kelas = kelas.id_kelas
            JOIN user ON transaksi.id_user = user.id_user ")
        or die(mysqli_error($mysqli));
      $nomor = 1;
      while ($data = mysqli_fetch_array($query_mysqli)) {
        ?>
      <tr>
        <td><?php echo $nomor++; ?></td>
        <td><?php print $data['nama_kelas']; ?></td>
        <td><?php echo "Rp." . number_format($data['harga']); ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['metode_pembayaran']; ?></td>
        <td><?php echo $data['tanggal']; ?></td>
        <td><?php echo $data['status']; ?></a></td>
        <td><a href="action.php?id_transaksi=<?php echo $data['id_transaksi']; ?>">Action</a></td>
        <td class="edit"><a href="edittransaksi.php?id=<?php echo $data['id_transaksi']; ?>">Edit</a></td>
        <td class="delete"><a href="deletetransaksi.php?id=<?php print $data['id_transaksi']; ?>">Delete</a></td>
      </tr>
    <?php } ?>
    </tr>
  </table>
</body>

</html>