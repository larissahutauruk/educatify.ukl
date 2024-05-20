<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addt.css">
    <title>Add New Class</title>
</head>
<body>
<div class="container">
  <img class="frame-1" src="../elements/frame-1.png" />
  <img class="frame-3" src="../elements/frame-3.png" />
  <img class="frame-2" src="../elements/frame-2.png" />
  <h1 class="regist">Add Class</h1>
  
  <form class="form" action="addt.php" method="post">
    <div class="id">
    <input type="number" name="id_user" placeholder="Enter id_user">
    <img src="../elements/keypassword.svg">
    </div>
    <div class="id">
    <input type="number" name="id_kelas" placeholder="Enter id_kelas">
    <img src="../elements/keypassword.svg">
    </div>
    <button class="button" type="Submit" name="Submit">Submit</button>

    <?php
            if(isset($_POST['Submit'])) {
                $id_user=$_POST['id_user'];
                $id_kelas=$_POST['id_kelas'];

                include_once("../koneksi.php");
                $result= mysqli_query($mysqli, "INSERT INTO transaksi(id_user, id_kelas) VALUES ('$id_user', $id_kelas)");

                header("location: transaksi.php");
            }
?>

</form>
</body>
</html>