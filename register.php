<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Regist page</title>
</head>
<body>
<div class="container">
  <img class="frame-1" src="elements/frame-1.png" />
  <img class="frame-3" src="elements/frame-3.png" />
  <img class="frame-2" src="elements/frame-2.png" />
  <h1 class="regist">Register</h1>
  
  <form class="form" action="register.php" method="post">
    <div class="user">
    <input type="text" name="Username" placeholder="Enter Your Username">
    <img src="elements/user.svg">
    </div>
    <div class="pw">
    <input type="password" name="Password" placeholder="Enter Password">
    <img src="elements/keypassword.svg">
</div>
    <div class="fn">
      <input type="text" name="Nama" placeholder="Enter Your Full Name">
      <img src="elements/user.svg">
    </div>
    <div class="lvl">
    <input type="text" name="Level" placeholder="Enter Your Level">
    <img src="elements/class.svg">
    </div>
    <div class="email">
      <input type="email" name="Email" placeholder="Enter Your Email Address">
      <img src="elements/email.svg">
    </div>
    <div class="banking">
      <input type="text" name="No_rek" placeholder="Enter Your Account Number">
      <img src="elements/banking.svg">
    </div>
    <div class="masuk">
      <p>Have  an account? <a href="masuk.php" style="color: #553569">Login here !</a> </p>
    </div>
    <button class="button" type="Submit" name="Submit">Submit</button>

    <?php
            if(isset($_POST['Submit'])) {
                $username=$_POST['Username'];
                $password=$_POST['Password'];
                $nama=$_POST['Nama'];
                $level=$_POST['Level'];
                $email=$_POST['Email'];
                $no_rek=$_POST['No_rek'];

                include_once("koneksi.php");
                $result= mysqli_query($mysqli, "INSERT INTO user(username, password, nama, level, email, no_rek) VALUES ('$username', '$password', '$nama', '$level', '$email', $no_rek)");

                header("location: masuk.php");
            }
?>

</form>
</body>
</html>