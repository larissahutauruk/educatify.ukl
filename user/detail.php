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

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
    <nav>
      <div class="navbar">
        <div class="logo">Educatify.</div>
        <div class="menu">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="akun.php">Profil</a></li>
            <li><a href="mytransaksi.php">Back</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="detail">
      <div class="column">
        <h3><?php echo htmlspecialchars($data['nama_kelas']); ?></h3>
        <p>Harga : <?php echo htmlspecialchars("Rp. " . number_format($data['harga'])); ?></p>
      </div>
      <div class="column">
        <img src="<?php echo htmlspecialchars("../admin/" . $data['image']); ?>">
      </div>
      <div class="column">
        <h3>Bukti Transaksi</h3>
        <p>Status : <?php echo htmlspecialchars($data['status']); ?></p>
      </div>
      <div class="column">
        <img src="<?php echo htmlspecialchars($data['bukti']); ?>"><br>
      </div>
    </div>
  </body>

</html>