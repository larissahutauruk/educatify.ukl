<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adds.css">
    <title>Add New Class</title>
</head>

<body>
    <div class="container">
        <img class="frame-1" src="../elements/frame-1.png" />
        <img class="frame-3" src="../elements/frame-3.png" />
        <img class="frame-2" src="../elements/frame-2.png" />
        <h1 class="regist">Add Payment Method</h1>

        <form class="form" action="addm.php" method="post">
            <div class="method">
                <input type="text" name="nama_metode" placeholder="Masukkan Metode Baru">
            </div>
            <div class="nama">
                <input type="text" name="nama_akun" placeholder="Masukkan Nama Akun">
            </div>
            <div class="no">
                <input type="number" name="no_akun" placeholder="Masukkan Nomor Akun">
            </div>
            <button class="button" type="Submit" name="Submit">Submit</button>

            <?php
            if (isset($_POST['Submit'])) {
                include '../koneksi.php';
                $nama_metode = $_POST['nama_metode'];
                $nama_akun = $_POST['nama_akun'];
                $no_akun = $_POST['no_akun'];

                $result = mysqli_query($mysqli, "INSERT INTO metode_pembayaran(nama_metode, nama_akun, no_akun) VALUES ('$nama_metode', '$nama_akun', '$no_akun')");

                if ($result) {
                    header("Location: method.php");
                    exit();
                } else {
                    echo "Error: " . mysqli_error($mysqli);
                }
            }
            ?>

        </form>
</body>

</html>