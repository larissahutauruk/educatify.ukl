<?php
include '../koneksi.php';

if (!isset($_GET['id'])) {
    header('location: index.php');
}
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM metode_pembayaran WHERE id_metode=$id");
while ($user_data = mysqli_fetch_array($result)) {
    $nama_metode = $user_data['nama_metode'];
    $nama_akun = $user_data['nama_akun'];
    $no_akun = $user_data['no_akun'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editmethod.css">
    <title>Edit data.</title>
</head>

<body>
    <div class="container">
        <img class="editframe2" src="../elements/editframe2.png" />
        <img class="editframe1" src="../elements/editframe1.png" />
        <h1 class="edit">Editing</h1>

        <form action="editprosesm.php" method="post">
            <div class="method">
                <label>Nama Metode</label>
                <input type="text" name="nama_metode" value="<?php echo $nama_metode; ?>">
            </div>
            <div class="nama">
                <label>Nama Akun</label>
                <input type="text" name="nama_akun" value="<?php echo $nama_akun; ?>">
            </div>
            <div class="no">
                <label>No Akun</label>
                <input type="number" name="no_akun" value="<?php echo $no_akun; ?>">
            </div>
            <div>
                <input type="hidden" name="id_metode" value="<?php echo $_GET['id']; ?>">
                <input type="submit" name="Simpan" value="Simpan">
            </div>

        </form>
</body>

</html>