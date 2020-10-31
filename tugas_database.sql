-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Okt 2020 pada 12.31
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_database`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ambil_matkul`
--

CREATE TABLE `ambil_matkul` (
  `idMataKuliah` int(2) NOT NULL,
  `idFrs` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ambil_matkul`
--

INSERT INTO `ambil_matkul` (`idMataKuliah`, `idFrs`) VALUES
(1, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `idDosen` int(2) NOT NULL,
  `NIDN` varchar(20) NOT NULL,
  `namaDosen` varchar(50) NOT NULL,
  `idProdi` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`idDosen`, `NIDN`, `namaDosen`, `idProdi`) VALUES
(2, '11010103', 'saipul', 4),
(3, '90900', 'Arcana Knight Joker', 1),
(4, '2112312312', 'mang oleh', 1),
(5, '19233021', 'raihan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `frs`
--

CREATE TABLE `frs` (
  `idFrs` int(2) NOT NULL,
  `NIM` varchar(10) NOT NULL,
  `semester` int(2) NOT NULL,
  `persetujuanDosen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `frs`
--

INSERT INTO `frs` (`idFrs`, `NIM`, `semester`, `persetujuanDosen`) VALUES
(1, '11181061', 1, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses` varchar(20) NOT NULL,
  `id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`username`, `password`, `hak_akses`, `id`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '0'),
('dosen1', 'f499263a253447dd5cb68dafb9f13235', 'dosen', '2'),
('raihan', 'daa6b8d04ce72d953d5501adc53ddd82', 'mahasiswa', '11181061');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` varchar(10) NOT NULL,
  `namaMahasiswa` varchar(50) NOT NULL,
  `idProdi` int(2) NOT NULL,
  `idDosen` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `namaMahasiswa`, `idProdi`, `idDosen`) VALUES
('02901910', 'odading', 6, 2),
('11111111', 'Raihan', 8, 4),
('11181001', 'Asril', 1, 2),
('11181031', 'Astri Wijayanti', 1, 2),
('11181051', 'M Reinaldy Hermawan', 1, 2),
('11181060', 'M Nabil Akbar Pratama', 1, 2),
('11181061', 'Muhammad Raihan Rahman', 1, 2),
('11181065', 'Muhhadi Adi Manyu', 1, 2),
('15181055', 'irfan', 4, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `idMataKuliah` int(11) NOT NULL,
  `namaMataKuliah` varchar(30) NOT NULL,
  `idDosen` int(2) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`idMataKuliah`, `namaMataKuliah`, `idDosen`, `sks`) VALUES
(1, 'Nulis Biner 2', 2, 3),
(3, 'Fusion', 4, 4),
(4, 'hacker', 4, 19),
(5, 'program lanjutan', 5, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliahmahasiswa`
--

CREATE TABLE `matakuliahmahasiswa` (
  `idMataKuliahMahasiswa` int(11) NOT NULL,
  `NIM` int(11) NOT NULL,
  `idMataKuliah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `matakuliahmahasiswa`
--

INSERT INTO `matakuliahmahasiswa` (`idMataKuliahMahasiswa`, `NIM`, `idMataKuliah`) VALUES
(3, 11181001, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `idProdi` int(2) NOT NULL,
  `namaProdi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`idProdi`, `namaProdi`) VALUES
(1, 'Informatika'),
(4, 'arsitektur'),
(6, 'matematika'),
(7, 'Sistem Informasi'),
(8, 'fisika'),
(9, 'Teknik Mesin'),
(10, 'Teknik Elektro'),
(11, 'Teknik Kimia'),
(12, 'Teknik Material dan '),
(13, 'Teknik Sipil'),
(14, 'Perencanaan Wilayah '),
(15, 'Teknik Kapal'),
(16, 'Teknik Industri'),
(17, 'Teknik Lingkungan'),
(18, 'Teknik Kelautan'),
(19, 'Aktuaria'),
(20, 'Statistik');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ambil_matkul`
--
ALTER TABLE `ambil_matkul`
  ADD UNIQUE KEY `idMataKuliah` (`idMataKuliah`,`idFrs`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`idDosen`),
  ADD KEY `dosen_ibfk_1` (`idProdi`);

--
-- Indeks untuk tabel `frs`
--
ALTER TABLE `frs`
  ADD PRIMARY KEY (`idFrs`),
  ADD UNIQUE KEY `nim` (`NIM`,`semester`) USING BTREE;

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`),
  ADD KEY `prodi` (`idProdi`),
  ADD KEY `idDosen` (`idDosen`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`idMataKuliah`);

--
-- Indeks untuk tabel `matakuliahmahasiswa`
--
ALTER TABLE `matakuliahmahasiswa`
  ADD PRIMARY KEY (`idMataKuliahMahasiswa`),
  ADD KEY `NIM` (`NIM`),
  ADD KEY `idMataKuliahDosen` (`idMataKuliah`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`idProdi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `idDosen` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `frs`
--
ALTER TABLE `frs`
  MODIFY `idFrs` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `idMataKuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `matakuliahmahasiswa`
--
ALTER TABLE `matakuliahmahasiswa`
  MODIFY `idMataKuliahMahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `idProdi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`idProdi`) REFERENCES `prodi` (`idProdi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`idProdi`) REFERENCES `prodi` (`idProdi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`idDosen`) REFERENCES `dosen` (`idDosen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
