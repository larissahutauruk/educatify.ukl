<?php
include_once('../koneksi.php');
$id= $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM user WHERE id_user=$id");
header("location: user.php");
?>