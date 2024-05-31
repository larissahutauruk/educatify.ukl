<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edittransaksistyle.css">
    <title>Edit kelas.</title>
</head>
<body>
<div class="container">
  <img class="editframe2" src="../elements/editframe2.png" />
  <img class="editframe1" src="../elements/editframe1.png" />
  <h1 class="edit">Editing</h1>

<?php
include '../koneksi.php';

if(!isset($_GET['id_transaksi'])) {
    header('location: index.php');
}
$id_kelas = $_GET['id_kelas'];
$id_user=$_GET['id_user'];

$result= mysqli_query($mysqli, "SELECT transaksi.id_transaksi, kelas.nama_kelas, kelas.harga, user.nama, transaksi.bukti 
FROM transaksi 
JOIN kelas ON transaksi.id_kelas = kelas.id_kelas
JOIN user ON transaksi.id_user = user.id_user
WHERE kelas.id_kelas = '$id_kelas' AND user.id_user = '$id_user'");
while($user_data=mysqli_fetch_array($result)) {
//     $id_user = $user_data['id_user'];
//     $id_kelas = $user_data['id_kelas'];
// }
?>
    <form action="editprosestransaksi.php" method="post">
        <input type="hidden" name="id_transaksi" value="<?php echo $user_data['id_transaksi'];?>">
        <div class="nama_kelas">
            <label>nama_kelas</label>
            <input type="hidden" name="id_kelas" value="<?php echo $user_data['id_kelas'];?>">
            <input type="text" name="nama_kelas" value="<?php echo $user_data['nama_kelas']; ?>" required>
        </div>
        <div class="harga">
            <label>harga</label>
            <input type="number" name="harga" value="<?php echo $user_data['harga']; ?>" required>
        </div>
        <div class="nama">
            <label>nama</label>
            <input type="hidden" name="id_user" value="<?php echo $user_data['id_user'];?>">
            <input type="text" name="nama" value="<?php echo $user_data['nama'];?>">
        </div>
        <div>
            <input type="submit" name="Simpan" value="Simpan">
        </div>
        <?php } ?>
    </form>
</body>
</html>