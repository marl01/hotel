-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 10 Ara 2017, 21:32:33
-- Sunucu sürümü: 10.1.28-MariaDB
-- PHP Sürümü: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `otel`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `eposta` varchar(250) NOT NULL,
  `sifre` varchar(32) NOT NULL,
  `ad` varchar(100) NOT NULL,
  `soyad` varchar(100) NOT NULL,
  `tur` int(1) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `eposta`, `sifre`, `ad`, `soyad`, `tur`) VALUES
(1, 'selo@usak.edu.tr', '123456', 'Selahattin', '?en', 1),
(2, 'selo2@usak.edu.tr', '123456', 'Selahattin', 'Sen', 1),
(3, 'otel@otel.com', '123456', 'Otel', 'Otelcik', 2),
(4, '64selo6466@gmail.com', '123456', 'selo', 'sen', 2),
(5, 'fato@hotmail.com', '123456', 'fato', 'fato', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oda`
--

CREATE TABLE `oda` (
  `id` int(11) NOT NULL,
  `oda_numarasi` varchar(100) NOT NULL,
  `oda_tip` int(11) NOT NULL,
  `oda_kat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `oda`
--

INSERT INTO `oda` (`id`, `oda_numarasi`, `oda_tip`, `oda_kat`) VALUES
(8, 'A2', 10, 6),
(9, 'A4', 10, 5),
(10, 'A5', 10, 6);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oda_duyuru`
--

CREATE TABLE `oda_duyuru` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) NOT NULL,
  `mesaj` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `oda_duyuru`
--

INSERT INTO `oda_duyuru` (`id`, `ad`, `mesaj`) VALUES
(2, 'fbd', 'vdfbzdffbdf');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oda_fiyat`
--

CREATE TABLE `oda_fiyat` (
  `id` int(11) NOT NULL,
  `oda_tip` int(11) NOT NULL,
  `oda_fiyat` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `oda_fiyat`
--

INSERT INTO `oda_fiyat` (`id`, `oda_tip`, `oda_fiyat`) VALUES
(16, 10, 251),
(17, 10, 300);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oda_tipleri`
--

CREATE TABLE `oda_tipleri` (
  `id` int(11) NOT NULL,
  `ad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `oda_tipleri`
--

INSERT INTO `oda_tipleri` (`id`, `ad`) VALUES
(10, 'Dublex (ozel)'),
(11, 'Tek1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rezerve`
--

CREATE TABLE `rezerve` (
  `id` int(11) NOT NULL,
  `oda` int(11) NOT NULL,
  `kullanici` int(11) NOT NULL,
  `giris` date NOT NULL,
  `cikis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `rezerve`
--

INSERT INTO `rezerve` (`id`, `oda`, `kullanici`, `giris`, `cikis`) VALUES
(1, 8, 2, '2017-12-12', '2017-12-28'),
(2, 9, 1, '2017-12-11', '2017-12-12'),
(3, 10, 1, '2017-12-11', '2017-12-12'),
(4, 8, 1, '2017-12-10', '2017-12-11');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `oda`
--
ALTER TABLE `oda`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `oda_duyuru`
--
ALTER TABLE `oda_duyuru`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `oda_fiyat`
--
ALTER TABLE `oda_fiyat`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `oda_tipleri`
--
ALTER TABLE `oda_tipleri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `rezerve`
--
ALTER TABLE `rezerve`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `oda`
--
ALTER TABLE `oda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `oda_duyuru`
--
ALTER TABLE `oda_duyuru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `oda_fiyat`
--
ALTER TABLE `oda_fiyat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `oda_tipleri`
--
ALTER TABLE `oda_tipleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `rezerve`
--
ALTER TABLE `rezerve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
