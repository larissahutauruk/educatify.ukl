<?php
include '../koneksi.php';
if (isset($_POST['Simpan'])) {
    $id = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $level = $_POST['level'];
    $email = $_POST['email'];
    var_dump($id);

    include_once '../koneksi.php';
    $result = mysqli_query($mysqli, "UPDATE user SET username='$username', password='$password', nama='$nama', level='$level', email='$email' WHERE id_user=$id");
    header('location: user.php');
}
?>