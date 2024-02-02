-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 16 Jan 2024 pada 15.10
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yuga-petclinic-2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `doctor_220057`
--

CREATE TABLE `doctor_220057` (
  `doctor_id_220057` int NOT NULL,
  `doctor_name_220057` varchar(50) NOT NULL,
  `doctor_gender_220057` varchar(6) NOT NULL,
  `doctor_address_220057` varchar(100) NOT NULL,
  `doctor_phone_220057` varchar(15) NOT NULL,
  `doctor_photo_220057` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `doctor_220057`
--

INSERT INTO `doctor_220057` (`doctor_id_220057`, `doctor_name_220057`, `doctor_gender_220057`, `doctor_address_220057`, `doctor_phone_220057`, `doctor_photo_220057`) VALUES
(1, 'udin sabarudin s', 'male', 'jl manokwaru 56', '023649237', 'male-doc-3.jpg'),
(3, 'udin aja', 'male', 'jl ototis', '1234509865', 'male-doc-1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `medicals_220057`
--

CREATE TABLE `medicals_220057` (
  `mr_id_220057` int NOT NULL,
  `mr_date_220057` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pet_id_220057` int DEFAULT NULL,
  `doctor_id_220057` int DEFAULT NULL,
  `symptom_220057` varchar(255) DEFAULT NULL,
  `diagnose_220057` varchar(255) DEFAULT NULL,
  `treatment_220057` varchar(255) DEFAULT NULL,
  `cost_220057` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `medicals_220057`
--

INSERT INTO `medicals_220057` (`mr_id_220057`, `mr_date_220057`, `pet_id_220057`, `doctor_id_220057`, `symptom_220057`, `diagnose_220057`, `treatment_220057`, `cost_220057`) VALUES
(1, '2023-12-16 16:26:21', 2, 3, 'lemah lesu', 'demam', 'banyak makan', 12345),
(2, '2023-12-17 04:21:44', 2, 1, 'asdafxc', 'asdfqwrsz', 'aferhrej', 12345),
(3, '2023-12-17 04:43:16', 4, 3, 'asdxcaf', 'dgregsbt', 'jyrjgfcnyd', 12345);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pet_220057`
--

CREATE TABLE `pet_220057` (
  `pet_id_220057` int NOT NULL,
  `pet_name_220057` varchar(50) NOT NULL,
  `pet_type_220057` varchar(30) NOT NULL,
  `pet_gender_220057` varchar(6) NOT NULL,
  `pet_age_220057` int NOT NULL,
  `pet_food_220057` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `pet_owner_220057` varchar(50) NOT NULL,
  `pet_address_220057` varchar(100) NOT NULL,
  `pet_phone_220057` varchar(15) NOT NULL,
  `pet_photo_220057` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `pet_220057`
--

INSERT INTO `pet_220057` (`pet_id_220057`, `pet_name_220057`, `pet_type_220057`, `pet_gender_220057`, `pet_age_220057`, `pet_food_220057`, `pet_owner_220057`, `pet_address_220057`, `pet_phone_220057`, `pet_photo_220057`) VALUES
(2, 'dududus', 'dog', 'male', 3, 'dry', 'dodi', 'jl mekar no 90', '83195004459', 'cat-3.jpg'),
(4, 'lisa s', 'bird', 'female', 2, 'dry', 'siti', 'jl indah no 45', '895323228785', 'bird-2.jpg'),
(5, 'Feren', 'dog', 'male', 4, 'wet', 'tores', 'jl Chicago no 34', '0866351478', 'dog-2.jpg'),
(6, 'lani', 'reptil', 'female', 2, 'wet', 'sally', 'jl anggrek no 07', '085458663002', 'reptil-3.jpg'),
(7, 'gugu', 'dog', 'male', 5, 'dry', 'dede', 'jl sampora no 97', '089355641254', 'dog-4.jpg'),
(8, 'sss', 'reptil', 'male', 4, 'dry', 'gggg', 'jl kekar no 9', '12345678911', 'reptil-2.jpg'),
(9, 'asdw', 'cat', 'male', 2, 'dry', 'bgd', 'sfth', '08993950095', 'cat-1.jpg'),
(11, 'vfd', 'reptil', 'male', 5, 'dry', 'bzda', 'mkli', '08222580065', 'reptil-1.jpg'),
(12, 'mumun', 'cat', 'female', 3, 'dry', 'fani', 'jl serang', '08993950035', 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_220057`
--

CREATE TABLE `user_220057` (
  `user_id_220057` int NOT NULL,
  `username_220057` varchar(100) NOT NULL,
  `password_220057` varchar(255) NOT NULL,
  `usertype_220057` varchar(10) NOT NULL,
  `fullname_220057` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_photo_220057` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user_220057`
--

INSERT INTO `user_220057` (`user_id_220057`, `username_220057`, `password_220057`, `usertype_220057`, `fullname_220057`, `user_photo_220057`) VALUES
(2, 'opetz453', 'shopetzz', 'staff', 'Opet bin Apet', 'user-1.jpeg'),
(4, 'jetski345', 'jetski123', 'staff', 'Jejen supriadi', 'default.png'),
(5, 'endangzz', '$2y$10$2qU79kAEzhDD.HXhAEiWpu49.rQthUE30yg6Zu5BTYraA2VX3NR8y', 'staff', 'Endang Khoer', 'default.png'),
(6, 'Utchupz', '$2y$10$aAaOxNtEVwvAsF9vuvlYeO.dC6WhlLyHIZrVhLcHZgcG47uAT3KA.', 'manager', 'Ucup Mania', 'Leonardo_Diffusion_XL_describe_Web_Programming_in_picture_form_0.jpg'),
(7, 'mimi', '$2y$10$a5S.DD9Fl33kiu1KBFVJCOGIYv.T5ScqFmC/yqUM/APbShyESflIi', 'staff', 'mimi peri', 'user-3.png'),
(8, 'notog', '$2y$10$4texHZOdZbhPZEKd3dUKyOclp3EtiXYBfnZvEtWDyREnh96nhyol6', 'staff', 'notorius grogor', 'default.png'),
(9, 'meilani', '$2y$10$KhWjw.YDdw5/gS99WsxMke.1iZbVVtJEjPbX4SeRlSbYuFO3aB7HK', 'staff', 'Mei Mei Lani', 'default.png'),
(10, 'maman', '$2y$10$fnUPWe2rG8h73PTBef26LuPmMvfYsAMKXmnfkDRPymmtmWgl2E/uC', 'manager', 'Maman Kurniawan', 'default.png');

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
  MODIFY `doctor_id_220057` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `medicals_220057`
--
ALTER TABLE `medicals_220057`
  MODIFY `mr_id_220057` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pet_220057`
--
ALTER TABLE `pet_220057`
  MODIFY `pet_id_220057` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user_220057`
--
ALTER TABLE `user_220057`
  MODIFY `user_id_220057` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `medicals_220057`
--
ALTER TABLE `medicals_220057`
  ADD CONSTRAINT `medicals_220057_ibfk_1` FOREIGN KEY (`pet_id_220057`) REFERENCES `pet_220057` (`pet_id_220057`) ON DELETE RESTRICT,
  ADD CONSTRAINT `medicals_220057_ibfk_2` FOREIGN KEY (`doctor_id_220057`) REFERENCES `doctor_220057` (`doctor_id_220057`) ON DELETE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
