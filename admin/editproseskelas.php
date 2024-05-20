<?php
include '../koneksi.php';
if(isset($_POST['Simpan'])) {
    $id = $_POST['id_kelas'];
    $nama_kelas = $_POST['nama_kelas'];
    $id_pengajar = $_POST['id_pengajar'];
    $harga = $_POST['harga'];
    var_dump($id);

    include_once '../koneksi.php';
    $result = mysqli_query($mysqli, "UPDATE kelas SET nama_kelas='$nama_kelas', id_pengajar='$id_pengajar', harga='$harga' WHERE id_kelas=$id");
    header('location: class.php');
}
?>