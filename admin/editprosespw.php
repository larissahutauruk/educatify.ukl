<?php
session_start();
include '../koneksi.php';

$password = $_POST['old_pw'];
$id_user = $_SESSION['id_user'];
$new_pw = $_POST['new_pw'];
$confirm_pw = $_POST['confirm_pw'];

$result = mysqli_query($mysqli, "SELECT password FROM user WHERE id_user='$id_user'");

$data = mysqli_fetch_assoc($result);
if ($data['password'] == $password) {
    if ($new_pw == $confirm_pw) {
        $update_result = mysqli_query($mysqli, "UPDATE user SET password='$new_pw' WHERE id_user='$id_user'");
        if ($update_result) {
            echo "<script> 
            alert('Password berhasil dirubah!');
            document.location = 'myprofil.php'; 
            </script>";
        }
    } else {
        echo "<script> 
        alert('Password gagal dirubah!');
        document.location = 'myprofil.php'; 
        </script>";
    }
} else {
    echo "<script> 
    alert('Password gagal dirubah!');
    document.location = 'myprofil.php'; 
    </script>";
}
?>