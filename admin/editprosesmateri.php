<?php
include '../koneksi.php';
if(isset($_POST['Simpan'])) {
    $id=$_POST['id_materi'];
    $nama_materi=$_POST['nama_materi'];
    $id_pengajar=$_POST['id_pengajar'];
    $id_kelas=$_POST['id_kelas'];

    include_once '../koneksi.php';
    $result=mysqli_query($mysqli, "UPDATE materi SET nama_materi='$nama_materi', id_pengajar='$id_pengajar', id_kelas='$id_kelas' WHERE id_materi=$id");
    header('location: subject.php');
} else {
    die("Akses Dilarang..");
}
?>