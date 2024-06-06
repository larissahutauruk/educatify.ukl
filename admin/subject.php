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

    <h1>Materi apa saja yang ada di dalam kelas Educatify?</h1>
    <a href="adds.php" class="add">Add New Subject Here</a>
    <table>
        <tr>
            <th>Nomor</th>
            <th>nama materi</th>
            <th>id kelas</th>
            <th>rangkuman</th>
            <th>isi materi</th>
            <th>File Materi</th>
            <th>Edit</th>
            <th>Delete</th>

            <?php
            include '../koneksi.php';
            $query_mysqli = mysqli_query($mysqli, "SELECT * FROM materi") or die(mysqli_error($mysqli));
            $nomor = 1;
            while ($data = mysqli_fetch_array($query_mysqli)) {
                ?>
            <tr>
                <td><?php print $nomor++; ?></td>
                <td><?php echo $data['nama_materi']; ?></td>
                <td><?php print $data['id_kelas']; ?></td>
                <td><?php echo $data['rangkuman']; ?></td>
                <td><?php echo $data['isi_materi']; ?></td>
                <td><?php echo $data['file_materi']; ?></td>
                <td class="edit"><a href="editmateri.php?id=<?php echo $data['id_materi']; ?>">Edit</a></td>
                <td class="delete"><a href="deletemateri.php?id=<?php print $data['id_materi']; ?>">Delete</a></td>
            </tr>
        <?php } ?>
        </tr>
    </table>

</body>

</html>