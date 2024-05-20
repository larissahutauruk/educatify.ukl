<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adds.css">
    <title>Add New Class</title>
</head>
<body>
<div class="container">
  <img class="frame-1" src="../elements/frame-1.png" />
  <img class="frame-3" src="../elements/frame-3.png" />
  <img class="frame-2" src="../elements/frame-2.png" />
  <h1 class="regist">Add Class</h1>
  
  <form class="form" action="adds.php" method="post">
    <div class="sn">
    <input type="text" name="nama_materi" placeholder="Masukkan Nama Materi">
    <img src="../elements/user.svg">
    </div>
    <div class="id">
    <input type="number" name="id_pengajar" placeholder="Enter id_teacher">
    <img src="../elements/keypassword.svg">
    </div>
    <div class="id">
    <input type="number" name="id_kelas" placeholder="Enter id_kelas">
    <img src="../elements/keypassword.svg">
    </div>
    <button class="button" type="Submit" name="Submit">Submit</button>

    <?php
            if(isset($_POST['Submit'])) {
                $nama_materi=$_POST['nama_materi'];
                $id_pengajar=$_POST['id_pengajar'];
                $id_kelas=$_POST['id_kelas'];

                include_once("../koneksi.php");
                $result= mysqli_query($mysqli, "INSERT INTO materi(nama_materi, id_pengajar, id_kelas) VALUES ('$nama_materi', '$id_pengajar', $id_kelas)");

                header("location: subject.php");
            }
?>

</form>
</body>
</html>