-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Bulan Mei 2021 pada 07.22
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
  `id_bundling` int(11) NOT NULL,
  `manage_by` varchar(155) NOT NULL,
  `bundling_code` varchar(225) NOT NULL,
  `bundling_name` varchar(225) NOT NULL,
  `detail_informasi` text NOT NULL,
  `quantity` int(100) NOT NULL,
  `form` varchar(225) NOT NULL,
  `item_code` varchar(225) NOT NULL,
  `barcode` varchar(225) NOT NULL,
  `created_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `item_bundling`
--

INSERT INTO `item_bundling` (`id_bundling`, `manage_by`, `bundling_code`, `bundling_name`, `detail_informasi`, `quantity`, `form`, `item_code`, `barcode`, `created_date`) VALUES
(1, 'fgf', 'hgf', 'hgf', 'hgf', 0, 'hgf', 'hgf', 'hgf', 1622347888);

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_satuan`
--

CREATE TABLE `item_satuan` (
  `id_item` int(11) NOT NULL,
  `manage_by` varchar(225) NOT NULL,
  `item_code` varchar(225) NOT NULL,
  `barcode` varchar(225) NOT NULL,
  `item_name` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `brand` varchar(225) NOT NULL,
  `category` varchar(225) NOT NULL,
  `model` varchar(225) NOT NULL,
  `color` varchar(100) NOT NULL,
  `minimum_stock` int(11) NOT NULL,
  `publish_price` int(11) NOT NULL,
  `addtional_expired` date NOT NULL,
  `size` int(11) NOT NULL,
  `lenght` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `dimension` int(11) NOT NULL,
  `pilihan` varchar(10) NOT NULL,
  `is_fragile` int(11) NOT NULL,
  `active` varchar(10) NOT NULL,
  `cool_storage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `item_satuan`
--

INSERT INTO `item_satuan` (`id_item`, `manage_by`, `item_code`, `barcode`, `item_name`, `description`, `brand`, `category`, `model`, `color`, `minimum_stock`, `publish_price`, `addtional_expired`, `size`, `lenght`, `width`, `height`, `weight`, `dimension`, `pilihan`, `is_fragile`, `active`, `cool_storage`) VALUES
(1, 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', '', 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 'b', 0, 'b', 'b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_item`
--

CREATE TABLE `request_item` (
  `id_request` int(11) NOT NULL,
  `work_order_code` varchar(155) NOT NULL,
  `bundling_type` varchar(155) NOT NULL,
  `request_quantity` int(11) NOT NULL,
  `packing_type` varchar(155) NOT NULL,
  `detail_informasi` text NOT NULL,
  `type` varchar(155) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `view` varchar(155) NOT NULL,
  `item_bundling_code` varchar(255) NOT NULL,
  `iitem_bundling_name` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `request_bundling` varchar(100) NOT NULL,
  `process` varchar(100) NOT NULL,
  `finish` varchar(100) NOT NULL,
  `request_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'riris', 'risti', 'risti1@gmail.com', '784356347', '1234', 'default.png', 1, 78246782, 'riris'),
(4, 'supervisior', 'supervisior', '', '', '1234', '', 6, 0, ''),
(5, 'Admin Store', 'admin_store', 'admin_st@gmail.com', '12211', '1234', '', 3, 0, ''),
(6, 'admin operational', 'admin_operation', 'admin_op@gmail.com', '1221', '1234', '', 4, 0, ''),
(7, 'client', 'client', '', '', '1234', '', 5, 0, ''),
(8, 'tech', 'tech', '', '', '1234', '', 1, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indeks untuk tabel `item_bundling`
--
ALTER TABLE `item_bundling`
  ADD PRIMARY KEY (`id_bundling`);

--
-- Indeks untuk tabel `item_satuan`
--
ALTER TABLE `item_satuan`
  ADD PRIMARY KEY (`id_item`);

--
-- Indeks untuk tabel `request_item`
--
ALTER TABLE `request_item`
  ADD PRIMARY KEY (`id_request`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `department_id` (`department_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `item_bundling`
--
ALTER TABLE `item_bundling`
  MODIFY `id_bundling` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `item_satuan`
--
ALTER TABLE `item_satuan`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `request_item`
--
ALTER TABLE `request_item`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
