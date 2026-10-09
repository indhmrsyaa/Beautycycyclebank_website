-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2026 at 03:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beautycyclebank`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Email` varchar(100) NOT NULL,
  `Nama_Admin` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Email`, `Nama_Admin`, `Password`, `Level`) VALUES
('admin@gmail.com', 'Admin1', '4', 'Super_Admin'),
('ino@gmail.com', 'ino', '0', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `ID_Akun` varchar(100) NOT NULL,
  `ID_jenis_akun` varchar(100) NOT NULL,
  `Nama_Lengkap` varchar(100) NOT NULL,
  `Alamat_Rumah` varchar(100) NOT NULL,
  `No_Hp` varchar(13) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Total_Poin_Akun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`ID_Akun`, `ID_jenis_akun`, `Nama_Lengkap`, `Alamat_Rumah`, `No_Hp`, `Email`, `Password`, `Total_Poin_Akun`) VALUES
('indah15', 'JAK11', 'indah marsya', 'Indralaya', '082281164074', 'indahmarsya@gmail.com', '22', 90),
('kirino25', 'JAK11', 'Kirino', 'palembang ', '082273943729', 'kirino@gmail.com', '22', 62);

-- --------------------------------------------------------

--
-- Table structure for table `cabang_bank_sampah`
--

CREATE TABLE `cabang_bank_sampah` (
  `ID_Cabang_Bank` varchar(100) NOT NULL,
  `Nama_Bank` varchar(100) NOT NULL,
  `ID_Kota` varchar(100) NOT NULL,
  `Alamat_Bank` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cabang_bank_sampah`
--

INSERT INTO `cabang_bank_sampah` (`ID_Cabang_Bank`, `Nama_Bank`, `ID_Kota`, `Alamat_Bank`) VALUES
('CB', 'Cabang Bank Belitang', 'KO04', 'Gumawang '),
('CB2', 'Cabang Bank Bandung', 'k', 'jl Melati'),
('CB4', 'Cabang Bank Bersama indralaya', 'KO02', 'timbangan');

-- --------------------------------------------------------

--
-- Table structure for table `hadiah`
--

CREATE TABLE `hadiah` (
  `ID_Gift` varchar(100) NOT NULL,
  `Nama_Gift` varchar(100) NOT NULL,
  `Poin_Gift` int(11) NOT NULL,
  `Stok_Gift` int(11) NOT NULL,
  `Foto_Gift` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hadiah`
--

INSERT INTO `hadiah` (`ID_Gift`, `Nama_Gift`, `Poin_Gift`, `Stok_Gift`, `Foto_Gift`) VALUES
('G12', 'beauty blender', 9, 26, 'beutyblender.jpg'),
('G13', 'penjepit bulu mata', 70, 21, 'jepit bulumata.jpg'),
('G14', 'Brush', 10, 19, 'brush.jpg'),
('G15', 'box', 10, 0, 'boxx.jpg'),
('G19', 'Pouch Make Up', 40, 22, 'tas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_akun`
--

CREATE TABLE `jenis_akun` (
  `ID_jenis_akun` varchar(50) NOT NULL,
  `jenis_akun` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_akun`
--

INSERT INTO `jenis_akun` (`ID_jenis_akun`, `jenis_akun`) VALUES
('JAK1', 'Platinum'),
('JAK11', 'Gold');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_sampah`
--

CREATE TABLE `jenis_sampah` (
  `ID_Jenis_Sampah` varchar(100) NOT NULL,
  `Jenis_Sampah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_sampah`
--

INSERT INTO `jenis_sampah` (`ID_Jenis_Sampah`, `Jenis_Sampah`) VALUES
('JSM1', 'PLASTIK'),
('JSM2', 'kertas'),
('JSM3', 'Kaca/gelas');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_satuan`
--

CREATE TABLE `jenis_satuan` (
  `ID_Satuan` varchar(100) NOT NULL,
  `Jenis_Satuan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_satuan`
--

INSERT INTO `jenis_satuan` (`ID_Satuan`, `Jenis_Satuan`) VALUES
('JST', 'KG'),
('JST2', 'Pcs');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `ID_Kota` varchar(100) NOT NULL,
  `Nama_Kota` varchar(100) NOT NULL,
  `ID_Provinsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`ID_Kota`, `Nama_Kota`, `ID_Provinsi`) VALUES
('k', 'bandung', 'PROV2'),
('KO00', 'Palembang', 'PROV1'),
('KO01', 'prabumulih', 'PROV1'),
('KO02', 'Indralaya', 'PROV1'),
('KO04', 'Belitang', 'PROV1');

-- --------------------------------------------------------

--
-- Table structure for table `nota_gift`
--

CREATE TABLE `nota_gift` (
  `ID_Nota_Gift` varchar(100) NOT NULL,
  `ID_Akun` varchar(100) NOT NULL,
  `ID_Cabang_Bank` varchar(100) NOT NULL,
  `Tanggal_Klaim` date NOT NULL,
  `Poin_Klaim` int(100) NOT NULL,
  `ID_Statusklaim` varchar(100) NOT NULL,
  `Bukti_Klaim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nota_gift`
--

INSERT INTO `nota_gift` (`ID_Nota_Gift`, `ID_Akun`, `ID_Cabang_Bank`, `Tanggal_Klaim`, `Poin_Klaim`, `ID_Statusklaim`, `Bukti_Klaim`) VALUES
('NK000002', 'kirino25', 'CB2 ', '2023-12-14', 9, 'SK000001', 'Screenshot (1476).png'),
('NK000003', 'indah15', 'CB2 ', '2023-12-15', 34, 'SK000001', 'kemasan.jpg'),
('NK000004', 'kirino25', 'CB4 ', '2023-12-19', 40, 'SK000001', 'Screenshot (1476).png'),
('NK000006', 'indah15', 'CB4 ', '2023-12-23', 9, 'SK000002', ''),
('NK000007', 'indah15', 'CB4 ', '2023-12-23', 9, 'SK000002', ''),
('NK000010', 'indah15', 'CB2 ', '2023-12-23', 10, 'SK000002', ''),
('NK000011', 'kirino25', 'CB4 ', '2023-12-24', 49, 'SK000002', ''),
('NK000012', 'kirino25', 'CB ', '2023-12-25', 140, 'SK000001', 'Screenshot (1488).png');

-- --------------------------------------------------------

--
-- Table structure for table `nota_setor`
--

CREATE TABLE `nota_setor` (
  `ID_Nota_Setor` varchar(100) NOT NULL,
  `ID_Akun` varchar(100) NOT NULL,
  `Tanggal_setor` date NOT NULL,
  `ID_Cabang_Bank` varchar(100) NOT NULL,
  `Total_Poin` int(100) NOT NULL,
  `ID_Statussetor` varchar(100) NOT NULL,
  `Bukti_Penyetoran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nota_setor`
--

INSERT INTO `nota_setor` (`ID_Nota_Setor`, `ID_Akun`, `Tanggal_setor`, `ID_Cabang_Bank`, `Total_Poin`, `ID_Statussetor`, `Bukti_Penyetoran`) VALUES
('NS000001', 'kirino25', '2023-12-14', 'CB2 ', 128, 'SS000001', '	\n20231219132509Screenshot (1474).png'),
('NS000002', 'indah15', '2023-12-15', 'CB2 ', 134, 'SS000001', 'kemasan.jpg'),
('NS000003', 'kirino25', '2023-12-18', 'CB ', 24, 'SS000001', '	\n20231219132509Screenshot (1474).png'),
('NS000005', 'kirino25', '2023-12-22', 'CB2 ', 90, 'SS000001', '20231222100156Screenshot (1478).png'),
('NS000006', 'indah15', '2023-12-22', 'CB2 ', 90, 'SS000002', ''),
('NS000007', 'indah15', '2023-12-22', 'CB ', 10, 'SS000001', '20231222131730Screenshot (1479).png'),
('NS000008', 'indah15', '2023-12-22', 'CB2 ', 48, 'SS000002', ''),
('NS000009', 'indah15', '2023-12-22', 'CB ', 34, 'SS000002', ''),
('NS000010', 'kirino25', '2023-12-22', 'CB4 ', 90, 'SS000002', ''),
('NS000011', 'kirino25', '2023-12-24', 'CB2 ', 130, 'SS000002', ''),
('NS000013', 'kirino25', '2023-12-24', 'CB2 ', 9, 'SS000002', ''),
('NS000014', 'kirino25', '2023-12-24', 'CB ', 34, 'SS000002', ''),
('NS000015', 'indah15', '2023-12-25', 'CB ', 48, 'SS000001', '20231225152831Screenshot (1487).png'),
('NS000016', 'kirino25', '2026-10-09', 'CB2 ', 33, 'SS000002', '');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `ID_Provinsi` varchar(100) NOT NULL,
  `Nama_Provinsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`ID_Provinsi`, `Nama_Provinsi`) VALUES
('PROV', 'lampung'),
('PROV1', 'Sumatera Selatan'),
('PROV2', 'Jawa Barat');

-- --------------------------------------------------------

--
-- Table structure for table `sampah`
--

CREATE TABLE `sampah` (
  `ID_Sampah` varchar(100) NOT NULL,
  `ID_Jenis_Sampah` varchar(100) NOT NULL,
  `Nama_Sampah` varchar(100) NOT NULL,
  `ID_Satuan` varchar(100) NOT NULL,
  `Poin` int(11) NOT NULL,
  `Foto_Sampah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sampah`
--

INSERT INTO `sampah` (`ID_Sampah`, `ID_Jenis_Sampah`, `Nama_Sampah`, `ID_Satuan`, `Poin`, `Foto_Sampah`) VALUES
('SPH0', 'JSM1', 'Pot Cream', 'JST', 24, 'pot cream.jpg'),
('SPH1', 'JSM3', 'Botol Spray', 'JST2', 9, 'botol spray kaca.jpg'),
('SPH2', 'JSM1', 'Botol Spray Plastik', 'JST', 24, 'botol spray.jpg'),
('SPH3', 'JSM2', 'kemasan', 'JST', 90, 'Kemasan.jpg'),
('SPH4', 'JSM1', 'Botol Pump', 'JST2', 10, 'botol pump .jpg'),
('SPH5', 'JSM3', 'Botol serum', 'JST2', 10, 'serum - Copy.jpg'),
('SPH6', 'JSM1', 'Produk Lip', 'JST', 40, 'liplip.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `status_klaim`
--

CREATE TABLE `status_klaim` (
  `ID_Statusklaim` varchar(100) NOT NULL,
  `Status_Klaim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_klaim`
--

INSERT INTO `status_klaim` (`ID_Statusklaim`, `Status_Klaim`) VALUES
('SK000001', 'Berhasil'),
('SK000002', 'Belum konfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `status_setor`
--

CREATE TABLE `status_setor` (
  `ID_Statussetor` varchar(100) NOT NULL,
  `Status_Setor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_setor`
--

INSERT INTO `status_setor` (`ID_Statussetor`, `Status_Setor`) VALUES
('SS000001', 'Berhasil Setor'),
('SS000002', 'Menunggu Konfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_daftar_stok`
--

CREATE TABLE `transaksi_daftar_stok` (
  `ID_Cabang_Bank` varchar(100) NOT NULL,
  `ID_Sampah` varchar(100) NOT NULL,
  `Stok` int(11) NOT NULL,
  `Tanggal_Update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_daftar_stok`
--

INSERT INTO `transaksi_daftar_stok` (`ID_Cabang_Bank`, `ID_Sampah`, `Stok`, `Tanggal_Update`) VALUES
('CB', 'SPH0', 3, '2023-12-24'),
('CB2', 'SPH0', 4, '2026-10-09'),
('CB2', 'SPH1', 4, '2026-10-09'),
('CB2', 'SPH4', 2, '2023-12-14'),
('CB2', 'SPH5', 2, '2023-12-14'),
('CB2', 'SPH3', 3, '2023-12-24'),
('CB', 'SPH5', 2, '2023-12-24'),
('CB', 'SPH4', 1, '2023-12-22'),
('CB4', 'SPH3', 1, '2023-12-22'),
('CB2', 'SPH6', 1, '2023-12-24'),
('CB', 'SPH2', 2, '2023-12-25');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_gift`
--

CREATE TABLE `transaksi_gift` (
  `ID_Gift` varchar(100) NOT NULL,
  `ID_Nota_Gift` varchar(100) NOT NULL,
  `QTY` int(11) NOT NULL,
  `sub_poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_gift`
--

INSERT INTO `transaksi_gift` (`ID_Gift`, `ID_Nota_Gift`, `QTY`, `sub_poin`) VALUES
('G12', 'NK000002', 1, 9),
('G14', 'NK000003', 2, 20),
('G19', 'NK000004', 1, 40),
('G14', 'NK000010', 1, 10),
('G12', 'NK000011', 1, 9),
('G19', 'NK000011', 1, 40),
('G13', 'NK000012', 2, 140);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_setor`
--

CREATE TABLE `transaksi_setor` (
  `ID_Nota_Setor` varchar(100) NOT NULL,
  `ID_Sampah` varchar(100) NOT NULL,
  `Sub_Total` int(11) NOT NULL,
  `Sub_Poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_setor`
--

INSERT INTO `transaksi_setor` (`ID_Nota_Setor`, `ID_Sampah`, `Sub_Total`, `Sub_Poin`) VALUES
('NS000001', 'SPH1', 2, 18),
('NS000001', 'SPH3', 1, 90),
('NS000001', 'SPH4', 2, 20),
('NS000002', 'SPH5', 2, 20),
('NS000002', 'SPH3', 1, 90),
('NS000002', 'SPH0', 1, 24),
('NS000003', 'SPH0', 1, 24),
('NS000005', 'SPH3', 1, 90),
('NS000006', 'SPH3', 1, 90),
('NS000007', 'SPH5', 1, 10),
('NS000008', 'SPH0', 2, 48),
('NS000009', 'SPH4', 1, 10),
('NS000009', 'SPH0', 1, 24),
('NS000010', 'SPH3', 1, 90),
('NS000011', 'SPH3', 1, 90),
('NS000011', 'SPH6', 1, 40),
('NS000013', 'SPH1', 1, 9),
('NS000014', 'SPH5', 1, 10),
('NS000014', 'SPH0', 1, 24),
('NS000015', 'SPH2', 2, 48),
('NS000016', 'SPH0', 1, 24),
('NS000016', 'SPH1', 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_stok_hadiah`
--

CREATE TABLE `transaksi_stok_hadiah` (
  `ID_Cabang_Bank` varchar(100) NOT NULL,
  `ID_Gift` varchar(100) NOT NULL,
  `Stok_Hadiah` int(11) NOT NULL,
  `Tanggal_Update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_stok_hadiah`
--

INSERT INTO `transaksi_stok_hadiah` (`ID_Cabang_Bank`, `ID_Gift`, `Stok_Hadiah`, `Tanggal_Update`) VALUES
('CB', 'G12', 11, '2023-12-23'),
('CB2', 'G12', 9, '2023-12-23'),
('CB4', 'G12', 6, '2023-12-24'),
('CB', 'G19', 7, '2023-12-23'),
('CB2', 'G19', 6, '2023-12-23'),
('CB4', 'G19', 9, '2023-12-24'),
('CB', 'G13', 7, '2023-12-25'),
('CB2', 'G13', 8, '2023-12-23'),
('CB4', 'G13', 6, '2023-12-23'),
('CB', 'G14', 7, '2023-12-23'),
('CB2', 'G14', 6, '2023-12-23'),
('CB4', 'G14', 6, '2023-12-23'),
('CB', 'G15', 0, '2023-12-24'),
('CB2', 'G15', 0, '2023-12-24'),
('CB4', 'G15', 0, '2023-12-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`ID_Akun`),
  ADD KEY `ID_jenis_akun` (`ID_jenis_akun`);

--
-- Indexes for table `cabang_bank_sampah`
--
ALTER TABLE `cabang_bank_sampah`
  ADD PRIMARY KEY (`ID_Cabang_Bank`),
  ADD KEY `ID_Kota` (`ID_Kota`);

--
-- Indexes for table `hadiah`
--
ALTER TABLE `hadiah`
  ADD PRIMARY KEY (`ID_Gift`);

--
-- Indexes for table `jenis_akun`
--
ALTER TABLE `jenis_akun`
  ADD PRIMARY KEY (`ID_jenis_akun`);

--
-- Indexes for table `jenis_sampah`
--
ALTER TABLE `jenis_sampah`
  ADD PRIMARY KEY (`ID_Jenis_Sampah`);

--
-- Indexes for table `jenis_satuan`
--
ALTER TABLE `jenis_satuan`
  ADD PRIMARY KEY (`ID_Satuan`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`ID_Kota`),
  ADD KEY `ID_Provinsi` (`ID_Provinsi`);

--
-- Indexes for table `nota_gift`
--
ALTER TABLE `nota_gift`
  ADD PRIMARY KEY (`ID_Nota_Gift`),
  ADD KEY `ID_akun` (`ID_Akun`),
  ADD KEY `ID_bank_sampah` (`ID_Cabang_Bank`),
  ADD KEY `ID_Status_Klaim` (`ID_Statusklaim`);

--
-- Indexes for table `nota_setor`
--
ALTER TABLE `nota_setor`
  ADD PRIMARY KEY (`ID_Nota_Setor`),
  ADD KEY `ID_bank_sampah` (`ID_Cabang_Bank`),
  ADD KEY `ID_akun` (`ID_Akun`),
  ADD KEY `ID_Statussetor` (`ID_Statussetor`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`ID_Provinsi`);

--
-- Indexes for table `sampah`
--
ALTER TABLE `sampah`
  ADD PRIMARY KEY (`ID_Sampah`),
  ADD KEY `ID_jenis_satuan` (`ID_Satuan`),
  ADD KEY `ID_Jenis_Sampah` (`ID_Jenis_Sampah`);

--
-- Indexes for table `status_klaim`
--
ALTER TABLE `status_klaim`
  ADD PRIMARY KEY (`ID_Statusklaim`);

--
-- Indexes for table `status_setor`
--
ALTER TABLE `status_setor`
  ADD PRIMARY KEY (`ID_Statussetor`);

--
-- Indexes for table `transaksi_daftar_stok`
--
ALTER TABLE `transaksi_daftar_stok`
  ADD KEY `transaksi daftar stok_ibfk_2` (`ID_Sampah`) USING BTREE,
  ADD KEY `transaksi daftar stok_ibfk_1` (`ID_Cabang_Bank`) USING BTREE;

--
-- Indexes for table `transaksi_gift`
--
ALTER TABLE `transaksi_gift`
  ADD KEY `ID_gift` (`ID_Gift`),
  ADD KEY `ID_nota_gift` (`ID_Nota_Gift`);

--
-- Indexes for table `transaksi_setor`
--
ALTER TABLE `transaksi_setor`
  ADD KEY `ID_Nota_Setor` (`ID_Nota_Setor`),
  ADD KEY `ID_Sampah` (`ID_Sampah`);

--
-- Indexes for table `transaksi_stok_hadiah`
--
ALTER TABLE `transaksi_stok_hadiah`
  ADD KEY `ID_Cabang_Bank` (`ID_Cabang_Bank`),
  ADD KEY `transaksi_stok_hadiah_ibfk_2` (`ID_Gift`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `akun_ibfk_1` FOREIGN KEY (`ID_jenis_akun`) REFERENCES `jenis_akun` (`ID_jenis_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cabang_bank_sampah`
--
ALTER TABLE `cabang_bank_sampah`
  ADD CONSTRAINT `cabang_bank_sampah_ibfk_1` FOREIGN KEY (`ID_Kota`) REFERENCES `kota` (`ID_Kota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kota`
--
ALTER TABLE `kota`
  ADD CONSTRAINT `kota_ibfk_1` FOREIGN KEY (`ID_Provinsi`) REFERENCES `provinsi` (`ID_Provinsi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_gift`
--
ALTER TABLE `nota_gift`
  ADD CONSTRAINT `nota_gift_ibfk_1` FOREIGN KEY (`ID_Statusklaim`) REFERENCES `status_klaim` (`ID_Statusklaim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_gift_ibfk_2` FOREIGN KEY (`ID_Cabang_Bank`) REFERENCES `cabang_bank_sampah` (`ID_Cabang_Bank`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_gift_ibfk_3` FOREIGN KEY (`ID_Akun`) REFERENCES `akun` (`ID_Akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_setor`
--
ALTER TABLE `nota_setor`
  ADD CONSTRAINT `nota_setor_ibfk_2` FOREIGN KEY (`ID_Cabang_Bank`) REFERENCES `cabang_bank_sampah` (`ID_Cabang_Bank`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_setor_ibfk_3` FOREIGN KEY (`ID_Akun`) REFERENCES `akun` (`ID_Akun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_setor_ibfk_4` FOREIGN KEY (`ID_Statussetor`) REFERENCES `status_setor` (`ID_Statussetor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sampah`
--
ALTER TABLE `sampah`
  ADD CONSTRAINT `sampah_ibfk_1` FOREIGN KEY (`ID_Satuan`) REFERENCES `jenis_satuan` (`ID_Satuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sampah_ibfk_2` FOREIGN KEY (`ID_Jenis_Sampah`) REFERENCES `jenis_sampah` (`ID_Jenis_Sampah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sampah_ibfk_3` FOREIGN KEY (`ID_Jenis_Sampah`) REFERENCES `jenis_sampah` (`ID_Jenis_Sampah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_daftar_stok`
--
ALTER TABLE `transaksi_daftar_stok`
  ADD CONSTRAINT `transaksi_daftar_stok_ibfk_1` FOREIGN KEY (`ID_Cabang_Bank`) REFERENCES `cabang_bank_sampah` (`ID_Cabang_Bank`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_daftar_stok_ibfk_2` FOREIGN KEY (`ID_Sampah`) REFERENCES `sampah` (`ID_Sampah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_gift`
--
ALTER TABLE `transaksi_gift`
  ADD CONSTRAINT `transaksi_gift_ibfk_2` FOREIGN KEY (`ID_Gift`) REFERENCES `hadiah` (`ID_Gift`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_gift_ibfk_4` FOREIGN KEY (`ID_Nota_Gift`) REFERENCES `nota_gift` (`ID_Nota_Gift`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_setor`
--
ALTER TABLE `transaksi_setor`
  ADD CONSTRAINT `transaksi_setor_ibfk_1` FOREIGN KEY (`ID_Nota_Setor`) REFERENCES `nota_setor` (`ID_Nota_Setor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_setor_ibfk_2` FOREIGN KEY (`ID_Sampah`) REFERENCES `sampah` (`ID_Sampah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_stok_hadiah`
--
ALTER TABLE `transaksi_stok_hadiah`
  ADD CONSTRAINT `transaksi_stok_hadiah_ibfk_1` FOREIGN KEY (`ID_Cabang_Bank`) REFERENCES `cabang_bank_sampah` (`ID_Cabang_Bank`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_stok_hadiah_ibfk_2` FOREIGN KEY (`ID_Gift`) REFERENCES `hadiah` (`ID_Gift`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
