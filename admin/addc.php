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
  
  <form class="form" action="addc.php" method="post">
    <div class="cn">
    <input type="text" name="nama_kelas" placeholder="Masukkan Nama Kelas">
    <img src="../elements/user.svg">
    </div>
    <div class="id">
    <input type="number" name="id_pengajar" placeholder="Enter id_teacher">
    <img src="../elements/keypassword.svg">
</div>
    <div class="harga">
      <input type="number" name="harga" placeholder="Masukkan Harga Kelas">
      <img src="../elements/banking.svg">
    </div>
    <button class="button" type="Submit" name="Submit">Submit</button>

    <?php
            if(isset($_POST['Submit'])) {
                $nama_kelas=$_POST['nama_kelas'];
                $id_pengajar=$_POST['id_pengajar'];
                $harga=$_POST['harga'];

                include_once("../koneksi.php");
                $result= mysqli_query($mysqli, "INSERT INTO kelas(nama_kelas, id_pengajar, harga) VALUES ('$nama_kelas', '$id_pengajar', $harga)");

                header("location: class.php");
            }
?>

</form>
</body>
</html>