-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 04:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tosepatu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_layanan`
--

CREATE TABLE `tb_layanan` (
  `id` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_layanan`
--

INSERT INTO `tb_layanan` (`id`, `nama`, `harga`) VALUES
(2, 'Deep Clean for White Shoes', '15000'),
(3, 'Medium Clean', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id`, `nama`) VALUES
(1, 'Tunai'),
(2, 'Non-Tunai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengiriman`
--

CREATE TABLE `tb_pengiriman` (
  `id` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pengiriman`
--

INSERT INTO `tb_pengiriman` (`id`, `nama`, `harga`) VALUES
(1, 'Ambil Sendiri', '0'),
(2, 'Dikirim', '3000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjemputan`
--

CREATE TABLE `tb_penjemputan` (
  `id` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penjemputan`
--

INSERT INTO `tb_penjemputan` (`id`, `nama`, `harga`) VALUES
(1, 'Dijemput', '3000'),
(2, 'Antar Sendiri', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id` int(2) NOT NULL,
  `id_user` int(2) NOT NULL,
  `status` enum('menunggu','selesai') NOT NULL,
  `pesan_user` varchar(500) NOT NULL,
  `pesan_admin` varchar(500) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pesan`
--

INSERT INTO `tb_pesan` (`id`, `id_user`, `status`, `pesan_user`, `pesan_admin`, `tanggal`) VALUES
(1, 6, 'selesai', 'kontol user', 'kontol anjing', '2022-12-10'),
(3, 6, 'menunggu', 'Admin Kontol', '', '2022-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int(2) NOT NULL,
  `nama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id`, `nama`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`id`, `nama`) VALUES
(1, 'Belum Bayar'),
(2, 'Pengerjaan'),
(3, 'Selesai'),
(4, 'Gagal');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `id_user` int(2) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `status` int(2) NOT NULL,
  `layanan` int(2) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `penjemputan` int(2) NOT NULL,
  `pengiriman` int(2) NOT NULL,
  `pembayaran` int(2) NOT NULL,
  `bukti` varchar(50) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `id_user`, `alamat`, `status`, `layanan`, `jumlah`, `penjemputan`, `pengiriman`, `pembayaran`, `bukti`, `tanggal`) VALUES
(8, 2, 'Probolinggo', 1, 2, 1, 1, 2, 2, '', '2022-12-01'),
(11, 2, 'Jember', 1, 2, 1, 1, 2, 2, 'icon_login.png', '2022-12-08'),
(12, 6, 'Jember', 3, 2, 2, 1, 2, 2, 'icon_register.png', '2022-12-05'),
(13, 6, 'Cempaka ', 3, 2, 3, 1, 2, 1, NULL, '2022-12-07'),
(14, 11, 'Sumenep', 3, 3, 50, 2, 1, 2, NULL, '2022-12-09'),
(15, 5, 'Situbondo', 3, 3, 100, 2, 2, 2, NULL, '2022-12-11'),
(16, 6, 'Ambulu', 1, 3, 2, 1, 2, 2, '', '2022-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role`) VALUES
(1, 'root', 'root', 'root', 1),
(2, 'Ilham Ibnu Ahmad', 'ilham', 'ilham', 2),
(5, 'Rijal Khoirul Anam', 'rijal', 'rijal', 2),
(6, 'Akbar Kusnadi', 'akbar', 'akbar', 2),
(11, 'Achmad Zakaria', 'arya123', 'arya', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_layanan`
--
ALTER TABLE `tb_layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penjemputan`
--
ALTER TABLE `tb_penjemputan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jasa` (`layanan`),
  ADD KEY `pengiriman` (`pengiriman`),
  ADD KEY `status` (`status`),
  ADD KEY `penjemputan` (`penjemputan`),
  ADD KEY `pembayaran` (`pembayaran`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_layanan`
--
ALTER TABLE `tb_layanan`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_penjemputan`
--
ALTER TABLE `tb_penjemputan`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD CONSTRAINT `tb_pesan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`layanan`) REFERENCES `tb_layanan` (`id`),
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`pengiriman`) REFERENCES `tb_pengiriman` (`id`),
  ADD CONSTRAINT `tb_transaksi_ibfk_3` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id`),
  ADD CONSTRAINT `tb_transaksi_ibfk_4` FOREIGN KEY (`penjemputan`) REFERENCES `tb_penjemputan` (`id`),
  ADD CONSTRAINT `tb_transaksi_ibfk_5` FOREIGN KEY (`pembayaran`) REFERENCES `tb_pembayaran` (`id`),
  ADD CONSTRAINT `tb_transaksi_ibfk_6` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`role`) REFERENCES `tb_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
