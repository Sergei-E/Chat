-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 22 2022 г., 15:47
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `chat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE `author` (
  `ID` int NOT NULL,
  `IDUser` int NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `ProwPassword` varchar(100) NOT NULL,
  `Telefon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `litschat`
--

CREATE TABLE `litschat` (
  `ID` int NOT NULL,
  `ChatName` varchar(100) NOT NULL,
  `IDsozdat` int NOT NULL,
  `IDpoluh` int NOT NULL,
  `DataSozdan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `ID` int NOT NULL,
  `IDChat` int NOT NULL,
  `Message` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `IDOtprav` int NOT NULL,
  `IDPoluch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `IDUser` int NOT NULL,
  `FIO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDUser` (`IDUser`),
  ADD KEY `IDUser_2` (`IDUser`);

--
-- Индексы таблицы `litschat`
--
ALTER TABLE `litschat`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDsozdat` (`IDsozdat`,`IDpoluh`),
  ADD KEY `IDpoluh` (`IDpoluh`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDOtprav` (`IDOtprav`,`IDPoluch`),
  ADD KEY `IDPoluch` (`IDPoluch`),
  ADD KEY `IDChat` (`IDChat`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IDUser`),
  ADD KEY `IDUser` (`IDUser`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `litschat`
--
ALTER TABLE `litschat`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1024;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3190;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `IDUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `author_ibfk_1` FOREIGN KEY (`IDUser`) REFERENCES `user` (`IDUser`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `litschat`
--
ALTER TABLE `litschat`
  ADD CONSTRAINT `litschat_ibfk_1` FOREIGN KEY (`IDsozdat`) REFERENCES `user` (`IDUser`) ON UPDATE CASCADE,
  ADD CONSTRAINT `litschat_ibfk_2` FOREIGN KEY (`IDpoluh`) REFERENCES `user` (`IDUser`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`IDOtprav`) REFERENCES `user` (`IDUser`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`IDPoluch`) REFERENCES `user` (`IDUser`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_3` FOREIGN KEY (`IDChat`) REFERENCES `litschat` (`ID`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
