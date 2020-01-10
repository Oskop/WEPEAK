-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2020 at 03:20 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

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

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_transaksi`, `id_harga_satuan`, `jumlah`, `subtotal`, `created_at`, `update_at`, `delete_at`) VALUES
(17, 5, 2, 10000, '2020-01-07 04:53:33', '2020-01-07 04:53:33', NULL),
(17, 10, 1, 55000, '2020-01-07 04:53:33', '2020-01-07 04:53:33', NULL),
(18, 5, 2, 10000, '2020-01-07 06:40:05', '2020-01-07 06:40:05', NULL),
(18, 10, 2, 110000, '2020-01-07 06:40:05', '2020-01-07 06:40:05', NULL),
(19, 11, 3, 75000, '2020-01-09 21:49:16', '2020-01-09 21:49:16', NULL),
(19, 9, 3, 60000, '2020-01-09 21:49:16', '2020-01-09 21:49:16', NULL),
(19, 8, 2, 40000, '2020-01-09 21:49:16', '2020-01-09 21:49:16', NULL),
(19, 10, 1, 55000, '2020-01-09 21:49:16', '2020-01-09 21:49:16', NULL);

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
  `foto` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `harga_satuan`
--

INSERT INTO `harga_satuan` (`id`, `id_air`, `id_wadah`, `banyak`, `id_satuan`, `harga`, `foto`, `created_at`, `update_at`, `delete_at`) VALUES
(3, 1, 1, 600, 2, 50000, NULL, '2019-12-10 14:39:09', '2019-12-10 14:47:13', '2019-12-10 14:47:13'),
(4, 2, 3, 600, 2, 5000, NULL, '2019-12-10 23:10:12', '2019-12-10 23:10:12', NULL),
(5, 7, 3, 600, 2, 5000, NULL, '2019-12-16 04:00:14', '2019-12-16 04:00:14', NULL),
(6, 8, 3, 600, 2, 5000, NULL, '2019-12-16 04:00:32', '2019-12-16 04:00:32', NULL),
(7, 5, 3, 600, 2, 5000, NULL, '2019-12-16 04:01:07', '2019-12-16 04:01:07', NULL),
(8, 6, 2, 200, 2, 20000, NULL, '2019-12-16 04:01:27', '2019-12-16 04:01:27', NULL),
(9, 3, 1, 200, 2, 20000, NULL, '2019-12-16 04:02:14', '2019-12-16 04:02:14', NULL),
(10, 1, 7, 500, 2, 55000, NULL, '2019-12-16 04:14:42', '2019-12-16 04:14:42', NULL),
(11, 8, 6, 5, 1, 25000, NULL, '2019-12-16 04:16:45', '2020-01-06 03:58:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_air`
--

CREATE TABLE `jenis_air` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'Strong KanGen', '11,5', 'Membantu proses penyembuhan penyakit kronis seperti kanker, stroke, maag, dan penyakit kronis lainnya.', '2019-11-06 14:09:12', '2020-01-09 13:46:06', NULL),
(2, 'Air Kangen (Permulaan)', '8,5', 'Membantu melancarkan peredaran darah, menetralkan darah dari kondisi asam, membawa/melarutkan zat-zat asing (tingkat lemah) dalam tubuh keluar melalui eksresi (keringat dan/atau kencing)', '2019-11-07 02:10:44', '2019-12-10 23:42:53', NULL),
(3, 'Strong Acid', '2,5', 'Menghilangkan Jerawat,bisul dan kutu air, serta pengganti betadine', '2019-11-07 08:08:39', '2019-12-10 22:47:30', NULL),
(4, 'ELbie', '11,2', 'Tidak ada', '2019-12-05 01:09:43', '2019-12-05 02:07:33', '2019-12-05 02:07:33'),
(5, 'Clean Water', '7,0', 'Air mineral netral, untuk campuran susu formula bayi', '2019-12-10 22:49:05', '2019-12-10 22:49:05', NULL),
(6, 'Beauty Water', '5,5', 'Menghaluskan kulit, merawat kulit wajah', '2019-12-10 22:52:19', '2019-12-10 22:52:19', NULL),
(7, 'Air KanGen (Menengah)', '9.0', 'Melancarkan peredaran darah, mengankut zat-zat asing yang tertimbun dalam tubuh, menetralkan peredaran darah dari asam, melancarkan buang air kecil', '2019-12-10 23:48:13', '2019-12-10 23:48:13', NULL),
(8, 'Air KanGen (Tinggi)', '9,5', 'Membantu melancarkan peredaran darah, menetralkan darah dari kondisi asam, membawa/melarutkan zat-zat asing (tingkat lemah) dalam tubuh keluar melalui eksresi (keringat dan/atau kencing)', '2019-12-10 23:49:14', '2019-12-10 23:49:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL,
  `module` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`time`, `id_user`, `module`, `action`) VALUES
('2020-01-10 07:58:36', 1, 'transaksi', 'update Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `satuan` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id`, `satuan`) VALUES
(1, 'L'),
(2, 'mL');

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

--
-- Dumping data for table `stok_wadah`
--

INSERT INTO `stok_wadah` (`id`, `id_wadah`, `jumlah`, `created_at`, `update_at`, `delete_at`) VALUES
(1, 1, 18, '2020-01-09 13:01:24', '2020-01-09 13:50:26', '2020-01-09 13:50:26'),
(2, 2, 15, '2020-01-09 13:02:38', '2020-01-09 13:02:38', NULL),
(3, 3, 50, '2020-01-09 13:02:49', '2020-01-09 13:02:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ongkir` float DEFAULT NULL,
  `total` double NOT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lunas` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_user`, `alamat`, `ongkir`, `total`, `status`, `lunas`, `created_at`, `update_at`, `delete_at`) VALUES
(17, 1, 'Jalan Mujaher No. 12 Rt.1 Rw.5 Tegalsari Tegal Barat Tegal', 5000, 70000, 'Selesai', 1, '2020-01-09 22:12:26', '2020-01-09 22:12:26', NULL),
(18, 1, 'Jalan Mujaher No. 12 Rt.1 Rw.5 Tegalsari Tegal Barat Tegal', 5000, 125000, 'Sedang Diproses', 1, '2020-01-10 00:58:36', '2020-01-10 00:58:36', NULL),
(19, 5, 'Jalan Raya 2 No. 58, Pasar Klampok, Brebes', 5000, 235000, 'Dalam Urutan', 0, '2020-01-09 21:49:16', '2020-01-09 21:49:16', NULL);

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
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'person.png',
  `role` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pertanyaan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jawaban` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `alamat`, `gender`, `no_hp`, `username`, `password`, `email`, `foto`, `role`, `pertanyaan`, `jawaban`, `created_at`, `update_at`, `delete_at`) VALUES
(1, 'admin', 'Jalan Mujaher No. 12 Rt.1 Rw.5 Tegalsari Tegal Barat Tegal', 'Laki-Laki', '085810555362', 'kangen', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'oskop17@gmail.com', 'wijaya.jpg', 'admin', 'Bapak Kao', 'Mancing Mania', '2019-12-24 11:11:20', '2020-01-09 22:08:55', NULL),
(2, 'askdjh', 'aksjhd', 'Laki-Laki', 'askjdh', '082265555272', '377c11fc9a7bd7726ed87951b1a1ba8b4fddade76e1f631615fd06b06c10418156dd51f1d52a56601a69b1f5f5d82b3d9995e070ae780f54fc6ed3249fa835e2', 'ass@gmail.com', 'person.png', '', 'lkasjd', 'lkajsd', '2019-12-24 11:13:28', '2019-12-24 11:13:28', NULL),
(4, 'asdlj', 'asldkjla', 'Laki-Laki', 'laksjd', '091230912', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'askjhd@gmail.com', 'person.png', '', 'klasjd', 'laskjd', '2019-12-24 11:16:33', '2019-12-24 11:16:33', NULL),
(5, 'Reza Aditya', 'Jalan Raya 2 No. 58, Pasar Klampok, Brebes', 'Laki-Laki', '083212347659', 'abong', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'aditreza31@gmail.com', 'reza.jpeg', 'pelanggan', 'asdj', 'jasd', '2019-12-24 11:20:15', '2020-01-08 16:58:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wadah`
--

CREATE TABLE `wadah` (
  `id` int(11) NOT NULL,
  `jenis` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wadah`
--

INSERT INTO `wadah` (`id`, `jenis`, `isi`, `harga`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Botol Kuning Kecil', '200 mL', 5000, '2019-12-08 02:00:17', '2019-12-08 02:00:17', NULL),
(2, 'Botol Merah Muda Kecil', '200 mL', 5000, '2019-12-10 23:07:26', '2019-12-10 23:07:26', NULL),
(3, 'Botol Biasa Sedang', '600 mL', 1000, '2019-12-10 23:08:14', '2019-12-10 23:08:14', NULL),
(4, 'Botol Kuning Sedang', '400 mL', 6000, '2019-12-16 04:09:18', '2019-12-16 04:09:18', NULL),
(5, 'Botol Merah Muda Sedang', '400 mL', 6000, '2019-12-16 04:10:02', '2019-12-16 04:10:02', NULL),
(6, 'Galon Berkeran Biru Sedan', '5000 mL', 25000, '2019-12-16 04:11:03', '2019-12-16 04:11:03', NULL),
(7, 'Botol Putih Khusus Kecil', '500 mL', 10000, '2019-12-16 04:11:28', '2019-12-16 04:11:28', NULL);

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
  ADD UNIQUE KEY `username_2` (`username`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jenis_air`
--
ALTER TABLE `jenis_air`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stok_wadah`
--
ALTER TABLE `stok_wadah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wadah`
--
ALTER TABLE `wadah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
