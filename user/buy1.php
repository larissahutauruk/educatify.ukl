<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jual e-book Sosial Budaya</title>
    <link rel="stylesheet" href="buy.css">
</head>

<body>
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

    // Periksa apakah id_kelas materi ada dalam tabel kelas
    $query_kelas = mysqli_query($mysqli, "SELECT * FROM kelas WHERE id_kelas='$id_kelas'");
    $data_kelas = mysqli_fetch_assoc($query_kelas);

    if (!$data_kelas) {
        // Jika data kelas tidak ditemukan, arahkan kembali atau tampilkan pesan error
        echo "Kelas tidak ditemukan.";
        exit();
    }

    $id_user_kelas = $data_kelas['id_user'];

    // Query untuk mengambil metode pembayaran berdasarkan id_user dari kelas
    $query_metode = mysqli_query($mysqli, "SELECT * FROM metode_pembayaran");
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
    <div class="form">
        <div class="pay">
            <form action="buy2.php?id=<?php echo $id_kelas; ?>" method="POST">
                <label for="metode_pembayaran">METODE PEMBAYARAN</label> <br>
                <select id="metode_pembayaran" name="metode_pembayaran" required>
                    <?php while ($metode = mysqli_fetch_assoc($query_metode)): ?>
                        <option value="<?php echo htmlspecialchars($metode['id_metode']); ?>">
                            <?php echo htmlspecialchars($metode['nama_metode']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
        </div>
        <button type="submit" class="next">NEXT</button>
        </form>
    </div>
</body>

</html>