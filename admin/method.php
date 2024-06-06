<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userstyle.css">
    <title>Educatify's Subject</title>
</head>

<body>
    <?php include "navbar.php"; ?>

    <h1>Metode pembayaran yang ada di Educatify.</h1>
    <a href="addm.php" class="add">Add New Subject Here</a>
    <table>
        <tr>
            <th>Nomor</th>
            <th>Metode</th>
            <th>Nama akun</th>
            <th>No akun</th>
            <th>Edit</th>
            <th>Delete</th>

            <?php
            include '../koneksi.php';
            $query_mysqli = mysqli_query($mysqli, "SELECT * FROM metode_pembayaran") or die(mysqli_error($mysqli));
            $nomor = 1;
            while ($data = mysqli_fetch_array($query_mysqli)) {
                ?>
            <tr>
                <td><?php print $nomor++; ?></td>
                <td><?php echo $data['nama_metode']; ?></td>
                <td><?php print $data['nama_akun']; ?></td>
                <td><?php echo $data['no_akun']; ?></td>
                <td class="edit"><a href="editm.php?id=<?php echo $data['id_metode']; ?>">Edit</a></td>
                <td class="delete"><a href="deletem.php?id=<?php print $data['id_metode']; ?>">Delete</a></td>
            </tr>
        <?php } ?>
        </tr>
    </table>

</body>

</html>