<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jual e-book Sosial Budaya</title>
    <link rel="stylesheet" href="buy.css">
</head>

<body>
    <?php include 'navbaruser.php'; ?>
    <h4 class="method">PEMBAYARAN</h4>
    <?php
    session_start();
    include '../koneksi.php';

    if (!isset($_SESSION['id_user'])) {
        header("Location: ../index.php");
        exit();
    }

    $id_user = $_SESSION['id_user'];
    $id_kelas = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $metode_pembayaran = $_POST['metode_pembayaran'];
        $tanggal = $_POST['tanggal'];

        // Periksa apakah id_kelas materi ada dalam tabel kelas
        $query_kelas = mysqli_query($mysqli, "SELECT * FROM kelas WHERE id_kelas='$id_kelas'");
        $data_kelas = mysqli_fetch_assoc($query_kelas);

        $target_dir = "uploads/bukti/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true); // Buat direktori jika belum ada
        }
        $target_file = $target_dir . basename($_FILES["bukti"]["name"]);
        move_uploaded_file($_FILES["bukti"]["tmp_name"], $target_file);

        $bukti = $target_file;

        // Periksa apakah id_kelas yang ditemukan
        $query = "INSERT INTO transaksi (id_user,  id_kelas, metode_pembayaran, tanggal, bukti, status) VALUES ('$id_user',  '$id_kelas', '$metode_pembayaran', '$tanggal', '$bukti', 'pending')";
        $result = mysqli_query($mysqli, $query);

        if ($result) {
            header("Location: mytransaksi.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($mysqli);
        }
    }
    $query_kelas = mysqli_query($mysqli, "SELECT * FROM kelas WHERE id_kelas='$id_kelas'");
    $data_kelas = mysqli_fetch_assoc($query_kelas);
    ?>

    <div class="kotak1">
        <div class="kelas">
            <img src="<?php echo '../admin/uploads/images/' . basename($data_kelas['image']); ?>">
            <br>
            <h3>Kelas:</h3>
            <p><?php echo htmlspecialchars($data_kelas['nama_kelas']); ?></p>
            <h3>Harga:</h3>
            <p>Rp. <?php echo number_format($data_kelas['harga']); ?></p>
        </div>
    </div>
    <div class="form">
        <div class="pay">
            <form action="buy.php?id=<?php echo $id_kelas; ?>" method="POST" enctype="multipart/form-data">
                <label for="metode_pembayaran">METODE PEMBAYARAN</label> <br>
                <select id="metode_pembayaran" name="metode_pembayaran" required>
                    <option value="transfer">Transfer</option>
                </select>
        </div>
        <div class="file">
            <label for="bukti">* FILE</label> <br>
            <input type="file" id="bukti" name="bukti" required>
        </div>
        <div class="tanggal">
            <label for="tanggal">TANGGAL</label> <br>
            <input type="date" name="tanggal" required>
        </div>
        <div class="info">
            <h3>Nama bank: Mandiri</h3>
            <h4>No. Rek: 1234</h4>
            <h4>Total harga: <?php echo number_format($data_kelas['harga']); ?></h4>
        </div>
        <button type="submit">BELI SEKARANG</button>
        </form>
    </div>
</body>

</html>