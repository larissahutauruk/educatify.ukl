<?php
include '../koneksi.php';

$result = mysqli_query($mysqli, "UPDATE transaksi 
JOIN transaksi ON kelas.id_kelas = transaksi.id_kelas 
JOIN transaksi ON user.id_user = transaksi.id_user 
SET 
kelas.nama_kelas = transaksi.nama_kelas,
kelas.harga = transaksi.harga,
user.nama = transaksi.nama,
WHERE kelas.id_kelas = '$id_kelas' AND user.id_user = '$id_user'");

header('location: transaksi.php');
?>