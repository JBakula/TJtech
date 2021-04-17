-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 01:08 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tjtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategorijas`
--

CREATE TABLE `kategorijas` (
  `kategorija_id` int(10) UNSIGNED NOT NULL,
  `Naziv_kategorije` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategorijas`
--

INSERT INTO `kategorijas` (`kategorija_id`, `Naziv_kategorije`, `created_at`, `updated_at`) VALUES
(1, 'stolno_racunalo', NULL, NULL),
(2, 'laptop', NULL, NULL),
(3, 'oprema', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `korisniks`
--

CREATE TABLE `korisniks` (
  `korisnik_id` int(10) UNSIGNED NOT NULL,
  `Ime_prezime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lozinka` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Uloga` enum('admin','korisnik') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korisniks`
--

INSERT INTO `korisniks` (`korisnik_id`, `Ime_prezime`, `Email`, `Lozinka`, `Uloga`, `created_at`, `updated_at`) VALUES
(1, 'Jure Bakula', 'jure.bakula@fsre.sum.ba', 'Lozinka.2', 'admin', '2021-04-07 12:45:17', '2021-04-07 12:45:17'),
(2, 'Vinko-Tino Zlopaša', 'zlopasa@hotmail.com', 'puto123', 'admin', '2021-04-07 12:46:38', '2021-04-07 12:46:38'),
(3, 'Pero Peric', 'pero@gmail.com', '1234', 'korisnik', '2021-04-07 12:47:15', '2021-04-07 12:47:15'),
(4, 'Ante Antic', 'ante@gmail.com', '111', 'korisnik', '2021-04-08 08:44:49', '2021-04-08 08:44:49'),
(5, 'Mirko Mirkic', 'mirko@gmail.com', '1234', 'korisnik', '2021-04-09 22:02:37', '2021-04-09 22:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `kosaricas`
--

CREATE TABLE `kosaricas` (
  `kosarica_id` int(10) UNSIGNED NOT NULL,
  `korisnik_fk` int(10) UNSIGNED NOT NULL,
  `proizvod_fk` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Kolicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kosaricas`
--

INSERT INTO `kosaricas` (`kosarica_id`, `korisnik_fk`, `proizvod_fk`, `created_at`, `updated_at`, `Kolicina`) VALUES
(32, 4, 16, '2021-04-17 20:23:47', '2021-04-17 20:23:47', 5),
(33, 4, 22, '2021-04-17 20:28:19', '2021-04-17 20:28:19', 2),
(34, 4, 12, '2021-04-17 21:00:48', '2021-04-17 21:00:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_25_213518_create_korisniks_table', 1),
(9, '2021_04_06_103843_create_kategorijas_table', 2),
(10, '2021_04_06_153421_create_proizvodis_table', 3),
(11, '2021_04_06_184149_dodaj_sliku_proizvodima', 4),
(12, '2021_04_07_142753_create_opremas_table', 5),
(13, '2021_04_07_143604_create_korisniks_table', 6),
(14, '2021_04_07_144108_ukloni_telefon_iz_korisnika', 7),
(15, '2021_04_07_144405_ukloni_telefon_iz_korisnika', 8),
(16, '2021_04_07_223710_dodavanje_povecane_slike_u_tablicu_oprema', 9),
(17, '2021_04_07_233740_create_kategorijas_table', 10),
(18, '2021_04_07_234339_create_racunalos_table', 11),
(19, '2021_04_12_162033_promjena_restrikcija', 12),
(20, '2021_04_12_222925_create_kosaricas_table', 13),
(21, '2021_04_14_231826_promjena_tipa_cijene', 14),
(22, '2021_04_17_211309_dodaj_kolicinu_u_kosaricu', 15);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `racunalos`
--

CREATE TABLE `racunalos` (
  `proizvod_id` int(10) UNSIGNED NOT NULL,
  `Naziv_proizvoda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CPU` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RAM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Memorija` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Graficka` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cijena` double NOT NULL,
  `Slika` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Velika_slika` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategorija_fk` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `racunalos`
--

INSERT INTO `racunalos` (`proizvod_id`, `Naziv_proizvoda`, `CPU`, `RAM`, `Memorija`, `Graficka`, `Cijena`, `Slika`, `Velika_slika`, `kategorija_fk`, `created_at`, `updated_at`) VALUES
(1, 'Računalo Gamer HYDRA', 'AMD Ryzen 5 3400G up to 4.2GHz', '8GB DDR4', '256GB NVMe SSD', 'AMD Radeon RX5500 XT 4GB', 933.95, 'assets/images/shop-11.jpg', 'assets/images/shop-big-11.jpg', 1, NULL, NULL),
(2, 'Računalo Master G6400', 'Intel Pentium G6400', '8GB DDR4', '250GB NVMe SSD', 'Intel UHD Graphics 610', 384.79, 'assets/images/shop-22.jpg', 'assets/images/shop-big-22.jpg', 1, NULL, NULL),
(3, 'All in one Lenovo IdeaCentre AIO 3, F0EW008ESC, 23.8\" FHD', 'AMD Ryzen 3 4300U up to 3.7GHz', '8GB DDR4', '512GB NVMe SSD', 'AMD Radeon Graphics', 796.82, 'assets/images/shop-33.jpg', 'assets/images/shop-big-33.jpg', 1, NULL, NULL),
(4, 'Acer Veriton X2665G SFF, DT.VSEEX.010', 'Intel Core i3 9100 up to 4.20GHz', '8GB DDR4', '256GB SSD', 'Intel UHD Graphics 630', 736.42, 'assets/images/shop-44.jpg', 'assets/images/shop-big-44.jpg', 1, NULL, NULL),
(5, 'Gamer Diablo 3600', 'AMD Ryzen 5 3600 up to 4.2GHz', '8GB DDR4', '1TB NVMe SSD', 'NVIDIA GTX1660 SUPER 6GB', 1392.53, 'assets/images/shop-55.jpg', 'assets/images/shop-big-55.jpg', 1, NULL, NULL),
(6, 'Gamer Anubis Pro', 'Intel Core i9 10900K up to 5.3GHz', '32GB DDR4', '1TB NVMe SSD', 'NVIDIA RTX3090 24GB', 4898.9, 'assets/images/shop-66.jpg', 'assets/images/shop-big-66.jpg', 1, NULL, NULL),
(7, 'Notebook Acer Aspire 3, NX.HEREX.008, 14', 'AMD Dual-Core A4 9120E', '8GB DDR4', '256GB NVMe SSD', 'AMD Radeon R3 Graphics', 393.41, 'assets/images/shop-1.jpg', 'assets/images/shop-big-1.jpg', 2, NULL, NULL),
(8, 'Notebook Lenovo IdeaPad Ultraslim 1, 82GW0067SC, 14', 'AMD 3020e up to 2.6GHz', '4GB DDR4', '64GB eMMC', 'AMD Radeon Graphics', 442.65, 'assets/images/shop-2.jpg', 'assets/images/shop-big-2.jpg', 2, NULL, NULL),
(9, 'Notebook HP 17-by4003nm, 2R6A2EA, 17.3', 'Intel Core 15 1135G7', '8GB DDR4', '512GB NVMe SSD', 'Intel Iris Xe Graphics', 863.93, 'assets/images/shop-3.jpg', 'assets/images/shop-big-3.jpg', 2, NULL, NULL),
(10, 'Notebook HP Pavilion Gaming 15-ec0014nm, 8PL54EA, 15.6', 'AMD Ryzen 5 3550H up to 3.70GHz', '8GB DDR4', '256GB NVMe SSD', 'NVIDIA GTX1650 4GB', 918.17, 'assets/images/shop-4.jpg', 'assets/images/shop-big-4.jpg', 2, NULL, NULL),
(11, 'Ultrabook Lenovo Yoga Slim 9, 82D10038SC,14', 'Intel Core i7 1165G7 up to 4.7GHz', '16GB DDR4', '1TB NVMe SSD', 'Intel Iris Xe Graphics', 2797.03, 'assets/images/shop-5.jpg', 'assets/images/shop-big-5.jpg', 2, NULL, NULL),
(12, 'Notebook Razer Blade 15 Base, 15.6\" QHD 165Hz', 'Intel Core i7 10750H up to 5.0GHz', '16GB DDR4', '512GB NVMe SSD', 'NVIDIA RTX3070 8GB', 3194.03, 'assets/images/shop-6.jpg', 'assets/images/shop-big-6.jpg', 2, NULL, NULL),
(13, 'Monitor Asus 27\" TUF GAMING VG27VH1B, VA, Gaming, Adaptive-sync, FreeSync Premium 165Hz, VGA, HDMI, Zvučnici, Zakrivljeni 1500R, Full HD ', NULL, NULL, NULL, NULL, 354.59, 'assets/images/shop-111.jpg', 'assets/images/shop-big-111.jpg', 3, NULL, NULL),
(14, 'Monitor Philips 24\" 241B8QJEB, IPS, VGA, DVI, HDMI, DP, 2xUSB3.0, 2xUSB2.0, Pivot, Zvučnici, Full HD', NULL, NULL, NULL, NULL, 216.21, 'assets/images/shop-222.jpg', 'assets/images/shop-big-222.jpg', 3, NULL, NULL),
(15, 'Miš Genius Scorpion Spear, RGB LED, crni', NULL, NULL, NULL, NULL, 12.61, 'assets/images/shop-333.jpg', 'assets/images/shop-big-333.jpg', 3, NULL, NULL),
(16, 'Podloga za miš MS TERIS M105, gaming', NULL, NULL, NULL, NULL, 1.56, 'assets/images/shop-444.jpg', 'assets/images/shop-big-444.jpg', 3, NULL, NULL),
(17, 'Tipkovnica MS FLARE gaming LED', NULL, NULL, NULL, NULL, 216.21, 'assets/images/shop-555.jpg', 'assets/images/shop-big-555.jpg', 3, NULL, NULL),
(18, 'Slušalice Sony WH-CH510, bežične, NFC/Bluetooth, crne', NULL, NULL, NULL, NULL, 48.88, 'assets/images/shop-666.jpg', 'assets/images/shop-big-666.jpg', 3, NULL, NULL),
(19, 'Slušalice Logitech H650e, stereo, s mikrofonom, USB', NULL, NULL, NULL, NULL, 93.08, 'assets/images/shop-777.jpg', 'assets/images/shop-big-777.jpg', 3, NULL, NULL),
(20, 'Miš MS IMPERATOR 2, gaming, žični', NULL, NULL, NULL, NULL, 9.81, 'assets/images/shop-888.jpg', 'assets/images/shop-big-888.jpg', 3, NULL, NULL),
(21, 'Tipkovnica Speedlink Niala, UK/HR Layout, crna', NULL, NULL, NULL, NULL, 7.94, 'assets/images/shop-999.jpg', 'assets/images/shop-big-999.jpg', 3, NULL, NULL),
(22, 'Gaming stolica LC-Power LC-GC-600BR, crno/crvena', NULL, NULL, NULL, NULL, 182.12, 'assets/images/shop-100.jpg', 'assets/images/shop-big-100.jpg', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategorijas`
--
ALTER TABLE `kategorijas`
  ADD PRIMARY KEY (`kategorija_id`);

--
-- Indexes for table `korisniks`
--
ALTER TABLE `korisniks`
  ADD PRIMARY KEY (`korisnik_id`),
  ADD UNIQUE KEY `korisniks_email_unique` (`Email`);

--
-- Indexes for table `kosaricas`
--
ALTER TABLE `kosaricas`
  ADD PRIMARY KEY (`kosarica_id`),
  ADD KEY `kosaricas_korisnik_fk_foreign` (`korisnik_fk`),
  ADD KEY `kosaricas_proizvod_fk_foreign` (`proizvod_fk`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `racunalos`
--
ALTER TABLE `racunalos`
  ADD PRIMARY KEY (`proizvod_id`),
  ADD KEY `racunalos_kategorija_fk_foreign` (`kategorija_fk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategorijas`
--
ALTER TABLE `kategorijas`
  MODIFY `kategorija_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `korisniks`
--
ALTER TABLE `korisniks`
  MODIFY `korisnik_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kosaricas`
--
ALTER TABLE `kosaricas`
  MODIFY `kosarica_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `racunalos`
--
ALTER TABLE `racunalos`
  MODIFY `proizvod_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kosaricas`
--
ALTER TABLE `kosaricas`
  ADD CONSTRAINT `kosaricas_korisnik_fk_foreign` FOREIGN KEY (`korisnik_fk`) REFERENCES `korisniks` (`korisnik_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kosaricas_proizvod_fk_foreign` FOREIGN KEY (`proizvod_fk`) REFERENCES `racunalos` (`proizvod_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `racunalos`
--
ALTER TABLE `racunalos`
  ADD CONSTRAINT `racunalos_kategorija_fk_foreign` FOREIGN KEY (`kategorija_fk`) REFERENCES `kategorijas` (`kategorija_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
