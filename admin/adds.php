<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="adds.css">
  <title>Add New Class</title>
</head>

<body>
  <div class="container">
    <img class="frame-1" src="../elements/frame-1.png" />
    <img class="frame-3" src="../elements/frame-3.png" />
    <img class="frame-2" src="../elements/frame-2.png" />
    <h1 class="regist">Add Subject</h1>

    <form class="form" action="adds.php" method="post">
      <div class="sn">
        <input type="text" name="nama_materi" placeholder="Masukkan Nama Materi">
      </div>
      <div class="rangkuman">
        <input type="text" name="rangkuman" placeholder="Masukkan Rangkuman Materi">
      </div>
      <div class="isi">
        <input type="text" name="isi_materi" placeholder="Masukkan Isi Materi">
      </div>
      <div class="file_materi">
        <input type="text" name="file_materi" placeholder="Masukkan File Materi Disini">
      </div>

      <div class="id">
        <label for="id_kelas">Pilih id_kelas</label>
        <select id="id_kelas" name="id_kelas" required>
          <?php
          include '../koneksi.php';
          $query = "SELECT id_kelas, nama_kelas FROM kelas";
          $result = mysqli_query($mysqli, $query);
          while ($data = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $data['id_kelas'] . "'>" . $data['nama_kelas'];
            "</option>";
          }
          ?>
        </select>
      </div>
      <button class="button" type="Submit" name="Submit">Submit</button>

      <?php
      if (isset($_POST['Submit'])) {
        date_default_timezone_set("Asia/Jakarta");
        include '../koneksi.php';
        $nama_materi = $_POST['nama_materi'];
        $id_kelas = $_POST['id_kelas'];
        $rangkuman = $_POST['rangkuman'];
        $isi_materi = $_POST['isi_materi'];
        $file_materi = $_POST['file_materi'];
        $waktu = date("Y-m-d h:i:s");

        $result = mysqli_query($mysqli, "INSERT INTO materi(nama_materi, waktu, id_kelas, rangkuman, isi_materi, file_materi) VALUES ('$nama_materi', '$waktu', '$id_kelas','$rangkuman', '$isi_materi', '$file_materi')");

        if ($result) {
          header("Location: subject.php");
          exit();
        } else {
          echo "Error: " . mysqli_error($mysqli);
        }
      }
      ?>

    </form>
</body>

</html>