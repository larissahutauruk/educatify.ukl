<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminstyle.css">
    <title>Educatify's Class</title>
</head>
<body>
    <nav>
      <div class="navbar">
        <div class="logo">Educatify.</div>
        <div class="menu">
          <ul>
            <li><a href="user.php">User</a></li>
            <li><a href="class.php">Class</a></li>
            <li><a href="subject.php">Subject</a></li>
            <li><a href="transaksi.php">Transaksi</a></li>
          </ul>
        </div>
      </div>
    </nav>

<h1>Apa saja kelas yang bisa diambil di Educatify?</h1>
    <table>
        <tr>
            <th>Nomor</th>
            <th>nama kelas</th>
            <th>id pengajar</th>
            <th>harga</th>
            <th>Edit</th>
            <th>Delete</th>

            <?php
            include '../koneksi.php';
            $query_mysqli = mysqli_query($mysqli, "SELECT * FROM kelas") or die (mysqli_error());
            $nomor=1;
            while($data = mysqli_fetch_array($query_mysqli)){
                ?>
                <tr>
                    <td><?php print $nomor++;?></td>
                    <td><?php echo $data['nama_kelas'];?></td>
                    <td><?php echo $data['id_pengajar'];?></td>
                    <td><?php echo $data['harga'];?></td>
                    <td class="edit"><a href="editkelas.php?id=<?php echo $data['id_kelas'];?>">Edit</a></td>
                    <td class="delete"><a href="deletekelas.php?id=<?php print $data['id_kelas'];?>">Delete</a></td>
                </tr>
            <?php } ?>
        </tr>
    </table>
    <table>
        <tr>
            <td class="add"><a href="addclass.php">Add New Data</a></td>
        </tr>
    </table>
        
</body>
</html>