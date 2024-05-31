<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="action.css">
    <title>Document</title>
</head>

<body>

    <div class="action">
        <?php
        session_start();
        include '../koneksi.php';

        if (!isset($_SESSION['id_user'])) {
            header("Location: ../login.php");
            exit();
        }

        $id_user = $_SESSION['id_user'];
        // echo $id_user;
        $query = "SELECT *
          FROM transaksi 
          JOIN kelas on transaksi.id_kelas = kelas.id_kelas
          ";

        $result = mysqli_query($mysqli, $query);
        $data = mysqli_fetch_assoc($result);
        // print_r($data);
        ?>

        <img src="<?php echo "../user/" . $data['bukti']; ?>">
        <h3><?php echo $data['nama_kelas']; ?></h3>
        <form action="" method="post">

            <button type="submit" name="submit">Approve Now</button>
            <?php
            if (isset($_POST['submit'])) {
                include_once '../koneksi.php';

                $id_transaksi = $_GET['id_transaksi'];
                $result = mysqli_query($mysqli, "UPDATE `transaksi`  SET `status` = 'paid' WHERE id_transaksi='$id_transaksi'");
                echo "<script> 
    alert('Status berhasil dirubah!');
    document.location = 'transaksi.php'; 
    </script>";
            }
            ?>
            <button type="submit" name="submit">Delete Now</button>
            <?php
            include_once '../koneksi.php';
            $id_transaksi = $_GET['id_transaksi'];
            $result = mysqli_query($mysqli, "DELETE FROM transaksi WHERE id_transaksi=$id_transaksi");
            header("location: transaksi.php");
            ?>
        </form>
    </div>
</body>

</html>