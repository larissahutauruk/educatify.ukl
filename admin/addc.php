<?php

include_once ("../koneksi.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="addc.css">
  <title>Add New Class</title>
</head>

<body>
  <div class="container">
    <img class="frame-1" src="../elements/frame-1.png" />
    <img class="frame-3" src="../elements/frame-3.png" />
    <img class="frame-2" src="../elements/frame-2.png" />
    <h1 class="regist">Add Class</h1>

    <form class="form" action="addc.php" method="post" enctype="multipart/form-data">
      <div class="cn">
        <input type="text" name="nama_kelas" placeholder="Masukkan Nama Kelas">
      </div>
      <div class="harga">
        <input type="number" name="harga" placeholder="Masukkan Harga Kelas">
      </div>
      <div class="image">
        <input type="file" name="image" required>
      </div>
      <button class="button" type="Submit" name="Submit">Submit</button>

      <?php
      if (isset($_POST['Submit'])) {
        echo $_SESSION["username"];
        echo $_SESSION["id_user"];
        $nama_kelas = $_POST['nama_kelas'];
        $id_user = $_SESSION["id_user"];
        $harga = $_POST['harga'];

        $target_dir = "../uploads/images/";
        if (!is_dir($target_dir)) {
          mkdir($target_dir, 0777, true);
        }
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          // File uploaded successfully, save the file path to the database
          $image = 'uploads/images/' . basename($_FILES["image"]["name"]);

          $result = mysqli_query($mysqli, "INSERT INTO kelas(nama_kelas, id_user, harga, image) VALUES ('$nama_kelas', '$id_user', '$harga','$image')");

          header("location: class.php");
        }
      }
      ?>

    </form>
</body>

</html>