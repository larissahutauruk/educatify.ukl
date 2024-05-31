<?php
session_start();
include '../koneksi.php';
if (isset($_POST['Simpan'])) {
    $id = $_SESSION['id_user'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    var_dump($id);

    include_once '../koneksi.php';
    $result = mysqli_query($mysqli, "UPDATE user SET username='$username', email='$email' WHERE id_user=$id");
    header('location: akun.php');
}
?>