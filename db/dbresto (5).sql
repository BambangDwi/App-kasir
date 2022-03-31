-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Mar 2022 pada 08.03
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbresto`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_order`
--

CREATE TABLE `detail_order` (
  `id_detail_order` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_order`
--

INSERT INTO `detail_order` (`id_detail_order`, `id_order`, `id_menu`, `qty`) VALUES
(4, 3, 25, 1),
(5, 4, 19, 1),
(6, 6, 7, 6),
(7, 7, 6, 3),
(8, 6, 2, 2),
(9, 6, 19, 2),
(10, 6, 19, 1),
(11, 8, 26, 10),
(12, 9, 6, 1),
(13, 9, 26, 2),
(14, 9, 5, 2),
(15, 16, 25, 1),
(16, 12, 25, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(2, 'admin'),
(3, 'kasir'),
(4, 'manager');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masakan`
--

CREATE TABLE `masakan` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(225) NOT NULL,
  `harga` double NOT NULL,
  `status_menu` enum('tersedia','tidak tersedia') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masakan`
--

INSERT INTO `masakan` (`id_menu`, `nama_menu`, `harga`, `status_menu`) VALUES
(1, 'bebek bakar', 28000, 'tersedia'),
(2, 'bebek goreng', 26000, 'tersedia'),
(3, 'bebek geprek', 35000, 'tersedia'),
(4, 'ayam bakar', 26000, 'tersedia'),
(5, 'ayam goreng', 25000, 'tersedia'),
(6, 'Ayam Geprek ', 20000, 'tersedia'),
(7, 'Gulai Ayam', 20000, 'tersedia'),
(8, 'Gulai Bebek', 25000, 'tersedia'),
(19, 'ayam bakar rica rica', 29000, 'tersedia'),
(25, 'Ayam Madu', 18000, 'tersedia'),
(26, 'ayam goreng special', 30000, 'tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `no_meja` varchar(225) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_order` enum('Sudah di bayar','belum di bayar') NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id_order`, `no_meja`, `tanggal`, `id_user`, `status_order`, `updated_at`) VALUES
(3, '1', '2022-03-26', 20, 'belum di bayar', '2022-03-26 15:46:57'),
(4, '1', '2022-03-26', 20, 'belum di bayar', '2022-03-26 13:57:33'),
(5, '8', '2022-03-26', 20, 'belum di bayar', '2022-03-26 10:38:50'),
(6, '3', '2022-03-26', 20, 'belum di bayar', '2022-03-26 14:06:33'),
(7, '5', '2022-03-26', 20, 'belum di bayar', '2022-03-26 14:53:43'),
(8, '8', '2022-03-26', 20, 'belum di bayar', '2022-03-26 15:49:43'),
(9, '1', '2022-03-26', 20, 'belum di bayar', '2022-03-26 19:31:20'),
(10, '2', '2022-03-26', 20, 'belum di bayar', '2022-03-26 12:38:51'),
(12, '6', '2022-03-26', 19, 'belum di bayar', '2022-03-26 13:43:09'),
(13, '12', '2022-03-26', 19, 'belum di bayar', '2022-03-26 13:52:23'),
(14, '100', '2022-03-26', 19, 'belum di bayar', '2022-03-26 14:53:01'),
(15, '4', '2022-03-26', 19, 'belum di bayar', '2022-03-26 14:53:17'),
(16, '2', '2022-03-26', 20, 'belum di bayar', '2022-03-26 21:22:16'),
(17, '1', '2022-03-26', 19, 'belum di bayar', '2022-03-26 23:56:37'),
(18, '1', '2022-03-26', 19, 'belum di bayar', '2022-03-26 23:57:12'),
(19, '1', '2022-03-27', 19, 'belum di bayar', '2022-03-27 00:00:17'),
(20, '1', '2022-03-27', 19, 'belum di bayar', '2022-03-27 00:01:07'),
(21, '1', '2022-03-27', 19, 'belum di bayar', '2022-03-27 00:10:07'),
(22, '1', '2022-03-27', 19, 'belum di bayar', '2022-03-27 00:12:44'),
(23, '12', '2022-03-27', 20, 'belum di bayar', '2022-03-27 00:46:02'),
(24, '5', '2022-03-27', 20, 'belum di bayar', '2022-03-27 01:00:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total_bayar` varchar(200) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_order`, `tanggal`, `total_bayar`, `kembalian`, `updated_at`) VALUES
(3, 19, 4, '2022-03-26', '30000', 1000, '2022-03-26 13:57:33'),
(4, 19, 3, '2022-03-26', '20000', 2000, '2022-03-26 14:04:19'),
(5, 19, 6, '2022-03-26', '300000', 271000, '2022-03-26 14:06:33'),
(6, 19, 7, '2022-03-26', '80000', 20000, '2022-03-26 14:53:43'),
(7, 19, 3, '2022-03-26', '19000', 1000, '2022-03-26 15:46:57'),
(8, 19, 8, '2022-03-26', '300000', 0, '2022-03-26 15:49:43'),
(9, 19, 9, '2022-03-26', '130000', 80000, '2022-03-26 19:31:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `nama_user` varchar(225) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `id_level`) VALUES
(18, 'manager', '$2y$10$THLTragJZFdY1xmwxnHRWukaCHoSTxREWu4uCRRpIALiqGz/xs0ta', 'Manager', 4),
(19, 'kasir', '$2y$10$Yik9.AqEWs7xKNqlub75..luTimSKeoqlf0gwvtTdGsXf7utlFCeG', 'kasir', 3),
(20, 'admin', '$2y$10$FaCOH4hDNNfg9dID.BAzf./xNbKoHIatIhuTgBVRNdlHKOXQeCZ4i', 'admin', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_detail_order`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_masakan` (`id_menu`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `masakan`
--
ALTER TABLE `masakan`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id_detail_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `masakan`
--
ALTER TABLE `masakan`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `detail_order_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_order_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `masakan` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
