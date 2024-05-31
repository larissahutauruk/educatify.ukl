<?php
include_once ('../koneksi.php');
$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM kelas WHERE id_kelas=$id");
header("location: class.php");
?>