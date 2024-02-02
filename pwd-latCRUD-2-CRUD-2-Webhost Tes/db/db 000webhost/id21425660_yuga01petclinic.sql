-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 16 Jan 2024 pada 15.09
-- Versi server: 10.5.20-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21425660_yuga01petclinic`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `doctor_220057`
--

CREATE TABLE `doctor_220057` (
  `doctor_id_220057` int(11) NOT NULL,
  `doctor_name_220057` varchar(50) NOT NULL,
  `doctor_gender_220057` varchar(6) NOT NULL,
  `doctor_address_220057` varchar(100) NOT NULL,
  `doctor_phone_220057` varchar(15) NOT NULL,
  `doctor_photo_220057` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `doctor_220057`
--

INSERT INTO `doctor_220057` (`doctor_id_220057`, `doctor_name_220057`, `doctor_gender_220057`, `doctor_address_220057`, `doctor_phone_220057`, `doctor_photo_220057`) VALUES
(1, 'udin sabarudin', 'male', 'jl manokwaru 56', '023649237', 'dog.png'),
(2, 'lisa', 'female', 'jl sekar sari no 67', '089345777123', 'Microsoft logo, Windows XP Logo Microsoft Windows 1_0, windows logos, angle, orange png.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `medicals_220057`
--

CREATE TABLE `medicals_220057` (
  `mr_id_220057` int(10) NOT NULL,
  `mr_date_220057` timestamp NOT NULL DEFAULT current_timestamp(),
  `pet_id_220057` int(10) NOT NULL,
  `doctor_id_220057` int(10) NOT NULL,
  `symptom_220057` varchar(255) NOT NULL,
  `diagnose_220057` varchar(255) NOT NULL,
  `treatment_220057` varchar(255) NOT NULL,
  `cost_220057` bigint(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `medicals_220057`
--

INSERT INTO `medicals_220057` (`mr_id_220057`, `mr_date_220057`, `pet_id_220057`, `doctor_id_220057`, `symptom_220057`, `diagnose_220057`, `treatment_220057`, `cost_220057`) VALUES
(1, '2023-11-26 13:39:09', 2, 1, 'nafsu makan', 'perilaku hewan', 'makan yang banyak', 25000),
(2, '2023-12-17 04:13:42', 3, 2, 'asdagdcv', 'cbedcsa', 'adgtjuy', 12345);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pet_220057`
--

CREATE TABLE `pet_220057` (
  `pet_id_220057` int(11) NOT NULL,
  `pet_name_220057` varchar(50) NOT NULL,
  `pet_type_220057` varchar(30) NOT NULL,
  `pet_gender_220057` varchar(6) NOT NULL,
  `pet_age_220057` int(2) NOT NULL,
  `pet_food_220057` varchar(20) NOT NULL,
  `pet_owner_220057` varchar(50) NOT NULL,
  `pet_address_220057` varchar(100) NOT NULL,
  `pet_phone_220057` varchar(15) NOT NULL,
  `pet_photo_220057` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `pet_220057`
--

INSERT INTO `pet_220057` (`pet_id_220057`, `pet_name_220057`, `pet_type_220057`, `pet_gender_220057`, `pet_age_220057`, `pet_food_220057`, `pet_owner_220057`, `pet_address_220057`, `pet_phone_220057`, `pet_photo_220057`) VALUES
(2, 'dudu', 'dog', 'male', 3, '', 'dodi', 'jl mekar no 90', '83195004459', 'default.png'),
(3, 'moli', 'cat', 'male', 4, '', 'bubun', 'jl indahsari no 11', '+62895323228785', 'default.png'),
(4, 'lisa', 'bird', 'female', 2, '', 'siti', 'jl indah no 45', '895323228785', 'default.png'),
(5, 'husky', 'dog', 'male', 6, '', 'deden', 'jl sudirman no 98', '083195004459', 'default.png'),
(8, 'Susi Markisa', 'cat', 'male', 1, 'wet', 'eee', 'jlll', '098712345', 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_220057`
--

CREATE TABLE `user_220057` (
  `user_id_220057` int(11) NOT NULL,
  `username_220057` varchar(100) NOT NULL,
  `password_220057` varchar(255) NOT NULL,
  `usertype_220057` varchar(10) NOT NULL,
  `fullname_220057` varchar(100) NOT NULL,
  `user_photo_220057` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user_220057`
--

INSERT INTO `user_220057` (`user_id_220057`, `username_220057`, `password_220057`, `usertype_220057`, `fullname_220057`, `user_photo_220057`) VALUES
(1, 'hsbljmp321', '$2y$10$xQJBbojQZewHnyDhBplVCuCqv/U5K8.r0FpS.W/UKWTZMVKRC6CN.', 'staff', 'Hasbi JMP', 'default.png'),
(2, 'yugaaza123', '$2y$10$ZBBJy4UB5i7qVj1xYxekMedksQRAs0Rub9Kdfo.ZQIeL9WEL2gMZK', 'manager', 'Yuga Azka Al Razzak', 'Leonardo_Diffusion_XL_mock_Green_shirt_with_random_design_fron_0.jpg'),
(4, 'sr1ut4m1', '$2y$10$TqgOXAx/Q3JXdcTdSUeCQuyQC2QBLxKHRFguzV/MBDSst1SwTASiC', 'staff', 'Sri Utami', 'default.png'),
(5, 'bambank', '$2y$10$IUKHj31ouk5ffUvLVWEE6uFCoSVyZnT4bO7tc1VqlVnIxJkUr7X5a', 'manager', 'Bambang Kurniawan', 'default.png'),
(7, 'sabrina', '$2y$10$j7o/diqt8BRMqlPqEkOsnOE.51NvNpOH8XumHKw9YEZQDd7VWD93O', 'manager', 'Sabrina', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `doctor_220057`
--
ALTER TABLE `doctor_220057`
  ADD PRIMARY KEY (`doctor_id_220057`);

--
-- Indeks untuk tabel `medicals_220057`
--
ALTER TABLE `medicals_220057`
  ADD PRIMARY KEY (`mr_id_220057`),
  ADD KEY `pet_id_220057` (`pet_id_220057`),
  ADD KEY `doctor_id_220057` (`doctor_id_220057`);

--
-- Indeks untuk tabel `pet_220057`
--
ALTER TABLE `pet_220057`
  ADD PRIMARY KEY (`pet_id_220057`);

--
-- Indeks untuk tabel `user_220057`
--
ALTER TABLE `user_220057`
  ADD PRIMARY KEY (`user_id_220057`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `doctor_220057`
--
ALTER TABLE `doctor_220057`
  MODIFY `doctor_id_220057` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `medicals_220057`
--
ALTER TABLE `medicals_220057`
  MODIFY `mr_id_220057` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pet_220057`
--
ALTER TABLE `pet_220057`
  MODIFY `pet_id_220057` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_220057`
--
ALTER TABLE `user_220057`
  MODIFY `user_id_220057` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `medicals_220057`
--
ALTER TABLE `medicals_220057`
  ADD CONSTRAINT `medicals_220057_ibfk_1` FOREIGN KEY (`pet_id_220057`) REFERENCES `pet_220057` (`pet_id_220057`),
  ADD CONSTRAINT `medicals_220057_ibfk_2` FOREIGN KEY (`doctor_id_220057`) REFERENCES `doctor_220057` (`doctor_id_220057`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
