-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2020 at 07:24 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `aksesmenu`
--

CREATE TABLE `aksesmenu` (
  `id_aksesmenu` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aksesmenu`
--

INSERT INTO `aksesmenu` (`id_aksesmenu`, `id_user`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 1),
(6, 2, 2),
(7, 2, 4),
(8, 3, 1),
(9, 3, 2),
(10, 4, 1),
(11, 4, 2),
(12, 4, 3),
(13, 3, 3),
(14, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `deskripsi`, `satuan`, `stok`, `aktif`) VALUES
(1, 'Laptop Asus', 'core i5 gen 7, ram 6gb', 'PCS', 10, 1),
(2, 'CPU Gaming', 'ryzen 4 gen 3, rtx 1660, ram 16gb ', 'PCS', 10, 2),
(3, 'Keyboard', 'keyboard HP', 'PCS', 15, 2),
(4, 'Monitor Samsung', '18 inc', 'PCS', 5, 0),
(6, 'CPU kantor', 'intel i4 quad core, intel hd 6969', 'PCS', 20, 2),
(8, 'WebCam', 'WebCam Sony 300mx', 'PCS', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `id_keluar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`id_keluar`, `id_barang`, `tanggal_keluar`, `id_supplier`, `jumlah_keluar`) VALUES
(1, 4, '2020-02-21', 3, 1),
(4, 1, '2020-02-22', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `id_masuk` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`id_masuk`, `id_barang`, `tanggal_masuk`, `id_supplier`, `jumlah_masuk`) VALUES
(2, 5, '2020-02-22', 2, 1),
(3, 0, '2020-01-28', 0, 2),
(4, 4, '2020-02-21', 3, 1),
(7, 2, '2020-01-30', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`) VALUES
(1, 'Admin'),
(2, 'Master'),
(3, 'Transaksi'),
(4, 'Pengaturan');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id_submenu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_submenu` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id_submenu`, `id_menu`, `nama_submenu`, `icon`, `url`) VALUES
(3, 1, 'Dashboard', '<i class=\"nav-icon fas fa-tachometer-alt\"></i>', 'admin'),
(4, 2, 'Barang', '<i class=\"nav-icon fas fa-cube\"></i>', 'admin/barang'),
(5, 3, 'Barang Masuk', '<i class=\"nav-icon fas fa-box\"></i>', 'admin/barang/masuk'),
(6, 3, 'Barang Keluar', '<i class=\"nav-icon fas fa-box-open\"></i>', 'admin/barang/keluar'),
(7, 4, 'Profil', '<i class=\"nav-icon fas fa-user\"></i>', 'admin/profile'),
(8, 4, 'Ganti Password', '<i class=\"nav-icon fas fa-key\"></i>', ''),
(9, 2, 'Supplier', '<i class=\"nav-icon fas fa-users\"></i>', 'admin/supplier');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `alamat`, `nama_supplier`, `telp`) VALUES
(1, 'jl mawar 3', 'Edi', '08138383066'),
(2, 'jl Merak 64', 'Dewi', '08138324468'),
(4, 'perum 36', 'Aldi', '08138234645');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nama_user` varchar(60) NOT NULL,
  `status_user` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `status_user`) VALUES
(1, 'admin', 'admin', 'WEBMASTER', 1),
(2, 'a', 'a', 'KARYAWAN', 2),
(3, 'm', 'm', 'MANAGER', 3),
(4, 'g', 'g', 'GUDANG', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aksesmenu`
--
ALTER TABLE `aksesmenu`
  ADD PRIMARY KEY (`id_aksesmenu`),
  ADD KEY `id_menu` (`id_user`),
  ADD KEY `id_submenu` (`id_menu`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id_submenu`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aksesmenu`
--
ALTER TABLE `aksesmenu`
  MODIFY `id_aksesmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
