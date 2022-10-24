-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 24 Eki 2022, 21:52:04
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `udemy`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `aciklama`
--

CREATE TABLE `aciklama` (
  `id` int(11) NOT NULL,
  `aciklama` text NOT NULL,
  `aktif` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `aciklama`
--

INSERT INTO `aciklama` (`id`, `aciklama`, `aktif`) VALUES
(1, '\r\nben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ben ', 0),
(2, '<p>merhaba ben ulaş</p>', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `aktif` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `aktif`) VALUES
(1, 'admin', '123', 1),
(2, 'ulas', '123456', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `baslik` varchar(100) NOT NULL,
  `alt_baslik` varchar(255) NOT NULL,
  `aciklama` text NOT NULL,
  `tarih` datetime NOT NULL DEFAULT current_timestamp(),
  `aktif` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `blog`
--

INSERT INTO `blog` (`id`, `baslik`, `alt_baslik`, `aciklama`, `tarih`, `aktif`) VALUES
(6, 'ulas', 'rferf', '', '2022-10-21 23:57:40', 1),
(7, 'asdfr', '', '<p>lorem</p>', '2022-10-22 00:57:54', 1),
(8, 'SON', 'SON', '<p>SON</p>', '2022-10-22 13:10:56', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

CREATE TABLE `iletisim` (
  `id` int(11) NOT NULL,
  `ad` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefon` varchar(50) NOT NULL,
  `mesaj` text NOT NULL,
  `okundu` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `iletisim`
--

INSERT INTO `iletisim` (`id`, `ad`, `email`, `telefon`, `mesaj`, `okundu`) VALUES
(2, 'kk', 'ulasserin@outlook.com.tr', '99999999', 'kjjk', 0),
(5, 'okunmayan mesaj', 'ulasserin@outlook.com.tr', '5314341666', 'okunmayan mesaj', 0),
(6, 'fb', 'ulasserin@outlook.com.tr', '5314341666', 'r', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `aciklama`
--
ALTER TABLE `aciklama`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iletisim`
--
ALTER TABLE `iletisim`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `aciklama`
--
ALTER TABLE `aciklama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `iletisim`
--
ALTER TABLE `iletisim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
