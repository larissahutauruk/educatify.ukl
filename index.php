<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="index.css">
  <title>Sosial Budaya Surabaya</title>
</head>

<body>
  <div class="buku-biru"></div>
  <nav>
    <div class="navbar">
      <div class="logo">Educatify.</div>
      <div class="menu">
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="#teacher">Teacher</a></li>
          <li><a href="#class">Class</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="opening" id="home">
    <h1>Hone your knowledge anywhere and anytime!</h1>
    <p>Bersama dengan guru-guru hebat akan memberi kalian ilmu melalui website yang akan diperbarui setiap minggu.
      Pantau terus website ini agar tidak ketinggalan informasi lainnya !</p>
  </div>
  <div class="regin">
    <ul>
      <li><a href="register.php" class="regis">Register</a></li>
      <li><a href="masuk.php" class="log-in">Login</a></li>
    </ul>
  </div>

  <div class="separator">
    <div class="contact">
      <img src="elements/uil-ig.svg" alt="ig">
      <a href="https://www.instagram.com/imlariissahtrk_/">@imlariissahtrk</a>
      <img src="elements/uil-wa.svg" alt="wa">
      <a href="https://api.whatsapp.com/send/?phone=6285785614715">+62 8578-5614-715</a>
      <img src="elements/logo-tiktok.svg" alt="tiktok" width="41" height="46">
      <a href="https://www.tiktok.com/@itsme.lrssa?_t=8m1vPgcXklV&_r=1">@itsme.lrssa</a>
    </div>

    <h3 class="guru" id="teacher">Para guru terpilih akan mengajar anda:</h3>
    <div class="teacher">
      <div class="arabella">
        <img src="elements/arabella.jpeg">
        <h4>Arabella Victoria <br> Thompson</h4>
        <br>
        <i>4.3</i>
      </div>
      <div class="theodore">
        <img src="elements/teodore.jpeg">
        <h4>Theodore James <br> Robinson</h4>
        <br>
        <i>4.7</i>
      </div>
      <div class="christopher">
        <img src="elements/christopher.png">
        <h4>Christopher <br> Michael Davis</h4>
        <br>
        <i>4.9</i>
      </div>
    </div>

    <div class="class" id="class">
      <h3>Dapatkan kelas Dengan Harga Terjangkau !</h3>
      <p>Percayakan diri kamu pada guru-guru terpercaya untuk membimbing diri kamu! <br>
        Ayo asah dan tingkatkan kemampuan kamu sekarang. Kalau bukan sekarang, kapan lagi?
      </p>
    </div>
    <div class="container">
      <?php
      include 'koneksi.php';
      $query_mysqli = mysqli_query($mysqli, "SELECT * FROM kelas") or die(mysqli_error($mysqli));
      while ($data = mysqli_fetch_array($query_mysqli)) {
        ?>
        <div class="kelas">
          <img src="elements/diskon.svg">
          <h3><?php echo $data['nama_kelas']; ?></h3>
          <h2><?php echo "Rp." . number_format($data['harga']); ?></h2>
          <br>
        </div>
      <?php } ?>
    </div>

    <footer>
      <div class="us" id="contact">
        <h4>Contact Us</h4>
        <img src="elements/uil-ig.svg" alt="ig"><a href="https://www.instagram.com/imlariissahtrk_/"></a>
        <img src="elements/uil-wa.svg" alt="wa"><a href="https://api.whatsapp.com/send/?phone=6285785614715"></a>
        <img src="elements/logo-tiktok.svg" alt="tiktok" width="41" height="46"><a
          href="https://www.tiktok.com/@itsme.lrssa?_t=8m1vPgcXklV&_r=1"></a>
      </div>
      <div class="footer-nav">
        <h4>Quick Links</h4>
        <a href="#home">Home</a>
        <a href="#about">About Us</a>
        <a href="#contact">Contact</a>
      </div>
      <div class="educatify" id="about">
        <h4>About Us</h4> <br>
        <p>Educatify is a website that provides various classes at student prices.
          Our vision and mission is to apply the role of technology to student learning activities in Indonesia.
        </p>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2024 Your Company. All Rights Reserved.</p>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms and Conditions</a>
        <a href="#">Cookie Policy</a>
      </div>
    </footer>
</body>

</html>