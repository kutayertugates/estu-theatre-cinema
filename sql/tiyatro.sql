-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 26 Nis 2025, 07:14:56
-- Sunucu sürümü: 8.0.40
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `tiyatro`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `periods`
--

CREATE TABLE `periods` (
  `id` int NOT NULL,
  `start_year` year NOT NULL,
  `finish_year` year NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `auth_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=beklemede 1=kabul 2=red',
  `period_id` int NOT NULL DEFAULT '1',
  `name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `surname` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `number` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  `estu_department_id` int NOT NULL,
  `grade` tinyint(1) DEFAULT NULL,
  `school_number` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `theatre_interest` tinyint(1) NOT NULL,
  `cinema_interest` tinyint(1) NOT NULL,
  `is_admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `status`, `period_id`, `name`, `surname`, `email`, `password`, `number`, `estu_department_id`, `grade`, `school_number`, `theatre_interest`, `cinema_interest`, `is_admin`) VALUES
(1, 1, 1, 'Salih', 'Koç', 'salih@example.com', '$2y$10$qDsi427Ytcl4UQ2OkIAalel7U5ietDUukF3Z8Vt4WFcZzgHBbIm2G', '05001234567', 1, 3, '2021123456', 1, 1, 1),
(3, 0, 1, 'Deli deli', '', 'delideli@example.com', '$2y$10$buHkXWqPh19sLPUIXKJHROpgicxblhmzvWB1Julllk5Tf1unAr1pG', '05023434567', 1, 2, '25467496301', 0, 0, 0),
(5, 0, 1, 'Muhammed', 'Koç', 'mk@example.com', '$2y$10$vFK6wNm5KG5fgBMnqiIQ9eljiQgH7jMYz9n1sgNubzumC8trz/Piu', '05596632165', 1, 2, '78654498103', 0, 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `role_id` int NOT NULL,
  `authorizer_id` int NOT NULL,
  `authorize_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estu_department_id` (`estu_department_id`);

--
-- Tablo için indeksler `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `authorizer_id` (`authorizer_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `periods`
--
ALTER TABLE `periods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
