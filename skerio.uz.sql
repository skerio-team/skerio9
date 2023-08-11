-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 16, 2022 at 11:38 AM
-- Server version: 10.3.35-MariaDB-log-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_skerio_db`
--
CREATE DATABASE IF NOT EXISTS `laravel_skerio_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `laravel_skerio_db`;

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `region_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Andijon shahar', '2022-07-08 03:38:42', '2022-07-12 07:21:50'),
(2, 1, 'Andijon tumani', '2022-07-08 03:38:57', '2022-07-12 07:22:00'),
(3, 1, 'Asaka tumani', '2022-07-12 07:22:56', '2022-07-12 07:22:56'),
(4, 1, 'Baliqchi tumani', '2022-07-12 07:23:07', '2022-07-12 07:23:07'),
(5, 1, 'Buloqboshi tumani', '2022-07-12 07:23:58', '2022-07-12 07:23:58'),
(6, 1, 'Bo\'ston tumani', '2022-07-12 07:24:10', '2022-07-12 07:24:10'),
(7, 1, 'Izboskan tumani', '2022-07-12 07:24:56', '2022-07-12 07:24:56'),
(8, 1, 'Jalaquduq tumani', '2022-07-12 07:25:05', '2022-07-12 07:25:05'),
(9, 1, 'Xo\'jaobod tumani', '2022-07-12 07:25:17', '2022-07-12 07:25:17'),
(10, 1, 'Qo\'rg\'ontepa tuman', '2022-07-12 07:25:25', '2022-07-12 07:25:25'),
(11, 1, 'Marhamat tumani', '2022-07-12 07:25:48', '2022-07-12 07:25:48'),
(12, 1, 'Oltin ko\'l tumani', '2022-07-12 07:28:40', '2022-07-12 07:28:40'),
(13, 1, 'Paxtaobod tumani', '2022-07-12 07:28:56', '2022-07-12 07:28:56'),
(14, 1, 'Shahrixon tumani', '2022-07-12 07:29:06', '2022-07-12 07:29:06'),
(15, 1, 'Ulug\'nor tumani', '2022-07-12 07:29:17', '2022-07-12 07:29:17'),
(16, 1, 'Madaniyat tumani', '2022-07-12 07:29:24', '2022-07-12 07:29:24');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(2, 'PUMA', '1657263231_puma-vector-logo-3.png', '2022-07-08 01:53:51', '2022-07-08 01:53:51'),
(3, 'ADIDAS', '1657607410_sports-logo-png-transparent.png', '2022-07-08 01:54:11', '2022-07-12 01:30:10'),
(4, 'REEBOK', '1657263269_reebok.jpg', '2022-07-08 01:54:29', '2022-07-08 01:54:29'),
(5, 'NIKE', '1657607398_33e63d5adb0da6b303a83901c8e8463a.png', '2022-07-12 01:29:58', '2022-07-12 01:29:58'),
(6, 'NB', '1657607567_New_Balance-Logo.wine.png', '2022-07-12 01:32:47', '2022-07-12 01:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `user_id`, `product_id`, `quantity`, `size`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '0', 'XL', NULL, NULL),
(2, 1, 4, '0', 'X', NULL, NULL),
(3, 1, 3, '0', 'XL', NULL, NULL),
(4, 1, 4, '0', 'X', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `created_at`, `updated_at`) VALUES
(1, 'O\'zbekiston', '2022-07-08 03:37:44', '2022-07-12 07:17:25');

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
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sport_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`id`, `sport_category_id`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 1, '1657783831_cr-removebg-preview.png', 'meta', 'meta', 'meta', '2022-07-13 01:17:59', '2022-07-14 02:30:31'),
(2, 2, '1657789290_unnamed-removebg-preview.png', 'meta', 'meta', 'meta', '2022-07-13 01:23:41', '2022-07-14 04:01:30'),
(3, 3, '1657787381_muhammad_ali___greatest_of_all_time_by_manfrini98_dd7barc-pre-removebg-preview.png', 'meta', 'meta', 'meta', '2022-07-13 01:25:45', '2022-07-14 03:29:41'),
(4, 4, '1657784386_803-8037743_tennis-player-tennis-player-3d-png.png', 'meta', NULL, 'meta', '2022-07-13 01:28:29', '2022-07-14 02:39:46'),
(5, 6, '1657787489_UFC-Player-PNG-removebg-preview.png', 'meta', 'meta', 'meta', '2022-07-13 01:46:05', '2022-07-14 03:31:29'),
(6, 5, '1657788397_63-630509_swimming-dive-people-swimming-png-removebg-preview.png', 'meta', 'meta', 'meta', '2022-07-14 03:34:26', '2022-07-14 03:46:37'),
(7, 7, '1657788900_532-5329661_college-basketball-player-dunking-hd-png-download-removebg-preview.png', 'meta', 'meta', 'meta', '2022-07-14 03:52:14', '2022-07-14 03:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `home_translations`
--

CREATE TABLE `home_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_translations`
--

INSERT INTO `home_translations` (`id`, `locale`, `home_id`, `title`, `description`) VALUES
(1, 'uz', 1, '\"Men hayot haqida hamma narsani oyog\'imdagi to\'p bilan o\'rgandim\" Ronaldinyo', '<div>“Men perfektsionist emasman, lekin ishlar yaxshi bajarilganini his qilishni yaxshi ko\'raman. Bundan ham muhimi, men nafaqat murabbiy va muxlislarni xursand qilish, balki o\'zimdan qoniqish hosil qilish uchun ham o\'rganish, takomillashtirish, rivojlanishga cheksiz ehtiyoj sezaman. Ishonchim komilki, bu erda o\'rganish uchun hech qanday cheklov yo\'q va u bizning yoshimizdan qat\'i nazar, hech qachon to\'xtab qolmaydi».</div><div>\"Krishtianu Ronaldu\"</div>'),
(2, 'ru', 1, '«Я узнал все о жизни с мячом в ногах» Роналдиньо', '<div>«Я не перфекционист, но мне нравится чувствовать, что все сделано хорошо. Что еще более важно, я чувствую бесконечную потребность учиться, совершенствоваться, развиваться, не только для того, чтобы нравиться тренеру и болельщикам, но и для того, чтобы быть довольным собой. Я убежден, что нет пределов обучению, и что оно никогда не может остановиться, независимо от нашего возраста».</div><div>Криштиану Роналду</div>'),
(3, 'en', 1, '“I learned all about life with a ball at my feet” Ronaldinho', '<div><font color=\"#212121\">“I am not a perfectionist, but I like to feel that things are done well. More important than that, I feel an endless need to learn, to improve, to evolve, not only to please the coach and the fans but also to feel satisfied with myself. It is my conviction that here are no limits to learning, and that it can never stop, no matter what our age.”</font></div><div><font color=\"#212121\">\"Cristiano Ronaldo\"</font></div>'),
(4, 'uz', 2, '\"Tavsiya qilamanki, agar siz  harakat qilsangiz, bu sizni mustahkamlaydi va sizni eng yaxshisi qiladi.\" -- Kerri Uolsh Jennings', '<div>“O\'yinda yana bir imkoniyatni xohlashdan yomonroq narsa yo\'q, chunki siz tayyor bo\'lmaysiz. Har bir sportchi bu his-tuyg\'ularni qayta-qayta o\'ylashi kerak... \" - Karch Kiraly<br></div>'),
(5, 'ru', 2, '«Невзгоды, если вы позволите им это, укрепят вас и сделают вас лучше, чем вы можете быть». -- Керри Уолш Дженнингс', '<div>«Нет ничего хуже, чем желание получить еще один шанс на игру, потому что вы не были готовы. У каждого спортсмена есть эти чувства, которые нужно обдумывать снова и снова… Даже не подвергайте себя возможности быть застигнуты врасплох.\" -- Карч Кирали<br></div>'),
(6, 'en', 2, '\"Adversity, if you allow it to, will fortify you and make you the best you can be.\" -- Kerri Walsh Jennings', '<p>\"There\'s nothing worse than the feeling of wishing you had another chance at a play because you weren\'t ready. Every athlete has those feelings to mull over, and over and over ... Don\'t even expose yourself to the possibility to being caught off-guard.\" -- <span style=\"font-weight: 900;\">Karch Kiraly</span></p>'),
(7, 'uz', 3, '\"Men mashg\'ulotning har bir daqiqasidan nafratlanardim, lekin men:\" To\'xtama, dedim. Hozir azob chek va umringni qolgan qismini chempion sifatida o\'tkaz.\" - Muhammad Ali', '<div>“Qahramon ham, qo‘rqoq ham bir xil narsani his qiladi. Ammo qahramon qo\'rqoq qochayotgan paytda o\'z qo\'rquvini yengadi, uni raqibiga qaratadi. Bu xuddi shunday, qo\'rquv, lekin u bilan nima qilayotganingiz muhim.\" - Cus D\'amato<br></div>'),
(8, 'ru', 3, '«Я ненавидел каждую минуту тренировок, но я сказал: «Не бросай. Страдай сейчас и проживи остаток своей жизни как чемпион». -Мухаммед Али', '<div><br></div><div><br></div><div>«Герой и трус чувствуют одно и то же. Но герой использует свой страх, проецирует его на противника, а трус бежит. Это то же самое, страх, но важно то, что вы с ним делаете». -Кас Д’Амато<br></div>'),
(9, 'en', 3, '“I hated every minute of training, but I said, ‘Don’t quit. Suffer now and live the rest of your life as a champion’.” –Muhammad Ali', '<p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-size: 1.5em; font-style: italic; line-height: 1.6; color: rgb(33, 33, 33); font-family: -apple-system, system-ui, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\";\"=\"\"><b><br></b></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-size: 1.5em; font-style: italic; line-height: 1.6; color: rgb(33, 33, 33); font-family: -apple-system, system-ui, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\";\"=\"\"><strong style=\"font-size: 19.26px; color: rgb(51, 51, 51); font-family: \"Open Sans\", sans-serif; font-style: normal;\"> “The hero and the coward both feel the same thing. But the hero uses his fear, projects it onto his opponent, while the coward runs. It’s the same thing, fear, but it’s what you do with it that matters.” -Cus D’amato</strong><br></p>'),
(10, 'uz', 4, 'Qat\'iylik muvaffaqiyatsizlikni favqulodda yutuqga aylantirishi mumkin.  Marv Levi', '<div>Ko\'p odamlar muvaffaqiyatga erishmoqchi bo\'lganlarida taslim bo\'lishadi. Ular bir hovli chizig\'ida ketishdi. Ular o\'yinning so\'nggi daqiqasida g\'alaba qozongandan bir fut uzoqlikda taslim bo\'lishadi.</div><div><br></div><div>Ross Perot</div>'),
(11, 'ru', 4, 'Настойчивость может превратить неудачу в выдающееся достижение.  Марв Леви', '<div>Большинство людей сдаются именно тогда, когда они вот-вот достигнут успеха. Они остановились на линии в один ярд. Они сдаются в последнюю минуту игры в одном футе от победного тачдауна.</div><div><br></div><div>Росс Перо</div>'),
(12, 'en', 4, 'Persistence can change failure into extraordinary achievement.  Marv Levy', '<p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-size: 1.5em; font-style: italic; line-height: 1.6; color: rgb(33, 33, 33); font-family: -apple-system, system-ui, BlinkMacSystemFont, \"segoe ui\", Helvetica, Arial, sans-serif, \"apple color emoji\", \"segoe ui emoji\", \"segoe ui symbol\";\">Most people give up just when they’re about to achieve success. They quit on the one yard line. They give up at the last minute of the game one foot from a winning touchdown.</p><cite style=\"box-sizing: inherit; text-align: right; display: block; font-size: 1.125em; color: rgb(33, 33, 33); font-family: -apple-system, system-ui, BlinkMacSystemFont, \"segoe ui\", Helvetica, Arial, sans-serif, \"apple color emoji\", \"segoe ui emoji\", \"segoe ui symbol\";\">Ross Perot</cite>'),
(13, 'uz', 5, 'Men har bir mag\'lubiyatdan konstruktiv narsa kelib chiqishini bilib oldim.  Tom Landri', '<div>Men to\'pni o\'tkazib yuborishga urinishni to\'xtatib, ularni urishga harakat qila boshlaganimdagina yaxshi o\'yinchiga aylandim.</div><div><br></div><div>Sandy Koufax</div>'),
(14, 'ru', 5, 'Я понял, что из каждого поражения исходит что-то конструктивное.  Том Лэндри', '<div>Я стал хорошим питчером, когда перестал пытаться заставить их пропустить мяч и начал пытаться заставить их ударить по нему.</div><div><br></div><div>Сэнди Куфакс</div>'),
(15, 'en', 5, 'I’ve learned that something constructive comes from every defeat.  Tom Landry', '<p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-size: 1.5em; font-style: italic; line-height: 1.6; color: rgb(33, 33, 33); font-family: -apple-system, system-ui, BlinkMacSystemFont, \"segoe ui\", Helvetica, Arial, sans-serif, \"apple color emoji\", \"segoe ui emoji\", \"segoe ui symbol\";\">I became a good pitcher when I stopped trying to make them miss the ball and started trying to make them hit it.</p><cite style=\"box-sizing: inherit; text-align: right; display: block; font-size: 1.125em; color: rgb(33, 33, 33); font-family: -apple-system, system-ui, BlinkMacSystemFont, \"segoe ui\", Helvetica, Arial, sans-serif, \"apple color emoji\", \"segoe ui emoji\", \"segoe ui symbol\";\">Sandy Koufax</cite>'),
(16, 'uz', 6, '\"Har doim suv kabi bo\'l. Og\'riqli paytlarda suz yoki uning yuzasiga tegib turgan shamol bo\'ylab to\'lqinlar kabi raqsga tush.\"', '“Suzish men uchun odatiy hol. men xotirjamman. Men o`zimni yaxshi his qilaman va atrofimni kuzataman. Bu mening uyim.\" - Maykl Felps'),
(17, 'ru', 6, '«Всегда будь подобен воде. Плыви во времена боли или танцуй, как волны, на ветру, касающемся ее поверхности».', '«Плавание для меня нормально. Я расслаблен. Мне комфортно, и я знаю свое окружение. Это мой дом». - Майкл Фелпс'),
(18, 'en', 6, '\"Always be like a water. Float in the times of pain or dance like waves along the wind which touches its surface.\"', '<h2 style=\"margin-bottom: 20px; font-size: 32px; line-height: 36px; letter-spacing: -0.3px; margin-left: 20px; font-family: Inter, sans-serif;\">“Swimming is normal for me. I’m relaxed. I’m comfortable, and I know my surroundings. It’s my home.” — Michael Phelps </h2>'),
(19, 'uz', 7, '\"Qobiliyat sizni cho\'qqiga olib chiqishi mumkin, ammo sizni u erda ushlab turish uchun xarakter kerak.\" - Jon Vuden', '<div>“Muvaffaqiyatga erishish uchun siz o`zingizni o`ylashingiz kerak, aks holda hech qachon erisha olmaysiz. Va eng yuqori darajaga erishganingizdan so\'ng, siz fidoyi bo\'lishingiz kerak. Harakatchan bo\'ling. Dangasa bo\'lmang”</div><div>- Maykl Jordan</div>'),
(20, 'ru', 7, '«Способности могут привести вас к вершине, но чтобы удержать вас там, нужен характер». ― Джон Вуден', '<p><br></p><p>«Чтобы быть успешным, вы должны быть эгоистичными, иначе вы никогда не добьетесь успеха. И как только вы достигнете своего высшего уровня, вы должны быть бескорыстными. Оставайтесь на связи. Оставайтесь на связи. Не изолируйте».</p><p>- Майкл Джордан</p><p>  </p>'),
(21, 'en', 7, '“Ability may get you to the top, but it takes character to keep you there.” ― John Wooden', '<p><br></p><p><span style=\"color: rgb(24, 24, 24); font-family: Merriweather, Georgia, serif;\">“To be successful you have to be selfish, or else you never achieve. And once you get to your highest level, then you have to be unselfish. Stay reachable. Stay in touch. Don\'t isolate.”</span><br style=\"color: rgb(24, 24, 24); font-family: Merriweather, Georgia, serif;\"><span style=\"color: rgb(24, 24, 24); font-family: Merriweather, Georgia, serif;\">― </span><span class=\"authorOrTitle\" style=\"font-family: Lato, \"Helvetica Neue\", Helvetica, sans-serif; font-weight: bold; color: rgb(51, 51, 51);\">Michael Jordan</span><br></p><p>  </p>');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `news_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `news_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2022-07-12 00:06:56', '2022-07-12 00:06:56'),
(2, 2, 3, '2022-07-12 00:07:01', '2022-07-12 00:07:01'),
(3, 2, 6, '2022-07-12 00:07:05', '2022-07-12 00:07:05'),
(13, 5, 4, '2022-07-14 01:11:31', '2022-07-14 01:11:31'),
(14, 5, 8, '2022-07-14 01:11:33', '2022-07-14 01:11:33'),
(15, 5, 9, '2022-07-14 01:11:35', '2022-07-14 01:11:35'),
(16, 5, 3, '2022-07-14 01:14:27', '2022-07-14 01:14:27'),
(17, 5, 7, '2022-07-14 01:14:32', '2022-07-14 01:14:32'),
(18, 5, 5, '2022-07-14 01:20:28', '2022-07-14 01:20:28'),
(21, 12, 5, '2022-07-14 01:22:16', '2022-07-14 01:22:16'),
(31, 12, 4, '2022-07-14 07:08:20', '2022-07-14 07:08:20'),
(32, 12, 3, '2022-07-14 07:08:24', '2022-07-14 07:08:24'),
(33, 12, 2, '2022-07-14 10:15:48', '2022-07-14 10:15:48'),
(34, 12, 8, '2022-07-14 23:05:02', '2022-07-14 23:05:02'),
(35, 12, 7, '2022-07-14 23:05:06', '2022-07-14 23:05:06'),
(36, 12, 6, '2022-07-14 23:05:10', '2022-07-14 23:05:10');

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
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_05_28_092220_create_homes_table', 1),
(11, '2022_05_28_092452_create_home_translations_table', 1),
(12, '2022_05_30_033101_create_sport_categories_table', 1),
(13, '2022_05_30_034414_create_sport_category_translations_table', 1),
(14, '2022_05_30_061854_create_news_table', 1),
(15, '2022_05_30_061944_create_news_translations_table', 1),
(16, '2022_05_30_061950_create_comments_table', 1),
(17, '2022_05_30_090134_create_sessions_table', 1),
(18, '2022_05_30_090404_create_countries_table', 1),
(19, '2022_05_30_090418_create_regions_table', 1),
(20, '2022_05_30_090515_create_areas_table', 1),
(21, '2022_05_30_092129_create_sport_complexes_table', 1),
(22, '2022_05_30_092407_create_sport_complex_translations_table', 1),
(23, '2022_06_01_052034_create_brands_table', 1),
(24, '2022_06_01_052842_create_products_table', 1),
(25, '2022_06_01_053043_create_product_translations_table', 1),
(26, '2022_06_01_054644_create_product_categories_table', 1),
(27, '2022_06_02_063551_create_product_size_table', 1),
(28, '2022_06_02_064354_create_sizes_table', 1),
(29, '2022_06_04_055727_create_teams_table', 1),
(30, '2022_06_06_064440_create_product_category_translations_table', 1),
(31, '2022_06_06_064517_create_permission_tables', 1),
(32, '2022_06_12_092427_create_stadiums_table', 1),
(33, '2022_06_12_114344_create_stadium_sections_table', 1),
(34, '2022_06_13_065930_create_tickets_table', 1),
(35, '2022_06_13_084230_create_ticket_translations_table', 1),
(36, '2022_06_16_053458_create_likes_table', 1),
(37, '2022_06_29_091403_create_shop_likes_table', 1),
(38, '2022_07_04_080647_create_cards_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 62);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sport_category_id` bigint(20) UNSIGNED NOT NULL,
  `continent_id` enum('europe','asia') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `popularity` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `sport_category_id`, `continent_id`, `image`, `status`, `special`, `popularity`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 3, 'asia', '1657263071_1.jpg', '1', '1', 0, 'isroil-madrimov-jang-oldi-ochiq-mashgulotlarda-ishtirok-etdi-fotogalereya', 'meta-title', 'meta-description', 'meta-tag', '2022-07-08 01:51:11', '2022-07-08 01:51:11'),
(2, 1, 'asia', '1657263236_4.jpg', '1', '1', 0, 'masharipovning-songgi-daqiqada-urgan-goli-jamoasiga-galaba-keltirdi-uning-jamoasi-uchun-turnir-yakuniga-etdi-turnir-jadvali', 'meta-title', 'meta-description', 'meta-tag', '2022-07-08 01:53:56', '2022-07-08 01:53:56'),
(3, 1, 'asia', '1657263363_5.jpg', '1', '1', 0, 'ofk-kubogi-gollar-shousiga-aylangan-uchrashuvda-sogdiyona-qiyin-galabani-qolga-kiritdi', 'meta-title', 'meta-description', 'meta-tag', '2022-07-08 01:56:03', '2022-07-08 01:56:03'),
(4, 1, 'europe', '1657263512_6.jpg', '1', '1', 0, 'real-zor-hujumchi-oldi', 'meta-title', 'meta-description', 'meta-tag', '2022-07-08 01:58:32', '2022-07-08 01:58:32'),
(5, 3, 'asia', '1657263646_7.jpg', '1', '1', 0, 'jasurbek-latipov-yaratganning-ozi-kuch-berdihali-aytadigan-sozlarim-bor', 'meta-title', 'meta-description', 'meta-tag', '2022-07-08 02:00:46', '2022-07-08 02:00:46'),
(6, 3, 'asia', '1657269946_8.jpg', '0', '0', 0, 'ozbekistonlik-bokschi-wba-chempionlik-kamari-uchun-jang-qiladi-raqib-malum', 'meta-title', 'meta-description', 'meta-tag', '2022-07-08 03:45:46', '2022-07-12 01:06:16'),
(7, 3, 'asia', '1657604416_2.jpg', '0', '0', 0, 'isroil-madrimov-jang-oldi-ochiq-mashgulotlarda-ishtirok-etdi-fotogalereya', 'meta-title', 'meta-description', 'meta-tag', '2022-07-12 00:40:16', '2022-07-12 01:05:47'),
(8, 1, 'asia', '1657606207_9.jpg', '1', '1', 0, 'masharipovning-songgi-daqiqada-urgan-goli-jamoasiga-galaba-keltirdi-uning-jamoasi-uchun-turnir-yakuniga-etdi-turnir-jadvali', 'meta-title', 'meta-description', 'meta-tag', '2022-07-12 01:10:07', '2022-07-12 01:10:07'),
(9, 3, 'europe', '1657696038_8.jpg', '1', '1', 0, 'ofk-kubogi-gollar-shousiga-aylangan-uchrashuvda-sogdiyona-qiyin-galabani-qolga-kiritdi', 'meta-title', 'meta-description', 'meta-tag', '2022-07-13 02:07:18', '2022-07-13 02:07:18');

-- --------------------------------------------------------

--
-- Table structure for table `news_translations`
--

CREATE TABLE `news_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_translations`
--

INSERT INTO `news_translations` (`id`, `locale`, `news_id`, `title`, `description`) VALUES
(1, 'uz', 1, 'Isroil Madrimov jang oldi ochiq mashg‘ulotlarda ishtirok etdi (fotogalereya)', '<p style=\"font-size: 16px; line-height: 24px; color: var(--sp-black-700); font-family: Inter, sans-serif;\">9 iyul kuni Angliyaning London Shahrida joylashgan \"O2\" arenasida bo‘lib o‘tuvchi boks oqshomida hamyurtimiz Isroil Madrimov Mishel Soroga qarshi revansh bahsida ringga ko‘tariladi.&nbsp;<span style=\"color: var(--sp-black-700);\">Oqshom oldidan rasmiy tadbirlar davom etmoqda. Kecha bokschilar ochiq mashg‘ulotlarda ishtirok etdi.</span></p>'),
(2, 'ru', 1, 'Исраил Мадримов принял участие в открытой тренировке перед боем (фотогалерея)', '<div>9 июля наш земляк Исраил Мадримов выйдет на ринг в матче-реванше против Мишеля Соро на вечере бокса на O2 Arena в Лондоне, Англия. Формальные мероприятия продолжаются до вечера. Вчера боксеры приняли участие в открытой тренировке.</div>'),
(3, 'en', 1, 'Israil Madrimov took part in pre-fight open training (photo gallery)', '<div>On July 9, our countryman Israil Madrimov will enter the ring in a rematch against Michel Soro at the boxing evening at the O2 Arena in London, England. Formal events continue before the evening. Boxers took part in open training yesterday.</div>'),
(4, 'uz', 2, 'Masharipovning so‘nggi daqiqada urgan goli jamoasiga g‘alaba keltirdi. Uning jamoasi uchun turnir yakuniga etdi (turnir jadvali)', '<span style=\"color: rgba(34, 34, 34, 0.75); font-family: Inter, sans-serif; font-size: 16px;\">Saudiya Arabistoni chempionati so‘nggi turidan o‘rin olgan \"Al-Nassr\" - \"Al-Xulaif\" uchrashuvi yakuniga etdi. Unda mezbonlar 2:1 hisobida raqibdan ustun keldi.&nbsp;</span><span style=\"color: rgba(34, 34, 34, 0.75); font-family: Inter, sans-serif; font-size: 16px;\">Dastlab, 13-daqiqada Martinez hisobni ochdi. 37-daqiqada Al-Xulaif muvozanatni tikladi. Uchrashuvning qo‘shib berilgan daqiqalarida legionerimiz Masharipov jamoasiga g‘alaba keltirgan golga mualliflik qildi.&nbsp;</span><span style=\"color: rgba(34, 34, 34, 0.75); font-family: Inter, sans-serif; font-size: 16px;\">Shu tariqa, \"Al-Nassr\" yakuniy turnir jadvalida 61 ochko bilan uchinchi o‘rinni band etdi.</span>'),
(5, 'ru', 2, 'Гол Машарипова на последней минуте принес победу его команде. Турнир для его команды завершен (таблица)', '<div>Завершился матч между «Аль-Наср» и «Аль-Хулайф», состоявшийся в рамках последнего тура чемпионата Саудовской Аравии. Хозяева обыграли соперника со счетом 2:1. Изначально, на 13-й минуте, Мартинес открыл счет. На 37-й минуте Аль-Хулайф восстановил равновесие. В добавленные минуты матча наш легионер Машарипов забил победный гол для своей команды. Таким образом, «Аль-Наср» занял третье место в итоговой турнирной таблице с 61 очком.</div>'),
(6, 'en', 2, 'Masharipov\'s last-minute goal brought victory to his team. The tournament is over for his team (table)', '<div>The match between \"Al-Nassr\" and \"Al-Khulaif\", which took place in the last round of the Saudi Arabian Championship, has ended. The home team beat the opponent 2:1. Initially, in the 13th minute, Martinez opened the scoring. In the 37th minute, Al Khulaif restored the balance. In the added minutes of the match, our legionnaire Masharipov scored the winning goal for his team. Thus, \"Al-Nassr\" took the third place in the final tournament table with 61 points.</div>'),
(7, 'uz', 3, 'OFK kubogi. Gollar shousiga aylangan uchrashuvda \"So‘g‘diyona\" qiyin g‘alabani qo‘lga kiritdi', '<p style=\"font-size: 16px; line-height: 24px; color: var(--sp-black-700); font-family: Inter, sans-serif;\">OFK Kubogi 2-turidan o‘rin olgan SSKA - \"So‘g‘diyona\" uchrashuvi yakuniga etdi. Unda jizzaxliklar 3:2 hisobida zafar quchdi.&nbsp;<span style=\"color: var(--sp-black-700);\">\"Bo‘rilar\" safida Shohruz Norxonov dubl qayd etgan bo‘lsa, Jasur Hasanov o‘z nomiga bir golni yozdirib qo‘ydi. Mezbonlar tarkibida Elchibek Rashidbekov hamda Hurshed Jo‘raev Mitrovich darvozasini ishg‘ol etdi.&nbsp;</span><span style=\"color: var(--sp-black-700);\">Shu tariqa, Baqoev shogirdlari ochkolari sonini 6 taga etkazib oldi.</span></p>'),
(8, 'ru', 3, 'Кубок АФК. «Согдиана» одержала упорную победу в матче, который превратился в шоу голов', '<div>Завершился матч между ЦСКА и Согдианой, проходивший в рамках 2-го тура Кубка АФК. Джизакчане выиграли со счетом 3:2. Шахруз Норханов оформил дубль за «волков», а Жасур Гасанов забил один гол. В ворота Митровича забили Эльчибек Рашидбеков и Хуршед Джораев. Таким образом, количество баллов учеников Багоева достигло 6.</div>'),
(9, 'en', 3, 'AFC Cup. \"Sogdiyona\" won a hard-fought victory in the match, which turned into a show of goals', '<div>The match between CSKA and Sogdiyona, which took place in the 2nd round of the AFC Cup, has come to an end. Jizzakh people won 3:2. Shahruz Norkhanov scored a double for the \"Wolves\", while Jasur Hasanov scored one goal. Elchibek Rashidbekov and Hurshed Joraev scored against Mitrovich as part of the hosts. In this way, the number of points of Bagoev\'s students reached 6.</div>'),
(10, 'uz', 4, '“Real” zo‘r hujumchi oldi', '<p style=\"font-size: 16px; line-height: 24px; color: var(--sp-black-700); font-family: Inter, sans-serif;\">“Real” yangi mavsum oldidan “Deportivo” va Ispaniya yoshlar terma jamoasi hujumchisi Noel Lopesni qo‘lga kiritdi.&nbsp;<span style=\"color: var(--sp-black-700);\">Bu transfer madridliklar uchun 600 ming evroga tushdi.&nbsp;</span><span style=\"color: var(--sp-black-700);\">19 yoshli hujumchi asosiy tarkibga oldin o‘z mahoratini “Kastilya” safida sayqallab oladi.&nbsp;</span><span style=\"color: var(--sp-black-700);\">Ayni paytda “Real” bu o‘yinchi xizmatlariga ehtiyoj sezmayapti. Lopes kelajak uchun xarid qilingani aytilmoqda.&nbsp;</span><span style=\"color: var(--sp-black-700);\">Noel o‘zini tarbiyalagan “Deportivo”ning asosiy tarkibida 32 ta uchrashuvda maydonga tushib, to‘rtta gol urishga muvaffaq bo‘lgan.</span></p>'),
(11, 'ru', 4, '«Реал» получил отличного форварда', '<div>Перед новым сезоном «Реал» приобрел нападающего «Депортиво» и молодежной сборной Испании Ноэля Лопеса. Этот трансфер обошелся Мадриду в 600 000 евро. 19-летний форвард будет оттачивать свое мастерство в «Кастилье», прежде чем присоединиться к основной команде. На данный момент «Реал» не испытывает потребности в услугах этого игрока. Говорят, что Лопеса купили на будущее. В основном составе «Депортиво», где он тренировался, Ноэль провел 32 матча и сумел забить четыре гола.</div>'),
(12, 'en', 4, '\"Real\" got an excellent striker', '<div>Before the new season, \"Real\" acquired Noel Lopez, the striker of \"Deportivo\" and the Spanish youth national team. This transfer cost 600,000 euros for Madrid. The 19-year-old forward will hone his skills at Castilla before joining the first team.</div><div>At the moment, \"Real\" does not feel the need for the services of this player. Lopez is said to be bought for the future. Noel played in 32 matches in the main team of Deportivo, where he was trained, and managed to score four goals.</div>'),
(13, 'uz', 5, 'Jasurbek Latipov: \"Yaratganning o‘zi kuch berdi.Hali aytadigan so‘zlarim bor!\"', '<p style=\"font-size: 16px; line-height: 24px; color: var(--sp-black-700); font-family: Inter, sans-serif;\">O‘zbekiston boks olamida Jasurbek Latipovni o‘z o‘rni bor.Ushbu charmqo‘lqop ustasi eng sovrindor bokschilarimiz sarasiga kiradi.&nbsp;<span style=\"color: var(--sp-black-700);\">Jasurbek boksni tark etib, murabbiylik bilan shug‘ullanayotgan edi. Biroq, yana katta sportga qaytganini ma’lum qildi. Biz ushbu sportchimiz bilan bog‘lanib, boksga qaytishi va rejalari haqidagi fikrlari bilan qiziqdik.</span></p><div id=\"native_network_video\" style=\"color: rgb(33, 37, 41); font-family: Inter, sans-serif;\"></div><p style=\"font-size: 16px; line-height: 24px; color: var(--sp-black-700); font-family: Inter, sans-serif;\">-&nbsp;<em><span style=\"font-weight: bolder;\">Boksga qaytganingizni eshitib xursand bo‘ldik. Bunga sabab nima bo‘ldi?</span></em></p><p style=\"font-size: 16px; line-height: 24px; color: var(--sp-black-700); font-family: Inter, sans-serif;\"><em style=\"color: var(--sp-black-700);\">- To‘g‘risi onamining vafotidan so‘ng, biroz xohish so‘ngandi. 2,5 yillik tanaffusdan keyin yana Yaratganni o‘zi kuch bag‘ishladi va imkoniyatimga bo‘lgan ishonch ortdi. Shuning uchun boksga yana qaytishga qaror qildim.&nbsp;</em></p><p style=\"font-size: 16px; line-height: 24px; color: var(--sp-black-700); font-family: Inter, sans-serif;\"><em>-&nbsp;<span style=\"font-weight: bolder;\">Qaysi yo‘nalishda faoliyat yuritmoqchisiz?</span></em></p><p style=\"font-size: 16px; line-height: 24px; color: var(--sp-black-700); font-family: Inter, sans-serif;\"><em>- Havaskor hamda professionallarda ham omadimni sinab ko‘rmoqchiman.</em></p><p style=\"font-size: 16px; line-height: 24px; color: var(--sp-black-700); font-family: Inter, sans-serif;\"><em>-&nbsp;<span style=\"font-weight: bolder;\">Havaskor yo‘nalishda qaysi vaznda harakat qilishini ko‘zlab</span>&nbsp;<span style=\"font-weight: bolder;\">turibsiz</span>?</em></p><p style=\"font-size: 16px; line-height: 24px; color: var(--sp-black-700); font-family: Inter, sans-serif;\"><em>- 51 kg vazn toifasi baribir men uchun qulay deb o‘ylayman.</em></p><p style=\"font-size: 16px; line-height: 24px; color: var(--sp-black-700); font-family: Inter, sans-serif;\"><em>-&nbsp;<span style=\"font-weight: bolder;\">Bu vazn toifasi anchagina raqobatbardosh hisoblanadi.Qolaversa, Hasanboy Do‘smatov ham ushbu vaznda turnirlarda ishtirok etish niyatida?</span></em></p><p style=\"font-size: 16px; line-height: 24px; color: var(--sp-black-700); font-family: Inter, sans-serif;\"><em>- Albatta, raqobat bo‘lgani yaxshi. Men uchun har doim kuchli raqobatchilar bo‘lgan. Juda kuchli raqiblarga qarshi kelganman. Tajriba qo‘l keladi, deb o‘ylayman. Bu sportning ajralmas qismidir.&nbsp;</em></p><p style=\"font-size: 16px; line-height: 24px; color: var(--sp-black-700); font-family: Inter, sans-serif;\"><em>-&nbsp;<span style=\"font-weight: bolder;\">2,5 yillik tanaffus pand berib qo‘yadi, degan fikr yo‘qmi</span>?</em></p><p style=\"font-size: 16px; line-height: 24px; color: var(--sp-black-700); font-family: Inter, sans-serif;\"><em>- Barchasi Alloxdan! Hozir yaxshi jismoniy holatga egaman va yaxshi natijalar qayd etishga harakat qilaman. Oldinda jaxon chempionati va nufuzli musobaqalar bor, O‘ylaymanki, hali aytadigan so‘zim bor!</em></p>'),
(14, 'ru', 5, 'Жасурбек Латипов: «Творец дал мне силы. Мне еще есть что сказать!»', '<div>Жасурбек Латипов занимает достойное место в мире бокса Узбекистана, этот мастер кожаных перчаток является одним из самых титулованных боксеров. Жасурбек ушел из бокса и занялся тренерской деятельностью. Однако он объявил, что вернулся в большой спорт. Мы связались с этим спортсменом и интересовались его мыслями о возвращении в бокс и его планами.</div><div><br></div><div>- Мы рады, что вы вернулись в бокс. Что было причиной этого?</div><div><br></div><div>- Собственно, после смерти мамы желание немного угасло. После перерыва в 2,5 года Творец снова дал мне силы, и моя уверенность в своих силах возросла. Именно поэтому я решил вернуться в бокс.</div><div><br></div><div>- В каком направлении вы хотите работать?</div><div><br></div><div>- Хочу попытать счастья как в любительских, так и в профессиональных соревнованиях.</div><div><br></div><div>- В каком весе вы планируете двигаться в любительском направлении?</div><div><br></div><div>- Я считаю, что весовая категория 51 кг мне в любом случае комфортна.</div><div><br></div><div>- Эта весовая категория достаточно конкурентоспособна, кроме того, намерен ли Гасанбой Досматов участвовать в турнирах в этой весовой категории?</div><div><br></div><div>- Конечно, конкуренция – это хорошо. У меня всегда были сильные соперники. Я выступал против очень сильных соперников. Думаю опыт поможет. Это неотъемлемая часть спорта.</div><div><br></div><div>- Вам не кажется, что 2,5-летний перерыв даст вам подсказку?</div><div><br></div><div>- Все от Аллаха! Сейчас я в хорошей физической форме и стараюсь показывать хорошие результаты. Впереди чемпионат мира и престижные соревнования, думаю, мне еще есть что сказать!</div>'),
(15, 'en', 5, 'Jasurbek Latipov: \"The Creator gave me strength. I still have words to say!\"', '<div>Jasurbek Latipov has his place in the boxing world of Uzbekistan. This master of leather gloves is one of the most awarded boxers. Jasurbek left boxing and was engaged in coaching. However, he announced that he has returned to the big sport. We contacted this athlete and were interested in his thoughts on his return to boxing and his plans.</div><div><br></div><div>- We are glad to hear that you have returned to boxing. What was the reason for this?</div><div><br></div><div>- Actually, after the death of my mother, the desire faded a little. After a break of 2.5 years, the Creator gave me strength again, and my confidence in my abilities increased. That\'s why I decided to return to boxing.</div><div><br></div><div>- What direction do you want to work in?</div><div><br></div><div>- I want to try my luck in both amateur and professional competitions.</div><div><br></div><div>- At what weight are you looking to move in the amateur direction?</div><div><br></div><div>- I think the 51 kg weight category is comfortable for me anyway.</div><div><br></div><div>- This weight category is quite competitive. Besides, does Hasanboy Dosmatov intend to participate in tournaments in this weight category?</div><div><br></div><div>- Of course, competition is good. There have always been strong competitors for me. I came against very strong opponents. I think experience will help. It is an integral part of sports.</div><div><br></div><div>- Don\'t you think that a 2.5-year break will give you a hint?</div><div><br></div><div>- Everything is from Allah! Now I\'m in good physical condition and I\'m trying to record good results. With the world championship and prestigious competitions ahead, I think I still have something to say!</div>'),
(16, 'uz', 6, 'O‘zbekistonlik bokschi WBA chempionlik kamari uchun jang qiladi Raqib ma’lum!', '<span style=\"color: rgba(34, 34, 34, 0.75); font-family: Inter, sans-serif; font-size: 16px;\">Professional boksning super engil vazn (63,5 kg) toifasida o‘z janglarini o‘tkazib kelayotgan, endilikda O‘zbekiston nomidan ringga ko‘tariladigan Botir Ahmedovning (9-1-8 )KO navbatdagi jang sanasi va raqibi ma’lum bo‘ldi.&nbsp;</span><span style=\"color: var(--sp-black-700); font-family: Inter, sans-serif; font-size: 16px;\">Yurtdoshimiz 20 avgust kuni Alberto Puello (20-0-10 KO) bilan vakant bo‘lib turgan WBA chempionlik kamari uchun ringga ko‘tariladi.&nbsp;</span><span style=\"color: var(--sp-black-700); font-family: Inter, sans-serif; font-size: 16px; font-weight: bolder;\">Ma’lumot uchun,&nbsp;</span><span style=\"color: var(--sp-black-700); font-family: Inter, sans-serif; font-size: 16px;\">dominikanlik Puello reytingda 1-o‘rinda qayd etilgan bo‘lsa, yurtdoshimiz 2-pog‘onadan o‘rin olgan.</span>'),
(17, 'ru', 6, 'Боксер из Узбекистана сразится за чемпионский пояс WBA Соперник известен!', 'Ботир Ахмедов (9-1-8), выступавший в суперлегкой весовой (63,5 кг) категории профессионального бокса, и который теперь выйдет на ринг от имени Узбекистана, объявил дату и соперника следующего нокаут бой. ldi 20 августа наш соотечественник сразится с Альберто Пуэльо (20-0-10 КО) за вакантный чемпионский пояс WBA. Для справки, доминиканская пуэлло заняла 1-е место, а наш соотечественник - 2-е.'),
(18, 'en', 6, 'The boxer from Uzbekistan will fight for the WBA championship belt. The opponent is known!', 'Botir Akhmedov (9-1-8), who has been fighting in the super-light weight (63.5 kg) category of professional boxing, and who will now enter the ring on behalf of Uzbekistan, has announced the date and opponent of the next KO fight. ldi On August 20, our compatriot will compete with Alberto Puello (20-0-10 KO) for the vacant WBA championship belt. For information, the Dominican Puello was ranked 1st, while our compatriot was ranked 2nd.'),
(19, 'uz', 7, 'Isroil Madrimov jang oldi ochiq mashg‘ulotlarda ishtirok etdi (fotogalereya)', '<span style=\"color: rgb(108, 117, 125); font-size: 16px; font-weight: 700;\">9 iyul kuni Angliyaning London Shahrida joylashgan arenasida bo‘lib o‘tuvchi boks oqshomida hamyurtimiz Isroil Madrimov Mishel Soroga qarshi revansh bahsida ringga ko‘tariladi. Oqshom oldidan rasmiy tadbirlar davom etmoqda. Kecha bokschilar ochiq mashg‘ulotlarda ishtirok etdi.</span>'),
(20, 'ru', 7, 'Исраил Мадримов принял участие в открытой тренировке перед боем (фотогалерея)', '<span style=\"color: rgb(108, 117, 125); font-size: 16px; font-weight: 700;\">9 июля наш земляк Исраил Мадримов выйдет на ринг в матче-реванше против Мишеля Соро на вечере бокса на O2 Arena в Лондоне, Англия. Формальные мероприятия продолжаются до вечера. Вчера боксеры приняли участие в открытой тренировке.</span>'),
(21, 'en', 7, 'Israil Madrimov took part in pre-fight open training (photo gallery)', '<div><br></div><div><span style=\"color: rgb(108, 117, 125); font-size: 16px; font-weight: 700;\">On July 9, our countryman Israil Madrimov will enter the ring in a rematch against Michel Soro at the boxing evening at the O2 Arena in London, England. Formal events continue before the evening. Boxers took part in open training yesterday.</span><br></div>'),
(22, 'uz', 8, 'Masharipovning so‘nggi daqiqada urgan goli jamoasiga g‘alaba keltirdi. Uning jamoasi uchun turnir yakuniga etdi (turnir jadvali)', '<div><br></div><div><span style=\"color: rgb(108, 117, 125); font-size: 16px; font-weight: 700;\">Saudiya Arabistoni chempionati so‘nggi turidan o‘rin olgan Al-Nassr - Al-Xulaif uchrashuvi yakuniga etdi. Unda mezbonlar 2:1 hisobida raqibdan ustun keldi. Dastlab, 13-daqiqada Martinez hisobni ochdi. 37-daqiqada Al-Xulaif muvozanatni tikladi. Uchrashuvning qo‘shib berilgan daqiqalarida legionerimiz Masharipov jamoasiga g‘alaba keltirgan golga mualliflik qildi. Shu tariqa, Al-Nassr yakuniy turnir jadvalida 61 ochko bilan uchinchi o‘rinni band etdi.</span><br></div>'),
(23, 'ru', 8, 'Гол Машарипова на последней минуте принес победу его команде. Турнир для его команды завершен (таблица)', '<span style=\"color: rgb(108, 117, 125); font-size: 16px; font-weight: 700;\">Завершился матч между «Аль-Наср» и «Аль-Хулайф», состоявшийся в рамках последнего тура чемпионата Саудовской Аравии. Хозяева обыграли соперника со счетом 2:1. Изначально, на 13-й минуте, Мартинес открыл счет. На 37-й минуте Аль-Хулайф восстановил равновесие. В добавленные минуты матча наш легионер Машарипов забил победный гол для своей команды. Таким образом, «Аль-Наср» занял третье место в итоговой турнирной таблице с 61 очком.</span>'),
(24, 'en', 8, 'Masharipov\'s last-minute goal brought victory to his team. The tournament is over for his team (table)', '<span style=\"color: rgb(108, 117, 125); font-size: 16px; font-weight: 700;\">The match between \"Al-Nassr\" and \"Al-Khulaif\", which took place in the last round of the Saudi Arabian Championship, has ended. The home team beat the opponent 2:1. Initially, in the 13th minute, Martinez opened the scoring. In the 37th minute, Al Khulaif restored the balance. In the added minutes of the match, our legionnaire Masharipov scored the winning goal for his team. Thus, \"Al-Nassr\" took the third place in the final tournament table with 61 points.</span>'),
(25, 'uz', 9, 'OFK kubogi. Gollar shousiga aylangan uchrashuvda \"So‘g‘diyona\" qiyin g‘alabani qo‘lga kiritdi', '<div><br></div><div><span style=\"color: rgb(108, 117, 125); font-size: 16px; font-weight: 700;\">&amp;lt;p style=&amp;quot;font-size: 16px; line-height: 24px; color: var(--sp-black-700); font-family: Inter, sans-serif;&amp;quot;&amp;gt;OFK Kubogi 2-turidan o‘rin olgan SSKA - &amp;quot;So‘g‘diyona&amp;quot; uchrashuvi yakuniga etdi. Unda jizzaxliklar 3:2 hisobida zafar quchdi.&amp;amp;nbsp;&amp;lt;span style=&amp;quot;color: var(--sp-black-700);&amp;quot;&amp;gt;&amp;quot;Bo‘rilar&amp;quot; safida Shohruz Norxonov dubl qayd etgan bo‘lsa, Jasur Hasanov o‘z nomiga bir golni yozdirib qo‘ydi. Mezbonlar tarkibida Elchibek Rashidbekov hamda Hurshed Jo‘raev Mitrovich darvozasini ishg‘ol etdi.&amp;amp;nbsp;&amp;lt;/span&amp;gt;&amp;lt;span style=&amp;quot;color: var(--sp-black-700);&amp;quot;&amp;gt;Shu tariqa, Baqoev shogirdlari ochkolari sonini 6 taga etkazib oldi.&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;</span><br></div>'),
(26, 'ru', 9, 'Кубок АФК. «Согдиана» одержала упорную победу в матче, который превратился в шоу голов', '<span style=\"color: rgb(108, 117, 125); font-size: 16px; font-weight: 700;\">Завершился матч между ЦСКА и Согдианой, проходивший в рамках 2-го тура Кубка АФК. Джизакчане выиграли со счетом 3:2. Шахруз Норханов оформил дубль за «волков», а Жасур Гасанов забил один гол. В ворота Митровича забили Эльчибек Рашидбеков и Хуршед Джораев. Таким образом, количество баллов учеников Багоева достигло 6.</span>'),
(27, 'en', 9, 'AFC Cup. \"Sogdiyona\" won a hard-fought victory in the match, which turned into a show of goals', '<span style=\"color: rgb(108, 117, 125); font-size: 16px; font-weight: 700;\">The match between CSKA and Sogdiyona, which took place in the 2nd round of the AFC Cup, has come to an end. Jizzakh people won 3:2. Shahruz Norkhanov scored a double for the \"Wolves\", while Jasur Hasanov scored one goal. Elchibek Rashidbekov and Hurshed Joraev scored against Mitrovich as part of the hosts. In this way, the number of points of Bagoev\'s students reached 6.</span>');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0b2cc65f58f7f58dce255dc3cf3c85bbd990094ad13c2c904d31cb20660ccaf1e98a25fbb9a7f0a5', 3, 1, 'Ali', '[]', 0, '2022-07-12 00:34:12', '2022-07-12 00:34:12', '2023-07-12 05:34:12'),
('112f2d3a2a6df86d2a2ad6f55d0ce2f035abe52e81c0f46aea556ec54f32ef5a1ef46c5c1563ae7f', 22, 1, 'Ali', '[]', 0, '2022-07-14 01:37:10', '2022-07-14 01:37:10', '2023-07-14 06:37:10'),
('1184a6904c6337f178739ccd750cf78852c56927fbb5f48a69b160fcb629eaf2a2da11442d50074d', 55, 1, 'Ali', '[]', 0, '2022-07-14 02:45:22', '2022-07-14 02:45:22', '2023-07-14 07:45:22'),
('22bca9d0f78acfc156586bffdd4591e7c1cb6e02217e9214329939a03f14dba51c37f74ab703cab4', 9, 1, 'Ali', '[]', 0, '2022-07-14 01:04:02', '2022-07-14 01:04:02', '2023-07-14 06:04:02'),
('34545fbe234764ab2bbd524cfb25459d98dcf9534644c56433dbc2a6e8e116b5b936292d4e989245', 61, 1, 'Ali', '[]', 0, '2022-07-14 05:01:24', '2022-07-14 05:01:24', '2023-07-14 10:01:24'),
('3636c127e70174d94f49d883223e31214a223431f0333f27bc2be6b878903e54271d077a2ba2fd76', 71, 1, 'Ali', '[]', 0, '2022-07-15 04:19:52', '2022-07-15 04:19:52', '2023-07-15 09:19:52'),
('4088ec639e4d20f656d780de8a6ec851cab62879dafe965eeed1973f09e7d28b8cbf961c48f935aa', 56, 1, 'Ali', '[]', 0, '2022-07-14 02:45:33', '2022-07-14 02:45:33', '2023-07-14 07:45:33'),
('40fecf13c7c55edc0ea90374ecbd8091c522ed82e03e01ba4326204f2cf4fd2db0d6f05276fa10c6', 9, 1, 'LaravelAuthApp', '[]', 0, '2022-07-14 01:04:14', '2022-07-14 01:04:14', '2023-07-14 06:04:14'),
('46e6a70cc6a15f60f8709d817f0b82272721787e6d7c4c4fb51e0eeb76a06db4ebe1ede702f3b481', 2, 1, 'Ali', '[]', 0, '2022-07-08 01:48:52', '2022-07-08 01:48:52', '2023-07-08 06:48:52'),
('4b6d3850b421dde4bcd56633494ecf385346b90542840a0bca657a01156499db01bdfd892d041122', 1, 1, 'LaravelAuthApp', '[]', 0, '2022-07-14 02:02:47', '2022-07-14 02:02:47', '2023-07-14 07:02:47'),
('53023635a13bd216b31e1952946df740501f4b90c7fd69182312f3e64a02ae5ba1a11e97ed270977', 21, 1, 'Ali', '[]', 0, '2022-07-14 01:36:21', '2022-07-14 01:36:21', '2023-07-14 06:36:21'),
('5652d3f4c7f9403b2c6eb3d630c79878681d3d5a7abe4482b09d7cad2745a52dff06169d97f0f3ca', 63, 1, 'Ali', '[]', 0, '2022-07-15 01:45:31', '2022-07-15 01:45:31', '2023-07-15 06:45:31'),
('59593f7ca65e15e7ed18e082292d557d953d73ae81ed1d4ef4552be55194b28a103c7a971e43bac8', 74, 1, 'Ali', '[]', 0, '2022-07-16 00:13:14', '2022-07-16 00:13:14', '2023-07-16 05:13:14'),
('598e4aa74376f9d5238bbeda165d366831e5c93b253a566a5c53f94bcdc4fec7499b474655fe12b7', 1, 1, 'LaravelAuthApp', '[]', 0, '2022-07-14 02:03:36', '2022-07-14 02:03:36', '2023-07-14 07:03:36'),
('59ce5c242c3b050a9e26762c1c53c218e83c12c49bf62a70ee7f720c9ba936328acf751353dc8c03', 5, 1, 'Ali', '[]', 0, '2022-07-12 02:25:18', '2022-07-12 02:25:18', '2023-07-12 07:25:18'),
('67a05b2783b419f1c909e78eb6a172fbf5d6bfa8d60168ab6f4d9ed0e3b88c8c6505ec8f3225b439', 63, 1, 'LaravelAuthApp', '[]', 0, '2022-07-15 01:45:58', '2022-07-15 01:45:58', '2023-07-15 06:45:58'),
('6bb46675222ba91adc5520e6867a935879d6f499af71d366e7afef314d2a676d465bf4f9ed36f3c4', 9, 1, 'LaravelAuthApp', '[]', 0, '2022-07-14 01:10:19', '2022-07-14 01:10:19', '2023-07-14 06:10:19'),
('72b98b4e5fbc69a2aca312c507f27efe3a51630fa86cf6a87e54374d2b685b4d65e20a1e4e5f3e4a', 1, 1, 'LaravelAuthApp', '[]', 0, '2022-07-15 06:14:42', '2022-07-15 06:14:42', '2023-07-15 11:14:42'),
('7300812662dd7cd0cbc3a3d9dc5634dba7f160a9744768391a6049e13ba28c736e03346d1564671a', 58, 1, 'Ali', '[]', 0, '2022-07-14 03:10:05', '2022-07-14 03:10:05', '2023-07-14 08:10:05'),
('83fe35a3d5f9440d24ae0b959d8e036bee65889c1b958cc7d35fa9e6c1d5c504819b809a62ccfe1f', 24, 1, 'Ali', '[]', 0, '2022-07-14 02:04:45', '2022-07-14 02:04:45', '2023-07-14 07:04:45'),
('8cdbc96788455514405835ef671c7e060a39dcd4b583dfd4daef094c3b52e8c697a279da6e328a93', 6, 1, 'Ali', '[]', 0, '2022-07-13 01:48:08', '2022-07-13 01:48:08', '2023-07-13 06:48:08'),
('916bec748eff1098f52ad836c1bfa9e3b14f1c1306934b51ab81ea29a94be55bf8833be2c9ffd0dd', 74, 1, 'LaravelAuthApp', '[]', 0, '2022-07-16 00:14:15', '2022-07-16 00:14:15', '2023-07-16 05:14:15'),
('9930543310122f8264bcc3fc6a510707c0d2c8bc7030de3789d21a7b0e9ae47f4c4a33917f0e881f', 53, 1, 'Ali', '[]', 0, '2022-07-14 02:41:59', '2022-07-14 02:41:59', '2023-07-14 07:41:59'),
('a8727317b0b4a6b65b8596fbbad41ed4f64971c7038586dd60c5ca44c7c3c03e3c21e552e34d2d81', 12, 1, 'LaravelAuthApp', '[]', 0, '2022-07-15 01:53:09', '2022-07-15 01:53:09', '2023-07-15 06:53:09'),
('bdf830dfb1a8308e78e2b365ca22a7fb11cb3f28b873ca706054700cdb02d85a81a2382f2f3fa7ed', 12, 1, 'LaravelAuthApp', '[]', 0, '2022-07-14 05:07:36', '2022-07-14 05:07:36', '2023-07-14 10:07:36'),
('cd0594fdf353828f45bdeb8c98d7e5f3e62d3c459467d2e8ec8f862e422660a531660335670e56ff', 59, 1, 'Ali', '[]', 0, '2022-07-14 05:01:19', '2022-07-14 05:01:19', '2023-07-14 10:01:19'),
('cec783a15d2717c81a5cf09071dc0acd7c21110acabcef672ceb254533c43eb772042f19b25d40a3', 67, 1, 'Ali', '[]', 0, '2022-07-15 01:52:33', '2022-07-15 01:52:33', '2023-07-15 06:52:33'),
('e91199b1065b7c20aff96267e919f4067ef39d9d817f2bd3bf79cbe482694cfc3f9c9d771b44ba25', 12, 1, 'LaravelAuthApp', '[]', 0, '2022-07-14 01:21:23', '2022-07-14 01:21:23', '2023-07-14 06:21:23'),
('fff5858d885dafb99fe830b34cabee3a991f053775497d176d40caeb2b9a7193449eed5477abab8c', 12, 1, 'Ali', '[]', 0, '2022-07-14 01:21:16', '2022-07-14 01:21:16', '2023-07-14 06:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'ali', 'zy949gYC3EVHHyVNZxCYTCaQgmS9KBbhqUY01Rn2', NULL, 'http://localhost', 1, 0, 0, '2022-07-08 01:41:25', '2022-07-08 01:41:25');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-07-08 01:41:25', '2022-07-08 01:41:25');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin-enter', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(2, 'brand-list', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(3, 'brand-create', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(4, 'brand-edit', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(5, 'brand-delete', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(6, 'home-list', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(7, 'home-create', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(8, 'home-edit', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(9, 'home-delete', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(10, 'news-list', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(11, 'news-create', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(12, 'news-edit', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(13, 'news-delete', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(14, 'product_category-list', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(15, 'product_category-create', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(16, 'product_category-edit', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(17, 'product_category-delete', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(18, 'product-list', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(19, 'product-create', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(20, 'product-edit', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(21, 'product-delete', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(22, 'role-list', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(23, 'role-create', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(24, 'role-edit', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(25, 'role-delete', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(26, 'size-list', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(27, 'size-create', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(28, 'size-edit', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(29, 'size-delete', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(30, 'sport_category-list', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(31, 'sport_category-create', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(32, 'sport_category-edit', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(33, 'sport_category-delete', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(34, 'sport_complex-list', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(35, 'sport_complex-create', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(36, 'sport_complex-edit', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(37, 'sport_complex-delete', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(38, 'location-list', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(39, 'location-create', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(40, 'location-edit', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(41, 'location-delete', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(42, 'area-list', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(43, 'area-create', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(44, 'area-edit', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(45, 'area-delete', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(46, 'country-list', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(47, 'country-create', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(48, 'country-edit', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(49, 'country-delete', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(50, 'region-list', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(51, 'region-create', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(52, 'region-edit', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(53, 'region-delete', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(54, 'team-list', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(55, 'team-create', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(56, 'team-edit', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(57, 'team-delete', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(58, 'ticket-list', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(59, 'ticket-create', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(60, 'ticket-edit', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(61, 'ticket-delete', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(62, 'stadium-list', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(63, 'stadium-create', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(64, 'stadium-edit', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(65, 'stadium-delete', 'web', '2022-07-08 01:40:56', '2022-07-08 01:40:56'),
(66, 'section-list', 'web', '2022-07-08 01:40:57', '2022-07-08 01:40:57'),
(67, 'section-create', 'web', '2022-07-08 01:40:57', '2022-07-08 01:40:57'),
(68, 'section-edit', 'web', '2022-07-08 01:40:57', '2022-07-08 01:40:57'),
(69, 'section-delete', 'web', '2022-07-08 01:40:57', '2022-07-08 01:40:57'),
(70, 'user-list', 'web', '2022-07-08 01:40:57', '2022-07-08 01:40:57'),
(71, 'user-create', 'web', '2022-07-08 01:40:57', '2022-07-08 01:40:57'),
(72, 'user-edit', 'web', '2022-07-08 01:40:57', '2022-07-08 01:40:57'),
(73, 'user-delete', 'web', '2022-07-08 01:40:57', '2022-07-08 01:40:57'),
(74, 'simple-user', 'web', '2022-07-08 01:40:57', '2022-07-08 01:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sport_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `like` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sport_category_id`, `team_id`, `product_category_id`, `brand_id`, `name`, `image`, `discount`, `price`, `status`, `like`, `sale_number`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(3, 1, 2, 1, 5, 'Abdulboriy', '1657607757_916-9164371_camiseta-fc-barcelona-fc-barcelona-shirt-2018-19.png', '10', '25515', '1', NULL, NULL, 'meta-title', 'meta-description', 'meta-tag', '2022-07-12 01:35:57', '2022-07-12 04:49:21'),
(4, 1, 3, 1, 4, 'NIKE', '1657608050_fc-bayern-munich-leones-de-ponce-t-shirt-football-png-favpng-y6sCzmCMShK1Ns8PY4PUF0g87.jpg', '10', '40500', '1', NULL, NULL, 'meta-title', 'meta-description', 'meta-tag', '2022-07-12 01:40:50', '2022-07-12 01:40:50'),
(5, 1, 3, 2, 3, 'NIKE', '1657608309_SHORT-BAYERN-MUNICH-DOMICILE-2021-2022-2-768x768.jpg', '10', '49500', '1', NULL, NULL, 'meta-title', 'meta-description', 'meta-tag', '2022-07-12 01:45:09', '2022-07-12 01:45:09'),
(6, 1, 2, 2, 2, 'NIKE', '1657608351_side-barcelona-away-shorts-2015-2016.jpg', '10', '58500', '1', NULL, NULL, 'meta-title', 'meta-description', 'meta-tag', '2022-07-12 01:45:51', '2022-07-12 01:45:51'),
(7, 1, 4, 2, 2, 'NIKE', '1657608433_861333413056_pp_01_mcfc_new.webp', '10', '49500', '1', NULL, NULL, 'meta-title', 'meta-description', 'meta-tag', '2022-07-12 01:47:13', '2022-07-12 01:47:13'),
(8, 1, 5, 3, 3, 'NIKE', '1657608484_457-4579621_as-roma-ball-nike-football-png-image-with.png', '10', '85500', '1', NULL, NULL, 'meta-title', 'meta-description', 'meta-tag', '2022-07-12 01:48:04', '2022-07-12 01:48:04'),
(9, 1, 2, 3, 2, 'NIKE', '1657608542_png-transparent-fc-barcelona-football-nike-ball-game-fcb-sport-football-boot-sports-equipment.png', '10', '85500', '1', NULL, NULL, 'meta-title', 'meta-description', 'meta-tag', '2022-07-12 01:49:02', '2022-07-12 01:49:02'),
(11, 1, 1, 3, 2, 'NIKE', '1657608809_47-472055_real-madrid-2019-capitano-ball-title-real-madrid.png', '10', '85500', '1', NULL, NULL, 'meta-title', 'meta-description', 'meta-tag', '2022-07-12 01:53:29', '2022-07-12 01:53:29'),
(12, 1, 1, 4, 2, 'NIKE', '1657609359_png-transparent-scarf-fc-bayern-munich-adidas-clothing-accessories-scarf-sport-football-boot-sporting-goods.png', '5', '14250', '1', NULL, NULL, 'meta-title', 'meta-description', 'meta-tag', '2022-07-12 02:02:39', '2022-07-12 02:02:39'),
(13, 1, 5, 5, 2, 'NIKE', '1657609880_plecak-nike-roma-stadium_1.webp', '10', '49500', '1', NULL, NULL, 'meta-title', 'meta-description', 'meta-tag', '2022-07-12 02:11:20', '2022-07-12 02:11:20'),
(14, 1, 4, 5, 3, 'NIKE', '1657610018_plecak-adidas-manchester-united_2.webp', '10', '49500', '1', NULL, NULL, 'meta-title', 'meta-description', 'meta-tag', '2022-07-12 02:13:38', '2022-07-12 02:13:38'),
(15, 1, 1, 5, 2, 'NIKE', '1657610136_22e442d85f977feb9faeaed9aefae96b.png', '10', '49500', '1', NULL, NULL, 'meta-title', 'meta-description', 'meta-tag', '2022-07-12 02:15:36', '2022-07-12 02:15:36'),
(16, 1, 5, 4, 2, 'NIKE', '1657610255_195000613906-sciarpa_tubolare_a_righe_giallo-rossa_06.webp', '10', '49500', '1', NULL, NULL, 'meta-title', 'meta-description', 'meta-tag', '2022-07-12 02:17:35', '2022-07-12 02:17:35'),
(17, 1, 1, 6, 3, 'NIKE', '1657610296_71PxJOG-PsL._AC_SL1500_.jpg', '10', '44550', '1', NULL, NULL, 'meta-title', 'meta-description', 'meta-tag', '2022-07-12 02:18:16', '2022-07-12 05:17:44'),
(18, 1, 5, 6, 2, 'NIKE', '1657610359_33377_roma_kapa_n01_1.jpg', '10', '44550', '1', NULL, NULL, 'meta-title', 'meta-description', 'meta-tag', '2022-07-12 02:19:19', '2022-07-12 05:18:00'),
(19, 1, 1, 1, 2, 'NIKE', '1657620104_153-1538694_adidas-mens-real-madrid-home-jersey-real-madrid.png', '10', '49500', '1', NULL, NULL, 'meta-title', 'meta-description', 'meta-tag', '2022-07-12 05:01:44', '2022-07-12 05:01:44'),
(20, 1, 4, 1, 4, 'NIKE', '1657620690_71Ll2o71o+L._AC_UL1500_.jpg', '10', '49500', '1', NULL, NULL, 'meta-title', 'meta-description', 'meta-tag', '2022-07-12 05:11:30', '2022-07-12 05:11:30'),
(21, 1, 4, 4, 3, 'NIKE', '1657620772_701220801001_pp_01_mcfc.png', '10', '31500', '1', NULL, NULL, 'meta-title', 'meta-description', 'meta-tag', '2022-07-12 05:12:52', '2022-07-12 05:12:52'),
(22, 2, 5, 4, 2, 'NIKE', '1657783162_hd-yellow-blue-and-white-volleyball-ball-png-11650768059jxxkt2zkgu.png', '10', '13.5', '1', NULL, NULL, 'meta-title', 'meta-description', 'meta-tag', '2022-07-14 02:19:22', '2022-07-14 02:19:22'),
(23, 2, 1, 5, 2, 'NIKE', '1657783245_png-clipart-backpack-jukz-sports-volleyball-backpack-sports-zipper-blue.png', '10', '76.5', '1', NULL, NULL, 'meta-title', 'meta-description', 'meta-tag', '2022-07-14 02:20:45', '2022-07-14 02:20:45'),
(24, 2, 2, 5, 2, 'NIKE', '1657783303_APT-5006-RED_3qrt_Open_Volleyball_1200x1200.jpg', '10', '76.5', '1', NULL, NULL, 'meta-title', NULL, 'meta-tag', '2022-07-14 02:21:43', '2022-07-14 02:21:43'),
(25, 2, 2, 2, 2, 'NIKE', '1657783400_398-3989381_mizuno-mens-volleyball-shorts-mizuno.png', '5', '42.75', '1', NULL, NULL, 'meta-title', 'meta-description', 'meta-tag', '2022-07-14 02:23:20', '2022-07-14 02:23:20'),
(26, 4, 3, 6, 4, 'NIKE', '1657783496_30530-2.jpg', '10', '58.5', '1', NULL, NULL, 'meta-title', 'meta-description', 'meta-tag', '2022-07-14 02:24:56', '2022-07-14 02:24:56'),
(27, 7, 4, 6, 2, 'NIKE', '1657783595_NBA0438-2__96070.1520168558.jfif', '10', '49.5', '1', NULL, NULL, 'meta-title', 'meta-description', 'meta-tag', '2022-07-14 02:26:35', '2022-07-14 02:26:35'),
(28, 7, 4, 4, 2, 'NIKE', '1657783686_basketball-png-available-in-different-size-basketball-ball-11563650596h4eizgfw3h.png', '10', '49.5', '1', NULL, NULL, 'meta-title', 'meta-description', 'meta-tag', '2022-07-14 02:28:06', '2022-07-14 02:28:06'),
(29, 7, 4, 5, 3, 'NIKE', '1657783734_Outdoor-Rugby-Volleyball-Football-Basketball-Bag-Large-Capacity-Sports-Backpack.jpg', '10', '283.5', '1', NULL, NULL, 'meta-title', 'meta-description', 'meta-tag', '2022-07-14 02:28:54', '2022-07-14 02:28:54'),
(30, 7, 2, 6, 5, 'NIKE', '1657783800_mnng77z-5heatwrb_thum1_183_2342_29182_2.jpg', '15', '131.75', '1', NULL, NULL, 'meta-title', 'meta-description', 'meta-tag', '2022-07-14 02:30:00', '2022-07-14 02:30:00'),
(31, 3, 0, 1, 3, 'boxing', '1657784358_image (1).jpg', '0', '55', '1', NULL, NULL, 'meta', 'meta', 'meta', '2022-07-14 02:39:18', '2022-07-14 02:39:18'),
(32, 3, 0, 1, 4, 'boxing', '1657784418_image (2).jpg', '0', '55', '1', NULL, NULL, 'meta', 'meta', 'meta', '2022-07-14 02:40:18', '2022-07-14 02:40:18'),
(33, 3, 0, 1, 3, 'boxing', '1657784484_Muhammad-Ali-Quotes-Float-Like-A-Butterfly-Mens-T-Shirt-Boxing-Greatest-Champion-263953930752.jfif', '0', '55', '1', NULL, NULL, 'meta', 'meta', 'meta', '2022-07-14 02:41:24', '2022-07-14 02:41:24'),
(34, 3, 0, 1, 3, 'boxing', '1657784553_image.jpg', '0', '55', '1', NULL, NULL, 'meta', 'meta', 'meta', '2022-07-14 02:42:33', '2022-07-14 02:42:33'),
(35, 3, 0, 1, 5, 'boxing', '1657784617_image.jpg', '0', '55', '1', NULL, NULL, 'meta', 'meta', 'meta', '2022-07-14 02:43:37', '2022-07-14 02:43:37'),
(36, 1, 2, 3, 3, 'BARCELONA', '1657791020_plecak-nike-fc-barcelona-stadium-junior_1 1.png', '0', '55', '1', NULL, NULL, 'meta', 'meta', 'meta', '2022-07-14 04:30:20', '2022-07-14 04:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'futbolka', '2022-07-08 01:49:34', '2022-07-08 01:49:34'),
(2, 'shortik', '2022-07-08 01:50:19', '2022-07-08 01:50:19'),
(3, 'sport-mollari', '2022-07-08 01:51:00', '2022-07-08 01:51:00'),
(4, 'aksesuar', '2022-07-08 01:51:47', '2022-07-08 01:51:47'),
(5, 'sumkalar', '2022-07-08 01:52:28', '2022-07-08 01:52:28'),
(6, 'kepkalar', '2022-07-12 05:16:39', '2022-07-12 05:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `product_category_translations`
--

CREATE TABLE `product_category_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_category_translations`
--

INSERT INTO `product_category_translations` (`id`, `locale`, `product_category_id`, `name`) VALUES
(1, 'uz', 1, 'FUTBOLKA'),
(2, 'ru', 1, 'ФУТБОЛКА'),
(3, 'en', 1, 'T-SHIRT'),
(4, 'uz', 2, 'SHORTIK'),
(5, 'ru', 2, 'ШОРТЫ'),
(6, 'en', 2, 'SHORTS'),
(7, 'uz', 3, 'SPORT MOLLARI'),
(8, 'ru', 3, 'СПОРТИВНЫЕ ТОВАРЫ'),
(9, 'en', 3, 'SPORTING GOODS'),
(10, 'uz', 4, 'AKSESUAR'),
(11, 'ru', 4, 'ПРИНАДЛЕЖНОСТИ'),
(12, 'en', 4, 'ACCESSORY'),
(13, 'uz', 5, 'SUMKALAR'),
(14, 'ru', 5, 'СУМКИ'),
(15, 'en', 5, 'BAGS'),
(16, 'uz', 6, 'KEPKALAR'),
(17, 'ru', 6, 'шапки'),
(18, 'en', 6, 'CAPS');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`id`, `size_id`, `product_id`) VALUES
(8, 1, 3),
(9, 2, 4),
(10, 2, 5),
(11, 2, 9),
(12, 2, 11),
(13, 2, 12),
(14, 2, 13),
(15, 2, 14),
(16, 2, 15),
(17, 2, 16),
(18, 2, 17),
(19, 2, 18),
(20, 2, 19),
(21, 2, 20),
(22, 2, 21),
(23, 2, 23),
(24, 2, 24),
(25, 2, 25),
(26, 1, 26),
(27, 2, 27),
(28, 2, 28),
(29, 2, 29),
(30, 1, 31),
(31, 2, 31),
(32, 3, 31),
(33, 1, 31),
(34, 2, 31),
(35, 3, 31),
(36, 1, 32),
(37, 2, 32),
(38, 3, 32),
(39, 1, 32),
(40, 2, 32),
(41, 3, 32),
(42, 1, 33),
(43, 2, 33),
(44, 3, 33),
(45, 1, 33),
(46, 2, 33),
(47, 3, 33),
(48, 1, 34),
(49, 2, 34),
(50, 3, 34),
(51, 1, 34),
(52, 2, 34),
(53, 3, 34),
(54, 1, 35),
(55, 2, 35),
(56, 3, 35),
(57, 1, 35),
(58, 2, 35),
(59, 3, 35),
(60, 1, 36),
(61, 1, 36);

-- --------------------------------------------------------

--
-- Table structure for table `product_translations`
--

CREATE TABLE `product_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_translations`
--

INSERT INTO `product_translations` (`id`, `locale`, `product_id`, `description`) VALUES
(7, 'uz', 3, 'wdreda'),
(8, 'ru', 3, 'adasdsd'),
(9, 'en', 3, 'adadfad'),
(10, 'uz', 4, 'dadas'),
(11, 'ru', 4, 'asdasd'),
(12, 'en', 4, 'asdada'),
(13, 'uz', 5, 'sasasas'),
(14, 'ru', 5, 'asasa'),
(15, 'en', 5, 'asasas'),
(16, 'uz', 6, 'sasas'),
(17, 'ru', 6, 'asasas'),
(18, 'en', 6, 'asas'),
(19, 'uz', 7, 'asasa'),
(20, 'ru', 7, 'asasa'),
(21, 'en', 7, 'asas'),
(22, 'uz', 8, 'asas'),
(23, 'ru', 8, 'asas'),
(24, 'en', 8, 'asas'),
(25, 'uz', 9, 'asasa'),
(26, 'ru', 9, 'asasa'),
(27, 'en', 9, 'asas'),
(31, 'uz', 11, 'asas'),
(32, 'ru', 11, 'asasa'),
(33, 'en', 11, 'asasa'),
(34, 'uz', 12, 'ыфыфы'),
(35, 'ru', 12, 'фыфыф'),
(36, 'en', 12, 'фыфы'),
(37, 'uz', 13, 'sasas'),
(38, 'ru', 13, 'asasas'),
(39, 'en', 13, 'asas'),
(40, 'uz', 14, 'sasas'),
(41, 'ru', 14, 'asas'),
(42, 'en', 14, 'asasa'),
(43, 'uz', 15, 'sasas'),
(44, 'ru', 15, 'asasa'),
(45, 'en', 15, 'asas'),
(46, 'uz', 16, 'sasas'),
(47, 'ru', 16, 'asasa'),
(48, 'en', 16, 'asas'),
(49, 'uz', 17, 'asasa'),
(50, 'ru', 17, 'asasas'),
(51, 'en', 17, 'asasa'),
(52, 'uz', 18, 'sasas'),
(53, 'ru', 18, 'asasas'),
(54, 'en', 18, 'asasas'),
(55, 'uz', 19, 'sasas'),
(56, 'ru', 19, 'asasa'),
(57, 'en', 19, 'asasa'),
(58, 'uz', 20, 'asasa'),
(59, 'ru', 20, 'asas'),
(60, 'en', 20, 'asa'),
(61, 'uz', 21, 'sasas'),
(62, 'ru', 21, 'aaaaaaaaaaaas'),
(63, 'en', 21, 'asasaaaa'),
(64, 'uz', 22, 'sas'),
(65, 'ru', 22, 'asas'),
(66, 'en', 22, 'sasa'),
(67, 'uz', 23, 'asa'),
(68, 'ru', 23, 'asas'),
(69, 'en', 23, 'asasa'),
(70, 'uz', 24, 'sasa'),
(71, 'ru', 24, 'asas'),
(72, 'en', 24, 'asas'),
(73, 'uz', 25, 'wsas'),
(74, 'ru', 25, 'sasa'),
(75, 'en', 25, 'sasa'),
(76, 'uz', 26, 'sasa'),
(77, 'ru', 26, 'asasa'),
(78, 'en', 26, 'asas'),
(79, 'uz', 27, 'asas'),
(80, 'ru', 27, 'asas'),
(81, 'en', 27, 'asas'),
(82, 'uz', 28, 'sasa'),
(83, 'ru', 28, 'asas'),
(84, 'en', 28, 'asas'),
(85, 'uz', 29, 'sasas'),
(86, 'ru', 29, 'asas'),
(87, 'en', 29, 'sasas'),
(88, 'uz', 30, 'sasa'),
(89, 'ru', 30, 'asas'),
(90, 'en', 30, 'asas'),
(91, 'uz', 31, 'sasasasas'),
(92, 'ru', 31, 'dadassaf'),
(93, 'en', 31, 'sasasas'),
(94, 'uz', 32, 'sasasasa'),
(95, 'ru', 32, 'sasasas'),
(96, 'en', 32, 'sasasas'),
(97, 'uz', 33, 'sasasasas'),
(98, 'ru', 33, 'sasasasa'),
(99, 'en', 33, 'sasasasasa'),
(100, 'uz', 34, 'sasasasas'),
(101, 'ru', 34, 'sasasasas'),
(102, 'en', 34, 'assasasasasa'),
(103, 'uz', 35, 'sasasasa'),
(104, 'ru', 35, 'sasasasasa'),
(105, 'en', 35, 'sasasasasasa'),
(106, 'uz', 36, 'SASASAS'),
(107, 'ru', 36, 'SASAS'),
(108, 'en', 36, 'SASASA');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `country_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Andijon', '2022-07-08 03:37:55', '2022-07-12 07:21:15'),
(2, 1, 'Namangan', '2022-07-08 03:38:04', '2022-07-12 07:21:22'),
(3, 1, 'Farg\'ona', '2022-07-08 03:38:14', '2022-07-12 07:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'GeneralAdmin', 'web', '2022-07-08 01:41:08', '2022-07-08 01:41:08'),
(2, 'coadmin', 'web', '2022-07-14 05:56:41', '2022-07-14 05:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(38, 1),
(38, 2),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 1),
(43, 2),
(44, 1),
(44, 2),
(45, 1),
(45, 2),
(46, 1),
(46, 2),
(47, 1),
(47, 2),
(48, 1),
(48, 2),
(49, 1),
(49, 2),
(50, 1),
(50, 2),
(51, 1),
(51, 2),
(52, 1),
(52, 2),
(53, 1),
(53, 2),
(54, 1),
(54, 2),
(55, 1),
(55, 2),
(56, 1),
(56, 2),
(57, 1),
(57, 2),
(58, 1),
(58, 2),
(59, 1),
(59, 2),
(60, 1),
(60, 2),
(61, 1),
(61, 2),
(62, 1),
(62, 2),
(63, 1),
(63, 2),
(64, 1),
(64, 2),
(65, 1),
(65, 2),
(66, 1),
(66, 2),
(67, 1),
(67, 2),
(68, 1),
(68, 2),
(69, 1),
(69, 2),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(74, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_likes`
--

CREATE TABLE `shop_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `number`, `letter`, `created_at`, `updated_at`) VALUES
(1, '42', 'XS', '2022-07-08 01:58:29', '2022-07-08 01:58:29'),
(2, '44', 'S', '2022-07-08 01:58:43', '2022-07-08 01:58:43'),
(3, '46', 'M', '2022-07-08 01:59:03', '2022-07-08 01:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `sport_categories`
--

CREATE TABLE `sport_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sport_categories`
--

INSERT INTO `sport_categories` (`id`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'futbol', '2022-07-08 01:44:43', '2022-07-08 01:44:43'),
(2, 'voleybol', '2022-07-08 01:44:56', '2022-07-14 02:43:21'),
(3, 'boks', '2022-07-08 01:45:51', '2022-07-08 01:45:51'),
(4, 'tennis', '2022-07-08 01:46:56', '2022-07-08 01:46:56'),
(5, 'suzish', '2022-07-08 01:47:59', '2022-07-08 01:47:59'),
(6, 'ufc', '2022-07-08 01:48:47', '2022-07-08 01:48:47'),
(7, 'basketbol', '2022-07-08 01:49:26', '2022-07-08 01:49:26');

-- --------------------------------------------------------

--
-- Table structure for table `sport_category_translations`
--

CREATE TABLE `sport_category_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sport_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sport_category_translations`
--

INSERT INTO `sport_category_translations` (`id`, `locale`, `sport_category_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'uz', 1, 'Futbol', NULL, NULL),
(2, 'ru', 1, 'Футболь', NULL, NULL),
(3, 'en', 1, 'Football', NULL, NULL),
(4, 'uz', 2, 'Voleybol', NULL, NULL),
(5, 'ru', 2, 'Валиболь', NULL, NULL),
(6, 'en', 2, 'Valleyball', NULL, NULL),
(7, 'uz', 3, 'Boks', NULL, NULL),
(8, 'ru', 3, 'бокс', NULL, NULL),
(9, 'en', 3, 'boxing', NULL, NULL),
(10, 'uz', 4, 'Tennis', NULL, NULL),
(11, 'ru', 4, 'теннис', NULL, NULL),
(12, 'en', 4, 'Tennis', NULL, NULL),
(13, 'uz', 5, 'Suzish', NULL, NULL),
(14, 'ru', 5, 'Плавание', NULL, NULL),
(15, 'en', 5, 'Swimming', NULL, NULL),
(16, 'uz', 6, 'UFC', NULL, NULL),
(17, 'ru', 6, 'UFC', NULL, NULL),
(18, 'en', 6, 'UFC', NULL, NULL),
(19, 'uz', 7, 'Basketbol', NULL, NULL),
(20, 'ru', 7, 'Баскетбол', NULL, NULL),
(21, 'en', 7, 'Basketball', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sport_complexes`
--

CREATE TABLE `sport_complexes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sport_category_id` bigint(20) UNSIGNED NOT NULL,
  `area_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `working_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dress_room` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bath_room` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sit_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sport_complexes`
--

INSERT INTO `sport_complexes` (`id`, `sport_category_id`, `area_id`, `name`, `image`, `phone`, `address`, `location`, `price`, `working_status`, `dress_room`, `food`, `bath_room`, `sit_place`, `meta_tag`, `meta_title`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, 8, 'JALAQUDUQ', '1657685654_mini-futbol-sahasi-ozellikleri-ve-olculeri.jpg', '+998972343407', 'Jalaquduq Tumani', 'any place', '50.000', '1', '1', '1', '1', '1', 'meta-tag', 'meta-title', 'meta-description', 1, '2022-07-12 23:14:14', '2022-07-14 00:31:38'),
(6, 1, 1, '48 SCHOOL', '1657685840_Large.webp', '+998972343407', 'Andijon', 'any place', '60.000', '1', '1', '1', '1', '1', 'meta-tag', 'meta-title', 'meta-description', 1, '2022-07-12 23:17:20', '2022-07-12 23:18:13'),
(7, 1, 7, 'IZBOSKAN', '1657685998_f658e5c06142be0cbc3e0e49c034a823.jpg', '+998972343407', 'Izboskan Tumani', 'any place', '70.000', '1', '1', '1', '1', '1', 'meta-tag', 'meta-title', 'meta-description', 1, '2022-07-12 23:19:58', '2022-07-14 00:31:06'),
(9, 1, 6, 'BOSTON AREA', '1657686254_20180124_153500-scaled.jpg', '+998972343407', 'Boston tumani', 'any place', '80.000', '1', '1', '1', '1', '1', 'meta-tag', 'meta-title', 'meta-description', 1, '2022-07-12 23:24:14', '2022-07-14 00:30:33'),
(13, 1, 5, 'BULOQBOSHI', '1657686636_Large.webp', '+998972343407', 'Buloqboshi Tumani', 'https://goo.gl/maps/yuhuVL4z9UpgdpkR9', '90.000', '1', '1', '1', '1', '1', 'meta-tag', 'meta-title', 'meta-description', 1, '2022-07-12 23:30:36', '2022-07-14 00:29:35'),
(14, 1, 2, 'ZELENAMOST', '1657775865_f658e5c06142be0cbc3e0e49c034a823.jpg', '+998972343407', 'Andijon Tumani', 'any place', '55.000', '1', '1', '1', '1', '1', 'meta-tag', 'meta-title', 'meta-description', 1, '2022-07-14 00:17:45', '2022-07-14 00:22:19'),
(16, 1, 3, 'ASAKA', '1657776098_20180124_153500-scaled.jpg', '+998972343407', 'Asaka Tumani', 'any place', '55.000', '1', '1', '1', '1', '1', 'meta-tag', 'meta-title', 'meta-description', 1, '2022-07-14 00:21:38', '2022-07-14 00:22:33'),
(17, 1, 4, 'BALIQCHI', '1657776486_mini-futbol-sahasi-ozellikleri-ve-olculeri.jpg', '+998972343407', 'Baliqchi tumani', 'any place', '55.000', '1', '1', '1', '1', '1', 'meta-tag', 'meta-title', 'meta-description', 1, '2022-07-14 00:28:06', '2022-07-14 00:28:06'),
(18, 1, 9, 'XO\'JAOBOD', '1657777389_football-ground-flooring-500x500.jpg', '+998972343407', 'Xo\'jaobod Tumani', 'any place', '35.000', '1', '1', '1', '1', '1', 'meta-tag', 'meta-title', 'meta-description', 1, '2022-07-14 00:43:09', '2022-07-14 00:43:09'),
(19, 1, 11, 'MARHAMAT', '1657777887_Large.webp', '+998972343407', 'Marhamat Tumani', 'any place', '55.000', '1', '1', '1', '1', '1', 'meta-tag', 'meta-title', 'meta-description', 1, '2022-07-14 00:51:27', '2022-07-14 00:51:27'),
(20, 2, 1, 'admin', '1657780063_3.jpg', '+998912345678', 'Andijon shahar Boburshox ko\'cha 3-uy', 'https://goo.gl/maps/yuhuVL4z9UpgdpkR9', '100000', '1', '1', '1', '1', '1', 'meta-tag', 'meta-title', 'meta-description', 1, '2022-07-14 01:27:43', '2022-07-14 01:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `sport_complex_translations`
--

CREATE TABLE `sport_complex_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sport_complex_id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sport_complex_translations`
--

INSERT INTO `sport_complex_translations` (`id`, `locale`, `sport_complex_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'uz', 1, '<div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, \"Courier New\", monospace; line-height: 19px; white-space: pre;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam delectus eius dolores iusto ipsum culpa consequatur laudantium dicta quasi numquam in, aperiam enim natus doloremque!</div>', NULL, NULL),
(2, 'ru', 1, '<div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, \"Courier New\", monospace; line-height: 19px; white-space: pre;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam delectus eius dolores iusto ipsum culpa consequatur laudantium dicta quasi numquam in, aperiam enim natus doloremque!</div>', NULL, NULL),
(3, 'en', 1, '<div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, \"Courier New\", monospace; line-height: 19px; white-space: pre;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam delectus eius dolores iusto ipsum culpa consequatur laudantium dicta quasi numquam in, aperiam enim natus doloremque!</div>', NULL, NULL),
(4, 'uz', 2, '<span style=\"color: rgb(212, 212, 212); font-family: Consolas, &quot;Courier New&quot;, monospace; white-space: pre; background-color: rgb(255, 255, 255);\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente deleniti quo blanditiis magni eveniet tempora, velit a nesciunt officia dolore doloremque dolorem omnis alias eos debitis voluptates saepe id vel!</span>', NULL, NULL),
(5, 'ru', 2, '<div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; line-height: 19px; white-space: pre;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente deleniti quo blanditiis magni eveniet tempora, velit a nesciunt officia dolore doloremque dolorem omnis alias eos debitis voluptates saepe id vel!</div>', NULL, NULL),
(6, 'en', 2, '<div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; line-height: 19px; white-space: pre;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente deleniti quo blanditiis magni eveniet tempora, velit a nesciunt officia dolore doloremque dolorem omnis alias eos debitis voluptates saepe id vel!</div>', NULL, NULL),
(7, 'uz', 3, '<div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; line-height: 19px; white-space: pre;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente deleniti quo blanditiis magni eveniet tempora, velit a nesciunt officia dolore doloremque dolorem omnis alias eos debitis voluptates saepe id vel!</div>', NULL, NULL),
(8, 'ru', 3, '<div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; line-height: 19px; white-space: pre;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente deleniti quo blanditiis magni eveniet tempora, velit a nesciunt officia dolore doloremque dolorem omnis alias eos debitis voluptates saepe id vel!</div>', NULL, NULL),
(9, 'en', 3, '<div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; line-height: 19px; white-space: pre;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente deleniti quo blanditiis magni eveniet tempora, velit a nesciunt officia dolore doloremque dolorem omnis alias eos debitis voluptates saepe id vel!</div>', NULL, NULL),
(10, 'uz', 4, 'sasa', NULL, NULL),
(11, 'ru', 4, 'asasa', NULL, NULL),
(12, 'en', 4, 'asasa', NULL, NULL),
(13, 'uz', 6, 'sasas', NULL, NULL),
(14, 'ru', 6, 'asas', NULL, NULL),
(15, 'en', 6, 'asas', NULL, NULL),
(16, 'uz', 7, 'sasa', NULL, NULL),
(17, 'ru', 7, 'asasa', NULL, NULL),
(18, 'en', 7, 'asas', NULL, NULL),
(19, 'uz', 8, 'asas', NULL, NULL),
(20, 'ru', 8, 'asas', NULL, NULL),
(21, 'en', 8, 'asas', NULL, NULL),
(22, 'uz', 9, 'asas', NULL, NULL),
(23, 'ru', 9, 'asas', NULL, NULL),
(24, 'en', 9, 'asas', NULL, NULL),
(25, 'uz', 10, 'ASAS', NULL, NULL),
(26, 'ru', 10, 'ASA', NULL, NULL),
(27, 'en', 10, 'ASA', NULL, NULL),
(28, 'uz', 13, 'asas', NULL, NULL),
(29, 'ru', 13, 'asas', NULL, NULL),
(30, 'en', 13, 'asas', NULL, NULL),
(31, 'uz', 14, 'sasa', NULL, NULL),
(32, 'ru', 14, 'asas', NULL, NULL),
(33, 'en', 14, 'asas', NULL, NULL),
(34, 'uz', 16, 'sasas', NULL, NULL),
(35, 'ru', 16, 'asasa', NULL, NULL),
(36, 'en', 16, 'asas', NULL, NULL),
(37, 'uz', 17, 'sas', NULL, NULL),
(38, 'ru', 17, 'asas', NULL, NULL),
(39, 'en', 17, 'asas', NULL, NULL),
(40, 'uz', 18, 'asas', NULL, NULL),
(41, 'ru', 18, 'asas', NULL, NULL),
(42, 'en', 18, 'asas', NULL, NULL),
(43, 'uz', 19, 'sas', NULL, NULL),
(44, 'ru', 19, 'sasa', NULL, NULL),
(45, 'en', 19, 'sas', NULL, NULL),
(46, 'uz', 20, 'dsadasfsdfsd', NULL, NULL),
(47, 'ru', 20, 'asdfassdsdf', NULL, NULL),
(48, 'en', 20, 'asdfasdfasd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stadiums`
--

CREATE TABLE `stadiums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stadiums`
--

INSERT INTO `stadiums` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bobur Arena', '2022-07-11 23:44:15', '2022-07-11 23:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `stadium_sections`
--

CREATE TABLE `stadium_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stadium_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stadium_sections`
--

INSERT INTO `stadium_sections` (`id`, `stadium_id`, `name`, `price`, `capacity`, `image`, `created_at`, `updated_at`) VALUES
(6, 1, 'SECTOR 1', 50000, 500, '', '2022-07-12 00:58:08', '2022-07-12 01:42:02'),
(7, 1, 'SECTOR 2', 30000, 300, '', '2022-07-12 00:58:29', '2022-07-12 01:42:17'),
(8, 1, 'SECTOR 3', 50000, 500, '', '2022-07-12 00:58:42', '2022-07-12 01:42:28'),
(9, 1, 'SECTOR 4', 30000, 300, '', '2022-07-12 00:58:49', '2022-07-12 01:42:46'),
(10, 1, 'SECTOR 5', 10000, 100, '', '2022-07-12 01:01:07', '2022-07-12 01:42:52'),
(11, 1, 'SECTOR 6', 10000, 100, '', '2022-07-12 01:01:14', '2022-07-12 01:42:57'),
(12, 1, 'SECTOR 7', 10000, 100, '', '2022-07-12 01:01:22', '2022-07-12 01:43:01'),
(13, 1, 'SECTOR 8', 10000, 100, '', '2022-07-12 01:01:33', '2022-07-12 01:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sport_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `official_site` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `sport_category_id`, `name`, `address`, `image`, `year`, `official_site`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 1, 'REAL MADRID', 'ISPANIYA', '1657263604_Real_Madrid_CF.png', '2004', 'REAL.COM', 'meta', 'meta', 'meta', '2022-07-08 02:00:04', '2022-07-08 02:00:04'),
(2, 1, 'BARCELONA', 'ISPANIYA', '1657263644_FC_Barcelona_(crest).png', '2004', 'REAL.COM', 'meta', 'meta', 'meta', '2022-07-08 02:00:44', '2022-07-08 02:00:44'),
(3, 1, 'BAVARIYA', 'GERMANIYA', '1657263671_1200px-FC_Bayern_München_logo_(2017).png', '1314', 'REAL.COM', 'meta', 'meta', 'meta', '2022-07-08 02:01:11', '2022-07-08 02:01:11'),
(4, 1, 'MANCHESTER CITY', 'ANGLIYA', '1657263710_manchester-city-fc-logo-512x512.png', '1341', 'REAL.COM', 'meta', 'meta', 'meta', '2022-07-08 02:01:50', '2022-07-08 02:01:50'),
(5, 1, 'ROMA', 'ITALIYA', '1657263737_Roma-Logo.png', '2521', 'REAL.COM', 'meta', 'meta', 'meta', '2022-07-08 02:02:17', '2022-07-08 02:02:17');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sport_category_id` bigint(20) UNSIGNED NOT NULL,
  `team1_id` bigint(20) UNSIGNED NOT NULL,
  `team2_id` bigint(20) UNSIGNED NOT NULL,
  `stadium_section_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `sport_category_id`, `team1_id`, `team2_id`, `stadium_section_id`, `name`, `date`, `price`, `image`, `meta_tag`, `meta_title`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 6, 'NIKE', '2022-07-12T13:59', 30000, '1657619348_Group 75.png', 'meta-tag', 'meta-title', 'meta-description', 1, '2022-07-12 04:00:11', '2022-07-12 04:49:08'),
(2, 1, 3, 5, 7, 'NIKE', '2022-07-14T14:07', 55000, '1657619360_Group 75.png', 'meta-tag', 'meta-title', 'meta-description', 1, '2022-07-12 04:08:01', '2022-07-12 04:49:20'),
(3, 1, 4, 2, 6, 'NIKE', '2022-07-15T14:08', 35000, '1657619453_Group 75.png', 'meta-tag', 'meta-title', 'meta-description', 1, '2022-07-12 04:08:48', '2022-07-12 04:50:53'),
(6, 1, 1, 3, 6, 'NIKE', '2022-07-14T09:47', 15000, '1657687656_Group 75.png', 'meta-tag', 'meta-title', 'meta-description', 1, '2022-07-12 23:47:36', '2022-07-12 23:47:36'),
(7, 1, 2, 5, 7, 'NIKE', '2022-07-14T09:48', 95000, '1657687734_Group 75.png', 'meta-tag', 'meta-title', 'meta-description', 1, '2022-07-12 23:48:54', '2022-07-12 23:48:54'),
(9, 2, 1, 2, 7, 'N1604', '2022-07-14T11:22', 30000, '1657779891_10.png', 'meta-tag', 'meta-title', 'meta-description', 1, '2022-07-14 01:24:51', '2022-07-14 01:24:51'),
(10, 2, 2, 1, 7, 'N1605', '2022-07-14T11:25', 30000, '1657779930_10.png', 'meta-tag', 'meta-title', 'meta-description', 1, '2022-07-14 01:25:30', '2022-07-14 01:25:30'),
(11, 2, 3, 1, 7, 'N1606', '2022-07-14T11:26', 30000, '1657779999_10.png', 'meta-tag', 'meta-title', 'meta-description', 1, '2022-07-14 01:26:39', '2022-07-14 01:26:39'),
(12, 2, 3, 2, 6, 'N1607', '2022-07-14T11:28', 50000, '1657780120_10.png', 'meta-tag', 'meta-title', 'meta-description', 1, '2022-07-14 01:28:40', '2022-07-14 01:28:40'),
(13, 2, 4, 1, 7, 'N1608', '2022-07-14T11:29', 30000, '1657780238_10.png', 'meta-tag', 'meta-title', 'meta-description', 1, '2022-07-14 01:30:38', '2022-07-14 01:30:38'),
(15, 3, 4, 2, 8, 'N16010', '2022-07-14T11:45', 50000, '1657781201_10.png', 'meta-tag', 'meta-title', 'meta-description', 1, '2022-07-14 01:46:41', '2022-07-14 01:46:41'),
(16, 3, 4, 3, 8, 'N1611', '2022-07-14T11:46', 50000, '1657781237_10.png', 'meta-tag', 'meta-title', 'meta-description', 1, '2022-07-14 01:47:17', '2022-07-14 01:47:17'),
(17, 3, 2, 3, 8, 'N1612', '2022-07-14T11:47', 50000, '1657781302_10.png', 'meta-tag', 'meta-title', 'meta-description', 1, '2022-07-14 01:48:22', '2022-07-14 01:48:22'),
(18, 3, 5, 4, 9, 'N1613', '2022-07-14T11:48', 30000, '1657781348_10.png', 'meta-tag', 'meta-title', 'meta-description', 1, '2022-07-14 01:49:08', '2022-07-14 01:49:08'),
(19, 3, 5, 1, 9, 'N1614', '2022-07-14T11:49', 30000, '1657781411_10.png', 'meta-tag', 'meta-title', 'meta-description', 1, '2022-07-14 01:50:11', '2022-07-14 01:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_translations`
--

CREATE TABLE `ticket_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_translations`
--

INSERT INTO `ticket_translations` (`id`, `locale`, `ticket_id`, `description`) VALUES
(1, 'uz', 1, 'asasa'),
(2, 'ru', 1, 'asas'),
(3, 'en', 1, 'asasa'),
(4, 'uz', 2, 'sasas'),
(5, 'ru', 2, 'asas'),
(6, 'en', 2, 'asasa'),
(7, 'uz', 3, 'sasas'),
(8, 'ru', 3, 'asasa'),
(9, 'en', 3, 'asasa'),
(16, 'uz', 6, 'sasa'),
(17, 'ru', 6, 'asas'),
(18, 'en', 6, 'asas'),
(19, 'uz', 7, 'sasa'),
(20, 'ru', 7, 'asas'),
(21, 'en', 7, 'asa'),
(25, 'uz', 9, 'asdasfsd'),
(26, 'ru', 9, 'asdasdas'),
(27, 'en', 9, 'sdfsasfasd'),
(28, 'uz', 10, 'sadassafsds'),
(29, 'ru', 10, 'asdfasdfasds'),
(30, 'en', 10, 'asdfasdf'),
(31, 'uz', 11, 'asdfasdfsdfs'),
(32, 'ru', 11, 'asdfasdf'),
(33, 'en', 11, 'asdfasdf'),
(34, 'uz', 12, 'asfdsadfasdf'),
(35, 'ru', 12, 'asdasfasdf'),
(36, 'en', 12, 'asdfasdf'),
(37, 'uz', 13, 'asdsfsadfsasf'),
(38, 'ru', 13, 'asdfasdfasd'),
(39, 'en', 13, 'asdfasdfgasdf'),
(40, 'uz', 15, 'assfasdfas'),
(41, 'ru', 15, 'asdfasfas'),
(42, 'en', 15, 'asdfasfasd'),
(43, 'uz', 16, 'asdfsadfsd'),
(44, 'ru', 16, 'sdfasdfasd'),
(45, 'en', 16, 'asdfasdfasdf'),
(46, 'uz', 17, 'asdfsdgfdh'),
(47, 'ru', 17, 'dfghdfghdfg'),
(48, 'en', 17, 'dfghdgfhfgh'),
(49, 'uz', 18, 'dfhdfghdfg'),
(50, 'ru', 18, 'dfghdfgfgh'),
(51, 'en', 18, 'fgjhghjdfgh'),
(52, 'uz', 19, 'dsafgsdfgsdfg'),
(53, 'ru', 19, 'sdfgdfgsdfghfg'),
(54, 'en', 19, 'fghjfghjfghjfghjfghj');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'General Admin', 'general@gmail.com', NULL, '$2y$10$W4U2j47p9FztKTM2pL5BuO1WgvDzCji2IOYzWkzfD0IOyl5HDdZkC', 'bnRs5PyJlWNYMtriL6z2b4UTwOHPwhLHJKwwfIF4wXDXA0S4bfxB75f7NN4j', '2022-07-08 01:41:08', '2022-07-08 01:41:08'),
(2, 'Botir', 'botirakhmedov@gmail.com', NULL, '$2y$10$hUsST0BLkoKr4kKTc.Sek.UwlEEo3TctMtTpiL.QemkkzQ37gfDgS', NULL, '2022-07-08 01:48:52', '2022-07-08 01:48:52'),
(3, 'Umidjon', 'admin017@admin.com', NULL, '$2y$10$pFWl.MJrpyx6BxTtNCIjPu4i4UlpaPJyVx5wOlepypF/i2wkX/qwC', NULL, '2022-07-12 00:34:12', '2022-07-12 00:34:12'),
(5, 'sasa', 'ssaa@gmail.com', NULL, '$2y$10$9IOLK0.PDaGvEEsQxr8yNeU0agzQngU0XVuTlJ64qrSot46NAAzTy', NULL, '2022-07-12 02:25:17', '2022-07-12 02:25:17'),
(6, 'Abdulboriy', 'nomonovvv7@gmail.com', NULL, '$2y$10$odbKKRNiSY5257huV3xdvev4PgR2feBwLzicHZqgYswHCzjooS/4a', NULL, '2022-07-13 01:48:08', '2022-07-13 01:48:08'),
(9, 'Abbosbek', 'abbosarabboyev9@gmail.com', NULL, '$2y$10$YdzRbcul0AFtUxo91CrAju2Sc0y2LMeQ0C4hJdbQOmGNjwTOBDh8C', NULL, '2022-07-14 01:04:02', '2022-07-14 01:04:02'),
(12, 'Abbosbek', 'abbosarabboyev090@gmail.com', NULL, '$2y$10$KEhFyWXLfHKPBzuTM5lHQe/46.47oaIDxoTezjuC9d7Y9ibrV0JRa', NULL, '2022-07-14 01:21:16', '2022-07-14 01:21:16'),
(21, 'botirrr', 'botirrtrtrtrtr@gmail.com', NULL, '$2y$10$VWtptjNPGq5hfOj23gOL2uFmXvOfJEJNlAqUMwDAmgYehacm7czjS', NULL, '2022-07-14 01:36:21', '2022-07-14 01:36:21'),
(22, 'botirrr', 'botirrtrtrtrtsr@gmail.com', NULL, '$2y$10$D8xJuvjkSPWDH9GwW/aSeu9eMDNUQGNtp4p5URtggfaa5vqXl5M0S', NULL, '2022-07-14 01:37:10', '2022-07-14 01:37:10'),
(24, 'couser', 'couser@gmail.com', NULL, '$2y$10$Plzu2cPFz2pKX4gPtzlEGeFB6GCqLNOUMIx.nAwSQlPdgvOwgxoDG', NULL, '2022-07-14 02:04:45', '2022-07-14 02:04:45'),
(53, 'ahmedovv', 'botirahkmedovv@gmail.com', NULL, '$2y$10$rJ79FqASWwO9VeLw9GU7QubOY2wU18/zhUHERiCgdB5IbmVtYZGfa', NULL, '2022-07-14 02:41:59', '2022-07-14 02:41:59'),
(55, 'botirrr#', 'botir4545464@gmail.com', NULL, '$2y$10$e7ZYJ3C5cNz3VM5MoDzM4ON/nUS/i8j.TY0LS/n0NNqfOeoOLxIJ2', NULL, '2022-07-14 02:45:22', '2022-07-14 02:45:22'),
(56, 'botirrr#', 'botir454546w4@gmail.com', NULL, '$2y$10$GkOlliMIuvVloos9vxHkJ.97VxIFidEABJzVapsClBSa42PFgskOq', NULL, '2022-07-14 02:45:33', '2022-07-14 02:45:33'),
(58, 'botirss', 'botir3145135@gmail.com', NULL, '$2y$10$q4dR7P.rElPldgGcH9gzWe2OEyNvfXtH3lBtNHAXASWXWzGGsDIJW', NULL, '2022-07-14 03:10:05', '2022-07-14 03:10:05'),
(59, 'Salomw', 'Botirsjdgrvv@gmail.com', NULL, '$2y$10$NDmYwZBPzuZXWxK.aYGz6.0Z3EYKybjLtj95A6T2yDFDFITHIZcqy', NULL, '2022-07-14 05:01:19', '2022-07-14 05:01:19'),
(61, 'Salomw', 'Botirsjdgrnvv@gmail.com', NULL, '$2y$10$jilEXrbT6JwpEh46Y3vU4.2D26m5lY/aAfxZqmnCT8vK/mGSD.BB2', NULL, '2022-07-14 05:01:24', '2022-07-14 05:01:24'),
(62, 'ali', 'ali@gmail.coom', NULL, '$2y$10$rWZ2Rnszlwq2Z6h4XUsPYuwBIbi1ou5L85R4ZDRww4hKOeuoO8ORi', NULL, '2022-07-14 05:54:13', '2022-07-14 05:54:13'),
(63, 'user01', 'user01@gmail.com', NULL, '$2y$10$6RE6ocqppR2sRJHy.sRDPebGuuy89hJLJHcx8BjDMnbO0TWYii7r2', NULL, '2022-07-15 01:45:31', '2022-07-15 01:45:31'),
(67, 'user017', 'qobiljonovumidjon@gmail.com', NULL, '$2y$10$jBMrgB1Y02WeXcf376M64eKmVBT/lkD.sQ6kY80tJt/lmGsLL3QE.', NULL, '2022-07-15 01:52:33', '2022-07-15 01:52:33'),
(71, 'shdvhjs', 'oyev090@gmail.com', NULL, '$2y$10$1.dSPd.F8ojdw36LmHnDsOXrCdnb0k3Hm4bVzoWbtqMx.L3KUx6E6', NULL, '2022-07-15 04:19:52', '2022-07-15 04:19:52'),
(74, 'test', 'aabbosarabboyev090@gmail.com', NULL, '$2y$10$X6.6ErEH8WysQ/d4f5k6DOO7UqpG1FZSJCvVo6COC9Q9Oo7Bku2P6', NULL, '2022-07-16 00:13:14', '2022-07-16 00:13:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `areas_name_unique` (`name`),
  ADD KEY `areas_region_id_foreign` (`region_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_parent_id_foreign` (`parent_id`),
  ADD KEY `comments_news_id_foreign` (`news_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_country_unique` (`country`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_translations`
--
ALTER TABLE `home_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `home_translations_home_id_locale_unique` (`home_id`,`locale`),
  ADD KEY `home_translations_locale_index` (`locale`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_sport_category_id_foreign` (`sport_category_id`);

--
-- Indexes for table `news_translations`
--
ALTER TABLE `news_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_translations_news_id_locale_unique` (`news_id`,`locale`),
  ADD KEY `news_translations_locale_index` (`locale`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category_translations`
--
ALTER TABLE `product_category_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_category_translations_product_category_id_locale_unique` (`product_category_id`,`locale`),
  ADD KEY `product_category_translations_locale_index` (`locale`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_translations_product_id_locale_unique` (`product_id`,`locale`),
  ADD KEY `product_translations_locale_index` (`locale`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regions_name_unique` (`name`),
  ADD KEY `regions_country_id_foreign` (`country_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shop_likes`
--
ALTER TABLE `shop_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sport_categories`
--
ALTER TABLE `sport_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sport_category_translations`
--
ALTER TABLE `sport_category_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sport_category_translations_sport_category_id_locale_unique` (`sport_category_id`,`locale`),
  ADD KEY `sport_category_translations_locale_index` (`locale`);

--
-- Indexes for table `sport_complexes`
--
ALTER TABLE `sport_complexes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sport_complexes_name_unique` (`name`),
  ADD KEY `sport_complexes_sport_category_id_foreign` (`sport_category_id`),
  ADD KEY `sport_complexes_area_id_foreign` (`area_id`);

--
-- Indexes for table `sport_complex_translations`
--
ALTER TABLE `sport_complex_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sport_complex_translations_sport_complex_id_locale_unique` (`sport_complex_id`,`locale`),
  ADD KEY `sport_complex_translations_locale_index` (`locale`);

--
-- Indexes for table `stadiums`
--
ALTER TABLE `stadiums`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stadiums_name_unique` (`name`);

--
-- Indexes for table `stadium_sections`
--
ALTER TABLE `stadium_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stadium_sections_stadium_id_foreign` (`stadium_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_sport_category_id_foreign` (`sport_category_id`),
  ADD KEY `tickets_team1_id_foreign` (`team1_id`),
  ADD KEY `tickets_team2_id_foreign` (`team2_id`),
  ADD KEY `tickets_stadium_section_id_foreign` (`stadium_section_id`);

--
-- Indexes for table `ticket_translations`
--
ALTER TABLE `ticket_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_translations_ticket_id_locale_unique` (`ticket_id`,`locale`);

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
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `home_translations`
--
ALTER TABLE `home_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `news_translations`
--
ALTER TABLE `news_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_category_translations`
--
ALTER TABLE `product_category_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shop_likes`
--
ALTER TABLE `shop_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sport_categories`
--
ALTER TABLE `sport_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sport_category_translations`
--
ALTER TABLE `sport_category_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sport_complexes`
--
ALTER TABLE `sport_complexes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sport_complex_translations`
--
ALTER TABLE `sport_complex_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `stadiums`
--
ALTER TABLE `stadiums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stadium_sections`
--
ALTER TABLE `stadium_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ticket_translations`
--
ALTER TABLE `ticket_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `home_translations`
--
ALTER TABLE `home_translations`
  ADD CONSTRAINT `home_translations_home_id_foreign` FOREIGN KEY (`home_id`) REFERENCES `homes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_sport_category_id_foreign` FOREIGN KEY (`sport_category_id`) REFERENCES `sport_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news_translations`
--
ALTER TABLE `news_translations`
  ADD CONSTRAINT `news_translations_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_category_translations`
--
ALTER TABLE `product_category_translations`
  ADD CONSTRAINT `product_category_translations_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD CONSTRAINT `product_translations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `regions_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sport_category_translations`
--
ALTER TABLE `sport_category_translations`
  ADD CONSTRAINT `sport_category_translations_sport_category_id_foreign` FOREIGN KEY (`sport_category_id`) REFERENCES `sport_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sport_complexes`
--
ALTER TABLE `sport_complexes`
  ADD CONSTRAINT `sport_complexes_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `sport_complexes_sport_category_id_foreign` FOREIGN KEY (`sport_category_id`) REFERENCES `sport_categories` (`id`);

--
-- Constraints for table `stadium_sections`
--
ALTER TABLE `stadium_sections`
  ADD CONSTRAINT `stadium_sections_stadium_id_foreign` FOREIGN KEY (`stadium_id`) REFERENCES `stadiums` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_sport_category_id_foreign` FOREIGN KEY (`sport_category_id`) REFERENCES `sport_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_stadium_section_id_foreign` FOREIGN KEY (`stadium_section_id`) REFERENCES `stadium_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_team1_id_foreign` FOREIGN KEY (`team1_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_team2_id_foreign` FOREIGN KEY (`team2_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ticket_translations`
--
ALTER TABLE `ticket_translations`
  ADD CONSTRAINT `ticket_translations_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
