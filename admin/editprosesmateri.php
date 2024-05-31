<?php
include '../koneksi.php';
if (isset($_POST['Simpan'])) {
    $id = $_POST['id_materi'];
    $nama_materi = mysqli_real_escape_string($mysqli, $_POST['nama_materi']);
    $waktu = date("Y-m-d h:i:s");
    $rangkuman = mysqli_real_escape_string($mysqli, $_POST['rangkuman']);
    $isi_materi = mysqli_real_escape_string($mysqli, $_POST['isi_materi']);
    $file_materi = mysqli_real_escape_string($mysqli, $_POST['file_materi']);

    $result = mysqli_query($mysqli, "UPDATE materi SET nama_materi='$nama_materi', waktu='$waktu', rangkuman='$rangkuman', isi_materi='$isi_materi', file_materi='$file_materi' WHERE id_materi='$id'");
    if ($result) {
        echo "Record updated successfully";
        header('Location: subject.php');
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
} else {
    die("Akses Dilarang..");
} ?>