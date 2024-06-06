<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="userstyle.css">
  <title>Admin Page!</title>
</head>

<body>
  <?php include "navbar.php"; ?>

  <h1>Selamat datang di Tabel User!</h1>
  <a href="add.php" class="add">Add New User</a>
  <table border='0'>
    <tr>
      <th>No.</th>
      <th>Username</th>
      <th>Password</th>
      <th>Nama</th>
      <th>Level</th>
      <th>Email</th>
      <th>Edit</th>
      <th>Delete</th>

      <?php
      session_start();
      include '../koneksi.php';
      $query_mysqli = mysqli_query($mysqli, "SELECT * FROM user") or die(mysqli_error($mysqli));
      $nomor = 1;
      while ($data = mysqli_fetch_array($query_mysqli)) {
        ?>
      <tr>
        <td><?php echo $nomor++; ?></td>
        <td><?php echo $data['username']; ?></td>
        <td><?php echo $data['password']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['level']; ?></td>
        <td><?php echo $data['email']; ?></td>
        <td class="edit"><a href="edituser.php?id=<?php echo $data['id_user']; ?>">Edit</a></td>
        <td class="delete"><a href="deleteuser.php?id=<?php print $data['id_user']; ?>">Delete</a></td>
      </tr>
    <?php } ?>
    </tr>
  </table>
</body>

</html>