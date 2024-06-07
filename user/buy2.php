<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="buy.css">
    <title>Buy step 2</title>
</head>

<body>
    <nav>
        <div class="navbar">
            <div class="logo">Educatify.</div>
            <div class="menu">
                <ul>
                    <li><a href="index.php">Back</a></li>
                </ul>
            </div>
    </nav>
    <h4 class="method">PEMBAYARAN</h4>
    <?php
    session_start();
    include '../koneksi.php';
    if (!isset($_SESSION['id_user'])) {
        header("location: ../index.php");
        exit();
    }
    $id_user = $_SESSION['id_user'];
    $id_kelas = $_GET['id'];
    $id_metode = $_POST['metode_pembayaran'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['bukti'])) {
        $tanggal = date('Y-m-d');
        $target_dir = "uploads/bukti/";

        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true); // Buat direktori jika belum ada
        }
        $target_file = $target_dir . basename($_FILES["bukti"]["name"]);
        move_uploaded_file($_FILES["bukti"]["tmp_name"], $target_file);

        $bukti = $target_file;

        // Insert data ke tabel transaksi
        $query = "INSERT INTO transaksi (id_user, id_kelas, id_metode, tanggal, bukti, status) VALUES ('$id_user', '$id_kelas', '$id_metode', '$tanggal', '$bukti', 'pending')";
        $result = mysqli_query($mysqli, $query);
        if ($result) {
            // Redirect ke halaman mytransaksi.php setelah berhasil menyimpan transaksi
            header("Location: mytransaksi.php");
            exit();
        }
    }

    $query_kelas = mysqli_query($mysqli, "SELECT * FROM kelas WHERE id_kelas='$id_kelas'");
    $data_kelas = mysqli_fetch_assoc($query_kelas);
    ?>
    <div class="kotak1">
        <div class="kelas">
            <img src="<?php echo '../admin/uploads/images/' . htmlspecialchars(basename($data_kelas['image'])); ?>">
            <br>
            <h3>Kelas:</h3>
            <p><?php echo htmlspecialchars($data_kelas['nama_kelas']); ?></p>
            <h3>Harga:</h3>
            <p>Rp. <?php echo number_format($data_kelas['harga']); ?></p>
        </div>
    </div>
    <div class="banking">
        <?php
        $query_metode = mysqli_query($mysqli, "SELECT * FROM metode_pembayaran WHERE id_metode='$id_metode'");
        $metode = mysqli_fetch_assoc($query_metode); ?>
        <h2>NAMA PENERIMA: <br> <?php echo htmlspecialchars($metode['nama_akun']); ?></h2>
        <h4>NO REK: <br> <?php echo htmlspecialchars($metode['no_akun']); ?></h4>
    </div>
    <div class="form2">
        <div class="pay2">
            <form action="buy2.php?id=<?php echo $id_kelas; ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="step" value="2">
                <input type="hidden" name="metode_pembayaran" value="<?php echo htmlspecialchars($id_metode); ?>">
                <div class="tanggal">
                    <label for="tanggal">TANGGAL</label> <br>
                    <input type="date" id="tanggal" name="tanggal" value="<?php echo date('Y-m-d'); ?>" required>
                </div>
                <div class="file">
                    <label for="bukti">* FILE</label> <br>
                    <input type="file" id="bukti" name="bukti" required>
                </div> <br>
                <button type="submit" class="submit">SUBMIT</button>
            </form>
        </div>
    </div>
</body>

</html>