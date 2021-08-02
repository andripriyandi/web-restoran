-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Agu 2021 pada 09.05
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_order`
--

CREATE TABLE `detail_order` (
  `id_detail_order` varchar(11) NOT NULL,
  `id_order` varchar(11) NOT NULL,
  `id_masakan` varchar(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status_detail_order` varchar(255) NOT NULL,
  `jumlah` bigint(11) NOT NULL,
  `harga` bigint(12) NOT NULL,
  `total_harga` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_order`
--

INSERT INTO `detail_order` (`id_detail_order`, `id_order`, `id_masakan`, `keterangan`, `status_detail_order`, `jumlah`, `harga`, `total_harga`) VALUES
('DO001', 'OR001', 'MN001', '', 'Terkirim', 5, 12000, 60000),
('DO002', 'OR002', 'MN003', '', 'Terkirim', 2, 15000, 30000),
('DO003', 'OR003', 'MN003', '', 'Pending', 2, 15000, 30000),
('DO004', 'OR004', 'MN001', '', 'Pending', 3, 12000, 36000),
('DO005', 'OR005', 'MN003', '', 'Pending', 3, 15000, 45000),
('DO006', 'OR006', 'MN002', '', 'Terkirim', 2, 12000, 24000),
('DO008', 'OR008', 'MN001', '', 'Terkirim', 2, 12000, 24000),
('DO009', 'OR009', 'MN002', '', 'Terkirim', 2, 12000, 24000),
('DO010', 'OR010', 'MN003', '', 'Terkirim', 2, 15000, 30000),
('DO011', 'OR011', 'MN001', '', 'Terkirim', 1, 12000, 12000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Waiter'),
(3, 'Kasir'),
(4, 'Owner'),
(5, 'Pelanggan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masakan`
--

CREATE TABLE `masakan` (
  `id_masakan` varchar(11) NOT NULL,
  `nama_masakan` varchar(255) NOT NULL,
  `harga` bigint(50) NOT NULL,
  `status_masakan` enum('Tersedia','Kosong') NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `kategori` enum('Masakan','Minuman') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masakan`
--

INSERT INTO `masakan` (`id_masakan`, `nama_masakan`, `harga`, `status_masakan`, `image`, `kategori`) VALUES
('MN001', 'Nasi Kuninggg', 12000, 'Kosong', 'Nasi_Kuning.jpeg', 'Masakan'),
('MN002', 'Nasi Ikan', 12000, 'Kosong', 'Nasi_Ikan.png', 'Masakan'),
('MN003', 'Nasi Liwet', 15000, 'Tersedia', 'Nasi_Liwer.jpeg', 'Masakan'),
('MN004', 'Nasi Ayam', 20000, 'Tersedia', 'Nasi_Ayam.jpg', 'Masakan'),
('MN005', 'Nasi + Paket', 25000, 'Tersedia', 'Nasi_+_Paket.jpeg', 'Masakan'),
('MN006', 'Teh Kawan', 5000, 'Tersedia', 'Teh_Kawan.jpg', 'Minuman'),
('MN007', 'Jus Banana', 10000, 'Kosong', 'Jus_Banana.jpeg', 'Minuman'),
('MN008', 'Jus Mango', 10000, 'Tersedia', 'Jus_Mango.jpeg', 'Minuman'),
('MN009', 'Jus Ubi', 1000, 'Tersedia', 'Jus_Ubi.jpeg', 'Minuman'),
('MN010', 'cireng', 5000, 'Tersedia', 'cireng.jpg', 'Masakan'),
('MN011', 'Telur Jegher', 5000, 'Tersedia', 'Telur_Jegher.jpg', 'Masakan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE `meja` (
  `id_meja` int(11) NOT NULL,
  `no_meja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `meja`
--

INSERT INTO `meja` (`id_meja`, `no_meja`) VALUES
(2, 1),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(21, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id_order` varchar(11) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status_order` enum('Dipesan','Belum Bayar','Dibayar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id_order`, `no_meja`, `tanggal`, `id_user`, `keterangan`, `status_order`) VALUES
('OR001', 1, '2020-03-27 02:41:13', 'US005', 'hi', 'Dibayar'),
('OR002', 1, '2020-03-27 02:41:36', 'US005', 'joo', 'Dipesan'),
('OR003', 5, '2020-03-31 21:48:19', 'US006', 'a', 'Dipesan'),
('OR004', 1, '2020-03-31 22:32:04', 'US005', 'guouh', 'Dipesan'),
('OR005', 7, '2020-03-31 23:01:22', 'US007', 'jnolnol', 'Dipesan'),
('OR006', 1, '2020-03-31 23:40:23', 'US005', 'adad', 'Dipesan'),
('OR008', 4, '2020-04-01 20:52:44', 'US007', 'iohio', 'Dipesan'),
('OR009', 1, '2020-04-01 21:40:04', 'US007', 'adad', 'Dipesan'),
('OR010', 1, '2020-04-02 10:38:20', 'US008', 'asdad', 'Dipesan'),
('OR011', 2, '2020-10-29 21:06:43', 'US011', 'asdfsa', 'Dipesan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(11) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `id_order` varchar(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `total_bayar` bigint(50) NOT NULL,
  `bayar` bigint(50) NOT NULL,
  `kembalian` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_order`, `tanggal_transaksi`, `total_bayar`, `bayar`, `kembalian`) VALUES
('TR001', 'US005', 'OR001', '2020-04-02 00:00:00', 60000, 100000, 40000),
('TR002', 'US006', 'OR003', '2020-04-02 01:46:42', 30000, 50000, 20000),
('TR003', 'US008', 'OR010', '2020-04-02 10:40:41', 30000, 100000, 70000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `id_level`) VALUES
('US001', 'andri', '123', 'Andri Priyandi', 1),
('US002', 'waiter', '123', 'Waiter', 2),
('US003', 'kasir', '123', 'Kasir', 3),
('US004', 'owner', '123', 'Owner', 4),
('US005', 'cahyadi', '123', 'Cahya', 5),
('US006', 'finu', '123', 'Finuary Reng', 5),
('US007', 'yogas', '123', 'Yogas', 5),
('US008', 'radja', '123', 'Radja Adi', 5),
('US009', 'andru', '123', 'Andrioaa', 5),
('US010', 'adad', '123', 'sdad', 1),
('US011', 'andripriyandi', '123', 'andri', 5);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_detail_order`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_masakan` (`id_masakan`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `masakan`
--
ALTER TABLE `masakan`
  ADD PRIMARY KEY (`id_masakan`);

--
-- Indeks untuk tabel `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_order` (`id_order`);

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
-- AUTO_INCREMENT untuk tabel `meja`
--
ALTER TABLE `meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `detail_order_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`),
  ADD CONSTRAINT `detail_order_ibfk_2` FOREIGN KEY (`id_masakan`) REFERENCES `masakan` (`id_masakan`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
