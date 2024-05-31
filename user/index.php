<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Educatify</title>
</head>

<body>

    <div class="buku-biru"></div>
    <?php include "navbaruser.php"; ?>
    <div class="opening">
        <h1>Hone your knowledge anywhere and anytime!</h1>
        <p>Bersama dengan guru-guru hebat akan memberi kalian ilmu melalui website yang akan diperbarui setiap minggu.
            Pantau terus website ini agar tidak ketinggalan informasi lainnya !</p>
    </div>
    <div class="separator">
        <div class="contact">
            <img src="../elements/uil-ig.svg" alt="ig">
            <a href="https://www.instagram.com/imlariissahtrk_/">@imlariissahtrk</a>
            <img src="../elements/uil-wa.svg" alt="wa">
            <a href="https://api.whatsapp.com/send/?phone=6285785614715">+62 8578-5614-715</a>
            <img src="../elements/logo-tiktok.svg" alt="tiktok" width="41" height="46">
            <a href="https://www.tiktok.com/@itsme.lrssa?_t=8m1vPgcXklV&_r=1">@itsme.lrssa</a>
        </div>
    </div>

    <div class="container" id="home">
        <?php
        session_start();
        include '../koneksi.php';


        $id_user = $_SESSION["id_user"];


        $query_mysqli = mysqli_query($mysqli, "SELECT * FROM kelas") or die(mysqli_error($mysqli));
        while ($data = mysqli_fetch_array($query_mysqli)) {
            $id = $data["id_kelas"];
            $sql_join = "SELECT *
            FROM transaksi 
            JOIN kelas ON transaksi.id_kelas = kelas.id_kelas
            JOIN user ON transaksi.id_user = user.id_user where transaksi.id_user = $id_user and transaksi.id_kelas = $id
            ";
            $query_join = mysqli_query($mysqli, $sql_join) or die(mysqli_error($mysqli));
            $cek = mysqli_num_rows($query_join);
            // echo $cek;
            ?>
            <div class="kelas">
                <h3><?php echo $data['nama_kelas']; ?></h3>
                <h4><?php echo "Rp. " . number_format($data['harga']); ?></h4>
                <a href="kelas.php?id_kelas=<?php echo $id; ?>">Go To Class</a>
                <?php if ($cek == 0) {
                    echo '<a href="buy.php?id=' . $id . '">Buy</a>';
                } ?>
            </div>
        <?php } ?>
    </div>

    <footer>
    </footer>
</body>

</html>