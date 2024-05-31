<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addt.css">
    <title>Add New Class</title>
</head>
<body>
<div class="container">
  <img class="frame-1" src="../elements/frame-1.png" />
  <img class="frame-3" src="../elements/frame-3.png" />
  <img class="frame-2" src="../elements/frame-2.png" />
  <h1 class="regist">Tambah Transaksi</h1>

  <?php
include '../koneksi.php';

// if(!isset($_GET['id_transaksi'])) {
//     header('location: index.php');
// }
$id_kelas = $_GET['id_kelas'];
$id_user=$_GET['id_user'];

$result= mysqli_query($mysqli, "SELECT transaksi.id_transaksi, kelas.nama_kelas, kelas.harga, user.nama, transaksi.bukti 
FROM transaksi 
JOIN kelas ON transaksi.id_kelas = kelas.id_kelas
JOIN user ON transaksi.id_user = user.id_user
WHERE kelas.id_kelas = '$id_kelas' AND user.id_user = '$id_user'");
while($user_data=mysqli_fetch_array($result)) {
?>
  
  <form class="form" action="addt.php" method="post">
    <div class="id">
      <td>Id_user</td>
      <td>:
    <select name="user" placeholder="enter your id" required>
            <?php while($data = mysqli_fetch_array($query_mysql)) { ?>
              <option value="<?php echo $data['id_user']; ?>"><?php echo $data['nama']; ?></option>
            <?php } ?>
          </select></td>
      <td>Id_class</td>
      <td>:
    <select name="kelas" placeholder="Enter id_kelas" required>
            <?php while($data=mysqli_fetch_array($query_mysql)){?>
                <option value="<?php echo $data['id_kelas'];?>"><?php echo $data['nama_kelas'];?></option>
            <?php } ?>
          </select></td>
    <button class="button" type="Submit" name="Submit">Submit</button>
    <?php } ?>

    <?php
            if(isset($_POST['Submit'])) {
                $nama=$_POST['nama'];
                $id_kelas=$_POST['id_kelas'];

                include_once("../koneksi.php");
                $result= mysqli_query($mysqli, "INSERT INTO transaksi(id_user, id_kelas) VALUES ('$id_user', $id_kelas)");

                header("location: transaksi.php");
            }
?>

</form>
</body>
</html>