-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2026 at 07:08 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservasi_ruangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `ruangan_id` int NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `status` enum('pending','disetujui','ditolak') DEFAULT 'pending',
  `catatan_admin` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `surat_pdf` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id`, `user_id`, `ruangan_id`, `tanggal`, `jam_mulai`, `jam_selesai`, `kegiatan`, `status`, `catatan_admin`, `created_at`, `surat_pdf`) VALUES
(1, 3, 1, '2026-06-04', '07:40:00', '17:40:00', 'Seminar', 'disetujui', NULL, '2026-05-31 19:36:46', NULL),
(2, 2, 2, '2026-06-13', '07:50:00', '17:50:00', 'Seminar', 'disetujui', NULL, '2026-05-31 19:50:32', NULL),
(3, 1, 1, '2026-06-05', '07:00:00', '10:59:00', 'Kelas Pengganti', 'disetujui', NULL, '2026-05-31 21:14:30', NULL),
(4, 1, 3, '2026-06-11', '04:17:00', '07:17:00', 'Nginep', 'disetujui', NULL, '2026-05-31 21:17:39', NULL),
(5, 1, 2, '2026-06-02', '04:23:00', '07:23:00', 'Seminar', 'disetujui', NULL, '2026-05-31 21:23:56', '1780262636_2560-9240-1-PB.pdf'),
(6, 1, 1, '2026-06-17', '04:24:00', '06:24:00', 'Les', 'ditolak', NULL, '2026-05-31 21:25:08', '1780262708_Analisis+IT+Service+Management+(ITSM)+Pada+Layanan+Administrasi+Mahasiswa+STIPER+Sriwigama+Menggunakan+Framewok+ITIL+V3.pdf'),
(7, 1, 1, '2026-06-01', '04:57:00', '16:57:00', 'apapun', 'disetujui', NULL, '2026-05-31 21:57:54', '1780264674_Tugas 14. HKI bidang IoT.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id` int NOT NULL,
  `nama_ruangan` varchar(100) NOT NULL,
  `gedung` varchar(100) NOT NULL,
  `kapasitas` int NOT NULL,
  `fasilitas` text,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id`, `nama_ruangan`, `gedung`, `kapasitas`, `fasilitas`, `status`, `created_at`) VALUES
(1, 'Lab Komputer 1', 'Gedung A', 40, '40 PC, Proyektor, AC', 'aktif', '2026-05-31 18:30:19'),
(2, 'Ruang Seminar', 'Gedung B', 100, 'Proyektor, Sound System, AC', 'aktif', '2026-05-31 18:30:19'),
(3, 'Ruang Kelas TI-01', 'Gedung C', 35, 'Proyektor, Whiteboard', 'aktif', '2026-05-31 18:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','dosen','mahasiswa') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Administrator', 'admin@kampus.ac.id', '$2y$10$tKQRSFJgtzGpx7DWlGe9C.bQX2WowtuawPlGKvvEAZ3UqemNYfYCe', 'admin', '2026-05-31 18:30:19'),
(2, 'Dosen TI', 'dosen@kampus.ac.id', '$2y$10$tKQRSFJgtzGpx7DWlGe9C.bQX2WowtuawPlGKvvEAZ3UqemNYfYCe', 'dosen', '2026-05-31 19:16:38'),
(3, 'Mahasiswa TI', 'mahasiswa@kampus.ac.id', '$2y$10$tKQRSFJgtzGpx7DWlGe9C.bQX2WowtuawPlGKvvEAZ3UqemNYfYCe', 'mahasiswa', '2026-05-31 19:16:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reservasi_user` (`user_id`),
  ADD KEY `fk_reservasi_ruangan` (`ruangan_id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `fk_reservasi_ruangan` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_reservasi_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
