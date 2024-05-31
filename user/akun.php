<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['id_user'])) {
    header("location: ../index.php");
    exit();
}
$id_user = $_SESSION['id_user'];
$query = mysqli_query($mysqli, "SELECT * FROM user WHERE id_user='$id_user'");
if ($query) {
    $data = mysqli_fetch_assoc($query);
} else {
    echo "Error: " . mysqli_error($mysqli);
    exit();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="akun.css">
    <title>Akun Pengguna</title>
</head>

<body>
    <nav>
        <div class="navbar">
            <div class="logo">Educatify.</div>
            <div class="menu">
                <ul>
                    <li><a href="../logout.php">Logout</a></li>
                    <li><a href="editakun.php">Edit</a></li>
                    <li><a href="editpw.php">Edit Password</a></li>
                    <li><a href="index.php">Back</a></li>
                </ul>
            </div>
    </nav>
    <div class="akun">
        <h1>Selamat Datang, <?php echo htmlspecialchars($data['nama']); ?>!</h1>
        <div class="info">
            <h2>Informasi Pengguna:</h2>
            <p>Nama: <?php echo htmlspecialchars($data['username']); ?></p>
            <p class="pw" type="password">Password: <?php echo htmlspecialchars($data['password']); ?></p>
            <p>Email: <?php echo htmlspecialchars($data['email']); ?></p>
            <p>Level: <?php echo htmlspecialchars($data['level']); ?></p>
        </div>
    </div>
</body>

</html>