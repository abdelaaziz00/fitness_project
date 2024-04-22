-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2024 at 03:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `azfit`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `idfood` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `carbs` int(11) DEFAULT NULL,
  `fat` int(11) DEFAULT NULL,
  `proteine` int(11) DEFAULT NULL,
  `photo` char(100) DEFAULT NULL,
  `calorise` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`idfood`, `name`, `carbs`, `fat`, `proteine`, `photo`, `calorise`) VALUES
(1, 'egg', 20, 5, 11, 'Brown-eggs.webp', 92),
(2, 'beef', 5, 6, 201, 'Beef-loin.webp', 150);

-- --------------------------------------------------------

--
-- Table structure for table `fooduser`
--

CREATE TABLE `fooduser` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `namefood` varchar(255) NOT NULL,
  `Weight` int(11) NOT NULL,
  `idfood` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fooduser`
--

INSERT INTO `fooduser` (`id`, `id_user`, `namefood`, `Weight`, `idfood`) VALUES
(37, 48, 'breakfast', 400, 2),
(38, 48, 'breakfast', 200, 1),
(54, 49, 'breakfast', 400, 1),
(55, 49, 'breakfast', 100, 2),
(56, 49, 'breakfast', 500, 1),
(57, 49, 'diner', 400, 1),
(60, 49, 'lunch', 400, 2),
(61, 49, 'diner', 400, 1);

-- --------------------------------------------------------

--
-- Table structure for table `musscle`
--

CREATE TABLE `musscle` (
  `photo` varchar(50) DEFAULT NULL,
  `titre` varchar(20) DEFAULT NULL,
  `id_muscle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `musscle`
--

INSERT INTO `musscle` (`photo`, `titre`, `id_muscle`) VALUES
('Screenshot 2023-11-06 154551.png', 'delotide', 0),
('Equipment.png', 'chest', 1),
('Screenshot 2023-11-06 154428.png', 'trapeze', 4),
('Screenshot 2023-11-06 154605.png', 'biceps', 5),
('Screenshot 2023-11-06 154706.png', 'lats', 6),
('Screenshot 2023-11-06 160029.png', 'abdominals', 8),
('Screenshot 2023-11-06 154723.png', 'quads', 9),
('Screenshot 2023-11-06 160632.png', 'lowerback', 10),
('Screenshot 2023-11-06 154623.png', 'triceps', 11);

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_type` char(20) DEFAULT NULL,
  `obj_cal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `email`, `password`, `name`, `user_type`, `obj_cal`) VALUES
(1, '', 'd41d8cd98f00b204e9800998ecf8427e', 'egg', NULL, 0),
(6, 'hfvgbkjgl@ghjjkol', 'PASSWORD_PLACEHOLDER', '', NULL, 0),
(11, 'jcjcjc@gmail.com', 'PASSWORD_PLACEHOLDER', '', NULL, 0),
(41, 'z@zzz', 'PASSWORD_PLACEHOLDER', 'kdkkddkd', 'user', 0),
(43, 'p@pppp', 'pppp', 'kskks', 'user', 0),
(45, 'aziz@aa', 'b85dc795ba17cb243ab156f8c52124e1', 'aziz', 'admin', 0),
(47, 'v@vvv', '4786f3282f04de5b5c7317c490c6d922', 'nanan', 'admin', 0),
(49, 'abdelaaziz.belharcha@gmail.com', '809225a7b25fe83ba3069bf6b1d79cf4', 'aziz', 'user', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `user_totals`
--

CREATE TABLE `user_totals` (
  `id_user` int(11) NOT NULL,
  `total_calories` decimal(10,2) DEFAULT NULL,
  `total_carbs` decimal(10,2) DEFAULT NULL,
  `total_protein` decimal(10,2) DEFAULT NULL,
  `total_fat` decimal(10,2) DEFAULT NULL,
  `food_name` int(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_totals`
--

INSERT INTO `user_totals` (`id_user`, `total_calories`, `total_carbs`, `total_protein`, `total_fat`, `food_name`, `id`) VALUES
(38, 968.00, 12.00, 120.00, 40.00, 3, 78),
(38, 610.00, 15.00, 70.00, 30.00, 1, 79),
(38, 368.00, 12.00, 40.00, 20.00, 2, 80),
(38, 1946.00, 39.00, 230.00, 90.00, 4, 82),
(37, 1128.00, 0.00, 130.00, 55.00, 3, 83),
(37, 692.00, 3.00, 90.00, 25.00, 1, 84),
(37, 184.00, 6.00, 20.00, 10.00, 2, 85),
(37, 2004.00, 36.00, 240.00, 90.00, 4, 86),
(35, 1493.00, 0.00, 190.00, 57.00, 3, 87),
(35, 2430.00, 45.00, 290.00, 110.00, 1, 88),
(35, 1360.00, 15.00, 170.00, 55.00, 2, 89),
(35, 5283.00, 72.00, 650.00, 222.00, 4, 90),
(32, 5486.60, 0.00, 679.30, 227.00, 3, 91),
(32, 4850.00, 75.00, 590.00, 210.00, 1, 92),
(32, 2919.00, 421.00, 720.00, 497.00, 2, 93),
(32, 13255.60, 565.15, 1989.30, 934.00, 4, 94),
(41, 518.00, 0.00, 60.00, 25.00, 3, 95),
(41, 92.00, 3.00, 10.00, 5.00, 1, 96),
(41, 300.00, 0.00, 40.00, 10.00, 2, 97),
(41, 910.00, 15.00, 110.00, 40.00, 4, 98),
(43, 842.00, 0.00, 110.00, 30.00, 3, 99),
(43, 92.00, 3.00, 10.00, 5.00, 1, 100),
(43, 150.00, 0.00, 20.00, 5.00, 2, 101),
(43, 1084.00, 6.00, 140.00, 40.00, 4, 102),
(46, 0.00, 0.00, 0.00, 0.00, 3, 103),
(46, 480.24, 15.66, 52.20, 26.00, 1, 104),
(46, 0.00, 0.00, 0.00, 0.00, 2, 105),
(46, 480.24, 15.66, 52.20, 26.00, 4, 106),
(48, 0.00, 0.00, 0.00, 0.00, 3, 107),
(48, 784.00, 0.00, 824.00, 10.00, 1, 108),
(48, 0.00, 0.00, 0.00, 0.00, 2, 109),
(48, 784.00, 0.00, 824.00, 10.00, 4, 110),
(49, 736.00, 0.00, 88.00, 40.00, 3, 111),
(49, 978.00, 185.00, 300.00, 51.00, 1, 112),
(49, 600.00, 20.00, 804.00, 24.00, 2, 113),
(49, 2314.00, 365.00, 1192.00, 115.00, 4, 114);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id_src` int(11) NOT NULL,
  `video_path` varchar(255) NOT NULL,
  `video_name` varchar(255) NOT NULL,
  `id_muscle` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id_src`, `video_path`, `video_name`, `id_muscle`) VALUES
(3, 'videos/azizaima.mp4', 'azizaima.mp4', 4),
(7, 'videos/male-Barbell-barbell-squat-front.mp4', 'male-Barbell-barbell-squat-front.mp4', 9),
(11, 'videos/aaa.mp4', 'aaa.mp4', 9);

-- --------------------------------------------------------

--
-- Table structure for table `videos_user`
--

CREATE TABLE `videos_user` (
  `id_user` int(11) NOT NULL,
  `Id_src` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos_user`
--

INSERT INTO `videos_user` (`id_user`, `Id_src`) VALUES
(48, 2),
(49, 1),
(49, 2),
(49, 3),
(49, 5),
(49, 7),
(49, 9),
(49, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`idfood`);

--
-- Indexes for table `fooduser`
--
ALTER TABLE `fooduser`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `musscle`
--
ALTER TABLE `musscle`
  ADD PRIMARY KEY (`id_muscle`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_totals`
--
ALTER TABLE `user_totals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id_src`),
  ADD KEY `id_muscle` (`id_muscle`);

--
-- Indexes for table `videos_user`
--
ALTER TABLE `videos_user`
  ADD PRIMARY KEY (`id_user`,`Id_src`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `idfood` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fooduser`
--
ALTER TABLE `fooduser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user_totals`
--
ALTER TABLE `user_totals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id_src` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`id_muscle`) REFERENCES `musscle` (`id_muscle`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
