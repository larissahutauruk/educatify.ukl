<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['id_user'])) {
    header("Location: ../login.php");
    exit();
}

$id_user = $_SESSION['id_user'];
$query = "SELECT transaksi.*, kelas.nama_kelas, kelas.image, kelas.harga, user.nama, metode_pembayaran.nama_metode
          FROM transaksi 
        --   JOIN materi ON transaksi.id_kelas = materi.id_kelas
          JOIN kelas ON transaksi.id_kelas = kelas.id_kelas
          JOIN user ON transaksi.id_user = user.id_user
        JOIN metode_pembayaran ON transaksi.id_metode = metode_pembayaran.id_metode
          WHERE transaksi.id_user = '$id_user'";

$result = mysqli_query($mysqli, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="transaksi.css">
    <title>PembayaranKu</title>
</head>

<body>
    <?php include 'navbaruser.php'; ?>
    <h1>Pembayaranku</h1>
    <table>
        <tr>
            <th>Nomor</th>
            <th>Nama_kelas</th>
            <th>Image</th>
            <th>Harga</th>
            <th>Nama_user</th>
            <th>Metode_pembayaran</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Details</th>
            <th>Cancel</th>
        </tr>
        <?php
        $nomor = 1;
        while ($data = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo htmlspecialchars($data['nama_kelas']); ?></td>
                <td><?php
                $imagePath = '../admin/uploads/images/' . basename($data['image']);
                ?>
                    <img src="<?php echo $imagePath; ?>" width="100px" height="70">
                </td>
                <td><?php echo "Rp. " . number_format($data['harga']); ?></td>
                <td><?php echo htmlspecialchars($data['nama']); ?></td>
                <td><?php echo htmlspecialchars($data['nama_metode']); ?></td>
                <td><?php echo htmlspecialchars($data['tanggal']); ?></td>
                <td><?php echo htmlspecialchars($data['status']); ?></td>
                <td><a href="detail.php?id=<?php echo $data["id_transaksi"]; ?>">Details</a></td>
                <td><?php if ($data['status'] === 'pending') { ?>
                        <a href="deletetransaksi.php?id=<?php echo $data['id_transaksi']; ?>">Cancel</a>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>