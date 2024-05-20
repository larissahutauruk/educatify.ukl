<?php
include '../koneksi.php';

if(!isset($_GET['id'])) {
    header('location: index.php');
}
$id = $_GET['id'];
$result= mysqli_query($mysqli, "SELECT * FROM kelas WHERE id_kelas=$id");
while($user_data=mysqli_fetch_array($result)) {
    $nama_kelas = $user_data['nama_kelas'];
    $id_pengajar = $user_data['id_pengajar'];
    $harga = $user_data['harga'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editkelasstyle.css">
    <title>Edit kelas.</title>
</head>
<body>
<div class="container">
  <img class="editframe2" src="../elements/editframe2.png" />
  <img class="editframe1" src="../elements/editframe1.png" />
  <h1 class="edit">Editing</h1>

    <form action="editproseskelas.php" method="post">
        <div class="user">
            <label>Nama Kelas</label>
            <input type="text" name="nama_kelas" value="<?php echo $nama_kelas;?>">
        </div>
        <div class="id_pengajar">
            <label>Id_pengajar</label>
            <input type="number" name="id_pengajar" value="<?php echo $id_pengajar; ?>">
        </div>
        <div class="harga">
            <label>Harga Kelas</label>
            <input type="number" name="harga" value="<?php echo $harga; ?>">
        </div>
        <div>
            <input type="hidden" name="id_kelas" value="<?php echo $_GET['id'];?>">
            <input type="submit" name="Simpan" value="Simpan">
        </div>
    </form>
</body>
</html>