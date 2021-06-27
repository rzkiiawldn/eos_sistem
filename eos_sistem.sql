-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2021 pada 09.06
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eos_sistem`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_code` varchar(100) NOT NULL,
  `client_name` varchar(200) NOT NULL,
  `id_stock_allocation` varchar(225) NOT NULL,
  `created_date` date NOT NULL,
  `active` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `client`
--

INSERT INTO `client` (`id_client`, `user_id`, `client_code`, `client_name`, `id_stock_allocation`, `created_date`, `active`) VALUES
(4, 8, 'aa', 'aa', '5', '2021-06-06', '0'),
(5, 7, 'asaas', 'asasas', '3', '2021-06-12', '0'),
(7, 7, '1', '1', '3', '2021-06-13', 'No'),
(8, 7, 'a', 'aaa', '2', '2021-06-13', 'No');

-- --------------------------------------------------------

--
-- Struktur dari tabel `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `kd_department` varchar(200) NOT NULL,
  `name` varchar(225) NOT NULL,
  `created_date` int(11) NOT NULL,
  `created_by` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `department`
--

INSERT INTO `department` (`department_id`, `kd_department`, `name`, `created_date`, `created_by`) VALUES
(1, 'tech', 'TECH', 2147483647, 'riris'),
(2, 'hod_tech', 'HOD TECH', 2147483647, 'riris'),
(3, 'admin_store', 'ADMIN STORE', 2147483647, 'ristiani'),
(4, 'admin_operation', 'ADMIN OPERATION', 214656565, 'ristiani'),
(5, 'client', 'CLIENT', 2147483647, 'ristiani'),
(6, 'supervisior', 'SUPERVISIOR', 2147483647, 'ristiani');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_bundling`
--

CREATE TABLE `item_bundling` (
  `id_item_bundling` int(11) NOT NULL,
  `item_bundling_code` varchar(155) NOT NULL,
  `item_bundling_name` varchar(225) NOT NULL,
  `item_bundling_barcode` varchar(225) NOT NULL,
  `id_manage_by` varchar(225) NOT NULL,
  `qty` int(20) NOT NULL,
  `total_price` decimal(10,0) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_location` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `item_bundling`
--

INSERT INTO `item_bundling` (`id_item_bundling`, `item_bundling_code`, `item_bundling_name`, `item_bundling_barcode`, `id_manage_by`, `qty`, `total_price`, `id_client`, `id_location`, `created_date`, `created_by`) VALUES
(5, 'abc', 'abcs', '', '1', 5, '4500000', 0, 0, '0000-00-00', 0),
(6, 'AS', 'AAASSS', '', '1', 6, '600000', 0, 0, '0000-00-00', 0),
(7, 'bunddd', 'bundddling', '', '1', 2, '200000', 0, 0, '0000-00-00', 0),
(8, 'REAL-5', 'REALME', '', '1', 3, '6300000', 0, 0, '2021-06-11', 0),
(10, 'BC', 'BCCC', '', '1', 3, '4300000', 0, 0, '2021-06-11', 0),
(11, 'aa', 'aa', '', '1', 13, '3200001', 0, 0, '2021-06-13', 8),
(12, '1111', '1', '1111', '1', 13, '23200001', 0, 0, '2021-06-13', 8),
(13, '11', '11', '11', '1', 2, '2200000', 0, 0, '2021-06-20', 5),
(14, 'aa', 'aa', 'aa', '1', 1, '12', 0, 0, '2021-06-27', 8),
(15, '888', 'asas', '888', '1', 4, '2100003', 5, 1, '2021-06-27', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_bundling_detail`
--

CREATE TABLE `item_bundling_detail` (
  `id_item_bundling_detail` int(11) NOT NULL,
  `id_item_bundling` int(11) NOT NULL,
  `id_item_nonbundling` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `item_bundling_detail`
--

INSERT INTO `item_bundling_detail` (`id_item_bundling_detail`, `id_item_bundling`, `id_item_nonbundling`, `item_qty`, `price`) VALUES
(8, 5, 2, 2, '200000'),
(10, 6, 2, 2, '200000'),
(11, 7, 2, 1, '100000'),
(12, 7, 2, 1, '100000'),
(13, 6, 2, 2, '200000'),
(15, 6, 2, 2, '200000'),
(16, 5, 3, 2, '4200000'),
(18, 8, 3, 3, '6300000'),
(24, 5, 2, 1, '100000'),
(25, 10, 2, 1, '100000'),
(26, 10, 3, 2, '4200000'),
(39, 11, 2, 11, '1100000'),
(40, 11, 3, 1, '2100000'),
(41, 11, 4, 1, '1'),
(42, 12, 3, 11, '23100000'),
(43, 12, 2, 1, '100000'),
(44, 12, 4, 1, '1'),
(46, 13, 3, 1, '2100000'),
(47, 13, 2, 1, '100000'),
(50, 14, 6, 1, '12'),
(51, 15, 3, 1, '2100000'),
(52, 15, 7, 2, '2'),
(53, 15, 5, 1, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_nonbundling`
--

CREATE TABLE `item_nonbundling` (
  `id_item_nonbundling` int(11) NOT NULL,
  `item_nonbundling_code` varchar(200) NOT NULL,
  `item_nonbundling_name` varchar(200) NOT NULL,
  `item_nonbundling_barcode` varchar(200) NOT NULL,
  `id_manage_by` int(11) NOT NULL,
  `description` text NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `minimum_stock` int(20) NOT NULL,
  `publish_price` int(20) NOT NULL,
  `additional_expired` int(20) NOT NULL,
  `size` varchar(100) NOT NULL,
  `length` int(20) NOT NULL,
  `width` int(20) NOT NULL,
  `height` int(20) NOT NULL,
  `weight` int(20) NOT NULL,
  `dimension` varchar(100) NOT NULL,
  `active` varchar(10) NOT NULL,
  `is_fragile` varchar(10) NOT NULL,
  `cool_storage` varchar(100) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_location` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `item_nonbundling`
--

INSERT INTO `item_nonbundling` (`id_item_nonbundling`, `item_nonbundling_code`, `item_nonbundling_name`, `item_nonbundling_barcode`, `id_manage_by`, `description`, `brand`, `model`, `category`, `minimum_stock`, `publish_price`, `additional_expired`, `size`, `length`, `width`, `height`, `weight`, `dimension`, `active`, `is_fragile`, `cool_storage`, `id_client`, `id_location`, `created_date`, `created_by`) VALUES
(2, 'aiueo', 'NaBB', 'aiueo', 1, 'asas', 'asas', 'asas', 'asas', 3, 100000, 1, 'M', 1, 1, 1, 1, '2', 'Yes', 'Yes', 'Yes', 4, 1, '0000-00-00', 0),
(3, 'POCO-M3', 'POCO', 'POCO-M3', 1, 'Poco M3 adalah bla bla bla', 'XIAOMI', 'HP', 'HP', 100, 2100000, 10, 'XL', 10, 10, 10, 10, '100', 'Yes', 'Yes', 'Yes', 5, 0, '0000-00-00', 0),
(5, 'abcabc', 'aaaaa', 'abcabc', 1, 'a', 'a', 'a', 'a', 1, 1, 1, 'M', 1, 1, 1, 1, '0.000001', 'Yes', 'Yes', 'Yes', 0, 0, '2021-06-13', 8),
(6, 'as', 'as', 'as', 1, 'as', 'as', 'as', 'as', 12, 12, 12, 'M', 12, 12, 12, 12, '0.001728', 'Yes', 'Yes', 'Yes', 1, 0, '2021-06-27', 8),
(7, 'as', 'as', 'as', 1, 'asasas', 'asas', 'asasas', 'asas', 1, 1, 1, 'M', 1, 11, 111, 1, '0.001221', 'Yes', 'Yes', 'Yes', 4, 1, '2021-06-27', 8),
(9, 'asasas`ewewewewee`', 'ewewewe', 'asasas`ewewewewee`', 1, 'a', 'a', 'asas', 'a', 1, 1, 1, 'M', 12, 1212, 32, 12, '0.465408', 'Yes', 'Yes', 'Yes', 0, 0, '2021-06-27', 8),
(10, 'kjashkjh', 'jkhkjh', 'kjashkjh', 1, 'jhgkgj', 'ghjghj', 'ghjg', 'hjghj', 76876, 76, 87676, 'S', 8767, 686, 876, 876, '5268.405912', 'Yes', 'Yes', 'Yes', 5, 1, '2021-06-27', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `location`
--

CREATE TABLE `location` (
  `id_location` int(11) NOT NULL,
  `location_code` varchar(100) NOT NULL,
  `location_name` varchar(500) NOT NULL,
  `address` varchar(200) NOT NULL,
  `province` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `location`
--

INSERT INTO `location` (`id_location`, `location_code`, `location_name`, `address`, `province`, `country`, `created_date`, `created_by`) VALUES
(1, 'aa', 'aa', 'aa', 'aa', 'aa', '0000-00-00 00:00:00', 'aa'),
(12, 'bb', 'bb', 'bb', 'bb', 'bb', '0000-00-00 00:00:00', 'bb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `manage_by`
--

CREATE TABLE `manage_by` (
  `id_manage_by` int(11) NOT NULL,
  `manage_by_code` varchar(100) NOT NULL,
  `manage_by_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `manage_by`
--

INSERT INTO `manage_by` (`id_manage_by`, `manage_by_code`, `manage_by_name`) VALUES
(1, '1as', '11aaaaa bab');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `nama_pihak1` varchar(225) NOT NULL,
  `posisi_pihak1` varchar(225) NOT NULL,
  `dept_pihak1` varchar(225) NOT NULL,
  `nama_pihak2` varchar(225) NOT NULL,
  `posisi_pihak2` varchar(225) NOT NULL,
  `dept_pihak2` varchar(225) NOT NULL,
  `lokasi` varchar(225) NOT NULL,
  `id_barang` varchar(225) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_location` int(11) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id_news`, `nama_pihak1`, `posisi_pihak1`, `dept_pihak1`, `nama_pihak2`, `posisi_pihak2`, `dept_pihak2`, `lokasi`, `id_barang`, `tanggal`, `status`, `id_client`, `id_location`, `created_by`) VALUES
(1, 'Rizki', 'IT', 'PT ELSHINTA', 'Annisa', 'MUA', 'PT MEKAR JAYA', 'TANGERANG', '2', '2021-01-01', 0, 0, 0, 8),
(2, 'qw', 'qw', 'qw', 'qw', 'qw', 'qw', 'qw', 'qw', '2021-12-31', 0, 4, 1, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `packing_type`
--

CREATE TABLE `packing_type` (
  `id_packing_type` int(11) NOT NULL,
  `packing_type_code` varchar(200) NOT NULL,
  `packing_type_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `packing_type`
--

INSERT INTO `packing_type` (`id_packing_type`, `packing_type_code`, `packing_type_name`) VALUES
(1, 'asas', 'aa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_bundling`
--

CREATE TABLE `request_bundling` (
  `id_request_bundling` int(11) NOT NULL,
  `request_bundling_barcode` varchar(225) NOT NULL,
  `request_bundling_code` varchar(200) NOT NULL,
  `bundling_type` enum('Bundling from inbound') NOT NULL,
  `id_item_bundling` int(20) NOT NULL,
  `request_quantity` int(11) NOT NULL,
  `id_packing_type` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_location` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `request_bundling`
--

INSERT INTO `request_bundling` (`id_request_bundling`, `request_bundling_barcode`, `request_bundling_code`, `bundling_type`, `id_item_bundling`, `request_quantity`, `id_packing_type`, `id_status`, `id_user`, `id_client`, `id_location`) VALUES
(2, '', '1', 'Bundling from inbound', 5, 1, 1, 4, 6, 0, 0),
(4, 'a', 'a', 'Bundling from inbound', 6, 1, 1, 1, 0, 0, 0),
(5, '', '1', 'Bundling from inbound', 7, 1, 1, 1, 0, 0, 0),
(6, '', 'aa', '', 6, 1, 1, 1, 0, 0, 0),
(7, '', 'aa', 'Bundling from inbound', 6, 1, 1, 1, 0, 0, 0),
(8, '', 'aa', 'Bundling from inbound', 6, 1, 1, 1, 7, 0, 0),
(9, 'ab', 'ab', 'Bundling from inbound', 6, 1, 1, 1, 7, 0, 0),
(11, 'aa', 'aa', 'Bundling from inbound', 6, 1, 1, 4, 8, 4, 1),
(12, 'aaa', 'aaa', 'Bundling from inbound', 7, 1, 1, 1, 8, 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'cancel'),
(4, 'success');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock_allocation`
--

CREATE TABLE `stock_allocation` (
  `id_stock_allocation` int(11) NOT NULL,
  `stock_allocation_code` varchar(100) NOT NULL,
  `stock_allocation_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stock_allocation`
--

INSERT INTO `stock_allocation` (`id_stock_allocation`, `stock_allocation_code`, `stock_allocation_name`) VALUES
(2, 'asd', 'asd'),
(3, 'aaaa', 'aaaa'),
(4, 'ddd', 'ddd'),
(5, 'sss', 'sss');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `department_id` int(11) NOT NULL,
  `created_date` int(11) NOT NULL,
  `created_by` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `fullname`, `username`, `email`, `no_telp`, `password`, `image`, `department_id`, `created_date`, `created_by`) VALUES
(1, 'riris', 'risti', 'risti@gmail.com', '123', '1234', 'default.jpg', 1, 78246782, 'riris'),
(4, 'supervisior', 'supervisior', 'user@gmail.com', '111', '1234', 'default.jpg', 6, 0, ''),
(5, 'Admin Store', 'admin_store', 'admin_st@gmail.com', '12211', '1234', 'default.jpg', 3, 0, ''),
(6, 'admin operational', 'admin_operation', 'admin_op@gmail.com', '1221', '1234', 'default.jpg', 4, 0, ''),
(7, 'client', 'client', 'user@gmail.com', '1', '1234', 'WhatsApp_Image_2021-05-28_at_22_43_25.jpeg', 5, 0, ''),
(8, 'tech', 'tech', 'hcy@gmail.comm', '010111', '1234', 'default.jpg', 1, 0, ''),
(10, 'hod tech', 'hod_tech', 'abc@abc.abc', '121212', '1234', 'default.jpg', 2, 1622796891, 'tech');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id_access` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_submenu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id_access`, `id_level`, `id_menu`, `id_submenu`) VALUES
(1, 1, 6, 19),
(2, 1, 6, 20),
(3, 1, 6, 21),
(56, 1, 1, 1),
(58, 1, 6, 9),
(59, 1, 6, 10),
(60, 1, 6, 11),
(61, 1, 6, 12),
(62, 1, 6, 13),
(63, 1, 6, 14),
(65, 1, 6, 15),
(66, 1, 6, 16),
(67, 1, 2, 4),
(68, 1, 2, 5),
(70, 1, 4, 7),
(71, 1, 4, 8),
(73, 2, 6, 19),
(74, 2, 6, 20),
(75, 2, 6, 21),
(76, 2, 1, 1),
(78, 2, 6, 9),
(79, 2, 6, 10),
(80, 2, 6, 11),
(81, 2, 6, 12),
(82, 2, 6, 13),
(83, 2, 6, 14),
(84, 2, 6, 15),
(85, 2, 6, 16),
(86, 3, 1, 1),
(87, 3, 1, 17),
(88, 3, 2, 4),
(89, 3, 2, 5),
(90, 4, 2, 4),
(91, 4, 2, 5),
(92, 4, 4, 8),
(93, 4, 4, 7),
(94, 5, 2, 3),
(95, 5, 2, 6),
(96, 5, 4, 8),
(97, 5, 4, 7),
(99, 4, 1, 2),
(100, 5, 1, 2),
(101, 2, 2, 4),
(102, 2, 2, 5),
(103, 2, 4, 8),
(104, 2, 4, 7),
(105, 5, 3, 214),
(107, 6, 2, 6),
(108, 6, 4, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `active` int(11) NOT NULL,
  `menu_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id_menu`, `menu`, `url`, `icon`, `active`, `menu_order`) VALUES
(1, 'master data', '#', 'fas fa-database ', 1, 2),
(2, 'bundling', '#', 'fas fa-table', 1, 3),
(3, 'request', 'bundling/request_bundling/request', 'fas fa-fw fa-users', 0, 3),
(4, 'reports', '#', 'fas fa-book', 1, 4),
(5, 'news bundling report', 'reports/news_bundling_report', 'fas fa-fw fa-book', 1, 4),
(6, 'setup', '#', 'fas fa-cogs', 1, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_submenu`
--

CREATE TABLE `user_submenu` (
  `id_submenu` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `submenu` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `active` int(11) NOT NULL,
  `submenu_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_submenu`
--

INSERT INTO `user_submenu` (`id_submenu`, `menu_id`, `submenu`, `url`, `icon`, `active`, `submenu_order`) VALUES
(1, 1, 'item', 'master_data/item', '#', 1, 1),
(2, 1, 'list item', 'master_data/item', '#', 1, 2),
(3, 2, 'list item bundling', 'bundling/item_bundling', '#', 1, 2),
(4, 2, 'item bundling', 'bundling/item_bundling', '#', 1, 1),
(5, 2, 'request bundling', 'bundling/request_bundling', '#', 1, 2),
(6, 2, 'list request bundling', 'bundling/request_bundling', '#', 1, 3),
(7, 4, 'request bundling', 'reports/report_request_bundling', '#', 1, 1),
(8, 4, 'news bundling report', 'reports/news_bundling_report', '#', 1, 2),
(9, 6, 'users', 'setup/user', '#', 1, 1),
(10, 6, 'location', 'setup/location', '#', 1, 2),
(11, 6, 'client', 'setup/client', '#', 1, 3),
(12, 6, 'status', 'setup/status', '#', 1, 4),
(13, 6, 'department', 'setup/department', '#', 1, 8),
(14, 6, 'manage by', 'setup/manage_by', '#', 1, 9),
(15, 6, 'packing type', 'setup/packing_type', '#', 1, 10),
(16, 6, 'stock allocation', 'setup/stock_allocation', '#', 1, 11),
(17, 1, 'client', 'setup/client', '#', 1, 4),
(19, 6, 'menu', 'setup/setting', '#', 1, 98),
(20, 6, 'submenu', 'setup/setting/submenu', '#', 1, 99),
(21, 6, 'menu access', 'setup/setting/menu_access', '#', 1, 100),
(213, 5, 'tidak ada', '#', '#', 1, 1),
(214, 3, 'tidak ada', '#', '#', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indeks untuk tabel `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indeks untuk tabel `item_bundling`
--
ALTER TABLE `item_bundling`
  ADD PRIMARY KEY (`id_item_bundling`);

--
-- Indeks untuk tabel `item_bundling_detail`
--
ALTER TABLE `item_bundling_detail`
  ADD PRIMARY KEY (`id_item_bundling_detail`);

--
-- Indeks untuk tabel `item_nonbundling`
--
ALTER TABLE `item_nonbundling`
  ADD PRIMARY KEY (`id_item_nonbundling`);

--
-- Indeks untuk tabel `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id_location`);

--
-- Indeks untuk tabel `manage_by`
--
ALTER TABLE `manage_by`
  ADD PRIMARY KEY (`id_manage_by`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indeks untuk tabel `packing_type`
--
ALTER TABLE `packing_type`
  ADD PRIMARY KEY (`id_packing_type`);

--
-- Indeks untuk tabel `request_bundling`
--
ALTER TABLE `request_bundling`
  ADD PRIMARY KEY (`id_request_bundling`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `stock_allocation`
--
ALTER TABLE `stock_allocation`
  ADD PRIMARY KEY (`id_stock_allocation`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `department_id` (`department_id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id_access`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `user_submenu`
--
ALTER TABLE `user_submenu`
  ADD PRIMARY KEY (`id_submenu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `item_bundling`
--
ALTER TABLE `item_bundling`
  MODIFY `id_item_bundling` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `item_bundling_detail`
--
ALTER TABLE `item_bundling_detail`
  MODIFY `id_item_bundling_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `item_nonbundling`
--
ALTER TABLE `item_nonbundling`
  MODIFY `id_item_nonbundling` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `location`
--
ALTER TABLE `location`
  MODIFY `id_location` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `manage_by`
--
ALTER TABLE `manage_by`
  MODIFY `id_manage_by` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `packing_type`
--
ALTER TABLE `packing_type`
  MODIFY `id_packing_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `request_bundling`
--
ALTER TABLE `request_bundling`
  MODIFY `id_request_bundling` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `stock_allocation`
--
ALTER TABLE `stock_allocation`
  MODIFY `id_stock_allocation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_submenu`
--
ALTER TABLE `user_submenu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
