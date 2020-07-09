-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 27, 2020 at 05:29 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simanto`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_agt` int(11) NOT NULL,
  `id_cabang` int(11) NOT NULL,
  `no_pintar` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `telpagt` varchar(50) NOT NULL,
  `wilayah` text NOT NULL,
  `target` int(11) DEFAULT NULL,
  `pencapaian` int(11) DEFAULT NULL,
  `date_create` int(11) DEFAULT NULL,
  `is_delete_agt` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_agt`, `id_cabang`, `no_pintar`, `id_jabatan`, `nama`, `image`, `gender`, `telpagt`, `wilayah`, `target`, `pencapaian`, `date_create`, `is_delete_agt`) VALUES
(1, 23, 213432, 2, 'EPPY', 'default.jpg', 'PEREMPUAN', '08123213421', '-', 0, 40, NULL, 0),
(3, 23, 342342, 2, 'Hans', 'hans.jpg', 'laki-laki', '03849234', 'Alok Timur', 60, 60, NULL, 0),
(4, 26, 932443, 3, 'Pinos', 'default.jpg', 'PEREMPUAN', '08432432', 'KOTA UNENG', 50, 50, NULL, 0),
(6, 26, 234892, 3, 'NInindas', 'default.jpg', 'LAKI-LAKI', '9083248', 'TANALANGI', 30, 30, NULL, 0),
(7, 23, 98324, 3, 'Mujang', 'default.jpg', 'LAKI-LAKI', '083423432', '-', 15, 15, NULL, 0),
(9, 23, 948234, 3, 'Linda Boitekan', 'default.jpg', 'PEREMPUAN', '0834234234', 'BAPAK KAU', 40, 60, NULL, 0),
(10, 26, 8231231, 3, 'JiJia', 'default.jpg', 'PEREMPUAN', '092384234', 'KOTA UNENG', 0, 90, NULL, 0),
(11, 23, 883453, 3, 'ffssdasdas', 'default.jpg', 'PEREMPUAN', '078533634', 'KEJAYA TIMUR', 1, 34, NULL, 0),
(12, 7, 9839024, 3, 'Natasha', 'default.jpg', 'PEREMPUAN', '745634654', '-', 1, 100, NULL, 0),
(14, 7, 79878, 3, 'Aisyah', 'default.jpg', 'PEREMPUAN', '0382423', 'KOLIDETUNG', NULL, 90, 1585284162, NULL),
(15, 9, 542314, 3, 'Sikujang', 'default.jpg', 'LAKI-LAKI', '6534523', 'NATAKOLI', NULL, 30, 1586502480, NULL),
(17, 29, 87343, 3, 'AO1', 'default.jpg', 'LAKI-LAKI', '90324', 'DESA NUNUKAN', 12, NULL, 1587003531, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id` int(11) NOT NULL,
  `nrp` int(11) NOT NULL,
  `nama_cab` varchar(120) NOT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id`, `nrp`, `nama_cab`, `status`) VALUES
(21, 21312, 'Klongpopot', 'KC'),
(23, 8374223, 'LARANTUKA', 'KCP'),
(26, 984523, 'MAUMERE', 'KCP'),
(29, 345553, 'SOE', 'KCP');

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `id_role`, `id_menu`) VALUES
(1, 1, 1),
(3, 1, 3),
(4, 1, 7),
(7, 2, 1),
(8, 2, 4),
(9, 2, 8),
(10, 2, 5),
(13, 3, 1),
(14, 4, 1),
(15, 2, 6),
(16, 1, 2),
(17, 1, 4),
(18, 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `jabatan`) VALUES
(2, 'ASSISTEN'),
(3, 'AO');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_trans`
--

CREATE TABLE `jenis_trans` (
  `id_jenis` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_trans`
--

INSERT INTO `jenis_trans` (`id_jenis`, `jenis`) VALUES
(1, 'PU'),
(2, 'PK');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id_manager` int(11) NOT NULL,
  `no_pintar` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_cabang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id_manager`, `no_pintar`, `nama`, `image`, `gender`, `telp`, `id_user`, `id_cabang`) VALUES
(6, 32847, 'mautahu', 'default.jpg', 'Perempuan', '98324', 30, 26),
(8, 98234, 'Josua Manek', 'default.jpg', 'Laki-Laki', '04542', 34, 22),
(9, 765453, 'Contoh', 'default.jpg', 'Laki-Laki', '071623', 35, 29);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `judul_menu` varchar(50) NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `judul_menu`, `icon`, `url`, `is_active`) VALUES
(1, 'Dashboard', 'zmdi zmdi-view-dashboard', 'Home', 1),
(2, 'Cabang', 'fa fa-fw fa-building', 'Cabang', 1),
(3, 'Manager', 'fa fa-fw fa-user', 'Manager', 1),
(4, 'AO', 'fa fa-fw fa-users', 'Anggota', 1),
(5, 'Setor', 'fa fa-fw fa-money', 'Transaksi', 1),
(6, 'Laporan Bulanan', 'fa fa-fw  fa-file', 'Laporan', 1),
(7, 'Wilayah', 'fa fa-fw fa-map', 'Wilayah', 1),
(8, 'Anggota', 'fa fa-fw fa-user', 'Nasabah', 1),
(9, 'Laporan Harian', 'fa fa-fw  fa-file', 'Laporan/Harian', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `id_nasabah` int(11) NOT NULL,
  `nama_nas` varchar(50) NOT NULL,
  `gender_nas` varchar(50) NOT NULL,
  `no_telp_nas` varchar(50) NOT NULL,
  `id_cabang_nas` int(11) NOT NULL,
  `id_wil` int(11) NOT NULL,
  `date_create` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`id_nasabah`, `nama_nas`, `gender_nas`, `no_telp_nas`, `id_cabang_nas`, `id_wil`, `date_create`) VALUES
(21462, 'JuaJua', 'LAKI-LAKI', '0832423324234', 26, 8, NULL),
(214612, 'Clara', 'PEREMPUAN', '9785674', 26, 4, NULL),
(214614, 'Simaju', 'LAKI-LAKI', '08123213421', 23, 4, NULL),
(214615, 'Anita', 'PEREMPUAN', '643523', 7, 4, NULL),
(214617, 'Fahrul', 'LAKI-LAKI', '07232344', 29, 4, 1587004194);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'ADMIN'),
(2, 'MANAGER'),
(3, 'VIEWER'),
(4, 'DIRECTUR');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id_sub_menu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `title_sub` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tgl_transaksi` int(11) NOT NULL,
  `id_agt` int(11) NOT NULL,
  `id_jenis_trans` int(11) NOT NULL,
  `Nomor_Nasabah` varchar(50) NOT NULL,
  `tgl_pinjam` int(11) NOT NULL,
  `besar_pinjaman` int(11) NOT NULL,
  `bukti` varchar(50) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `tgl_kontrak` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `income` int(11) NOT NULL DEFAULT 0,
  `sisa_pinjam` int(11) NOT NULL,
  `status_pembayaran` int(1) NOT NULL,
  `date_create` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_transaksi`, `id_agt`, `id_jenis_trans`, `Nomor_Nasabah`, `tgl_pinjam`, `besar_pinjaman`, `bukti`, `keterangan`, `tgl_kontrak`, `jumlah_bayar`, `income`, `sisa_pinjam`, `status_pembayaran`, `date_create`) VALUES
(18, 1589320800, 4, 1, '21462', 1588802400, 30000000, 'default.jpg', 'sadasdasd', 1590012000, 30600000, 30600000, 0, 1, '2020-05-12'),
(19, 1589320800, 4, 1, '21462', 1588888800, 234123123, 'default.jpg', 'wds', 1590271200, 238805585, 238805585, 0, 1, '2020-05-13'),
(20, 1589320800, 10, 1, '214612', 1590012000, 21233222, 'default.jpg', '1wdasdas', 1590530400, 21657886, 20657886, 1000000, 0, '2020-05-13'),
(21, 1589407200, 10, 1, '21462', 1588629600, 200000, 'default.jpg', 'ssa', 1589493600, 204000, 134000, 70000, 0, '2020-05-14'),
(22, 1586815200, 10, 1, '214612', 1585692000, 3000000, 'default.jpg', 'fasdsa', 1588197600, 3060000, 310000, 2750000, 0, '2020-04-14'),
(23, 1589493600, 17, 1, '214617', 1588888800, 30000000, 'default.jpg', 'adsasd', 1590357600, 30600000, 400000, 30200000, 0, '2020-05-15'),
(24, 1584226800, 6, 1, '214612', 1583276400, 90000000, 'default.jpg', 'sdas', 1590184800, 91800000, 61810000, 29990000, 0, '2020-03-15'),
(25, 1589752800, 6, 1, '21462', 1588284000, 3000000, 'default.jpg', 'sdaasd', 1588284000, 3060000, 60000, 3000000, 0, '2020-05-18'),
(26, 1589839200, 10, 1, '214612', 1589839200, 90000, 'default.jpg', '123', 1588975200, 91800, 91800, 0, 1, '2020-05-19'),
(27, 1593036000, 17, 1, '214617', 1593295200, 20000000, 'default.jpg', 'sdas', 1592517600, 20400000, 10100000, 10300000, 0, '2020-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_harian`
--

CREATE TABLE `transaksi_harian` (
  `id_trans_harian` int(11) NOT NULL,
  `id_agt` int(11) NOT NULL,
  `bunga_harian` int(11) NOT NULL,
  `disetor` int(11) DEFAULT NULL,
  `kekurangan` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `date_create` date NOT NULL,
  `tgl_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_harian`
--

INSERT INTO `transaksi_harian` (`id_trans_harian`, `id_agt`, `bunga_harian`, `disetor`, `kekurangan`, `status`, `date_create`, `tgl_transaksi`) VALUES
(1, 10, 830730, 150000, 680730, 0, '2020-05-27', 1590530400);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `id_role` int(11) NOT NULL,
  `last_login` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `id_role`, `last_login`) VALUES
(1, 'pintar', 'pintar', 1, 1590387616),
(30, 'mautahu', 'mautahu', 2, 1590581679),
(32, 'Pintar95', 'pintar95', 4, 1590387875),
(34, 'Josua', 'Josua95', 2, NULL),
(35, 'contoh', 'contoh', 2, 1590387817);

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wil` int(11) NOT NULL,
  `nm_wilayah` varchar(50) NOT NULL,
  `id_cabang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id_wil`, `nm_wilayah`, `id_cabang`) VALUES
(1, 'ALOK TIMUR', 26),
(2, 'WAIOTI', 26),
(3, 'KOTA BARU', 26),
(4, 'KOTA UNENG', 26),
(5, 'KOLIDETUNG', 26),
(6, 'TANALANGI', 26),
(7, 'NEN BURA', 26),
(8, 'NATAKOLI', 26),
(9, 'KEJAYA TIMUR', 23),
(10, 'KRAKATAU', 23),
(11, 'BAPAK KAU', 23),
(13, 'DESA NUNUKAN', 29);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_agt`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_trans`
--
ALTER TABLE `jenis_trans`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id_manager`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id_nasabah`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id_sub_menu`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaksi_harian`
--
ALTER TABLE `transaksi_harian`
  ADD PRIMARY KEY (`id_trans_harian`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id_wil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_agt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_trans`
--
ALTER TABLE `jenis_trans`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id_manager` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id_nasabah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214618;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `transaksi_harian`
--
ALTER TABLE `transaksi_harian`
  MODIFY `id_trans_harian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
