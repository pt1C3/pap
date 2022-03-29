-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 29-Mar-2022 às 13:03
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.1

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
(1, 4, 5, '2022-03-25 09:51:15'),
(2, 5, 4, '2022-03-26 15:45:35'),
(4, 4, 8, '2022-03-28 22:50:04');

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
(138, 5, 4),
(141, 4, 3),
(142, 4, 4),
(143, 5, 1),
(144, 5, 3);

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
(3, 'admin', 'admin', 1, '2022-03-02 15:07:03', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://digimedia.web.ua.pt/wp-content/uploads/2017/05/default-user-image.png', NULL, 1, '1.00'),
(4, 'rafael123', '123', 0, '2022-03-26 15:44:55', 'rafael@gmail.com', 'Rafael', '2004-07-15', 'M', NULL, NULL, NULL, 'Portugal', 'https://digimedia.web.ua.pt/wp-content/uploads/2017/05/default-user-image.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut leo metus, tincidunt a aliquet at, dignissim sit amet felis. Sed tristique arcu vulputate erat sollicitudin, quis pellentesque eros ultrices. Nam porttitor porttitor ex, a malesuada mi suscipit id. Nulla mattis quam ac lacus laoreet, ut bla', 1, '1.00'),
(5, 'nuno321', '321', 0, '2022-03-28 14:25:47', 'nuno@gmail.com', 'Nuno Rei Delas', '2004-04-27', 'M', NULL, NULL, NULL, 'Portugal', 'https://yt3.ggpht.com/ytc/AKedOLTeRJqOQEYJ8jU2tFtwnFN8U878Lv5C3w2TezWB0A=s900-c-k-c0x00ffffff-no-rj', 'Eu sou o nuno :)', 1, '10.00'),
(7, 'fazatua', '123', 0, '2022-03-28 22:47:20', 'dasgfdf@gmail.com', 'FAZATUA', '2015-02-04', 'F', NULL, NULL, NULL, 'Mexico', '../../pap/images/utilizadores/6.png', 'FAZ A TUA BOA CRLH ;=)', 1, '0.00'),
(8, 'larita', 'lara', 0, '2022-03-28 22:49:25', 'laradg@gmail.com', 'Larita', '2005-07-27', 'F', NULL, NULL, NULL, 'Mexico', '../../pap/images/utilizadores/8.png', 'Eu sou a lara oi galera!', 1, '0.00');

--
-- Índices para tabelas despejadas
--

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
-- AUTO_INCREMENT de tabela `follows`
--
ALTER TABLE `follows`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

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
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

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
