<?php
session_start();
include 'koneksi.php';

$username = $_POST['Username'];
$password = $_POST['Password'];
$level = $_POST['Level'];

$login = mysqli_query($mysqli, "SELECT * FROM user WHERE username='$username' AND password='$password'");

// Periksa apakah query berhasil dieksekusi
if ($login) {
    $cek = mysqli_num_rows($login);

    if ($cek > 0) {
        $data = mysqli_fetch_assoc($login);
        $id_user = $data["id_user"];
        session_start();

        if ($data['level'] == "pengajar") {
            $_SESSION['id_user'] = $id_user;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header("Location: admin/index.php");
        } else if ($data['level'] == "pelajar") {
            $_SESSION['id_user'] = $id_user;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header("Location: user/index.php");
        } else {
            header("Location: index.php");
            print "coba sekali lagi.";
        }
    } else {
        header("Location: index.php?pesan=gagal");
        echo "level tidak ditemukan";
    }
} else {
    // Tampilkan pesan error jika query tidak berhasil dieksekusi
    echo "Error: " . mysqli_error($mysqli);
}
?>