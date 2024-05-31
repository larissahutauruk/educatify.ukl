-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 06:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukl`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `harga` int(30) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `id_user`, `harga`, `image`) VALUES
(16, 'Sosial Budaya', 8, 130000, 'uploads/images/sb.jpeg'),
(17, 'Design', 8, 200000, 'uploads/images/uiux.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `nama_materi` varchar(100) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `rangkuman` text NOT NULL,
  `isi_materi` text NOT NULL,
  `file_materi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `nama_materi`, `id_kelas`, `waktu`, `rangkuman`, `isi_materi`, `file_materi`) VALUES
(15, 'sosial budaya surabaya', 16, '2024-05-29 03:20:05', 'Surabaya merupakan kota modern kedua setelah Jakarta dengan tetap memegang budaya dan kearifan lokalnya. Kota ini lebih di dominasi oleh suku Jawa yang dikenal ramah dan baik hatinya. Tapi jangan mengira pendatang di Surabaya tidak begitu ya.. pendatang di Surabaya juga tetap menjaga sopan santunnya sebab itulah Surabaya tetap terbuka dari pendatang luar baik dalam negeri dan luar negeri.Banyak pendatang luar yang menetap di Surabaya dengan alasan utama mulai dari menempuh pendidikan dan bekerja.Nah, sejak dulu Surabaya terkenal sebagai kota pelabuhan lho. Pelabuhan ini sering dijadian sebagai tempat kegiatan perdagangan dengan negeri Cina Darat, India, dan Timur Tengah sehingga membuat Surabaya menjadi tempat berkumpulnya berbagai kebudayaan.', 'Surabaya merupakan kota modern kedua setelah Jakarta dengan tetap memegang budaya dan kearifan lokalnya. Kota ini lebih di dominasi oleh suku Jawa yang dikenal ramah dan baik hatinya. Tapi jangan mengira pendatang di Surabaya tidak begitu ya.. pendatang di Surabaya juga tetap menjaga sopan santunnya sebab itulah Surabaya tetap terbuka dari pendatang luar baik dalam negeri dan luar negeri.Banyak pendatang luar yang menetap di Surabaya dengan alasan utama mulai dari menempuh pendidikan dan bekerja.Nah, sejak dulu Surabaya terkenal sebagai kota pelabuhan lho. Pelabuhan ini sering dijadian sebagai tempat kegiatan perdagangan dengan negeri Cina Darat, India, dan Timur Tengah sehingga membuat Surabaya menjadi tempat berkumpulnya berbagai kebudayaan. Mau tau apa saja sosial budaya di Surabaya?Budaya SurabayaSurabaya Pusat.Kampung Arab:Pria biasanya memakai jubah panjang (gamis) dan surban, sedangkan wanita mengenakan jilbab atau hijab yang longgar.Perayaan: Maulid Nabi Muhammad SAW & kegiatan ziarah.Chinatown (Kya-Kya Kembang Jepun):Cheongsam atau qipao untuk wanita dan changshan untuk pria.Perayaan: Imlek dan Barongsai.Surabaya Timur.Kenjeran:Pakaian nelayan tradisional yang sederhana, biasanya berbahan katun dan berwarna cerah.Surabaya Selatan.Darmo:Kebaya untuk wanita dan batik atau beskap untuk pria.Surabaya Barat.Dukuh Pakis:Baju pesaan untuk pria dan kebaya untuk wanita, sering berwarna merah dan hitam.Surabaya Utara.Ampel:Baju koko dan sarung untuk pria, serta gamis atau jilbab panjang untuk wanita.', 'C:xampphtdocs	ugas_dasprog.phpukl2usere-books2b8y3s74index.php'),
(16, 'UI or UX?', 17, '2024-05-29 08:13:54', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'C:xampphtdocs	ugas_dasprog.phpukl2usere-books2b8y3s74index.php');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(25) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `metode_pembayaran` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_kelas`, `id_user`, `metode_pembayaran`, `tanggal`, `bukti`, `status`) VALUES
(30, 16, 7, 'transfer', '2024-05-30', 'uploads/bukti/1[1].png', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `level` varchar(11) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `level`, `email`) VALUES
(7, 'larissa', 'aaa', 'Larissa P', 'pelajar', 'larissa@gmail.com'),
(8, 'arabella', '22222', 'Arabella Victoria Thompson', 'pengajar', 'arabella@gmail.com'),
(12, 'christopher', '3', 'Christopher Michael Davis', 'pengajar', 'daviscm@gmail.com'),
(13, 'hutauruk', '4444', 'Hutauruk L', 'pelajar', 'hutauruk@gmail.com'),
(14, 'theodorejr', 'theor09', 'Theodore James Robinson', 'pengajar', 'jamesr@gmail.com'),
(15, 'pauline', '1010', 'Paulina C', 'pelajar', 'pauline@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `fk_user_kelas` (`id_user`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `fk_kelas_materi` (`id_kelas`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_transaksi_user` (`id_user`),
  ADD KEY `fk_transaksi_kelas` (`id_kelas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `fk_user_kelas` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `fk_kelas_materi` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `fk_transaksi_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
