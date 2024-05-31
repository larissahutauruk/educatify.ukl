<?php
include_once ('../koneksi.php');
$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM materi WHERE id_materi=$id");
header("location: subject.php");
?>