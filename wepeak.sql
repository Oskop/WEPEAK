-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2019 at 03:26 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wepeak`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_harga_satuan` int(11) NOT NULL,
  `jumlah` float NOT NULL,
  `subtotal` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `harga_satuan`
--

CREATE TABLE `harga_satuan` (
  `id` int(11) NOT NULL,
  `id_air` int(11) NOT NULL,
  `id_wadah` int(11) NOT NULL,
  `banyak` float NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `harga` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_air`
--

CREATE TABLE `jenis_air` (
  `id` int(11) NOT NULL,
  `nama` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ph` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manfaat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_air`
--

INSERT INTO `jenis_air` (`id`, `nama`, `ph`, `manfaat`, `created_at`, `update_at`, `delete_at`) VALUES
(1, 'strong kangen', '11,6', 'Membantu proses penyembuhan penyakit kronis seperti kanker, stroke, maag, dan penyakit kronis lainnya.                ', '2019-11-06 14:09:12', '2019-11-07 03:39:03', NULL),
(2, 'Air Kangen', '8,5', 'Membantu melancarkan peredaran darah, menetralkan darah dari kondisi asam, membawa/melarutkan zat-zat asing (tingkat lemah) dalam tubuh keluar melalui eksresi (keringat dan/atau kencing)', '2019-11-07 02:10:44', '2019-11-07 02:10:44', NULL),
(3, 'Strong Acidic W', '2,55', 'Menghilangkan Jerawat,bisul dan kutu air, serta pengganti betadine                ', '2019-11-07 08:08:39', '2019-11-07 08:09:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `satuan` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stok_wadah`
--

CREATE TABLE `stok_wadah` (
  `id` int(11) NOT NULL,
  `id_wadah` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wadah`
--

CREATE TABLE `wadah` (
  `id` int(11) NOT NULL,
  `jenis` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` float NOT NULL,
  `harga` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `harga_transaksi_FK` (`id_transaksi`),
  ADD KEY `detail_harga_FK` (`id_harga_satuan`);

--
-- Indexes for table `harga_satuan`
--
ALTER TABLE `harga_satuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `harga_air_FK` (`id_air`),
  ADD KEY `harga_satuan_FK` (`id_satuan`),
  ADD KEY `harga_wadah_FK` (`id_wadah`);

--
-- Indexes for table `jenis_air`
--
ALTER TABLE `jenis_air`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_wadah`
--
ALTER TABLE `stok_wadah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stok_wadah_FK` (`id_wadah`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_user_FK` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`no_hp`);

--
-- Indexes for table `wadah`
--
ALTER TABLE `wadah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `harga_satuan`
--
ALTER TABLE `harga_satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_air`
--
ALTER TABLE `jenis_air`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stok_wadah`
--
ALTER TABLE `stok_wadah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wadah`
--
ALTER TABLE `wadah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_harga_FK` FOREIGN KEY (`id_harga_satuan`) REFERENCES `harga_satuan` (`id`),
  ADD CONSTRAINT `detail_transaksi_FK` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`);

--
-- Constraints for table `harga_satuan`
--
ALTER TABLE `harga_satuan`
  ADD CONSTRAINT `harga_air_FK` FOREIGN KEY (`id_air`) REFERENCES `jenis_air` (`id`),
  ADD CONSTRAINT `harga_satuan_FK` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id`),
  ADD CONSTRAINT `harga_wadah_FK` FOREIGN KEY (`id_wadah`) REFERENCES `wadah` (`id`);

--
-- Constraints for table `stok_wadah`
--
ALTER TABLE `stok_wadah`
  ADD CONSTRAINT `stok_wadah_FK` FOREIGN KEY (`id_wadah`) REFERENCES `wadah` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_user_FK` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
