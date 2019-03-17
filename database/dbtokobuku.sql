-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 Mar 2019 pada 16.49
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtokobuku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `kode` int(10) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `penulis` varchar(30) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`kode`, `judul`, `penulis`, `jumlah`, `gambar`, `harga`) VALUES
(1, 'To Kill A Mockingbird', 'Harper Lee ', 10, '5c4d11a2aa1cd.jpeg', 135000),
(2, 'Don Quixote', 'Miguel De Cervantes', 1, '5c4d11d93a111.jpeg', 100000),
(3, 'Iam Number Four', 'Pittacus Lore', 27, '5c4d1206f16e5.jpg', 125000),
(5, 'The Lightning Thief', 'Rick Riordan', 11, '5c4d12882ecf6.jpg', 111000),
(6, 'The Hunger Game', 'Suzanne Collins', 63, '5c4d12b7ec9da.jpg', 150000),
(7, 'The Immortal Instrumen', 'Cassandra Clare', 7, '5c4d12f4d35ad.jpg', 75000),
(8, 'Catatan Pinggir', 'Goenawan Muhammad', 6, '5c4d131bcef28.jpg', 45000),
(9, 'Catatan Seorang Demonstran', 'Soe Hok Gie', 28, '5c4d1358f091f.jpg', 75000),
(11, 'asd', 'asd', 12, '5c4d1ee717024.jpeg', 12),
(12, 'better', 'worst', 284, '5c83acc604b3b.jpg', 75000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `nolaporan` int(10) NOT NULL,
  `kode` int(10) NOT NULL,
  `kode_pelanggan` int(11) NOT NULL,
  `tanggal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`nolaporan`, `kode`, `kode_pelanggan`, `tanggal`) VALUES
(5, 1, 4120, '17-Mar-2019'),
(6, 6, 1504, '17-Mar-2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `no_pegawai` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`no_pegawai`, `nama`, `alamat`, `password`) VALUES
(1, 'dio harvandy', 'Padang', '$2y$10$rMk99gTcZowIUNntajm5e.uvdEI2QJtJCm4ME43vkp8EwgKucjO1u'),
(4, 'dio', 'Pessel', '$2y$10$SAyCL8KgIP8jVfzus1AGJudsQgJwdaNjN48PatHSUd1Gl4XIp.tzm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kode_pelanggan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`kode_pelanggan`, `nama`, `alamat`, `nohp`, `jumlah_pesanan`) VALUES
(1, 'dioharvandy', 'padang', '082288210084', 69),
(1344, 'ddd', 'qqqw', '122', 1),
(1504, 'naruto', 'konoha', '2222122', 3),
(2194, 'dio', 'pesisir selatan', '08288210088', 15),
(2677, 'ddd', 'qqqw', '122', 1),
(3704, 'dioharvandy', 'padang', '082288210084', 1),
(4120, 'kelvin', 'padang', '088888', 1),
(4530, 'aa', 'qq', '1', 1),
(6357, 'aaa', 'aaa', '111', 1),
(6469, 'ddd', 'dd', '11', 1),
(8312, 'oiddio', 'risisep', '0837373', 1),
(9091, 'asdioharvandy', 'padangq', '6982288210084', 2),
(9310, 'dd', 'qq', '11', 2),
(9606, 'ss', 'aa', '1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `nopesanan` int(11) NOT NULL,
  `kode` int(10) NOT NULL,
  `kode_pelanggan` int(11) NOT NULL,
  `tanggal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`nopesanan`, `kode`, `kode_pelanggan`, `tanggal`) VALUES
(20, 2, 1, '09-Mar-2019'),
(21, 1, 3704, '09-Mar-2019'),
(23, 12, 2194, '09-Mar-2019'),
(24, 12, 8312, '09-Mar-2019');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode`),
  ADD UNIQUE KEY `judul` (`judul`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `judul_2` (`judul`),
  ADD KEY `judul_3` (`judul`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`nolaporan`),
  ADD KEY `kode` (`kode`,`kode_pelanggan`),
  ADD KEY `kode_pelanggan` (`kode_pelanggan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`no_pegawai`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`),
  ADD KEY `kode_pelanggan` (`kode_pelanggan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`nopesanan`),
  ADD KEY `kode` (`kode`),
  ADD KEY `kode_pelanggan` (`kode_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `kode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `nolaporan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `no_pegawai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `nopesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`kode_pelanggan`) REFERENCES `pelanggan` (`kode_pelanggan`),
  ADD CONSTRAINT `laporan_ibfk_2` FOREIGN KEY (`kode`) REFERENCES `buku` (`kode`);

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`kode`) REFERENCES `buku` (`kode`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`kode_pelanggan`) REFERENCES `pelanggan` (`kode_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
