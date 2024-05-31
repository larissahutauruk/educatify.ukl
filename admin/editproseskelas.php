<?php
include '../koneksi.php';
if (isset($_POST['Simpan'])) {
    $id = $_POST['id_kelas'];
    $nama_kelas = $_POST['nama_kelas'];
    $harga = $_POST['harga'];

    $target_dir = "uploads/images/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $image_path = "";
    if (!empty($_FILES["image"]["name"])) {
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image_path = $target_file;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    include_once '../koneksi.php';
    $query = "UPDATE kelas SET 
    nama_kelas='$nama_kelas',
    harga='$harga'";
    if (!empty($image_path)) {
        $query .= ", image='$image_path'";
    }
    $query .= " WHERE id_kelas='$id'";
    if (mysqli_query($mysqli, $query)) {
        echo "Record updated successfully";
        header('Location: class.php');
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
} else {
    die("Akses Dilarang..");
}
?>