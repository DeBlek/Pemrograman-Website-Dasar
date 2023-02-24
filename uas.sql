-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2021 pada 09.45
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbladmin`
--

CREATE TABLE `tbladmin` (
  `Nama_Admin` varchar(100) NOT NULL,
  `Email_Admin` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbladmin`
--

INSERT INTO `tbladmin` (`Nama_Admin`, `Email_Admin`, `Password`) VALUES
('Jericho', 'Jerichoo.chen@gmail.com', '12345'),
('rico', 'rico@gmail.com', '123'),
('Welly', 'wellycen@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblbarang`
--

CREATE TABLE `tblbarang` (
  `Id_Brng` int(8) NOT NULL,
  `Nama_Brng` varchar(250) NOT NULL,
  `Stock_Brng` int(255) NOT NULL,
  `Harga_Brng` int(100) NOT NULL,
  `Foto_Brng` varchar(50) NOT NULL,
  `Deskripsi_Brng` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblbarang`
--

INSERT INTO `tblbarang` (`Id_Brng`, `Nama_Brng`, `Stock_Brng`, `Harga_Brng`, `Foto_Brng`, `Deskripsi_Brng`) VALUES
(1, 'Anting Salib Titanium Hitam', 12, 25000, 'brg-1623221942.jpg', 'Anting Salib Titanium'),
(2, 'Anting Salib Titanium Silver', 12, 25000, 'brg-1623221984.jpg', 'Anting Salib Titanium'),
(3, 'Kalung Titanium Permata', 12, 30000, 'brg-1623222042.jpeg', 'Kalung Dengan Permata Langka'),
(4, 'Anting Magnet Titanium ', 12, 10000, 'brg-1623222088.jpg', 'Anting Magnet Titanium Jepit'),
(5, 'Cincin Titanium Silver', 12, 10000, 'brg-1623222131.jpg', 'Cincin Titanium Silver Mengkilat'),
(6, 'Cincin Titanium Hitam', 12, 10000, 'brg-1623222179.jpg', 'Cincin Titanium Hitam Mengkilat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblcart`
--

CREATE TABLE `tblcart` (
  `Email_Plngn` varchar(255) NOT NULL,
  `Id_Brng` int(8) NOT NULL,
  `Pajak` int(4) NOT NULL,
  `Quantity` int(4) NOT NULL,
  `Subtotal` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblcart`
--

INSERT INTO `tblcart` (`Email_Plngn`, `Id_Brng`, `Pajak`, `Quantity`, `Subtotal`) VALUES
('tutul@gmail.com', 1, 5, 2, 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblcheckout`
--

CREATE TABLE `tblcheckout` (
  `Id_Pembelian` int(10) NOT NULL,
  `Email_Plngn` varchar(250) NOT NULL,
  `Progress` varchar(100) NOT NULL,
  `Tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblcheckout`
--

INSERT INTO `tblcheckout` (`Id_Pembelian`, `Email_Plngn`, `Progress`, `Tanggal`) VALUES
(4, 'tutul@gmail.com', 'Pending', '2021-06-09 07:37:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `Email_Plgn` varchar(250) NOT NULL,
  `Pesan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblpelanggan`
--

CREATE TABLE `tblpelanggan` (
  `Nama_Plngn` varchar(250) NOT NULL,
  `Email_Plngn` varchar(250) NOT NULL,
  `Password_Plngn` varchar(200) NOT NULL,
  `JK_Plngn` varchar(100) NOT NULL,
  `TL_Plngn` date NOT NULL,
  `NoTlpn_Plngn` int(100) NOT NULL,
  `Alamat_Plngn` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblpelanggan`
--

INSERT INTO `tblpelanggan` (`Nama_Plngn`, `Email_Plngn`, `Password_Plngn`, `JK_Plngn`, `TL_Plngn`, `NoTlpn_Plngn`, `Alamat_Plngn`) VALUES
('tutul', 'tutul@gmail.com', '123', 'pria', '2021-06-07', 123456789, 'Sintang');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`Email_Admin`),
  ADD UNIQUE KEY `Password` (`Password`);

--
-- Indeks untuk tabel `tblbarang`
--
ALTER TABLE `tblbarang`
  ADD PRIMARY KEY (`Id_Brng`),
  ADD UNIQUE KEY `Nama_Brng` (`Nama_Brng`,`Stock_Brng`,`Harga_Brng`,`Deskripsi_Brng`) USING HASH;

--
-- Indeks untuk tabel `tblcart`
--
ALTER TABLE `tblcart`
  ADD KEY `Email_Plngn` (`Email_Plngn`),
  ADD KEY `Id_Brng` (`Id_Brng`);

--
-- Indeks untuk tabel `tblcheckout`
--
ALTER TABLE `tblcheckout`
  ADD PRIMARY KEY (`Id_Pembelian`),
  ADD KEY `Pelanggan` (`Email_Plngn`);

--
-- Indeks untuk tabel `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD KEY `ContactUs_Pelanggan` (`Email_Plgn`);

--
-- Indeks untuk tabel `tblpelanggan`
--
ALTER TABLE `tblpelanggan`
  ADD PRIMARY KEY (`Email_Plngn`),
  ADD UNIQUE KEY `Password_Plngn` (`Password_Plngn`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tblcheckout`
--
ALTER TABLE `tblcheckout`
  MODIFY `Id_Pembelian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tblcart`
--
ALTER TABLE `tblcart`
  ADD CONSTRAINT `Email_Plngn` FOREIGN KEY (`Email_Plngn`) REFERENCES `tblpelanggan` (`Email_Plngn`),
  ADD CONSTRAINT `Id_Brng` FOREIGN KEY (`Id_Brng`) REFERENCES `tblbarang` (`Id_Brng`);

--
-- Ketidakleluasaan untuk tabel `tblcheckout`
--
ALTER TABLE `tblcheckout`
  ADD CONSTRAINT `Pelanggan` FOREIGN KEY (`Email_Plngn`) REFERENCES `tblpelanggan` (`Email_Plngn`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD CONSTRAINT `ContactUs_Pelanggan` FOREIGN KEY (`Email_Plgn`) REFERENCES `tblpelanggan` (`Email_Plngn`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
