<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="materi.css">
    <title>Document</title>
</head>

<body>
    <nav>
        <div class="navbar">
            <div class="logo">Surabaya</div>
            <div class="menu">
                <ul>
                    <li><a href="#homepage">Home</a></li>
                    <li><a href="#intro">Intro</a></li>
                    <li><a href="#news">News</a></li>
                    <li><a href="#sumber">Sumber</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    include '../koneksi.php';
    session_start();

    $id_user = $_SESSION["id_user"];


    // if (!isset($_GET['id_kelas'])) {
    //     header('location: index.php');
    //     exit();
    // }
    $id_kelas = $_GET['id_kelas'];

    // if (!isset($_GET['id_materi'])) {
    //     header('location: index.php');
    //     exit();
    // }
    $id_materi = $_GET['id_materi'];

    // echo $id_kelas;
    // echo $id_materi;
    
    ?>

    <?php
    $paid = "paid";
    $sql_join = "SELECT *
            FROM transaksi 
            JOIN kelas ON transaksi.id_kelas = kelas.id_kelas
            JOIN materi ON materi.id_kelas = kelas.id_kelas
            JOIN user ON transaksi.id_user = user.id_user where transaksi.id_user = $id_user and transaksi.id_kelas = $id_kelas and transaksi.status = 'paid'
            ";
    $query_join = mysqli_query($mysqli, $sql_join) or die(mysqli_error($mysqli));
    /* ` = mysqli_num_rows();` is a PHP function that returns the number of rows in the
    result set obtained from the query execution. In this context, it is used to check how many rows
    are returned by the query `` which is selecting data from multiple tables based on
    certain conditions. The value of `` will indicate the number of rows returned by the query,
    and it is then used in the conditional statement to determine further actions based on the
    result set. */
    $cek = mysqli_num_rows($query_join);
    $hasil = 0;
    // echo $cek;
    if ($cek == 0) {
        header('location: index.php');
    } else {
        $data = mysqli_fetch_assoc($query_join) ?>
        <div class="content">
            <h2><?php echo $data["nama_materi"]; ?></h2>
            <p><?php echo $data["isi_materi"]; ?></p>
        </div>
    <?php } ?>

</body>

</html>