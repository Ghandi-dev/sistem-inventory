-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 09, 2024 at 02:12 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_aset`
--

CREATE TABLE `tb_aset` (
  `id` int NOT NULL,
  `nama_aset` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kode_aset` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nup` int NOT NULL,
  `tahun_peroleh` year NOT NULL,
  `merk` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nilai` int NOT NULL,
  `keterangan` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `jenis` enum('tanah','kendaraan','elektronik','barang kantor') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_aset`
--

INSERT INTO `tb_aset` (`id`, `nama_aset`, `kode_aset`, `nup`, `tahun_peroleh`, `merk`, `nilai`, `keterangan`, `gambar`, `jenis`) VALUES
(1, 'proyektor', '32.14.12.2009.6.1', 1, '2019', 'infocus', 7000000, 'DBHP', '2b0eff94717bb368118b7d711178500c2.jpg', 'elektronik'),
(7, 'asdas', '123', 12, '2019', 'asdsg', 12415, 'DBHP', '2b0eff94717bb368118b7d711178500c4.jpg', 'elektronik'),
(8, 'asd', '1123', 12, '2024', 'qewr', 1245134, 'asf', '2b0eff94717bb368118b7d711178500c1.jpg', 'elektronik'),
(15, 'Lemari', '1123', 12, '2024', 'olympic', 1245134, 'DBHP', '2b0eff94717bb368118b7d711178500c.jpg', 'barang kantor'),
(16, 'asd', '1123', 12, '2024', 'qewr', 1245134, 'asf', '2b0eff94717bb368118b7d711178500c6.jpg', 'elektronik'),
(17, 'asd', '1123', 12, '2024', 'qewr', 1245134, 'asf', '2b0eff94717bb368118b7d711178500c7.jpg', 'elektronik'),
(18, 'asd', '1123', 12, '2024', 'qewr', 1245134, 'asf', '2b0eff94717bb368118b7d711178500c8.jpg', 'elektronik'),
(19, 'asd', '1123', 12, '2024', 'qewr', 1245134, 'asf', '2b0eff94717bb368118b7d711178500c9.jpg', 'elektronik'),
(22, 'asd', '1123', 12, '2024', 'qewr', 1245134, 'asf', '2b0eff94717bb368118b7d711178500c12.jpg', 'elektronik'),
(24, 'Beat', '1123', 12, '2023', 'honda', 20000000, 'DBHP', 'bit_ly_potato_guard.png', 'kendaraan'),
(30, 'HP', '1123', 12, '2023', 'Samsung', 150000000, 'asf', 'lunas.png', 'elektronik'),
(31, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(32, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(33, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(34, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(35, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(36, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(37, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(38, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(39, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(40, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(41, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(42, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(43, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(44, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(45, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(46, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(47, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(48, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(49, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(50, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(51, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(52, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(53, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(54, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(55, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(56, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(57, 'Sawahhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', '1123', 12, '2026', '-', 1500000, 'asf', '2b0eff94717bb368118b7d711178500c5.jpg', 'tanah'),
(58, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', 'default-image.jpg', 'elektronik'),
(59, 'HP', '1123', 12, '2023', 'Samsung', 15000000, 'asf', '2b0eff94717bb368118b7d711178500c11.jpg', 'elektronik'),
(61, 'HP', '1123', 12, '2025', 'Samsung', 15000000, 'asffffffff', 'default-image.jpg', 'elektronik'),
(65, 'HP', '1123', 12, '2025', 'Samsung', 15000000, 'asffffffff', '2b0eff94717bb368118b7d711178500c10.jpg', 'elektronik'),
(66, 'Samsung Galaxy S21 Ultra 5G - Samsung Galaxy S21 Ultra 5G - Samsung Galaxy S21 Ultra 5G - Samsung Galaxy S21 Ultra 5G - Samsung Galaxy S21 Ultra 5G', '1123', 12, '2025', 'Samsung', 15000000, 'asffffffff', '2b0eff94717bb368118b7d711178500c14.jpg', 'elektronik'),
(67, 'Tanah', '1123', 12, '2025', '-', 15000000, 'asffffffff', '17a07992-ebb9-4368-8cb7-4af40d8ded08___RS_LB_3064.JPG', 'tanah'),
(68, 'Vario', '1123', 12, '2025', 'honda', 25000000, 'DBHP', '2b0eff94717bb368118b7d711178500c3.jpg', 'kendaraan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `image`, `role`) VALUES
(1, 'admin', '$2y$10$j.H1tRgC6Mk9h.8R7w3gMeFZ53gwxD/8kqCxDy0R6P/QYgTze4B3a', '2d149f7a-4b0a-40a6-8d0b-1d1f14e5e696___RS_Early_B_9143.JPG', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_aset`
--
ALTER TABLE `tb_aset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_aset`
--
ALTER TABLE `tb_aset`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
