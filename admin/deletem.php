<?php
include_once ('../koneksi.php');
$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM metode_pembayaran WHERE id_metode=$id");
header("location: method.php");
?>