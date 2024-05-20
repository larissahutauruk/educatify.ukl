<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminstyle.css">
    <title>Document</title>
</head>
<body>
    <nav>
      <div class="navbar">
        <div class="logo">Educatify.</div>
        <div class="menu">
          <ul>
            <li><a href="user.php">User</a></li>
            <li><a href="class.php">Class</a></li>
            <li><a href="subject.php">Subject</a></li>
            <li><a href="transaksi.php">Transaksi</a></li>
          </ul>
        </div>
      </div>
    </nav>

<h1>Transaksi yang sudah dilakukan:</h1>
    <table>
        <tr>
            <th>nomor</th>
            <th>nama kelas</th>
            <th>harga</th>
            <th>nama</th>
            <th>bukti</th>
            <th>Edit</th>
            <th>Delete</th>

            <?php 
            include '../koneksi.php';
            $query_mysqli = mysqli_query($mysqli, "SELECT transaksi.id_transaksi, kelas.nama_kelas, kelas.harga, user.nama, transaksi.bukti 
            FROM transaksi 
            JOIN kelas ON transaksi.id_kelas = kelas.id_kelas
            JOIN user ON transaksi.id_user = user.id_user ") 
            or die (mysqli_error($mysqli));
            $nomor=1;
            while($data = mysqli_fetch_array($query_mysqli)){
                ?>
                <tr>
                <td><?php echo $nomor++;?></td>
                <td><?php print $data['nama_kelas'];?></td>
                <td><?php echo $data['harga'];?></td>
                <td><?php echo $data['nama'];?></td>
                <td><?php echo $data['bukti'];?></td>
                <td class="edit"><a href="edittransaksi.php?id=<?php echo $data['id_transaksi'];?>">Edit</a></td>
                <td class="delete"><a href="deletetransaksi.php?id=<?php print $data['id_transaksi'];?>">Delete</a></td>
                </tr>
            <?php } ?>
        </tr>
    </table>
    <table>
        <tr>
            <td class="add"><a href="addt.php">Add New Data</a></td>
        </tr>
    </table>

</body>
</html>