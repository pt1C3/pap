-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Maio-2022 às 19:14
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `letsgame`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chatmessage`
--

CREATE TABLE `chatmessage` (
  `id` int(11) NOT NULL,
  `to_userID` int(11) NOT NULL,
  `from_userID` int(11) NOT NULL,
  `message` varchar(300) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `chatmessage`
--

INSERT INTO `chatmessage` (`id`, `to_userID`, `from_userID`, `message`, `time`) VALUES
(13, 26, 4, '123', '2022-04-15 14:27:20'),
(14, 26, 4, '123', '2022-04-15 14:27:21'),
(15, 26, 4, 'oi', '2022-04-15 14:27:22'),
(16, 26, 4, '123', '2022-04-15 14:28:15'),
(17, 26, 4, '123', '2022-04-15 14:28:19'),
(18, 26, 4, '123', '2022-04-15 14:29:29'),
(19, 26, 4, '321', '2022-04-15 14:30:07'),
(20, 26, 4, 'oi', '2022-04-15 14:30:24'),
(21, 26, 4, '123', '2022-04-15 14:31:44'),
(22, 26, 4, '123', '2022-04-15 14:32:24'),
(23, 26, 4, '123', '2022-04-15 14:34:32'),
(24, 4, 26, '123', '2022-04-15 14:35:06'),
(25, 4, 26, '123', '2022-04-15 15:23:49'),
(26, 4, 26, '', '2022-04-15 15:24:05'),
(27, 4, 26, 'ola rafael', '2022-04-15 15:29:52'),
(28, 4, 26, 'ola rafael 3', '2022-04-15 15:30:22'),
(29, 4, 26, 'ola rafael 3', '2022-04-15 15:31:11'),
(30, 4, 26, '123', '2022-04-15 15:34:01'),
(31, 4, 26, '123', '2022-04-15 15:38:54'),
(32, 4, 26, 'funcionante?', '2022-04-15 15:43:22'),
(33, 4, 26, '123', '2022-04-15 16:11:20'),
(34, 4, 26, '123', '2022-04-15 16:12:42'),
(35, 4, 26, '123', '2022-04-15 16:14:00'),
(36, 4, 26, '123', '2022-04-15 16:14:05'),
(37, 4, 26, '123', '2022-04-15 16:14:25'),
(38, 4, 26, '312', '2022-04-15 16:15:12'),
(39, 4, 26, '321', '2022-04-15 16:15:45'),
(40, 4, 26, 'funciona?', '2022-04-15 16:17:13'),
(41, 4, 26, '321', '2022-04-15 16:17:40'),
(42, 4, 26, '32', '2022-04-15 16:17:52'),
(43, 4, 26, '123', '2022-04-15 16:17:59'),
(44, 4, 26, '321', '2022-04-15 16:18:10'),
(45, 4, 26, '321', '2022-04-15 16:19:33'),
(46, 4, 26, '321', '2022-04-15 16:19:45'),
(47, 4, 26, '321', '2022-04-15 16:20:11'),
(48, 4, 26, '321', '2022-04-15 16:20:13'),
(49, 4, 26, '123', '2022-04-15 16:20:15'),
(50, 4, 26, '32', '2022-04-15 16:20:21'),
(51, 4, 26, '321', '2022-04-15 16:20:31'),
(52, 4, 26, '123', '2022-04-15 16:20:41'),
(53, 4, 26, '123', '2022-04-15 16:20:45'),
(54, 4, 26, '321', '2022-04-15 16:20:56'),
(55, 4, 26, '123', '2022-04-15 16:20:59'),
(56, 4, 26, '123', '2022-04-15 16:22:24'),
(57, 4, 26, '3213123', '2022-04-15 16:22:26'),
(58, 4, 26, '321', '2022-04-15 16:22:58'),
(59, 4, 26, '321', '2022-04-15 16:25:56'),
(60, 4, 26, '321', '2022-04-15 16:33:53'),
(61, 26, 4, 'ola tudo bem', '2022-04-15 16:54:36'),
(62, 4, 26, 'sim e contigo', '2022-04-15 16:55:06'),
(63, 26, 4, 'as notificações estão a funcionar?', '2022-04-15 17:37:51'),
(64, 26, 4, 'ou não?\n', '2022-04-15 17:39:11'),
(65, 4, 26, 'por acaso sim só falta a notificação atualizar na navbar :)', '2022-04-15 17:39:41'),
(66, 4, 26, 'entao?', '2022-04-15 17:40:39'),
(67, 26, 4, 'ola\n', '2022-04-15 17:41:04'),
(68, 4, 26, 'OI', '2022-04-15 17:48:16'),
(69, 26, 4, 'OLA\n', '2022-04-15 17:48:25'),
(70, 26, 4, 'ola\n', '2022-04-15 21:22:26'),
(71, 26, 4, '123', '2022-04-15 21:22:55'),
(72, 26, 4, '123', '2022-04-15 21:27:58'),
(73, 26, 4, '123', '2022-04-15 21:28:45'),
(74, 4, 26, '123', '2022-04-15 21:33:38'),
(75, 26, 4, 'ola, tudo bem?', '2022-04-15 21:34:04'),
(76, 26, 4, '123', '2022-04-15 21:36:12'),
(77, 26, 4, 'toma la uma notf\n', '2022-04-15 22:09:43'),
(78, 26, 4, 'mais uma\n', '2022-04-15 22:10:10'),
(79, 26, 4, '123', '2022-04-15 22:11:17'),
(80, 26, 5, 'ola colega', '2022-04-15 22:32:38'),
(81, 26, 5, '123', '2022-04-15 22:41:43'),
(82, 4, 5, 'oi', '2022-04-15 22:42:00'),
(83, 4, 5, '123', '2022-04-15 23:04:47'),
(84, 4, 5, '', '2022-04-15 23:04:48'),
(85, 4, 5, '123', '2022-04-15 23:05:34'),
(86, 4, 5, '123', '2022-04-15 23:05:35'),
(87, 4, 5, 'alou', '2022-04-15 23:07:19'),
(88, 5, 4, 'qaaaaaaaaaaaaaaaaaaaaaaaqaaaaaaaaaaaaaaaaaaaaaaaqaaaaaaaaaaaaaaaaaaaaaaaqaaaaaaaaaaaaaaaaaaaaaaaqaaaaaaaaaaaaaaaaaaaaaaaqaaaaaaaaaaaaaaaaaaaaaaaqaaaaaaaaaaaaaaaaaaaaaaaqaaaaaaaaaaaaaaaaaaaaaaaqaaaaaaaaaaaaaaaaaaaaaaaqaaaaaaaaaaaaaaaaaaaaaaaqaaaaaaaaaaaaaaaaaaaaaaaqaaaaaaaaaaaaaaaaaaaaaaaqaaaaaaaaaaa', '2022-05-04 17:46:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `authorID` int(11) DEFAULT NULL,
  `profileID` int(11) DEFAULT NULL,
  `commentText` mediumtext DEFAULT NULL,
  `shareDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `comment`
--

INSERT INTO `comment` (`id`, `authorID`, `profileID`, `commentText`, `shareDate`) VALUES
(27, 5, 4, 'bom caro colega', '2022-04-06 08:51:32'),
(28, 5, 4, '123', '2022-04-06 09:01:32'),
(29, 5, 5, '123', '2022-04-06 09:01:39'),
(30, 4, 5, '⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡿⠿⠿⠿⠿⢿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿\r\n⣿⣿⣿⣿⣿⣿⣿⣿⠟⠋⠁⠀⠀⠀⠀⠀⠀⠀⠀⠉⠻⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿\r\n⣿⣿⣿⣿⣿⣿⣿⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢺⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿\r\n⣿⣿⣿⣿⣿⣿⣿⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠆⠜⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿\r\n⣿⣿⣿⣿⠿⠿⠛⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠉⠻⣿⣿⣿⣿⣿\r\n⣿⣿⡏⠁⠀⠀⠀⠀⠀⣀⣠⣤⣤⣶⣶⣶⣶⣶⣦⣤⡄⠀⠀⠀⠀⢀⣴⣿⣿⣿⣿⣿\r\n⣿⣿⣷⣄⠀⠀⠀⢠⣾⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⢿⡧⠇⢀⣤⣶⣿⣿⣿⣿⣿⣿⣿\r\n⣿⣿⣿⣿⣿⣿⣾⣮⣭⣿⡻⣽⣒⠀⣤⣜⣭⠐⢐⣒⠢⢰⢸⣿⣿⣿⣿⣿⣿⣿⣿⣿\r\n⣿⣿⣿⣿⣿⣿⣿⣏⣿⣿⣿⣿⣿⣿⡟⣾⣿⠂⢈⢿⣷⣞⣸⣿⣿⣿⣿⣿⣿⣿⣿⣿\r\n⣿⣿⣿⣿⣿⣿⣿⣿⣽⣿⣿⣷⣶⣾⡿⠿⣿⠗⠈⢻⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿\r\n⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡿⠻⠋⠉⠑⠀⠀⢘⢻⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿\r\n⣿⣿⣿⣿⣿⣿⣿⡿⠟⢹⣿⣿⡇⢀⣶⣶⠴⠶⠀⠀⢽⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿\r\n⣿⣿⣿⣿⣿⣿⡿⠀⠀⢸⣿⣿⠀⠀⠣⠀⠀⠀⠀⠀⡟⢿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿\r\n⣿⣿⣿⡿⠟⠋⠀⠀⠀⠀⠹⣿⣧⣀⠀⠀⠀⠀⡀⣴⠁⢘⡙⢿⣿⣿⣿⣿⣿⣿⣿⣿\r\n⠉⠉⠁⠀⠀⠀⠀⠀⠀⠀⠀⠈⠙⢿⠗⠂⠄⠀⣴⡟⠀⠀⡃⠀⠉⠉⠟⡿⣿⣿⣿⣿\r\n⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢷⠾⠛⠂⢹⠀⠀⠀⢡⠀⠀⠀⠀⠀⠙⠛⠿⢿', '2022-04-08 09:48:39'),
(31, 4, 9, 'oi\r\n', '2022-04-09 13:15:29'),
(32, 4, 4, '', '2022-04-09 13:47:38'),
(33, 4, 4, '231\r\n123', '2022-04-09 13:50:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `follows`
--

CREATE TABLE `follows` (
  `ID` int(11) NOT NULL,
  `followedID` int(11) DEFAULT NULL,
  `followerID` int(11) DEFAULT NULL,
  `followDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `follows`
--

INSERT INTO `follows` (`ID`, `followedID`, `followerID`, `followDate`) VALUES
(20, 3, 4, '2022-03-23 17:27:01'),
(21, 3, 5, '2022-03-23 17:31:54'),
(27, 5, 4, '2022-03-28 17:22:59'),
(28, 5, 28, '2022-03-28 22:38:57'),
(29, 5, 9, '2022-04-06 09:18:18'),
(30, 4, 9, '2022-04-09 14:08:37'),
(31, 4, 26, '2022-04-09 14:10:48'),
(43, 26, 4, '2022-04-15 22:04:41'),
(44, 26, 5, '2022-04-15 22:14:07'),
(48, 4, 5, '2022-04-18 09:19:18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `games`
--

CREATE TABLE `games` (
  `gameID` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `rating` decimal(4,2) DEFAULT 0.00,
  `link` varchar(100) DEFAULT NULL,
  `thumbnail` varchar(300) DEFAULT 'https://www.pcspecialist.pt/images/landing/pcs/gaming-pc/bundle.jpg',
  `trailer` varchar(1000) NOT NULL,
  `genre` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `games`
--

INSERT INTO `games` (`gameID`, `title`, `rating`, `link`, `thumbnail`, `trailer`, `genre`) VALUES
(1, 'Apex Legends', '7.80', 'https://store.steampowered.com/app/1172470/Apex_Legends', './images/GameHeader/1200x630/1.jpg', '<iframe id=\"trailer\" src=\"https://www.youtube.com/embed/innmNewjkuk\" allowfullscreen></iframe>', 'Shooter'),
(2, 'Counter-Strike: Global Offensive', '8.20', 'https://store.steampowered.com/app/730/CounterStrike_Global_Offensive/', './images/GameHeader/1200x630/2.jpg', '<iframe id=\"trailer\" src=\"https://www.youtube.com/embed/edYCtaNueQY\" allowfullscreen></iframe>', 'Shooter'),
(3, 'League of Legends', '7.70', 'https://www.leagueoflegends.com', './images/GameHeader/1200x630/3.jpg', '<iframe id=\"trailer\" src=\"https://www.youtube.com/embed/mDYqT0_9VR4 allowfullscreen></iframe>', 'MOBA'),
(4, 'Minecraft', '8.40', 'https://www.minecraft.net/', './images/GameHeader/1200x630/4.jpg', '<iframe id=\"trailer\" src=\"https://www.youtube.com/embed/vdrn4ouZRvQ\" allowfullscreen></iframe>', 'Adventure');

-- --------------------------------------------------------

--
-- Estrutura da tabela `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `userLanguage` varchar(30) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `languages`
--

INSERT INTO `languages` (`id`, `userLanguage`, `userID`) VALUES
(1, 'English', 4),
(2, 'Portuguese', 4),
(3, 'English', 5),
(4, 'Russian', 5),
(5, 'Portuguese', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `likedgames`
--

CREATE TABLE `likedgames` (
  `ID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `gameID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `likedgames`
--

INSERT INTO `likedgames` (`ID`, `userID`, `gameID`) VALUES
(41, 4, 2),
(48, 4, 1),
(65, 5, 1),
(66, 5, 4),
(68, 4, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `otherUserID` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `viewed` tinyint(4) NOT NULL DEFAULT 0,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `notifications`
--

INSERT INTO `notifications` (`id`, `userID`, `otherUserID`, `type`, `viewed`, `time`) VALUES
(2, 26, 4, 'chat', 1, '2022-04-15 21:28:45'),
(3, 4, 26, 'chat', 1, '2022-04-15 21:33:38'),
(6, 26, 4, 'follow', 1, '2022-04-15 22:03:08'),
(8, 26, 4, 'chat', 1, '2022-04-15 22:09:43'),
(9, 26, 4, 'chat', 1, '2022-04-15 22:10:10'),
(10, 26, 4, 'chat', 1, '2022-04-15 22:11:17'),
(11, 26, 5, 'follow', 1, '2022-04-15 22:14:07'),
(12, 26, 5, 'chat', 1, '2022-04-15 22:32:38'),
(13, 26, 5, 'chat', 1, '2022-04-15 22:41:43'),
(14, 4, 5, 'chat', 1, '2022-04-15 22:42:00'),
(15, 4, 5, 'chat', 1, '2022-04-15 23:04:47'),
(16, 4, 5, 'chat', 1, '2022-04-15 23:04:48'),
(17, 4, 5, 'chat', 1, '2022-04-15 23:05:34'),
(18, 4, 5, 'chat', 1, '2022-04-15 23:05:35'),
(21, 4, 5, 'chat', 1, '2022-04-15 23:07:19'),
(23, 4, 5, 'follow', 1, '2022-04-18 09:19:18'),
(24, 5, 4, 'chat', 0, '2022-05-04 17:46:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `rating`
--

CREATE TABLE `rating` (
  `ID` int(11) NOT NULL,
  `ratedID` int(11) NOT NULL,
  `raterID` int(11) DEFAULT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `report`
--

CREATE TABLE `report` (
  `reportID` int(11) NOT NULL,
  `senderID` int(11) NOT NULL,
  `receiverID` int(11) NOT NULL,
  `type` varchar(80) DEFAULT NULL,
  `tempo` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `report`
--

INSERT INTO `report` (`reportID`, `senderID`, `receiverID`, `type`, `tempo`) VALUES
(1, 5, 4, 'Foi mau para mim :(', '2022-04-18 09:28:07'),
(2, 26, 4, 'Ninguém gosta de ti wi', '2022-04-18 09:39:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `lastActivity` datetime DEFAULT current_timestamp(),
  `email` varchar(80) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `sex` char(1) DEFAULT NULL,
  `steamprofile` varchar(100) DEFAULT 'Not Provided',
  `epicprofile` varchar(30) DEFAULT 'Not Provided',
  `uplay` varchar(30) DEFAULT 'Not Provided',
  `country` varchar(30) DEFAULT NULL,
  `image` varchar(300) DEFAULT 'https://digimedia.web.ua.pt/wp-content/uploads/2017/05/default-user-image.png',
  `biography` varchar(300) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `rating` decimal(4,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `isAdmin`, `lastActivity`, `email`, `name`, `birthdate`, `sex`, `steamprofile`, `epicprofile`, `uplay`, `country`, `image`, `biography`, `active`, `rating`) VALUES
(3, 'admin', 'admin', 1, '2022-04-19 09:09:30', '', NULL, NULL, NULL, 'Not Provided', 'Not Provided', 'Not Provided', NULL, 'https://digimedia.web.ua.pt/wp-content/uploads/2017/05/default-user-image.png', NULL, 1, '0.00'),
(4, 'rafael123', '123', 0, '2022-05-04 18:12:54', 'rafaelsilva1c3@gmail.com', 'Rafael', '2004-07-15', 'O', NULL, NULL, 'Not Provided', 'Portugal', '../../pap/images/utilizadores/4.png', 'biografia do rafinha v.4            ', 1, '0.00'),
(5, 'nuno321', '321', 0, '2022-04-18 09:19:12', 'costanuno219@gmail.com', 'Nuno Rei Delas', '2004-04-27', 'M', 'Not Provided', 'Not Provided', 'Not Provided', 'Portugal', '../../pap/images/utilizadores/5.jpg', 'Eu sou o nuno :)', 1, '0.00'),
(9, 'prodeleague', '123', 0, '2022-04-09 14:08:31', 'email@gmail.com', 'António', '2000-03-02', 'F', 'Not Provided', 'Not Provided', 'Not Provided', NULL, '../../pap/images/utilizadores/9.png', 'Im very good in League of Legends', 1, '0.00'),
(26, 'userimg', '123', 0, '2022-04-16 13:07:59', '123123214123r@gmail.com', '123', '2022-03-02', 'F', 'Not Provided', 'Not Provided', 'Not Provided', 'Azerbaijan', '../../pap/images/utilizadores/26.jpg', NULL, 1, '0.00'),
(28, 'uti2', '123', 0, '2022-04-08 10:50:53', 'uti2@hotmail.pegalaessa', 'Utilizante Very Bom', '2022-03-01', 'O', 'Not Provided', 'Not Provided', 'Not Provided', 'Afghanistan', '../../pap/images/utilizadores/28.png', 'Sou fixe', 1, '0.00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `chatmessage`
--
ALTER TABLE `chatmessage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `to_userID` (`to_userID`),
  ADD KEY `from_userID` (`from_userID`);

--
-- Índices para tabela `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authorID` (`authorID`),
  ADD KEY `profileID` (`profileID`);

--
-- Índices para tabela `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `followedID` (`followedID`),
  ADD KEY `followerID` (`followerID`);

--
-- Índices para tabela `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`gameID`);

--
-- Índices para tabela `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Índices para tabela `likedgames`
--
ALTER TABLE `likedgames`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `gameID` (`gameID`);

--
-- Índices para tabela `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`),
  ADD KEY `otherUserID` (`otherUserID`);

--
-- Índices para tabela `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ratedID` (`ratedID`),
  ADD KEY `raterID` (`raterID`);

--
-- Índices para tabela `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`reportID`),
  ADD KEY `senderID` (`senderID`),
  ADD KEY `receiverID` (`receiverID`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chatmessage`
--
ALTER TABLE `chatmessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de tabela `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `follows`
--
ALTER TABLE `follows`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `games`
--
ALTER TABLE `games`
  MODIFY `gameID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `likedgames`
--
ALTER TABLE `likedgames`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de tabela `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `rating`
--
ALTER TABLE `rating`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `report`
--
ALTER TABLE `report`
  MODIFY `reportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `chatmessage`
--
ALTER TABLE `chatmessage`
  ADD CONSTRAINT `chatmessage_ibfk_1` FOREIGN KEY (`to_userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `chatmessage_ibfk_2` FOREIGN KEY (`from_userID`) REFERENCES `user` (`userID`);

--
-- Limitadores para a tabela `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`authorID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`profileID`) REFERENCES `user` (`userID`);

--
-- Limitadores para a tabela `follows`
--
ALTER TABLE `follows`
  ADD CONSTRAINT `follows_ibfk_1` FOREIGN KEY (`followedID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `follows_ibfk_2` FOREIGN KEY (`followerID`) REFERENCES `user` (`userID`);

--
-- Limitadores para a tabela `languages`
--
ALTER TABLE `languages`
  ADD CONSTRAINT `ID` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `languages_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Limitadores para a tabela `likedgames`
--
ALTER TABLE `likedgames`
  ADD CONSTRAINT `likedgames_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `likedgames_ibfk_2` FOREIGN KEY (`gameID`) REFERENCES `games` (`gameID`);

--
-- Limitadores para a tabela `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`otherUserID`) REFERENCES `user` (`userID`);

--
-- Limitadores para a tabela `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`ratedID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`raterID`) REFERENCES `user` (`userID`);

--
-- Limitadores para a tabela `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`senderID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`receiverID`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
