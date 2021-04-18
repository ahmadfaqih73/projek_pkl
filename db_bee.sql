-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11 Apr 2021 pada 22.11
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bee`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `transaksi_id` int(11) NOT NULL,
  `barang_id` int(11) DEFAULT NULL,
  `kode_barang` varchar(25) DEFAULT NULL,
  `jumlah_keluar` decimal(10,0) DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulan`
--

CREATE TABLE `bulan` (
  `id_bulan` int(11) NOT NULL,
  `nama_bulan` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bulan`
--

INSERT INTO `bulan` (`id_bulan`, `nama_bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(120) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `no_hp` varchar(120) NOT NULL,
  `jenis_kelamin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `no_hp`, `jenis_kelamin`) VALUES
(1, 'budi', 'jalen', '089765723', 1),
(2, 'Intan', 'Genteng', '087856', 2),
(3, 'Rika', 'Gontor', '089980', 1),
(4, 'nanda', 'BWI', '121314', 1),
(5, 'dari', 'RGJ', '1234', 1),
(6, 'fanny', 'Jalen', '23443', 2),
(7, 'danang', 'sadar', '123', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `barang_idbarang` int(11) DEFAULT NULL,
  `harga_beli` varchar(123) NOT NULL,
  `jumlah` double NOT NULL,
  `tanggal` date NOT NULL,
  `suplier` varchar(120) NOT NULL,
  `harga_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `barang_idbarang`, `harga_beli`, `jumlah`, `tanggal`, `suplier`, `harga_total`) VALUES
(1, 1, '200000', 12, '2020-12-14', 'PT. SAMSUL DIGITAL TAMA', 2400000),
(2, 1, '200000', 15, '2020-12-14', 'PT. SAMSUL DIGITAMA', 3000000),
(3, 2, '450000', 5, '2020-12-17', 'PT Maron', 2250000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `kode_pesanan` varchar(20) NOT NULL,
  `barang_stockid` int(11) NOT NULL,
  `pelanggan_pelangganid` int(11) NOT NULL,
  `jumlah` double NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal_pesanan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `kode_pesanan`, `barang_stockid`, `pelanggan_pelangganid`, `jumlah`, `harga`, `tanggal_pesanan`) VALUES
(1, 'BR511122020001', 1, 1, 2, 2800000, '2020-12-11'),
(2, 'BR511122020001', 2, 1, 1, 450000, '2020-12-11'),
(3, 'BR524012021002', 1, 1, 1, 1400000, '2021-01-24'),
(4, 'BR525012021003', 7, 5, 2, 1600000, '2021-01-25'),
(5, 'BR525012021004', 2, 6, 2, 900000, '2021-01-25'),
(6, 'BR525012021004', 7, 6, 2, 1600000, '2021-01-25'),
(7, 'BR526012021005', 2, 7, 2, 900000, '2021-01-26'),
(8, 'BR526012021005', 7, 7, 2, 1600000, '2021-01-26'),
(9, 'BR526012021006', 7, 5, 5, 4000000, '2021-01-26');

--
-- Trigger `penjualan`
--
DELIMITER $$
CREATE TRIGGER `insert_transaksi` AFTER INSERT ON `penjualan` FOR EACH ROW INSERT INTO transaksi SET
transaksi.id_transaksi = new.kode_pesanan,
transaksi.barang_stockid = new.barang_stockid,
transaksi.pelanggan_idpelanggan = new.pelanggan_pelangganid,
transaksi.total = (SELECT stock.Hargajual * new.jumlah FROM stock WHERE stock.id_stock = new.barang_stockid),
transaksi.jumlah = new.jumlah

ON duplicate KEY UPDATE transaksi.total = transaksi.total + (SELECT stock.Hargajual * new.jumlah FROM stock WHERE stock.id_stock = new.barang_stockid)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_penjualan`
--

CREATE TABLE `riwayat_penjualan` (
  `id_riwayat` int(11) NOT NULL,
  `kodepesanan` varchar(120) NOT NULL,
  `barang_nama` int(11) NOT NULL,
  `jumlah` double NOT NULL,
  `harga` double NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_penjualan`
--

INSERT INTO `riwayat_penjualan` (`id_riwayat`, `kodepesanan`, `barang_nama`, `jumlah`, `harga`, `tanggal`) VALUES
(1, 'TED32', 1, 2, 2400000, '2020-11-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock`
--

CREATE TABLE `stock` (
  `id_stock` int(11) NOT NULL,
  `kode_barang` varchar(120) NOT NULL,
  `nama_barang` varchar(120) NOT NULL,
  `Hargajual` varchar(120) NOT NULL,
  `jumlah_barang` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stock`
--

INSERT INTO `stock` (`id_stock`, `kode_barang`, `nama_barang`, `Hargajual`, `jumlah_barang`) VALUES
(1, 'ABC', 'Monitor samsung', '1400000', 26),
(2, 'DBS', 'RAM', '450000', 7),
(7, 'DBB', 'hardisk', '800000', -1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(20) NOT NULL,
  `barang_stockid` int(11) NOT NULL,
  `pelanggan_idpelanggan` int(11) NOT NULL,
  `total` double NOT NULL,
  `jumlah` int(5) NOT NULL,
  `status` int(11) NOT NULL,
  `kembalian` double NOT NULL,
  `bayar` double NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `barang_stockid`, `pelanggan_idpelanggan`, `total`, `jumlah`, `status`, `kembalian`, `bayar`, `tanggal`) VALUES
('BR511122020001', 1, 1, 2800000, 2, 1, 750000, 4000000, '2020-12-11'),
('BR511122020001', 2, 1, 450000, 1, 1, 750000, 4000000, '2020-12-11'),
('BR524012021002', 1, 1, 1400000, 1, 1, 600000, 2000000, '2021-12-01'),
('BR525012021003', 7, 5, 1600000, 2, 1, 400000, 2000000, '2021-01-25'),
('BR525012021004', 2, 6, 900000, 2, 1, 100000, 2600000, '2021-01-25'),
('BR525012021004', 7, 6, 1600000, 2, 1, 100000, 2600000, '2021-01-25'),
('BR526012021005', 2, 7, 900000, 2, 1, 500000, 3000000, '2021-01-26'),
('BR526012021005', 7, 7, 1600000, 2, 1, 500000, 3000000, '2021-01-26'),
('BR526012021006', 7, 5, 4000000, 5, 1, 1000000, 5000000, '2021-01-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `data_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `data_created`) VALUES
(1, 'asd', 'asd@gmail.com', 'default.jpg', '$2y$10$CCJyNvUPFrDdd.XBI4ODm.SiR.eGYXT/7Rgp034tjH14ZJhz1XYt2', 2, 1, 1603802141),
(2, 'qw', 'qw@yahoo.com', 'default.jpg', '$2y$10$Qjrs1l.HBEonRe9/tZA4kuKgbvaTaA05K.m80PNLkcoPd2GH6crI2', 1, 1, 1603802968),
(3, 'erik', 'erik@gmail.com', 'default.jpg', '$2y$10$uG/DqrKzviwzvYWEoLBpE.bCgv68uofaRn3d9VQ6y5EmbAyBDXlwi', 2, 1, 1605017081),
(4, 'na', 'na@gmail.com', 'default.jpg', '$2y$10$0U4hIvrJMgCcXGkW45UTI.GTTrQD3xDC00VBee4yjtlQe5t4pJZ.2', 2, 0, 1605017152);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(9, 1, 8),
(10, 1, 9),
(11, 1, 3),
(13, 2, 7),
(17, 2, 9),
(18, 2, 6),
(19, 1, 6),
(20, 1, 7),
(21, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(126) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'Menu'),
(6, 'Pembelian'),
(7, 'Penjualan'),
(8, 'Pelaporan'),
(9, 'Pelanggan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas  fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(9, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(10, 6, 'Pembelian', 'pembelian', 'fas fa-fw fa-shopping-cart', 1),
(11, 6, 'Stock', 'pembelian/stock', 'fas fa-fw fa-list-ol', 1),
(12, 9, 'Pelanggan', 'pelanggan', 'fas fa-fw fa-user-tie', 1),
(14, 7, 'Penjualan', 'penjualan', 'fas fa-fw fa-truck', 1),
(15, 7, 'Transaksi', 'penjualan/transaksi', 'fas fa-fw fa-money-bill-alt', 1),
(16, 8, 'Riwayat', 'pelaporan/riwayat', 'fas fa-fw fa-history', 1),
(17, 8, 'Grafik', 'pelaporan/Grafik', 'fas fa-fw fa-chart-area', 1),
(18, 6, 'Barang_keluar', 'Pembelian/Barang_keluar', 'fas fa-fw fa-sign-in-alt', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `riwayat_penjualan`
--
ALTER TABLE `riwayat_penjualan`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id_bulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `riwayat_penjualan`
--
ALTER TABLE `riwayat_penjualan`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
