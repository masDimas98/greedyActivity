-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 10, 2024 at 06:19 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greedy`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `idBagian` bigint UNSIGNED NOT NULL,
  `namaBagian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`idBagian`, `namaBagian`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Camille Hermiston', 'Sed aut modi ut. Assumenda quos laudantium nihil eum nemo. Voluptates exercitationem dicta eaque dolorem ea. Blanditiis aut quasi debitis nisi delectus.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(2, 'Dr. Wallace Leannon', 'Cupiditate consectetur aspernatur tempora cum. Accusamus accusamus quia laborum minima. Voluptate quis omnis alias et vel. Maxime quasi impedit explicabo aliquam. Qui et ex nemo et et.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(3, 'Glenna Schiller', 'Ut est nihil voluptate praesentium. Dolores ratione nesciunt animi necessitatibus saepe laboriosam quaerat. Recusandae fugit est quis et soluta dignissimos at. Enim sapiente nam explicabo ut nam.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(4, 'Faye Altenwerth', 'Occaecati veritatis esse et repellendus. Maxime reiciendis et qui ut voluptas quisquam. Aut ex voluptas autem ut ratione. Hic soluta doloribus omnis expedita ut voluptate ipsa excepturi.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(5, 'Demetris Eichmann', 'Maxime ut quia quos impedit voluptatem id vel. Nostrum autem voluptatem distinctio similique. Cum aliquid excepturi velit sit consequatur voluptas hic. Autem eum libero accusantium omnis molestias blanditiis et.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(6, 'Henderson Fahey', 'Corrupti et accusantium magnam quam quos. Atque quia excepturi placeat aut quis aspernatur. Vero facere facilis optio est magnam ratione. Aut tenetur iste ut consequatur.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(7, 'Nyasia Bode DVM', 'Enim nisi porro cumque repellat. Omnis modi qui consequatur. Laborum magni eligendi dolorem exercitationem qui.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(8, 'Lincoln Ward', 'Distinctio molestiae repudiandae facilis qui velit quam. Tenetur rerum voluptate rerum expedita sequi. Fugit voluptatem qui saepe sit omnis harum. Magni dicta sint asperiores ipsum provident. Asperiores nisi aut distinctio in.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(9, 'Nyah Willms Sr.', 'Corporis sapiente voluptatum hic consequatur placeat. Non rerum dicta aut blanditiis ab. Rem voluptas sed possimus et asperiores minus dolorem beatae. Accusantium at sed amet quis sint.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(10, 'Dr. Deon Hauck DVM', 'In veritatis laudantium voluptate dolor dolor earum. Natus quia et nemo atque omnis. Voluptas voluptas sunt ut inventore necessitatibus et.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(11, 'Mrs. Myrna Roberts PhD', 'Dolor harum aspernatur libero hic voluptatem. Ea consectetur eum quisquam vel.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(12, 'Jermaine Quitzon', 'Eligendi dolorem doloribus natus sunt qui. Eos saepe cupiditate at totam ab. Ipsam itaque ullam sint in maxime temporibus. Rerum maiores asperiores qui odio. Ut ut sunt fugiat illum veniam.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(13, 'Dr. Korey Ward DVM', 'Dolores nisi sed ipsam inventore dolores. Doloremque earum doloremque velit temporibus est quo odit. Ea est dolorem quam eum odit libero. Ut dolorum laboriosam ullam voluptates at. Sit iure et veniam quos.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(14, 'Miss Julie Nienow', 'Aliquam facere rerum non. Necessitatibus autem quia asperiores veritatis. Autem earum unde ullam pariatur nulla sit aperiam.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(15, 'Magnolia Schroeder', 'Repellat facilis ut earum cupiditate sed eaque voluptates. Nemo ut corporis et natus facilis aspernatur est. Et assumenda esse adipisci mollitia tenetur. Est consectetur est impedit est.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(16, 'Gia Walter', 'Occaecati voluptas hic inventore. Aperiam fuga dolorem sint quia. Ullam atque itaque eaque sunt natus. Fuga deleniti beatae soluta debitis distinctio.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(17, 'Ida Crona', 'Cum qui et ipsum quae. Laboriosam qui esse possimus voluptate. Voluptatem voluptatum sit quos cumque qui voluptatem aliquam.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(18, 'Alexanne Beatty', 'Rerum aut et voluptatem est ab est soluta dolores. Est dolorem aspernatur non omnis. Corporis expedita molestias ut aut. Et esse quia nobis ipsum.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(19, 'Minnie Robel', 'Dolorum eaque eos omnis dolor. Expedita et harum rem molestiae earum excepturi et. Atque quis ut voluptatibus. Nihil aperiam ipsam dolor quia.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(20, 'Kelton Paucek', 'Et sed eos sed tenetur quas. Quia eligendi ipsa tenetur quis aut. Provident et totam qui et animi debitis.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(21, 'Christina Lynch', 'Ea deserunt est nam rerum. Laudantium consequatur aliquid aut fugit non dolor consequatur. Autem rem porro qui quaerat repellat soluta. Sed nemo sed illo incidunt et in architecto quo.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(22, 'Chelsea Rohan', 'Officia pariatur quibusdam harum rerum voluptates. Magni non quis sed dignissimos enim sit molestiae ut. Libero voluptates accusamus eos consequatur ut odio voluptatum. Eos incidunt in maxime id error deserunt corporis.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(23, 'Neoma Purdy Sr.', 'Est mollitia facere ea qui sunt qui eum. Dolorem et iusto sapiente dignissimos non nobis. Hic sunt quas ipsam quia qui tempora.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(24, 'Edythe Goodwin PhD', 'Dolorem eius distinctio est deleniti voluptas. Sint omnis deserunt rerum. Deserunt quos quis sint eum ea placeat ut.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(25, 'Miss Tiara Hodkiewicz IV', 'Et quo ut maxime qui et expedita. Fugit voluptate exercitationem qui impedit nam beatae. Velit itaque dolor esse sunt nesciunt.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(26, 'Claudia Gorczany', 'Id voluptas optio quis consequatur. Doloremque libero sed quisquam. Inventore saepe eveniet maxime rerum est voluptate dignissimos. Quas dolore quam esse ipsum vel suscipit.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(27, 'Prince Marks', 'Nihil repellendus eum dicta fuga soluta fugit. Omnis debitis quis voluptatem voluptas dolores perspiciatis delectus. Dolorem similique voluptates dolore sit. Maiores error suscipit animi nam harum expedita nisi.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(28, 'Lela Luettgen', 'Illo non sunt rem illo at eligendi et sint. Aperiam impedit ipsum magni totam dicta officia quis. Expedita totam soluta facilis impedit consectetur molestias. Ea eos voluptatibus repellendus maxime minus omnis sint.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(29, 'Dr. Bud Weber', 'Aut eligendi voluptatem dolores ut. Ut et voluptates explicabo fuga nulla voluptatem atque. Suscipit porro et ut non atque. Possimus voluptatem aliquam est modi.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(30, 'Estefania Reinger', 'Ducimus a sapiente dolore placeat. Sunt pariatur quisquam est suscipit. A debitis sint quia rerum est ducimus est recusandae.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(31, 'Isaiah Dicki', 'Et et eius impedit illum quia molestiae. Architecto error consequatur doloribus omnis nemo earum. Iste ducimus quod architecto perspiciatis quasi velit. Delectus nostrum eum illum sunt commodi eum vel.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(32, 'Liza McGlynn', 'Ut rerum et et iste. Voluptatem deleniti eius eum quibusdam voluptate quis et. Magnam ea eum doloribus ipsam dolor. Sint asperiores nobis vel temporibus.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(33, 'Heather Mohr', 'Nesciunt ullam beatae molestiae aut dolore dolorum veritatis. Et ut dignissimos ut dolorem. Nisi sapiente eum saepe minima vel. Eveniet nihil porro animi sequi voluptas blanditiis et possimus.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(34, 'Thea VonRueden', 'Similique doloribus laborum libero voluptatem et recusandae magnam et. Quo labore ipsam blanditiis architecto. Est consequatur praesentium recusandae. Eum doloribus nisi nihil.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(35, 'Ephraim Hayes', 'Qui et explicabo voluptatem autem sit modi sit labore. Incidunt animi accusantium doloribus ipsum numquam. Magni voluptates aliquid perspiciatis vel sit. Cumque facere expedita eum modi ad voluptas illo in.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(36, 'Jordon Konopelski', 'Numquam rerum qui cumque debitis et labore. Excepturi qui aut facere quas rerum. Soluta nostrum eos quia et deserunt totam qui. Inventore suscipit accusamus quisquam modi.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(37, 'Nora Wunsch', 'Itaque nam illum quia cupiditate sunt facilis. Earum quas quibusdam nulla. Qui quo est consequuntur ducimus qui.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(38, 'Veda Sporer', 'Facere impedit nihil libero ullam dolorem debitis nihil atque. Veritatis commodi illum corporis. Doloribus qui magnam quis sequi voluptatem voluptas voluptatem non.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(39, 'Prof. Antone Hettinger', 'Ab non et quia facere rerum. Et error qui soluta consequatur voluptatem delectus itaque. Et magnam est quia laudantium consequatur odio aut fugiat. Optio omnis est consequatur.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(40, 'Frank Wolff', 'Quidem in modi nihil autem. Id eius vitae non quidem ut.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(41, 'Emery Purdy', 'Est est aut non quis est molestiae adipisci. Quia eum delectus sed sequi. Itaque debitis pariatur repudiandae animi distinctio et hic. Ut numquam voluptas impedit tempore.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(42, 'Jannie Hamill', 'Dignissimos amet error possimus id. Eaque eos ut est.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(43, 'Kris Daugherty', 'Et mollitia dolores tempora repellendus eum esse ut quos. Itaque facere veritatis sed blanditiis modi id. Aspernatur at sed asperiores cupiditate id. Repellat soluta quos odit maxime rerum ut et.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(44, 'Prof. Edmund Langworth DVM', 'Inventore culpa atque quis cumque adipisci adipisci error. Ipsam cupiditate et a voluptatum maiores totam eos. Et optio qui qui ut culpa.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(45, 'Zora Yundt', 'Blanditiis rerum ut et vitae sunt. Reprehenderit dolor magnam in doloremque voluptatum iste alias. Quisquam ea sed nihil sunt reprehenderit voluptas.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(46, 'Rico Marquardt', 'Qui cupiditate quidem in sequi. Reiciendis at omnis animi at dicta et. Corrupti incidunt rerum ipsam hic expedita nihil sint.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(47, 'Daija Boehm', 'Architecto voluptate dolor voluptatem consequatur cupiditate. Omnis velit aut numquam corrupti sit omnis. Autem consequuntur eum est.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(48, 'Destinee Bernier', 'Consectetur eaque ipsa eos tempore. A voluptatem aliquam omnis excepturi omnis. Illo blanditiis recusandae nemo ut optio recusandae assumenda vero.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(49, 'Sebastian Ritchie', 'Hic delectus voluptatem sapiente et aut. Possimus qui autem dolore. Cumque ducimus sit dolore.', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(50, 'Shanon Nicolas', 'Quidem rem perferendis doloremque tempora qui blanditiis sunt. Ducimus aut et qui perferendis et modi. Voluptatem doloribus ducimus omnis ut non. Fugit vel aut maiores eos est aliquid.', '2024-06-16 08:08:03', '2024-06-16 08:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `idEvent` bigint UNSIGNED NOT NULL,
  `namaEvent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlahOrang` int NOT NULL,
  `tanggalMulai` date NOT NULL,
  `tanggalSelesai` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`idEvent`, `namaEvent`, `jumlahOrang`, `tanggalMulai`, `tanggalSelesai`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ewald', 10, '2024-06-21', '2024-06-22', 'open', '2024-06-16 08:08:03', '2024-09-09 22:40:26'),
(2, 'Amie', 4, '2024-06-20', '2024-07-09', 'open', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(3, 'Odell', 5, '2024-06-21', '2024-07-10', 'ready', '2024-06-16 08:08:03', '2024-09-09 23:16:17'),
(4, 'Chandler', 13, '2024-06-19', '2024-07-15', 'open', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(5, 'Modesto', 7, '2024-06-21', '2024-06-25', 'open', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(6, 'Tamara', 1, '2024-06-19', '2024-07-15', 'open', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(8, 'Zion', 6, '2024-06-17', '2024-07-05', 'open', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(9, 'Lorine', 3, '2024-06-22', '2024-06-22', 'open', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(10, 'Izabella', 15, '2024-06-23', '2024-07-14', 'open', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(11, 'Nelle', 8, '2024-06-22', '2024-07-11', 'open', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(12, 'Bryana', 7, '2024-06-22', '2024-07-10', 'open', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(13, 'Forest', 10, '2024-06-23', '2024-06-24', 'open', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(14, 'Bria', 7, '2024-06-20', '2024-07-09', 'open', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(15, 'Carolina', 7, '2024-06-19', '2024-06-26', 'open', '2024-06-16 08:08:03', '2024-09-09 22:40:26'),
(16, 'Bill', 1, '2024-06-17', '2024-07-09', 'process', '2024-06-16 08:08:03', '2024-09-09 23:00:27'),
(17, 'Laurel', 3, '2024-06-21', '2024-07-16', 'open', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(18, 'Uriah', 2, '2024-06-22', '2024-07-15', 'open', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(19, 'Katelyn', 1, '2024-06-22', '2024-07-12', 'open', '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(20, 'Jamaal', 9, '2024-06-17', '2024-07-15', 'open', '2024-06-16 08:08:03', '2024-06-16 08:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `event_sertifikat`
--

CREATE TABLE `event_sertifikat` (
  `idEventSertifikat` bigint UNSIGNED NOT NULL,
  `idEvent` bigint UNSIGNED NOT NULL,
  `idSertifikat` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_sertifikat`
--

INSERT INTO `event_sertifikat` (`idEventSertifikat`, `idEvent`, `idSertifikat`) VALUES
(1, 1, 1),
(2, 3, 2),
(4, 8, 3),
(8, 4, 2),
(9, 20, 2),
(10, 19, 2),
(11, 18, 2),
(12, 17, 2),
(13, 16, 2),
(14, 15, 3),
(16, 13, 1),
(17, 12, 1),
(18, 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(146, '0001_01_01_000000_create_users_table', 1),
(147, '0001_01_01_000001_create_cache_table', 1),
(148, '0001_01_01_000002_create_jobs_table', 1),
(149, '2024_06_09_124830_create_bagian_table', 1),
(150, '2024_06_09_125023_create_pegawai_table', 1),
(151, '2024_06_09_125052_create_sertifikat_table', 1),
(152, '2024_06_09_125109_create_sertifikasi_table', 1),
(153, '2024_06_09_125141_create_event_table', 1),
(154, '2024_06_09_125210_create_penugasan_table', 1),
(155, '2024_06_15_084456_create_event_sertifikat_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktp` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namaPegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaPanggilan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bagian` bigint UNSIGNED DEFAULT NULL,
  `posisiSekarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatLahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalLahir` date NOT NULL,
  `agamaKepercayaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `ktp`, `foto`, `namaPegawai`, `namaPanggilan`, `bagian`, `posisiSekarang`, `tempatLahir`, `tanggalLahir`, `agamaKepercayaan`, `created_at`, `updated_at`) VALUES
('129770324493703', '3726344457328395', NULL, 'Theresia Jacobson', 'Prince', 9, 'Staff', 'South Ellen', '2022-09-02', 'buddha', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('138041898929072', '4845825351002886', NULL, 'Dennis Barton', 'Josiah', 3, 'Leader', 'Madisynfurt', '2021-04-30', 'khonghucu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('146687282031485', '5944251381466110', NULL, 'Franco Marvin', 'Dusty', 2, 'Leader', 'Goodwinhaven', '1999-08-27', 'hindu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('166002833561743', '2390345491322982', NULL, 'Sasha Runte', 'Jeffrey', 9, 'Staff', 'Rohanton', '2013-11-22', 'buddha', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('189023210748783', '6150236928621039', NULL, 'Zoey Hayes', 'Rudolph', 1, 'Staff', 'East Aleenshire', '2014-05-05', 'katolik', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('204759128356032', '4006305553797208', NULL, 'Maybelle Gulgowski PhD', 'Gino', 4, 'Leader', 'Sonyaport', '1981-07-30', 'buddha', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('209555584319709', '1947002328894007', NULL, 'Isaiah Harris', 'Eloy', 6, 'Manager', 'Haagton', '2021-11-27', 'katolik', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('219376983168295', '2465892265981734', NULL, 'Maxwell Mante', 'Lazaro', 2, 'Leader', 'Janessastad', '2003-03-08', 'khonghucu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('220939718767378', '9338243956193295', NULL, 'Tiana Flatley', 'Hugh', 9, 'Staff', 'Dexterside', '2002-04-07', 'kristen', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('224807224022243', '8286530177027149', NULL, 'Sonny Hane', 'Isaias', 5, 'Staff', 'Port Richie', '2016-09-30', 'hindu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('249489065505726', '5926861425667550', NULL, 'Dr. Cordie Douglas I', 'Max', 10, 'Leader', 'South Alexanechester', '2019-09-05', 'hindu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('257088351374172', '3453550907188958', NULL, 'Aiden Veum', 'Mervin', 6, 'Leader', 'New Kearaburgh', '1973-05-03', 'katolik', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('260597633349569', '4608052261366963', NULL, 'Camryn Monahan DDS', 'Israel', 1, 'Staff', 'Cassinview', '2016-10-19', 'hindu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('271648259530263', '5302920709056280', NULL, 'Dr. Nelson Ortiz I', 'Eino', 9, 'Staff', 'North Kellie', '1978-03-02', 'katolik', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('291908815032687', '4034757171006397', NULL, 'Winnifred Gibson', 'Ferne', 2, 'Manager', 'Kingstad', '2010-07-29', 'khonghucu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('294908984788354', '9913202193326166', NULL, 'Prof. Alexis Parisian', 'Winston', 1, 'Leader', 'East Ray', '1973-11-13', 'islam', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('301363822290457', '3517218447683009', NULL, 'Maudie Jakubowski', 'Reinhold', 10, 'Staff', 'West Lorena', '1988-11-07', 'hindu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('307986892286024', '6699033904165096', NULL, 'Madisyn Macejkovic', 'Christop', 7, 'Leader', 'North Cordia', '2000-06-21', 'katolik', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('324454528976431', '9263614914759735', NULL, 'Cleveland Funk', 'Rashawn', 9, 'Staff', 'North Skylar', '2001-08-11', 'hindu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('340986401162708', '8796157464755895', NULL, 'Mr. Chadrick Goyette', 'Dean', 6, 'Leader', 'South Jakeshire', '1973-01-31', 'katolik', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('346431812448578', '8615294502829503', NULL, 'Ethelyn O\'Keefe', 'Jeramy', 10, 'Manager', 'Edgarchester', '2012-12-12', 'islam', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('349265676508077', '6877606556825420', NULL, 'Savanna Mosciski', 'Dock', 1, 'Manager', 'Port Osbaldomouth', '1989-06-30', 'khonghucu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('363606281481324', '8273553940567715', NULL, 'Cristobal Nolan', 'Paxton', 6, 'Leader', 'South Angel', '1997-04-07', 'buddha', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('382897454023425', '4532303758401568', NULL, 'Trinity Schinner Jr.', 'Tyson', 5, 'Manager', 'West Era', '1997-01-12', 'kristen', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('396103341346638', '3314177285674038', NULL, 'Caesar Osinski', 'Brandon', 4, 'Leader', 'New Veronicahaven', '2016-12-05', 'hindu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('398550908844851', '9316572799594932', NULL, 'Marcelina Torphy', 'Gavin', 10, 'Leader', 'Stephanyberg', '1986-07-15', 'hindu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('398956213686313', '9609162803974533', NULL, 'Dr. Ernestina Conn', 'Amir', 8, 'Staff', 'New Van', '1986-12-30', 'buddha', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('412207234594953', '7471788209107560', NULL, 'Lamont Armstrong', 'Haskell', 3, 'Staff', 'South Mercedes', '1978-06-23', 'hindu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('413752009346282', '2022295860243903', NULL, 'Prof. Niko Romaguera', 'Brice', 10, 'Staff', 'Wardland', '1989-10-12', 'khonghucu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('414536893080333', '5531018789670955', NULL, 'Ebba Schuppe', 'Eladio', 3, 'Leader', 'West Emeraldview', '2018-03-06', 'khonghucu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('414707171209121', '5007631880359243', NULL, 'Devonte Jacobi', 'King', 8, 'Manager', 'Smithamhaven', '1997-10-22', 'islam', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('433274338330346', '2047384090328499', NULL, 'Prof. Willis West V', 'Ansel', 8, 'Leader', 'Runolfsdottirside', '1996-11-07', 'khonghucu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('440523530024257', '1483696607704796', NULL, 'Gunner Bode', 'Percy', 6, 'Staff', 'West Bartholome', '2004-07-13', 'kristen', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('441480656810549', '7808234280578263', NULL, 'Georgianna Larkin', 'Cleveland', 9, 'Manager', 'Port Luellaport', '1982-09-11', 'kristen', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('443433403582405', '1190079904492240', NULL, 'Prof. Orland Konopelski II', 'Austin', 8, 'Staff', 'Albertaside', '1997-06-17', 'hindu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('449713846016835', '5771426430499197', NULL, 'Hertha Leannon', 'Webster', 7, 'Staff', 'East Raquel', '1978-03-02', 'khonghucu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('464803489075922', '3675013398233011', NULL, 'Rahsaan Bailey', 'Lonny', 1, 'Staff', 'Port Maya', '2022-06-10', 'khonghucu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('464888849053685', '4788945059450957', NULL, 'Albert Turner', 'Brent', 4, 'Leader', 'Codyfort', '2020-10-04', 'islam', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('467746193611837', '1305951887675406', NULL, 'Hyman Kessler', 'Juvenal', 3, 'Leader', 'Pierceview', '1986-11-14', 'islam', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('479004584977642', '7431720796607241', NULL, 'Virgil Schinner', 'Lavon', 7, 'Leader', 'Akeemmouth', '2017-08-26', 'islam', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('493135633322461', '9416481790269818', NULL, 'Prof. Dana Predovic Sr.', 'Stewart', 4, 'Staff', 'Arneborough', '2002-11-10', 'kristen', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('507933045227026', '7289179921091351', NULL, 'Dr. Peggie Hartmann', 'Emile', 7, 'Manager', 'South Flo', '2011-05-13', 'katolik', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('510614341602898', '4485807758130565', NULL, 'Jolie Lynch', 'Lawson', 6, 'Manager', 'West Vernicefurt', '2018-07-01', 'khonghucu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('515898328973836', '6141593812843887', NULL, 'Herbert McGlynn', 'Domenico', 4, 'Staff', 'Lafayettechester', '1997-12-27', 'katolik', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('517197665291143', '8392361883610502', NULL, 'Daija Bauch', 'Philip', 5, 'Staff', 'Verliebury', '1977-08-30', 'khonghucu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('519504132474092', '5145807949794860', NULL, 'Emmanuel Fahey', 'Norbert', 2, 'Leader', 'Darwinview', '1991-11-29', 'katolik', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('526778850608172', '9621646018104536', NULL, 'Rick Denesik', 'Lionel', 7, 'Staff', 'Juliaville', '2019-01-02', 'islam', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('531228303185331', '2845053703722335', NULL, 'Annamarie Schmidt', 'Jarred', 4, 'Staff', 'Neldaberg', '1973-07-21', 'hindu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('543713366353087', '1090958887744260', NULL, 'Gino Ullrich', 'Jayson', 7, 'Leader', 'Tillmanton', '2022-04-07', 'islam', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('548381520297266', '4471832698145953', NULL, 'Miss Filomena Lebsack', 'Johnpaul', 10, 'Manager', 'North Darwinmouth', '2016-02-26', 'buddha', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('561577786045633', '4166557304368970', NULL, 'Casper Gorczany', 'Kamryn', 4, 'Leader', 'Port Quentin', '2019-12-08', 'katolik', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('572296592649813', '3524781441281444', NULL, 'Fatima Ankunding', 'Lourdes', 3, 'Staff', 'Port Jennyfer', '2011-02-04', 'hindu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('580833112979509', '6914419379180584', NULL, 'Prof. Earline Beier PhD', 'Zackery', 3, 'Leader', 'Hageneshaven', '1974-08-29', 'katolik', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('598850838583649', '6280881821241978', NULL, 'Dr. Steve Wolf', 'Jaime', 6, 'Manager', 'Bruenton', '2006-01-26', 'islam', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('601038731996488', '3150350282856350', NULL, 'Mr. Davon Heaney Sr.', 'Diego', 6, 'Manager', 'Gorczanyside', '2012-12-01', 'hindu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('608373235042940', '7728648699158644', NULL, 'Omari Bartell', 'Jefferey', 10, 'Staff', 'Yasmeenstad', '2007-04-14', 'buddha', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('609941135117783', '5018336172829070', NULL, 'Mrs. Roxanne Shields PhD', 'Forrest', 4, 'Leader', 'Schaefertown', '2013-02-14', 'katolik', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('618572315852987', '1687636151963613', NULL, 'Lukas Walter', 'Johnathan', 5, 'Leader', 'Waltertown', '2014-11-27', 'khonghucu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('627807738422178', '8850634229480945', NULL, 'Magali Ernser', 'Buddy', 8, 'Staff', 'McKenziemouth', '1982-07-26', 'buddha', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('628243689679454', '6668035511517381', NULL, 'Leon Casper', 'Rhiannon', 3, 'Leader', 'Jewellside', '2001-02-08', 'islam', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('645896255531518', '8538926860958510', NULL, 'Creola Howell', 'Antwon', 6, 'Manager', 'Gradyville', '1988-05-11', 'hindu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('663006277478698', '3300822662268476', NULL, 'Felicita Considine MD', 'Donnie', 7, 'Leader', 'North Zoeyshire', '1972-09-06', 'islam', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('670520266856110', '6869481694416572', NULL, 'Owen Grady', 'Paris', 5, 'Leader', 'Lake Marilieton', '2017-07-27', 'katolik', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('685626284814457', '3928243711775939', NULL, 'Joey Sauer', 'Bernard', 7, 'Manager', 'Alessiamouth', '1984-05-15', 'hindu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('687193022894661', '3518095535482071', NULL, 'Violette Lueilwitz', 'Monty', 5, 'Manager', 'Aglaemouth', '1992-10-16', 'buddha', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('688904232769727', '8273644101743056', NULL, 'Prof. Cleta Boyle II', 'Domingo', 7, 'Leader', 'North Birdie', '2000-10-25', 'islam', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('708892935111984', '5755637434615127', NULL, 'Evans Flatley', 'Keyshawn', 3, 'Staff', 'Effertzland', '1977-09-06', 'kristen', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('711581907088460', '8878512351728104', NULL, 'Arden Cummings', 'Brent', 1, 'Staff', 'West Destintown', '1991-02-15', 'katolik', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('726904328076735', '4975909728312533', NULL, 'Bo Bashirian', 'Sid', 8, 'Staff', 'West Celestinoview', '1972-08-02', 'buddha', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('741748836245059', '2791468616332186', NULL, 'Toni Ferry', 'Stephon', 7, 'Leader', 'North Marcelina', '2014-08-25', 'khonghucu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('742284131208659', '4952830837212162', NULL, 'Ursula Ernser', 'Talon', 7, 'Manager', 'Goldenland', '2010-08-23', 'buddha', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('742592480984249', '2135724172009669', NULL, 'Jovany O\'Reilly', 'Dorcas', 5, 'Staff', 'Willmsside', '2019-06-28', 'khonghucu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('749302742743149', '4113484832268033', NULL, 'Mr. Elvis Eichmann', 'Wilber', 3, 'Leader', 'North Jamisonshire', '1979-12-10', 'kristen', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('769193890613730', '9921933852108978', NULL, 'Hector Adams', 'Kennedi', 9, 'Leader', 'Luettgenland', '2018-10-15', 'islam', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('770234533674270', '5889398091340587', NULL, 'Jarod Gottlieb II', 'Norval', 8, 'Staff', 'East Tyrese', '2005-01-26', 'islam', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('780720024874934', '8538524549244827', NULL, 'Bertha Runolfsson', 'Turner', 10, 'Manager', 'Kylerchester', '2023-12-20', 'kristen', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('781773816263091', '8117668282324058', NULL, 'Dr. Zachary Hudson', 'Rylan', 8, 'Leader', 'Alyceview', '2013-09-18', 'buddha', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('786801527733084', '9163217099772395', NULL, 'Demetris Bartell', 'Harrison', 2, 'Staff', 'West Howellton', '2003-10-18', 'kristen', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('800466707554537', '1481700049453628', NULL, 'Dahlia Schuppe', 'Christian', 2, 'Staff', 'Cathyside', '1976-06-07', 'hindu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('801231109215597', '8138870715542066', NULL, 'Pedro Kulas', 'Elmo', 10, 'Leader', 'O\'Connellmouth', '2010-04-05', 'katolik', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('809660170668890', '3815178583925842', NULL, 'Jamie Schmeler', 'Armani', 8, 'Leader', 'New Alexandra', '2012-07-26', 'kristen', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('836808019040139', '5495527191448262', NULL, 'Lon Mertz', 'Tristian', 1, 'Manager', 'North Jensen', '1980-08-16', 'khonghucu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('844872586188836', '1526041367234794', NULL, 'Julianne O\'Connell', 'Ronaldo', 4, 'Leader', 'Lake Dina', '1977-05-02', 'kristen', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('849899782385057', '8255726993379591', NULL, 'Miss Natasha Batz', 'Jamey', 7, 'Leader', 'Anyaport', '2001-09-02', 'katolik', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('862835162181491', '3906024011837158', NULL, 'Rosamond Von', 'Damian', 3, 'Manager', 'New Princebury', '1993-07-21', 'katolik', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('874078880377613', '9742042444646525', NULL, 'Hester Little', 'Braxton', 2, 'Manager', 'South Michele', '1982-12-01', 'hindu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('879463753104417', '3258878890883114', NULL, 'Dr. Kane Von', 'Jaylin', 5, 'Leader', 'North Jamisonfurt', '1992-05-17', 'kristen', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('880846098396923', '1252347072992841', NULL, 'Brisa Herzog', 'Kenyon', 9, 'Leader', 'Jaclynhaven', '2013-03-12', 'khonghucu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('880968240127827', '5217880742480244', NULL, 'Shaniya Crona', 'Ansel', 1, 'Leader', 'Lake Myrtie', '2021-02-24', 'katolik', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('890907343194437', '5809691842852584', NULL, 'Richie Blanda DDS', 'Maxwell', 1, 'Staff', 'Fritzmouth', '1998-01-26', 'khonghucu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('900355568650839', '6535381888560387', NULL, 'Margie Zieme', 'Jedidiah', 9, 'Manager', 'New Ryanchester', '1971-11-03', 'katolik', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('912126412766092', '7822953666147724', NULL, 'Mr. Ryan Balistreri', 'Roman', 7, 'Staff', 'Arichester', '2020-05-06', 'buddha', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('919178998967082', '4613463661537279', NULL, 'Godfrey Raynor', 'Jedediah', 8, 'Manager', 'Jadaview', '1983-01-25', 'buddha', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('945490526453332', '8421572424837855', NULL, 'Filomena Kessler', 'Simeon', 1, 'Staff', 'Larkinchester', '2007-09-21', 'buddha', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('948276575187016', '6029910061937383', NULL, 'Armand Ernser', 'Chad', 8, 'Staff', 'Shanieton', '2002-09-05', 'khonghucu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('950083536788951', '6414927137893345', NULL, 'Marjolaine Hilpert', 'Jordyn', 6, 'Manager', 'Port Damaris', '1994-09-10', 'islam', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('968162340637445', '3711002105018296', NULL, 'Katrine Boyle', 'Amari', 4, 'Manager', 'Schinnerberg', '2015-08-29', 'islam', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('974831534012558', '4001610754615240', NULL, 'Lyric Quitzon', 'Mack', 3, 'Staff', 'Lake Nathanielview', '2018-01-26', 'khonghucu', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('980140992459476', '2113581103010461', NULL, 'Maxime Lesch', 'Keanu', 7, 'Manager', 'Port Caseytown', '2003-03-19', 'katolik', '2024-06-16 08:08:04', '2024-06-16 08:08:04'),
('998199243148269', '6544607941386856', NULL, 'Camren O\'Connell', 'Logan', 9, 'Staff', 'Gulgowskiport', '2002-07-30', 'kristen', '2024-06-16 08:08:04', '2024-06-16 08:08:04');

-- --------------------------------------------------------

--
-- Table structure for table `penugasan`
--

CREATE TABLE `penugasan` (
  `idPenugasan` bigint UNSIGNED NOT NULL,
  `nip` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `idEvent` bigint UNSIGNED NOT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penugasan`
--

INSERT INTO `penugasan` (`idPenugasan`, `nip`, `idEvent`, `status`, `created_at`, `updated_at`) VALUES
(30, '189023210748783', 16, 'process', '2024-09-09 23:00:12', '2024-09-09 23:00:27'),
(36, '166002833561743', 3, 'ready', '2024-09-09 23:16:17', '2024-09-09 23:16:17'),
(37, '129770324493703', 3, 'ready', '2024-09-09 23:16:17', '2024-09-09 23:16:17'),
(38, '204759128356032', 3, 'ready', '2024-09-09 23:16:17', '2024-09-09 23:16:17'),
(39, '209555584319709', 3, 'ready', '2024-09-09 23:16:17', '2024-09-09 23:16:17'),
(40, '219376983168295', 3, 'ready', '2024-09-09 23:16:17', '2024-09-09 23:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikasi`
--

CREATE TABLE `sertifikasi` (
  `idSertifikasi` bigint UNSIGNED NOT NULL,
  `nip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idSertifikat` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sertifikasi`
--

INSERT INTO `sertifikasi` (`idSertifikasi`, `nip`, `idSertifikat`) VALUES
(7, '138041898929072', 1),
(9, '189023210748783', 2),
(10, '166002833561743', 2),
(13, '129770324493703', 2),
(15, '146687282031485', 3),
(16, '204759128356032', 2),
(17, '209555584319709', 2),
(18, '219376983168295', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `idSertifikat` bigint UNSIGNED NOT NULL,
  `namaSertifikat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalKeluaran` date NOT NULL,
  `lamaSertifikat` year NOT NULL,
  `levelSertifikat` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`idSertifikat`, `namaSertifikat`, `tanggalKeluaran`, `lamaSertifikat`, `levelSertifikat`, `created_at`, `updated_at`) VALUES
(1, 'Osbaldo Cummings', '2023-11-11', 2001, 3, '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(2, 'Alison Stiedemann V', '1998-10-09', 2004, 5, '2024-06-16 08:08:03', '2024-06-16 08:08:03'),
(3, 'Prof. Maryjane Glover', '1978-08-02', 2005, 2, '2024-06-16 08:08:03', '2024-06-16 08:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('epBqY8Z8a4Bku2k4LE5VXldjITBWgxyiyJd8xrfo', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSVlsV1ZzeHAyVFhwNElZR3pLWEdHcHA0UlFZOEhoWmFjSzRZbzVRdCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM2OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvZ2VuZXJhdGUtcGRmLzMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1725948987);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hakakses` int NOT NULL DEFAULT '2',
  `NIP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `hakakses`, `NIP`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@greedy.com', '2024-06-16 08:08:03', '$2y$12$ijIxjtS22kARzJO6HbphkuXFYcO1xk1j2Ao2v/MzdbnXHBnidEIBG', '1', 1, NULL, '01yv3S6he3XV7RJV0pGBJAhLWH6KWxLvO2yBJiW7QrjelBismGG8C1NtPkl2', '2024-06-16 08:08:04', '2024-06-16 08:08:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`idBagian`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`idEvent`);

--
-- Indexes for table `event_sertifikat`
--
ALTER TABLE `event_sertifikat`
  ADD PRIMARY KEY (`idEventSertifikat`),
  ADD KEY `event_sertifikat_idevent_foreign` (`idEvent`),
  ADD KEY `event_sertifikat_idsertifikat_foreign` (`idSertifikat`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `pegawai_bagian_foreign` (`bagian`);

--
-- Indexes for table `penugasan`
--
ALTER TABLE `penugasan`
  ADD PRIMARY KEY (`idPenugasan`),
  ADD KEY `penugasan_idevent_foreign` (`idEvent`);

--
-- Indexes for table `sertifikasi`
--
ALTER TABLE `sertifikasi`
  ADD PRIMARY KEY (`idSertifikasi`),
  ADD KEY `sertifikasi_idsertifikat_foreign` (`idSertifikat`);

--
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`idSertifikat`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `idBagian` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `idEvent` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `event_sertifikat`
--
ALTER TABLE `event_sertifikat`
  MODIFY `idEventSertifikat` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `penugasan`
--
ALTER TABLE `penugasan`
  MODIFY `idPenugasan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `sertifikasi`
--
ALTER TABLE `sertifikasi`
  MODIFY `idSertifikasi` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `idSertifikat` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_sertifikat`
--
ALTER TABLE `event_sertifikat`
  ADD CONSTRAINT `event_sertifikat_idevent_foreign` FOREIGN KEY (`idEvent`) REFERENCES `event` (`idEvent`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_sertifikat_idsertifikat_foreign` FOREIGN KEY (`idSertifikat`) REFERENCES `sertifikat` (`idSertifikat`) ON DELETE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_bagian_foreign` FOREIGN KEY (`bagian`) REFERENCES `bagian` (`idBagian`) ON DELETE SET NULL;

--
-- Constraints for table `penugasan`
--
ALTER TABLE `penugasan`
  ADD CONSTRAINT `penugasan_idevent_foreign` FOREIGN KEY (`idEvent`) REFERENCES `event` (`idEvent`) ON DELETE CASCADE;

--
-- Constraints for table `sertifikasi`
--
ALTER TABLE `sertifikasi`
  ADD CONSTRAINT `sertifikasi_idsertifikat_foreign` FOREIGN KEY (`idSertifikat`) REFERENCES `sertifikat` (`idSertifikat`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
