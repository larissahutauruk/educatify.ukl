<?php
session_start();
include '../koneksi.php';

$id_user = $_SESSION['id_user'];
$result = mysqli_query($mysqli, "SELECT * FROM user WHERE id_user=$id_user");
while ($user_data = mysqli_fetch_array($result)) {
    $username = $user_data['username'];
    $email = $user_data['email'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/edituserstyle.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <img class="editframe2" src="../elements/editframe2.png" />
        <img class="editframe1" src="../elements/editframe1.png" />
        <h1 class="edit">Editing</h1>

        <form action="editprosesakun.php" method="post">
            <div class="user">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="pw">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $email; ?>">
            </div>

            <div>
                <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                <input type="submit" name="Simpan" value="Simpan">
            </div>

        </form>
    </div>
</body>

</html>