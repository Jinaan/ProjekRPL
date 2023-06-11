-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 07:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasirpintar`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `posisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`nama`, `email`, `password`, `nohp`, `posisi`) VALUES
('admin', 'admin@a.a', 'Ada111', '2147483647', 'kasir'),
('Ada111', 'admin@a.b', 'Ada111', '0123123123123', 'kasir'),
('test', 'test@test.c', 'admin', '123456789', 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idBarang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `hargaBeli` int(11) NOT NULL,
  `hargaJual` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `idKategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idBarang`, `nama`, `kode`, `kategori`, `hargaBeli`, `hargaJual`, `stok`, `satuan`, `keterangan`, `idKategori`) VALUES
(9, 'qwe', 'qwe', 'agung', 1, 13, 0, 'oz', 'uahsdu', 14),
(10, 'asd', 'asd', 'agung', 123, 123, 123, 'asd', 'asd', 14);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idKategori` int(11) NOT NULL,
  `namaKategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idKategori`, `namaKategori`) VALUES
(16, 'aaa'),
(4, 'aaa1'),
(13, 'aaaa'),
(14, 'agung');

-- --------------------------------------------------------

--
-- Table structure for table `regist`
--

CREATE TABLE `regist` (
  `kode` varchar(50) NOT NULL,
  `posisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regist`
--

INSERT INTO `regist` (`kode`, `posisi`) VALUES
('1jWn85DN0HdTlIA', 'Gudang'),
('9n6IF3fMDHiGbYr', 'Gudang'),
('dfV4FsoOApx3hDH', 'Admin'),
('GDF3kCwu1gmbe7y', 'Kasir'),
('I9Cr6KHtnYb1qJU', 'Gudang'),
('pmlCu7eQ2bID1Wv', 'Admin'),
('VQcnBzEo2d5W7fg', 'Kasir');

-- --------------------------------------------------------

--
-- Table structure for table `riwayattransaksi`
--

CREATE TABLE `riwayattransaksi` (
  `idTransaksi` varchar(20) NOT NULL,
  `kodeBarang` varchar(50) NOT NULL,
  `Terjual` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayattransaksi`
--

INSERT INTO `riwayattransaksi` (`idTransaksi`, `kodeBarang`, `Terjual`, `tanggal`, `id`) VALUES
('20230609175733', 'qwe', 2, '2023-06-09', 11),
('20230609175733', 'asd', 1, '2023-06-09', 12),
('20230609175742', 'qwe', 10, '2023-06-09', 13),
('20230610130125', 'qwe', 1, '2023-06-10', 14),
('20230610132840', 'qwe', 8, '2023-06-10', 15);

-- --------------------------------------------------------

--
-- Table structure for table `riwayatubah`
--

CREATE TABLE `riwayatubah` (
  `idRiwayatUbah` int(11) NOT NULL,
  `tanggalUbah` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `HargaUbah` int(11) NOT NULL,
  `idBarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayatubah`
--

INSERT INTO `riwayatubah` (`idRiwayatUbah`, `tanggalUbah`, `jumlah`, `HargaUbah`, `idBarang`) VALUES
(5, '2023-06-05', 1, 12, 9),
(6, '2023-06-05', 1, 1, 9),
(7, '2023-06-05', 1, 1, 9),
(8, '2023-06-05', 1, 1, 9),
(9, '2023-06-05', 1, 1, 9),
(10, '2023-06-05', 1, 0, 9),
(11, '2023-06-05', 1, 0, 9),
(12, '2023-06-05', 8, 0, 9),
(13, '2023-06-05', 1, 0, 9),
(14, '2023-06-05', 1, 1, 9),
(15, '2023-06-05', 9, 0, 9),
(16, '2023-06-05', 1, 1, 9),
(17, '2023-06-05', 9, 1, 9),
(18, '2023-06-05', 8, 1, 9),
(19, '2023-06-05', 1, 1, 9),
(20, '2023-06-05', 123, 123, 10);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `totaljual` int(11) NOT NULL,
  `totaluntung` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `email`, `totaljual`, `totaluntung`, `tanggal`) VALUES
('20230609175733', 'admin@a.a', 149, 24, '2023-06-09'),
('20230609175742', 'admin@a.a', 130, 120, '2023-06-09'),
('20230610130125', 'admin@a.a', 13, 12, '2023-06-10'),
('20230610132840', 'admin@a.a', 104, 96, '2023-06-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idBarang`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `idKategori` (`idKategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idKategori`),
  ADD UNIQUE KEY `namaKategori` (`namaKategori`);

--
-- Indexes for table `regist`
--
ALTER TABLE `regist`
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `riwayattransaksi`
--
ALTER TABLE `riwayattransaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang` (`kodeBarang`),
  ADD KEY `transaksi` (`idTransaksi`);

--
-- Indexes for table `riwayatubah`
--
ALTER TABLE `riwayatubah`
  ADD PRIMARY KEY (`idRiwayatUbah`),
  ADD KEY `idBarang` (`idBarang`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `idBarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `riwayattransaksi`
--
ALTER TABLE `riwayattransaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `riwayatubah`
--
ALTER TABLE `riwayatubah`
  MODIFY `idRiwayatUbah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `idKategori` FOREIGN KEY (`idKategori`) REFERENCES `kategori` (`idKategori`);

--
-- Constraints for table `riwayattransaksi`
--
ALTER TABLE `riwayattransaksi`
  ADD CONSTRAINT `barang` FOREIGN KEY (`kodeBarang`) REFERENCES `barang` (`kode`),
  ADD CONSTRAINT `transaksi` FOREIGN KEY (`idTransaksi`) REFERENCES `transaksi` (`idTransaksi`);

--
-- Constraints for table `riwayatubah`
--
ALTER TABLE `riwayatubah`
  ADD CONSTRAINT `idBarang` FOREIGN KEY (`idBarang`) REFERENCES `barang` (`idBarang`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `email` FOREIGN KEY (`email`) REFERENCES `akun` (`email`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
