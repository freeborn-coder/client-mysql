<?php

// fill in your database credentials
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_DATABASE','vincent_db');

// create connection using the constants
$db = new mysqli(DB_HOST,DB_USER, DB_PASSWORD, DB_DATABASE);

// Check connection
if ($db->connect_errno) {
  echo "Failed to connect to MySQL: " . $db->connect_error;
  exit();
}

// echo 'Connected to DB @ '.$db->host_info;

// create game
$create_games =
"CREATE TABLE `games` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `steam_app_id` int(11) DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

$res = $db->query($create_games);

if(!$res) echo $db->error . "\n";

// create movies
$create_movies =
"CREATE TABLE `movies` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `game_id` int(11) DEFAULT NULL,
    `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    FOREIGN KEY (game_id) REFERENCES games(id)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

$res = $db->query($create_movies);

if(!$res) echo $db->error . "\n";


// create movie links
$create_movie_links =
"CREATE TABLE `movie_links` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `movie_id` int(11) DEFAULT NULL,
    `format` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `quality_480` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `quality_max` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    FOREIGN KEY (movie_id) REFERENCES movies(id)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

  $db->query($create_movie_links);

  if(!$res) echo $db->error . "\n";

// create packages table
$create_packages =
"CREATE TABLE `packages` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `game_id` int(11) DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    FOREIGN KEY (game_id) REFERENCES games(id)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

$db->query($create_packages);

if(!$res) echo $db->error . "\n";


// create package groups
$create_package_groups =
"CREATE TABLE `package_groups` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `game_id` int(11) DEFAULT NULL,
    `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    FOREIGN KEY (game_id) REFERENCES games(id)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

$db->query($create_package_groups);

if(!$res) echo $db->error . "\n";

// create package subs
$create_subs =
"CREATE TABLE `package_subs` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `package_id` int(11) DEFAULT NULL,
    `package_group_id` int(11) DEFAULT NULL,
    `price_in_cents_with_discount` decimal(10,2) DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    FOREIGN KEY (package_id) REFERENCES packages(id),
    FOREIGN KEY (package_group_id) REFERENCES package_groups(id)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

$res = $db->query($create_subs);

if(!$res) echo $db->error . "\n";

// create pc requirements table
$create_pc_requirements =
"CREATE TABLE `pc_requirements` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `game_id` int(11) DEFAULT NULL,
    `minimum` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `recommended` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    FOREIGN KEY (game_id) REFERENCES games(id)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

  $res = $db->query($create_pc_requirements);

  if(!$res) echo $db->error . "\n";


// create achievements table
$create_achievements =
"CREATE TABLE `achievements` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `game_id` int(11) NOT NULL,
    `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `highlighted` tinyint(1) DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    FOREIGN KEY (game_id) REFERENCES games(id)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

  $res = $db->query($create_achievements);
  if(!$res) echo $db->error . "\n";


$create_dlcs =
"CREATE TABLE `dlcs` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `game_id` int(11) DEFAULT NULL,
    `dlc_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    FOREIGN KEY (game_id) REFERENCES games(id)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

  $res = $db->query($create_dlcs);

  if(!$res) echo $db->error . "\n";



// INSERT QUERIES

// INSERT GAME
$insert_game = "INSERT INTO `games` (`id`, `name`, `steam_app_id`, `created_at`, `updated_at`)
    VALUES (NULL, 'LEGO® STAR WARS™: The Force Awakens', 438640, '2021-10-19 04:46:34', '2021-10-19 04:46:34')";

$db->query($insert_game);



// INSERT ACHIEVEMENT

$insert_achievement =
"INSERT INTO `achievements` (`id`, `game_id`, `name`, `path`, `highlighted`, `created_at`, `updated_at`)
VALUES (1, 1, 'I\'ll Come Back For You!', 'https:\\/\\/cdn.akamai.steamstatic.com\\/steamcommunity\\/public\\/images\\/apps\\/438640\\/b8ff93d1dbcaa228b67b8e64d9fb6999126564e3.jpg', 1, '2021-10-19 04:46:35', '2021-10-19 04:46:35'),
(2, 1, 'It Belongs To Me!', 'https:\\/\\/cdn.akamai.steamstatic.com\\/steamcommunity\\/public\\/images\\/apps\\/438640\\/73d4d1f430a2878110aacbcd770fbd24573559bb.jpg', 1, '2021-10-19 04:46:35', '2021-10-19 04:46:35')";

// INSERT DLC
$insert_dlc = "INSERT INTO `dlcs` (`id`, `game_id`, `dlc_number`, `created_at`, `updated_at`) VALUES (1, 1, '466540', '2021-10-19 04:46:34', '2021-10-19 04:46:34')";
$db->query($insert_dlc);


// INSERT MOVIE
$insert_movie = "INSERT INTO `movies` (`id`, `game_id`, `name`, `thumbnail`, `created_at`, `updated_at`) VALUES (1, 1, 'LEGO® Star Wars™: The Force Awakens - Announce Trailer', NULL, '2021-10-19 04:46:34', '2021-10-19 04:46:34')";
$db->query($insert_movie);

$movie_id = $db->insert_id;

// INSERT MOVIE LINKS
$insert_movie_links =
"INSERT INTO `movie_links` (`id`, `movie_id`, `format`, `quality_480`, `quality_max`, `created_at`, `updated_at`) VALUES
(NULL, 1, 'webm', 'http:\\/\\/cdn.akamai.steamstatic.com\\/steam\\/apps\\/256660456\\/movie480.webm?t=1458847589', 'http:\\/\\/cdn.akamai.steamstatic.com\\/steam\\/apps\\/256660456\\/movie_max.webm?t=1458847589', '2021-10-19 04:46:34', '2021-10-19 04:46:34'),
(NULL, 1, 'mp4', 'http:\\/\\/cdn.akamai.steamstatic.com\\/steam\\/apps\\/256660456\\/movie480.mp4?t=1458847589', 'http:\\/\\/cdn.akamai.steamstatic.com\\/steam\\/apps\\/256660456\\/movie_max.mp4?t=1458847589', '2021-10-19 04:46:35', '2021-10-19 04:46:35')";


// INSERT PACKAGE
$insert_package = "INSERT INTO `packages` (`id`, `game_id`, `package_number`, `created_at`, `updated_at`) VALUES (1, 1, 92457, '2021-10-19 04:46:34', '2021-10-19 04:46:34')";
$db->query($insert_package);

// INSERT PACKAGE GROUPS
$insert_package_group = "INSERT INTO `package_groups` (`id`, `game_id`, `title`, `created_at`, `updated_at`) VALUES (1, 1, 'Buy LEGO® STAR WARS™: The Force Awakens', '2021-10-19 04:46:34', '2021-10-19 04:46:34')";
$db->query($insert_package_group);


// INSERT PACKAGE SUB
$insert_package_sub = "INSERT INTO `package_subs` (`id`, `package_id`, `package_group_id`, `price_in_cents_with_discount`, `created_at`, `updated_at`) VALUES (1, 1, 1, '2999.95', '2021-10-19 04:46:34', '2021-10-19 04:46:34')";
$db->query($insert_package_sub);

// INSERT Pc requirement
$insert_pc_requirement = "INSERT INTO `pc_requirements` (`id`, `game_id`, `minimum`, `recommended`, `created_at`, `updated_at`)
VALUES (1, 1, '<strong>Minimum:<\\/strong><br><ul class=\"bb_ul\"><li><strong>OS:<\\/strong> Windows XP\\/Vista\\/7\\/8\\/10<br><\\/li><li><strong>Processor:<\\/strong> Intel Core 2 Quad Q6600 (2.4 GHz) \\/ AMD Phenom x4 9850 (2.5 GHz)<br><\\/li><li><strong>Memory:<\\/strong> 4 GB RAM<br><\\/li><li><strong>Graphics:<\\/strong> GeForce GT 430 (1024 MB)\\/ Radeon HD 6850 (1024 MB)<br><\\/li><li><strong>DirectX:<\\/strong> Version 9.0c<br><\\/li><li><strong>Network:<\\/strong> Broadband Internet connection<br><\\/li><li><strong>Storage:<\\/strong> 14 GB available space<br><\\/li><li><strong>Sound Card:<\\/strong> DirectX compatible<br><\\/li><li><strong>Additional Notes:<\\/strong> Windows XP and DirectX® 9.0b and below not supported<\\/li><\\/ul>', '<strong>Recommended:<\\/strong><br><ul class=\"bb_ul\"><li><strong>OS:<\\/strong> Windows XP\\/Vista\\/7\\/8\\/10<br><\\/li><li><strong>Processor:<\\/strong> Intel i5, 4 x 2.6 GHz or AMD equivalent<br><\\/li><li><strong>Memory:<\\/strong> 4 GB RAM<br><\\/li><li><strong>Graphics:<\\/strong> NVIDIA GeForce GTX 480 or ATI Radeon HD 5850 or better, 1Gb RAM<br><\\/li><li><strong>DirectX:<\\/strong> Version 11<br><\\/li><li><strong>Network:<\\/strong> Broadband Internet connection<br><\\/li><li><strong>Storage:<\\/strong> 14 GB available space<br><\\/li><li><strong>Sound Card:<\\/strong> DirectX compatible<br><\\/li><li><strong>Additional Notes:<\\/strong> Windows XP and DirectX® 9.0b and below not supported<\\/li><\\/ul>', '2021-10-19 04:46:34', '2021-10-19 04:46:34')";

$db->query($insert_pc_requirement);


echo 'all data inserted';
