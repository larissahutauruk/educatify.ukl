<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userstyle.css">
    <title>Educatify's Class</title>
</head>

<body>
    <?php include "navbar.php"; ?>

    <h1>Apa saja kelas yang bisa diambil di Educatify?</h1>

    <a href="addc.php">Add New Data</a>
    <table>
        <tr>
            <th>Nomor</th>
            <th>nama kelas</th>
            <th>id user</th>
            <th>harga</th>
            <th>Image</th>
            <th>Edit</th>
            <th>Delete</th>

            <?php
            include '../koneksi.php';
            $query_mysqli = mysqli_query($mysqli, "SELECT * FROM kelas") or die(mysqli_error($mysqli));
            $nomor = 1;
            while ($data = mysqli_fetch_array($query_mysqli)) {
                ?>
            <tr>
                <td><?php print $nomor++; ?></td>
                <td><?php echo $data['nama_kelas']; ?></td>
                <td><?php echo $data['id_user']; ?></td>
                <td><?php echo "Rp. " . number_format($data['harga']); ?></td>
                <td><?php echo $data['image']; ?></td>
                <td class="edit"><a href="editkelas.php?id=<?php echo $data['id_kelas']; ?>">Edit</a></td>
                <td class="delete"><a href="deletekelas.php?id=<?php print $data['id_kelas']; ?>">Delete</a></td>
            </tr>
        <?php } ?>
        </tr>
    </table>

</body>

</html>