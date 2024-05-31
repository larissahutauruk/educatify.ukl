<?php
$id = $_POST["id"];
$search = $_POST['search'];
echo $id;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="search.css">

    <title>Document</title>
</head>

<body>
    <?php include 'navbaruser.php'; ?>
    <div class="back">
        <a href="kelas.php?id_kelas=<?php echo $id; ?>">Back</a>
    </div>

    <div class="container">
        <?php
        if (isset($_POST["submit"])) {

            include '../koneksi.php';

            // if (!isset($_GET['search'])) {
            //     header('location: index.php');
            //     exit();
            // }
        
            // echo $id;
            // echo $search;
            $query_mysqli = mysqli_query($mysqli, "SELECT * FROM materi WHERE id_kelas = '$id' and nama_materi LIKE '%$search%'");
            while ($data = mysqli_fetch_array($query_mysqli)) {
                $nama_materi = htmlspecialchars($data['nama_materi']);
                $id_materi = htmlspecialchars($data['id_materi']);

                ?>
                <div class="materi">
                    <h2><?php echo $data["nama_materi"]; ?></h2>
                    <p><?php echo $data["rangkuman"]; ?></p>
                    <h5><?php echo $data["waktu"]; ?></h5>
                </div>
            <?php }
        } ?>
    </div>
</body>

</html>