<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="masuk.css">
    <title>Login page</title>
</head>
<body>
<div class="container">
  <img class="frame-2p2" src="elements/frame-2p2.png" />
  <img class="frame-4" src="elements/frame-4.png" />
  <img class="frame-1p2" src="elements/frame-1p2.png" />
  <h1 class="login">Log-In</h1>
  
  <form class="form" action="login.php" method="post">
    <div class="user">
    <input type="text" name="Username" placeholder="Enter Your Username">
    <img class="username" src="elements/user.svg">
    </div>
    <div class="pw">
    <input type="password" name="Password" placeholder="Enter Password">
    <img class="key" src="elements/keypassword.svg">
    </div>
    <div class="lvl">
    <input type="text" name="Level" placeholder="Pengajar / Pelajar?">
    <img class="email" src="elements/class.svg">
    </div>
    <div class="regist">
      <p>Don't have  an account? <a href="register.php" style="color: #fff">Regist here !</a> </p>
    </div>
    <a href="login.php">
    <button class="button">Login</button>
</body>
</html>