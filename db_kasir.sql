-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2019 at 03:16 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_barang` char(5) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga_beli` bigint(20) NOT NULL,
  `harga_jual` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barang`, `nama_barang`, `satuan`, `kategori`, `harga_beli`, `harga_jual`) VALUES
('B-001', 'Kursi Santai', 'pcs', 'Barang Rumah Tangga', 5000000, 5400000),
('B-002', 'Xiaomi Redmi Pro 3/22', 'pcs', 'Barang Elektronik', 1500000, 1700000),
('B-003', 'RAM Team Elite DDR4 4GB 2400Mhz', 'pcs', 'Komponen Komputer/Laptop', 440000, 480000),
('B-004', 'Mouse Logitech M221', 'pcs', 'Komponen Komputer/Laptop', 150000, 175000),
('B-005', 'Club Air Mineral', 'Botol', 'Minuman', 1700, 3000),
('k01', 'baju ijo', 'Botol', 'Buku', 15000, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_penjualan`
--

CREATE TABLE `tb_detail_penjualan` (
  `id` int(11) NOT NULL,
  `kode_tr` varchar(20) NOT NULL,
  `kode_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(40) NOT NULL,
  `santuan_barang` varchar(20) NOT NULL,
  `jml_barang` int(11) NOT NULL,
  `harga_jual` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_penjualan`
--

INSERT INTO `tb_detail_penjualan` (`id`, `kode_tr`, `kode_barang`, `nama_barang`, `santuan_barang`, `jml_barang`, `harga_jual`, `total`) VALUES
(18, '20190715.173927', 'B-005', 'Club Air Mineral', 'Botol', 2, 3000, 6000),
(19, '20190715.173927', 'B-004', 'Mouse Logitech M221', 'pcs', 1, 175000, 175000),
(20, '20190715.194716', 'B-005', 'Club Air Mineral', 'Botol', 2, 3000, 6000),
(21, '20190715.194813', 'B-005', 'Club Air Mineral', 'Botol', 3, 3000, 9000),
(22, '20190716.100037', 'B-005', 'Club Air Mineral', 'Botol', 2, 3000, 6000),
(23, '20190716.100143', 'B-004', 'Mouse Logitech M221', 'pcs', 2, 175000, 350000),
(24, '20190716.100232', 'B-004', 'Mouse Logitech M221', 'pcs', 2, 175000, 350000),
(25, '20190716.132609', 'k01', 'baju ijo', 'Botol', 2, 3000, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `nik` varchar(10) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `alamat_karyawan` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` char(1) NOT NULL,
  `pendidikan` varchar(25) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `m1` int(11) NOT NULL,
  `m2` int(11) NOT NULL,
  `m3` int(11) NOT NULL,
  `t1` int(11) NOT NULL,
  `t2` int(11) NOT NULL,
  `l1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`nik`, `nama_karyawan`, `alamat_karyawan`, `no_telp`, `tgl_lahir`, `jk`, `pendidikan`, `jabatan`, `username`, `password`, `m1`, `m2`, `m3`, `t1`, `t2`, `l1`) VALUES
('K190616001', 'Denandra Prasetya Laksma Putra', 'Jl Semampir Tengah 8A', '089507773113', '1998-12-16', 'L', 'S1', 'Direktur', 'nndraa', '123', 1, 1, 1, 1, 1, 1),
('K190618002', 'Bastian', 'Jl. Rungkut', '0858585858', '1999-04-22', 'L', 'SD', 'Karyawan', '', '', 0, 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `kode_tr` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `total` float NOT NULL,
  `ppn` float NOT NULL,
  `diskon` float NOT NULL,
  `grand_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`kode_tr`, `nama`, `alamat`, `no_telp`, `keterangan`, `total`, `ppn`, `diskon`, `grand_total`) VALUES
('20190715.173927', 'Denandra', 'Jl. Semampir tengah 8A', '089507773113', 'Sip', 181000, 0, 2, 177380),
('20190715.194716', 'Den', 'asdwe', '09999', 'asdasd', 6000, 0, 0, 6000),
('20190715.194813', 'oqwekoqkw', 'qowekoqkwe', 'qwekoqke', 'qowekoqwe', 9000, 0, 0, 9000),
('20190716.100037', 'asd', 'asd', 'asd', 'asd', 6000, 0, 2, 5880),
('20190716.100143', 'Denandra', 'Jl jalan', '0895077777', 'wokowkowk', 350000, 0, 0, 350000),
('20190716.100232', 'wkokwokwo', 'wkowkw', 'wowkoo', 'wokwow', 350000, 0, 0, 350000),
('20190716.132609', 'asdkowk', 'qowieoqiw', '989898', 'oiqoweiq', 6000, 3, 9, 5623.8);

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `kode_supplier` varchar(20) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `no_handphone` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`kode_supplier`, `nama_supplier`, `nama_perusahaan`, `alamat`, `kota`, `no_telp`, `no_handphone`, `email`, `keterangan`) VALUES
('sup', 'papap', 'appapa', 'apap', 'aappa', '09090', '09090909', '0909009@gmail.comds', 'asdasdasd'),
('SUP190617001', 'Asekaaaa', 'PT ASEK Multimedia', 'Jl Semampir Tengah 8A', 'Surabaya', '08214292929', '0361339993', 'info@asek.com', 'aseeeeeeeeeeeeek');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tb_detail_penjualan`
--
ALTER TABLE `tb_detail_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`kode_tr`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_penjualan`
--
ALTER TABLE `tb_detail_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
