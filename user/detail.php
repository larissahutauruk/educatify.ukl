<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['id_user'])) {
  header("Location: ../login.php");
  exit();
}

$id_transaksi = $_GET['id'];
$id_user = $_SESSION['id_user'];
$query = "SELECT *
          FROM transaksi 
        --   JOIN materi ON transaksi.id_kelas = materi.id_kelas
          JOIN kelas ON transaksi.id_kelas = kelas.id_kelas
          JOIN user ON transaksi.id_user = user.id_user
          WHERE transaksi.id_transaksi = '$id_transaksi'";

$result = mysqli_query($mysqli, $query);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="detail.css">
  <title>Document</title>
</head>

<body>
  <?php include 'navbaruser.php'; ?>

  <h3><?php echo htmlspecialchars($data['nama_kelas']); ?></h3>
  <img src="<?php echo htmlspecialchars("../admin/" . $data['image']); ?>" alt="" width="300" height="150"><br>
  <p>Harga : <?php echo htmlspecialchars("Rp. " . number_format($data['harga'])); ?></p>
  <p>Status : <?php echo htmlspecialchars($data['status']); ?></p>
  <h3>Bukti Transaksi</h3>
  <img src="<?php echo htmlspecialchars($data['bukti']); ?>" alt="" width="300" height="150"><br>
  <a href="mytransaksi.php">Back</a>

</body>

</html>