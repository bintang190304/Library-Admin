-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Des 2022 pada 08.49
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `idbooking` int(11) NOT NULL,
  `idbuku` int(11) NOT NULL,
  `idmember` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`idbooking`, `idbuku`, `idmember`, `tgl_pinjam`) VALUES
(6, 4, 2, '2022-10-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `idbuku` int(11) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `pengarang` varchar(128) NOT NULL,
  `penerbit` varchar(128) NOT NULL,
  `deskripsi` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`idbuku`, `idkategori`, `judul`, `pengarang`, `penerbit`, `deskripsi`) VALUES
(1, 1, 'Wangsit Soshum', 'Om Jero', 'Wangsit', 'Ringkasan materi UTBK Asli dan lengkap'),
(2, 2, 'Fiqih Wanita', 'Syaikh Kamil M.', 'Al Kautsar', 'Pembahasan secara hukum tentang wanita '),
(3, 1, 'Wangsit Saintek', 'Om Jero', 'Wangsit', 'Ringkasan materi UTBK Asli dan lengkap'),
(4, 3, 'Bumi', 'Tere Liye', 'Gramedia', 'Bumi adalah novel karya Tere Liye.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_buku`
--

CREATE TABLE `detail_buku` (
  `iddetailbuku` int(11) NOT NULL,
  `idbuku` int(11) NOT NULL,
  `status` enum('Dipinjam','Ada','Booking') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_buku`
--

INSERT INTO `detail_buku` (`iddetailbuku`, `idbuku`, `status`) VALUES
(1, 1, 'Ada'),
(2, 2, 'Dipinjam'),
(3, 3, 'Ada'),
(4, 4, 'Booking');

--
-- Trigger `detail_buku`
--
DELIMITER $$
CREATE TRIGGER `hapus_buku` AFTER DELETE ON `detail_buku` FOR EACH ROW BEGIN DELETE FROM buku WHERE idbuku = OLD.idbuku; END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `iddetailpeminjaman` int(11) NOT NULL,
  `idpeminjaman` int(11) NOT NULL,
  `iddetailbuku` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`iddetailpeminjaman`, `idpeminjaman`, `iddetailbuku`, `tgl_kembali`) VALUES
(1, 1, 2, '2022-03-06'),
(2, 3, 2, '2022-03-08'),
(3, 2, 4, '2022-03-08'),
(5, 5, 1, '2022-03-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`idkategori`, `kategori`) VALUES
(1, 'Pelajaran'),
(2, 'Religi'),
(3, 'Novel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `idmember` int(11) NOT NULL,
  `nama_member` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `password` varchar(200) NOT NULL,
  `alamat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`idmember`, `nama_member`, `tempat_lahir`, `tgl_lahir`, `password`, `alamat`) VALUES
(2, 'Rangga', 'Semarang', '2003-02-09', '', 'Jalan Jembatan No. 12'),
(4, 'Amanda', 'Bekasi', '2005-06-05', '', 'Jalan Swadaya No. 7'),
(6, 'Bintang', 'Jakarta', '2004-03-19', '', 'Jalan Rawa Bebek'),
(7, 'Syarif', 'Surabaya', '2003-03-10', '', 'Jalan Kesaktian No. 5'),
(13, 'Salwa', 'Jakarta', '2003-02-01', '123', 'Jalan'),
(14, 'Wira', 'Jakarta', '1111-01-01', '123', 'Jalan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `idpeminjaman` int(11) NOT NULL,
  `idbuku` int(11) NOT NULL,
  `idpetugas` int(11) NOT NULL,
  `idmember` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`idpeminjaman`, `idbuku`, `idpetugas`, `idmember`, `tgl_pinjam`) VALUES
(1, 2, 4, 4, '2022-03-06'),
(2, 4, 7, 6, '2022-03-07'),
(3, 2, 7, 4, '2022-03-07'),
(5, 1, 6, 7, '2022-03-08'),
(6, 2, 6, 14, '2022-03-08');

--
-- Trigger `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `hapusbooking` AFTER INSERT ON `peminjaman` FOR EACH ROW BEGIN DELETE FROM booking WHERE idmember = NEW.idmember; END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `idpetugas` int(11) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`idpetugas`, `nama_petugas`, `username`, `password`) VALUES
(1, 'Bintang', 'Admin123', '123'),
(2, 'bintang', 'ss', '$2y$10$1pVYoCELpoW.tgo3FFTdHej0yrKVt7zKxmy8j7Suqthi5dBEh6Teu'),
(3, 'bintang', 'admin', '$2y$10$u5j8w2Xf9Qos8StrGVoN7uXoCNPobpf8BErZtGjk77O3/OcW8L3J6'),
(4, 'Hafiz', 'Admin Hafiz', '123'),
(5, 'bintang', 'admin bintang', '$2y$10$WZvHCkFrPYJ8W3yc/dQwMOCESj0geYTTskgk.rK8B/Vu1sJIQuE0C'),
(6, 'lintang', 'admin lintang', '$2y$10$DwrpqNL6/1uqDip2A/VGF.8fTblyjv7w6ZW/kyhSoA2d6m51QxxPq'),
(7, 'chandra', 'admin chandra', '$2y$10$Pv9HAGFKtPnqvkAq8gmgzOHHqm5jB/V7bdAqwbVTemye0p6URfqUe'),
(8, 'ucok', 'admin ucok', '$2y$10$thL8hEbQ4HQOhC2xnMEWheUSuQRpyyKb2cWPq/JGv5DDxTwmi18qi'),
(9, 'muhammad', 'admin3', '$2y$10$X4o8jmukblkvhOjpO5OdoOOaFL95gkPLNBS5TmmNTtw257aLSNqny'),
(10, 'yenni', 'yn', '$2y$10$VQlEuvyJJ52iGUVayCdrJ.YPs05oFBqq1JIs4WGJLbIeO9TTm7VQq'),
(11, 'aizul hasanah', 'aizul', '$2y$10$TMhMo4o7T8WWr6iddEIcrOS3q3T3d4DqHoNnUH9x6B639/KFakpDK'),
(12, 'bintang', 'bintang71', '$2y$10$MJH4k4LnYQayvPo9PdMCeud4SPczaEyVQss6rmufnA9UHAuNDXJ/a'),
(13, 'naila zahirah', 'naila', '$2y$10$ol.jfCIGghIkMsGj/FccMOCz/UF8XtShJDw1rMYGZkIccrqgyLZiC');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`idbooking`),
  ADD KEY `idbuku` (`idbuku`),
  ADD KEY `idmember` (`idmember`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`idbuku`),
  ADD KEY `idkategori` (`idkategori`);

--
-- Indeks untuk tabel `detail_buku`
--
ALTER TABLE `detail_buku`
  ADD PRIMARY KEY (`iddetailbuku`),
  ADD KEY `idbuku` (`idbuku`);

--
-- Indeks untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`iddetailpeminjaman`),
  ADD KEY `iddetailbuku` (`iddetailbuku`),
  ADD KEY `idpeminjaman` (`idpeminjaman`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idmember`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`idpeminjaman`),
  ADD KEY `idmember` (`idmember`),
  ADD KEY `idpetugas` (`idpetugas`),
  ADD KEY `idbuku` (`idbuku`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`idpetugas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `idbooking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `idbuku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `detail_buku`
--
ALTER TABLE `detail_buku`
  MODIFY `iddetailbuku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `iddetailpeminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `idmember` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `idpeminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `idpetugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`idbuku`) REFERENCES `buku` (`idbuku`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`idmember`) REFERENCES `member` (`idmember`);

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`idkategori`) REFERENCES `detail_buku` (`iddetailbuku`);

--
-- Ketidakleluasaan untuk tabel `detail_buku`
--
ALTER TABLE `detail_buku`
  ADD CONSTRAINT `detail_buku_ibfk_1` FOREIGN KEY (`idbuku`) REFERENCES `buku` (`idbuku`);

--
-- Ketidakleluasaan untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `detail_peminjaman_ibfk_3` FOREIGN KEY (`iddetailbuku`) REFERENCES `detail_buku` (`iddetailbuku`),
  ADD CONSTRAINT `detail_peminjaman_ibfk_4` FOREIGN KEY (`idpeminjaman`) REFERENCES `peminjaman` (`idpeminjaman`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`idmember`) REFERENCES `member` (`idmember`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`idpetugas`) REFERENCES `petugas` (`idpetugas`),
  ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`idbuku`) REFERENCES `buku` (`idbuku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
