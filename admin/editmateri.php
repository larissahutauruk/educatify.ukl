<?php
include ("../koneksi.php");

if (!isset($_GET['id'])) {
    header('location: index.php');
}
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM materi WHERE id_materi=$id");
while ($user_data = mysqli_fetch_array($result)) {
    $nama_materi = $user_data['nama_materi'];
    $id_kelas = $user_data['id_kelas'];
    $rangkuman = $user_data['rangkuman'];
    $isi_materi = $user_data['isi_materi'];
    $file_materi = $user_data['file_materi'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editmateristyle.css">
    <title>Edit Materi.</title>
</head>

<body>
    <div class="container">
        <img class="editframe2" src="../elements/editframe2.png" />
        <img class="editframe1" src="../elements/editframe1.png" />
        <h1 class="edit">Editing</h1>

        <form action="editprosesmateri.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
            <div class="user">
                <label>Nama Materi</label>
                <input type="text" name="nama_materi" value="<?php echo $nama_materi; ?>">
            </div>
            <div class="rangkuman">
                <label>rangkuman</label>
                <input type="text" name="rangkuman" value="<?php echo $rangkuman; ?>">
            </div>
            <div class="isi_materi">
                <label>isi_materi</label>
                <input type="text" name="isi_materi" value="<?php echo $isi_materi; ?>">
            </div>
            <div>
                <label for="file">File_materi</label>
                <input type="text" id="file_materi" name="file_materi" value="<?php echo $file_materi; ?>">
            </div>
            <div>
                <input type="hidden" name="id_materi" value="<?php echo $_GET['id']; ?>">
                <input type="submit" name="Simpan" value="Simpan">
            </div>
        </form>
</body>

</html>