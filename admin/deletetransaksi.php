<?php
include_once ('../koneksi.php');
$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM transaksi WHERE id_transaksi=$id");
header("location: transaksi.php");
?>