<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="choose.css">
    <title>Detail Produk</title>
</head>

<body>
    <div class="container">
        <?php
        include '../koneksi.php';

        if (!isset($_GET['id'])) {
            header('location: index.php');
        }
        $id = $_GET['id'];
        $query_mysqli = mysqli_query($mysqli, "SELECT * FROM materi where id_materi=$id") or die(mysqli_error($mysqli));
        if ($query_mysqli) {
            $nomor = 1;
            while ($data = mysqli_fetch_array($query_mysqli)) {
                $id = $data['id_materi'];
                ?>
                <div class="subject">
                    <img src="<?php echo '../admin/uploads/images/' . basename($data['image']); ?>">
                    <h1><?php echo $data['nama_materi']; ?></h1>
                    <h3>Arabella V.T</h3>
                    <p><?php echo $data['rangkuman']; ?></p>
                </div>
                <div class="buy">
                    <h3>The benefits you get:</h3>
                    <p>Berdasarkan penelitian <br> Original content <br> Akses Instan <br> Biaya Murah
                    </p>
                    <a href="buy.php?id=<?php echo $id; ?>">BUY</a>
                </div>
            <?php }
        } ?>
    </div>
</body>

</html>