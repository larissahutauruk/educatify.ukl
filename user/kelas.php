<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="kelas.css">
    <title>Detail product</title>
</head>

<body>
    <?php
    include 'navbaruser.php';
    include '../koneksi.php';
    session_start();

    $id_user = $_SESSION["id_user"];

    if (!isset($_GET['id_kelas'])) {
        header('location: index.php');
        exit();
    }
    $id_kelas = $_GET['id_kelas']; ?>

    <form action="search.php" method="post">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search">
        <input type="hidden" name="id" value="<?php echo $_GET["id_kelas"]; ?>">
        <input type="submit" value="Search" name="submit">
    </form>

    <?php
    $query_kelas = mysqli_query($mysqli, "SELECT * FROM kelas WHERE id_kelas='$id_kelas'");
    $data_kelas = mysqli_fetch_assoc($query_kelas);
    ?>

    <div class="kotak1">
        <div class="kelas">
            <img src="<?php echo '../admin/uploads/images/' . basename($data_kelas['image']); ?>">
            <br>
            <h3>Kelas:</h3>
            <p><?php echo htmlspecialchars($data_kelas['nama_kelas']); ?></p>
        </div>
    </div>

    <?php
    $paid = "paid";
    $sql_join = "SELECT *
            FROM transaksi 
            JOIN kelas ON transaksi.id_kelas = kelas.id_kelas
            JOIN user ON transaksi.id_user = user.id_user where transaksi.id_user = $id_user and transaksi.id_kelas = $id_kelas and transaksi.status = 'paid'
            ";
    $query_join = mysqli_query($mysqli, $sql_join) or die(mysqli_error($mysqli));
    $cek = mysqli_num_rows($query_join);
    $hasil = 0;
    // echo $cek;
    if ($cek > 0) {
        $data = mysqli_fetch_assoc($query_join);
        if ($data["status"] == "paid") {
            $hasil = 1;
        }
    }
    ?>
    <div class="container">

        <?php if ($cek > 0) {
            echo '<th>Action</th>';
        } ?>

        <?php

        $query_mysqli = mysqli_query($mysqli, "SELECT * FROM materi WHERE id_kelas=$id_kelas");
        while ($data = mysqli_fetch_array($query_mysqli)) {
            $nama_materi = htmlspecialchars($data['nama_materi']);
            $id_materi = htmlspecialchars($data['id_materi']);
            ?>

            <div class="materi">
                <h2><?php echo $data["nama_materi"]; ?></h2>
                <?php if ($cek > 0) {
                    echo '<a href="materi.php?id_kelas=' . $id_kelas . '&id_materi=' . $data["id_materi"] . '">Akses Materi</a>';
                } ?>
                <p><?php echo $data["rangkuman"]; ?></p>
                <h5><?php echo $data["waktu"]; ?></h5>
            <?php } ?>
        </div>
        <div class="buy">
            <?php if ($cek == 0) {
                echo '<p>Suka dengan website kami?</p>' . '<a href="buy1.php?id=' . $id_kelas . '">Yuk, langganan disini!</a>';
            } ?>
        </div>
    </div>
</body>

</html>