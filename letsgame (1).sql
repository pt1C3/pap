-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Abr-2022 às 12:29
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

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
(30, 4, 5, '⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡿⠿⠿⠿⠿⢿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿\r\n⣿⣿⣿⣿⣿⣿⣿⣿⠟⠋⠁⠀⠀⠀⠀⠀⠀⠀⠀⠉⠻⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿\r\n⣿⣿⣿⣿⣿⣿⣿⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢺⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿\r\n⣿⣿⣿⣿⣿⣿⣿⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠆⠜⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿\r\n⣿⣿⣿⣿⠿⠿⠛⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠉⠻⣿⣿⣿⣿⣿\r\n⣿⣿⡏⠁⠀⠀⠀⠀⠀⣀⣠⣤⣤⣶⣶⣶⣶⣶⣦⣤⡄⠀⠀⠀⠀⢀⣴⣿⣿⣿⣿⣿\r\n⣿⣿⣷⣄⠀⠀⠀⢠⣾⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⢿⡧⠇⢀⣤⣶⣿⣿⣿⣿⣿⣿⣿\r\n⣿⣿⣿⣿⣿⣿⣾⣮⣭⣿⡻⣽⣒⠀⣤⣜⣭⠐⢐⣒⠢⢰⢸⣿⣿⣿⣿⣿⣿⣿⣿⣿\r\n⣿⣿⣿⣿⣿⣿⣿⣏⣿⣿⣿⣿⣿⣿⡟⣾⣿⠂⢈⢿⣷⣞⣸⣿⣿⣿⣿⣿⣿⣿⣿⣿\r\n⣿⣿⣿⣿⣿⣿⣿⣿⣽⣿⣿⣷⣶⣾⡿⠿⣿⠗⠈⢻⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿\r\n⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡿⠻⠋⠉⠑⠀⠀⢘⢻⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿\r\n⣿⣿⣿⣿⣿⣿⣿⡿⠟⢹⣿⣿⡇⢀⣶⣶⠴⠶⠀⠀⢽⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿\r\n⣿⣿⣿⣿⣿⣿⡿⠀⠀⢸⣿⣿⠀⠀⠣⠀⠀⠀⠀⠀⡟⢿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿\r\n⣿⣿⣿⡿⠟⠋⠀⠀⠀⠀⠹⣿⣧⣀⠀⠀⠀⠀⡀⣴⠁⢘⡙⢿⣿⣿⣿⣿⣿⣿⣿⣿\r\n⠉⠉⠁⠀⠀⠀⠀⠀⠀⠀⠀⠈⠙⢿⠗⠂⠄⠀⣴⡟⠀⠀⡃⠀⠉⠉⠟⡿⣿⣿⣿⣿\r\n⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢷⠾⠛⠂⢹⠀⠀⠀⢡⠀⠀⠀⠀⠀⠙⠛⠿⢿', '2022-04-08 09:48:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `follows`
--

CREATE TABLE `follows` (
  `ID` int(11) NOT NULL,
  `followedID` int(11) DEFAULT NULL,
  `followerID` int(11) DEFAULT NULL,
  `followDate` datetime DEFAULT current_timestamp(),
  `viewed` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `follows`
--

INSERT INTO `follows` (`ID`, `followedID`, `followerID`, `followDate`, `viewed`) VALUES
(20, 3, 4, '2022-03-23 17:27:01', b'0'),
(21, 3, 5, '2022-03-23 17:31:54', b'0'),
(24, 4, 5, '2022-03-23 18:05:36', b'1'),
(27, 5, 4, '2022-03-28 17:22:59', b'0'),
(28, 5, 28, '2022-03-28 22:38:57', b'0'),
(29, 5, 9, '2022-04-06 09:18:18', b'0');

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
  `genre` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `games`
--

INSERT INTO `games` (`gameID`, `title`, `rating`, `link`, `thumbnail`, `genre`) VALUES
(1, 'Apex Legends', '7.80', 'https://store.steampowered.com/app/1172470/Apex_Legends', './images/GameHeader/1200x630/1.jpg', 'Shooter'),
(2, 'Counter-Strike: Global Offensive', '8.20', 'https://store.steampowered.com/app/730/CounterStrike_Global_Offensive/', './images/GameHeader/1200x630/2.jpg', 'Shooter'),
(3, 'League of Legends', '7.70', 'https://www.leagueoflegends.com', './images/GameHeader/1200x630/3.jpg', 'MOBA'),
(4, 'Minecraft', '8.40', 'https://www.minecraft.net/', './images/GameHeader/1200x630/4.jpg', 'Adventure');

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
  `type` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `lastLogin` datetime DEFAULT current_timestamp(),
  `email` varchar(80) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `sex` char(1) DEFAULT NULL,
  `steamprofile` varchar(100) DEFAULT NULL,
  `epicprofile` varchar(30) DEFAULT NULL,
  `uplay` varchar(30) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `image` varchar(300) DEFAULT 'https://digimedia.web.ua.pt/wp-content/uploads/2017/05/default-user-image.png',
  `biography` varchar(300) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `rating` decimal(4,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `isAdmin`, `lastLogin`, `email`, `name`, `birthdate`, `sex`, `steamprofile`, `epicprofile`, `uplay`, `country`, `image`, `biography`, `active`, `rating`) VALUES
(3, 'admin', 'admin', 1, '2022-04-05 12:47:45', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://digimedia.web.ua.pt/wp-content/uploads/2017/05/default-user-image.png', NULL, 1, '0.00'),
(4, 'rafael123', '123', 0, '2022-04-08 10:57:12', 'rafael@gmail.com', 'Rafael', '2004-07-15', 'M', NULL, NULL, NULL, 'Portugal', 'https://digimedia.web.ua.pt/wp-content/uploads/2017/05/default-user-image.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut leo metus, tincidunt a aliquet at, dignissim sit amet felis. Sed tristique arcu vulputate erat sollicitudin, quis pellentesque eros ultrices. Nam porttitor porttitor ex, a malesuada mi suscipit id. Nulla mattis quam ac lacus laoreet, ut bla', 1, '0.00'),
(5, 'nuno321', '321', 0, '2022-04-08 10:51:15', 'nuno@gmail.com', 'Nuno Rei Delas', '2004-04-27', 'M', NULL, NULL, NULL, 'Portugal', '../../pap/images/utilizadores/5.jpg', 'Eu sou o nuno :)', 1, '0.00'),
(9, 'prodeleague', '123', 0, '2022-04-06 09:18:15', 'email@gmail.com', 'António', '2000-03-02', 'F', NULL, NULL, NULL, NULL, '../../pap/images/utilizadores/9.png', 'Im very good in League of Legends', 1, '0.00'),
(26, 'userimg', '123', 0, '2022-03-28 21:57:42', '123123214123r@gmail.com', '123', '2022-03-02', 'F', NULL, NULL, NULL, 'Azerbaijan', '../../pap/images/utilizadores/26.jpg', NULL, 1, '0.00'),
(28, 'uti2', '123', 0, '2022-04-08 10:50:53', 'uti2@hotmail.pegalaessa', 'Utilizante Very Bom', '2022-03-01', 'O', NULL, NULL, NULL, 'Afghanistan', '../../pap/images/utilizadores/28.png', 'Sou fixe', 1, '0.00');

--
-- Índices para tabelas despejadas
--

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
-- AUTO_INCREMENT de tabela `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `follows`
--
ALTER TABLE `follows`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
-- AUTO_INCREMENT de tabela `rating`
--
ALTER TABLE `rating`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `report`
--
ALTER TABLE `report`
  MODIFY `reportID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restrições para despejos de tabelas
--

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
