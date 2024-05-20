<?php
include ("../koneksi.php");

if(!isset($_GET['id'])) {
    header('location: index.php');
}
$id = $_GET['id'];
$result= mysqli_query($mysqli, "SELECT * FROM materi WHERE id_materi=$id");
while($user_data=mysqli_fetch_array($result)) {
    $nama_materi = $user_data['nama_materi'];
    $id_pengajar = $user_data['id_pengajar'];
    $id_kelas = $user_data['id_kelas'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editmateristyle.css">
    <title>Edit kelas.</title>
</head>
<body>
<div class="container">
  <img class="editframe2" src="../elements/editframe2.png" />
  <img class="editframe1" src="../elements/editframe1.png" />
  <h1 class="edit">Editing</h1>

    <form action="editprosesmateri.php" method="post">
        <div class="user">
            <label>Nama Materi</label>
            <input type="text" name="nama_materi" value="<?php echo $nama_materi;?>">
        </div>
        <div class="id_pengajar">
            <label>Id_pengajar</label>
            <input type="number" name="id_pengajar" value="<?php echo $id_pengajar; ?>">
        </div>
        <div class="id_kelas">
            <label>Id_kelas</label>
            <input type="number" name="id_kelas" value="<?php echo $id_kelas; ?>">
        </div>
        <div>
            <input type="hidden" name="id_materi" value="<?php echo $_GET['id'];?>">
            <input type="submit" name="Simpan" value="Simpan">
        </div>
    </form>
</body>
</html>