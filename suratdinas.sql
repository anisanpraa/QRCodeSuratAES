-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Feb 2023 pada 16.59
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suratdinas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `skpd`
--

CREATE TABLE `skpd` (
  `skpd_id` varchar(30) NOT NULL,
  `skpd_nama` varchar(50) NOT NULL,
  `skpd_tlp` varchar(15) NOT NULL,
  `skpd_email` varchar(50) NOT NULL,
  `skpd_alamat` text NOT NULL,
  `skpd_pimpinan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `skpd`
--

INSERT INTO `skpd` (`skpd_id`, `skpd_nama`, `skpd_tlp`, `skpd_email`, `skpd_alamat`, `skpd_pimpinan`) VALUES
('BPBD', 'BADAN PENANGGULANGAN BENCANA DAERAH KABUPATEN KUNI', '0232876233', 'bpbdkab.kuningan@yahoo.co.id', 'Jalan Jendral Sudirman No.80 Kuningan, Kab.Kuningan', 'INDRA BAYU PERMANA, S.STP'),
('DISDIKBUD', 'Dinas Pendidikan dan Kebudayaan', '0829731232', 'info@disdikbud.kuningankab.go.id', 'Sukamulya', 'Uca'),
('DISKOMINFO', 'Dinas Komunikasi dan Informatika', '0214748364', 'diskominfo@kuningankab.go.id', 'Jalan Arujikartawinata No.15 Kuningan 45511', 'Dr. WAHYU HIDAYAH, S.Hut., M.Si.'),
('SETDA', 'Sekretariat Daerah', '0232871045', '', 'Jalan Siliwangi No.88 Kuningan', 'Dr. H. DIAN RACHMAT YANUAR, M.Si');

-- --------------------------------------------------------

--
-- Struktur dari tabel `staftu`
--

CREATE TABLE `staftu` (
  `tu_id` varchar(30) NOT NULL,
  `tu_foto` varchar(50) NOT NULL,
  `tu_nama` varchar(50) NOT NULL,
  `tu_email` varchar(50) NOT NULL,
  `tu_nohp` varchar(15) NOT NULL,
  `tu_username` varchar(30) NOT NULL,
  `tu_password` varchar(30) NOT NULL,
  `pass_token` varchar(500) DEFAULT NULL,
  `pass_token_exp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `staftu`
--

INSERT INTO `staftu` (`tu_id`, `tu_foto`, `tu_nama`, `tu_email`, `tu_nohp`, `tu_username`, `tu_password`, `pass_token`, `pass_token_exp`) VALUES
('TU_SETDAKNG', '08092022082129-avatar-1.png', 'Annisa Cica', 'annisanurulpratiwi07@gmail.com', '08228997699', 'anpcica99', 'Cicacica99', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `staf_pelaksana`
--

CREATE TABLE `staf_pelaksana` (
  `pls_id` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `skpd_id` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `pls_nama` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `pls_email` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `pls_nohp` varchar(15) CHARACTER SET utf8mb4 NOT NULL,
  `pls_username` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `pls_password` text CHARACTER SET utf8mb4 NOT NULL,
  `token_pass` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `token_exp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `staf_pelaksana`
--

INSERT INTO `staf_pelaksana` (`pls_id`, `skpd_id`, `pls_nama`, `pls_email`, `pls_nohp`, `pls_username`, `pls_password`, `token_pass`, `token_exp`) VALUES
('PS001', 'DISKOMINFO', 'Annisa Nurul Pratiwi', 'annisanurulpratiwi07@gmail.com', '082215564771', 'cicanisa99', 'Cica99', '672677cc579ea1abdf0976e2444c9c89', '2022-12-20 20:52:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id_surat` varchar(30) NOT NULL,
  `surat_nomor` text NOT NULL,
  `unit_id` varchar(30) NOT NULL,
  `surat_perihal` text NOT NULL,
  `surat_tgl_buat` date NOT NULL,
  `surat_ttd_pejabat` varchar(50) NOT NULL,
  `qrcode` varchar(30) NOT NULL,
  `enkrip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`id_surat`, `surat_nomor`, `unit_id`, `surat_perihal`, `surat_tgl_buat`, `surat_ttd_pejabat`, `qrcode`, `enkrip`) VALUES
('SR001', '100/1306/Kesra', 'SETHUKUM', 'Hukum', '2022-09-20', 'Annisa Nurul Pratiwi', 'SR001-23112022.png', 'c9314ec114c8ed75143a0d2dbf0fb187'),
('SR002', '100/1306/Umum', 'SETHUKUM', 'Umum', '2022-09-19', 'Annisa', 'SR002-23112022.png', '174bd5fed54790d13969a34c4b49b780'),
('SR003', '003.1/1748/Prokompim', 'PROKOMPIM', 'Pedoman Peringatan HUT Kemerdekan RI ke-77', '2022-07-25', 'Acep Purnama', 'SR003-23092022.png', '9de170a4a9fea5558d39d42acad14af5d367f844ad292faf3248329b4fb11c98');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `unit_id` varchar(30) NOT NULL,
  `skpd_id` varchar(30) NOT NULL,
  `unit_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unit_kerja`
--

INSERT INTO `unit_kerja` (`unit_id`, `skpd_id`, `unit_nama`) VALUES
('PERKEU', 'SETDA', 'Bagian Perencanaan dan Keungan'),
('PROKOMPIM', 'SETDA', 'Bagian Protokol dan Komunikasi Pimpinan'),
('SETHUKUM', 'SETDA', 'Bagian Hukum');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `skpd`
--
ALTER TABLE `skpd`
  ADD PRIMARY KEY (`skpd_id`);

--
-- Indeks untuk tabel `staftu`
--
ALTER TABLE `staftu`
  ADD PRIMARY KEY (`tu_id`);

--
-- Indeks untuk tabel `staf_pelaksana`
--
ALTER TABLE `staf_pelaksana`
  ADD PRIMARY KEY (`pls_id`),
  ADD KEY `skpd_id_pls` (`skpd_id`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indeks untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`unit_id`),
  ADD KEY `skpd_id` (`skpd_id`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `staf_pelaksana`
--
ALTER TABLE `staf_pelaksana`
  ADD CONSTRAINT `skpd_id_pls` FOREIGN KEY (`skpd_id`) REFERENCES `skpd` (`skpd_id`);

--
-- Ketidakleluasaan untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `unit_id` FOREIGN KEY (`unit_id`) REFERENCES `unit_kerja` (`unit_id`);

--
-- Ketidakleluasaan untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD CONSTRAINT `skpd_id` FOREIGN KEY (`skpd_id`) REFERENCES `skpd` (`skpd_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
