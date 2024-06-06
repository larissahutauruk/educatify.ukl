<?php
include '../koneksi.php';
if (isset($_POST['Simpan'])) {
    $id = $_POST['id_metode'];
    $nama_metode = mysqli_real_escape_string($mysqli, $_POST['nama_metode']);
    $nama_akun = mysqli_real_escape_string($mysqli, $_POST['nama_akun']);
    $no_akun = mysqli_real_escape_string($mysqli, $_POST['no_akun']);

    $result = mysqli_query($mysqli, "UPDATE metode_pembayaran SET nama_metode='$nama_metode', nama_akun='$nama_akun', no_akun='$no_akun' WHERE id_metode='$id'");
    if ($result) {
        echo "Record updated successfully";
        header('Location: method.php');
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
} else {
    die("Akses Dilarang..");
} ?>