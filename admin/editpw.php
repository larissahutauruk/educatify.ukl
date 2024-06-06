<?php
session_start();
include '../koneksi.php';

$id_user = $_SESSION['id_user'];
$result = mysqli_query($mysqli, "SELECT * FROM user WHERE id_user=$id_user");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/edituserstyle.css">
    <title>Edit Password</title>
</head>

<body>
    <div class="container">
        <img class="editframe2" src="../elements/editframe2.png" />
        <img class="editframe1" src="../elements/editframe1.png" />
        <h1 class="edit">Editing Password</h1>

        <form action="editprosespw.php" method="post">
            <div class="password">
                <input type="text" name="old_pw" placeholder="Enter your password">
            </div> <br>
            <div class="newpw">
                <input type="text" name="new_pw" placeholder="Enter your new password">
            </div><br>
            <div class="confirm">
                <input type="text" name="confirm_pw" placeholder="Confirm password">
            </div><br>
            <div>
                <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                <input type="submit" name="Simpan" value="Simpan">
            </div>
        </form>
</body>

</html>