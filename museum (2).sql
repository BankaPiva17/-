-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 24 2024 г., 20:53
-- Версия сервера: 5.5.62
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `museum`
--

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `Id` int(11) NOT NULL,
  `museum_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` date NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `event_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`Id`, `museum_id`, `name`, `description`, `event_date`, `price`, `event_time`) VALUES
(1, 1, 'Экскурсия', 'Описание экскурсии в Археопарке', '2024-06-06', '1100', '11:00:00'),
(2, 2, 'Экскурсия', 'Описание экскурсии в Тобольском музее', '2024-06-06', '1100', NULL),
(3, 3, 'Экскурсия', 'Описание экскурсии в Музее природы и человека', '2024-06-06', '1100', NULL),
(4, 4, 'Мастеркласс \"Создай свой меч\"', 'Описание мастеркласса в Музее кузнечного мастерства', '2024-06-16', '1100', NULL),
(5, 5, 'Мастеркласс \"Нарисуй свою картину\"', 'Описание мастеркласса в Музее И. Я. Словцова', '2024-06-17', '1100', NULL),
(6, 6, 'Лекция по истории Колокольниковых', 'Описание лекции в Усадьбе Колокольниковых', '2024-06-20', '1100', NULL),
(7, 1, 'Выставка древних артефактов', 'Описание выставки древних артефактов', '2024-06-20', '500', '10:00:00'),
(8, 2, 'Мастер-класс по живописи', 'Описание мастер-класса по живописи', '2024-06-21', '700', '14:00:00'),
(9, 1, 'Историческая лекция', 'Описание исторической лекции', '2024-06-22', '300', '16:30:00'),
(10, 3, 'Музыкальный концерт', 'Описание музыкального концерта', '2024-06-23', '1000', '18:00:00'),
(11, 7, 'Мероприятие акое то ', 'находится там то', '2024-06-13', '0', NULL),
(12, 7, 'Выставка Картин', 'Находится в музее....', '2024-06-12', '1222', '12:45:00');

-- --------------------------------------------------------

--
-- Структура таблицы `exhibits`
--

CREATE TABLE `exhibits` (
  `id` int(11) NOT NULL,
  `museum_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `exhibits`
--

INSERT INTO `exhibits` (`id`, `museum_id`, `name`, `description`, `image_url`) VALUES
(1, 1, 'Красивая Дама', 'Находится в музее \"Музей И. Я. Словцова\"', 'img/pic1.jpg'),
(2, 1, 'Последний Букет', 'Находится в музее \"Музей И. Я. Словцова\"', 'img/pic2.jpg'),
(3, 1, 'Агония', 'Находится в музее \"Музей И. Я. Словцова\"', 'img/pic3.jpg'),
(4, 1, 'Горы Абхазии', 'Находится в музее \"Музей И. Я. Словцова\"', 'img/pic4.jpg'),
(5, 1, 'Грешник', 'Находится в музее \"Музей И. Я. Словцова\"', 'img/pic5.jpg'),
(6, 1, 'Ребята Веселятся', 'Находится в музее \"Музей И. Я. Словцова\"', 'img/pic6.jpg'),
(9, 1, '12323', '123123', 'img/pic/1.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `museums`
--

CREATE TABLE `museums` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `museums`
--

INSERT INTO `museums` (`id`, `name`, `address`, `description`, `image_url`) VALUES
(1, 'Археопарк', 'ул. Объездная, 29, Ханты-Мансийск 628011 Россия', '8-800-555-35-35', 'img/pic/1.jpg'),
(2, 'Тобольский историко-архитектурный музей заповедник', 'Красная площадь, д. 1, стр. 4, Тобольск 626152 Россия', '8-800-555-35-35', 'img/pic/2.jpg'),
(3, 'Музей природы и человека', 'ул. Мира, д.11, Ханты-Мансийск 628011 Россия', '8-800-555-35-35', 'img/pic/3.jpg'),
(4, 'Музей кузнечного мастерства в Тюмени', 'Проезд Воронинские горки, 182 ст.2 , Тюмень 625001 Россия', '8-800-555-35-35', 'img/pic/4.jpg'),
(5, 'Усадьба Колокольниковых', 'ул. Республики, 18 и ул. Республики, 20 Тюмень 625003 Россия', '8-800-555-35-35', 'img/pic/5.jpg'),
(6, 'Музей И. Я. Словцова', 'Советская улица, 63, Тюмень, 625000 Россия', '8-800-555-35-35', 'img/pic/6.jpg'),
(7, 'музей просто так', 'улица пушкина', 'нуууууууууууу', '312123');

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

CREATE TABLE `requests` (
  `Id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `requests`
--

INSERT INTO `requests` (`Id`, `user_id`, `event_id`, `request_date`) VALUES
(1, 2, 1, '2024-05-31 18:17:01'),
(2, 2, 2, '2024-05-31 18:17:14'),
(3, 2, 1, '2024-05-31 18:22:09'),
(4, 2, 1, '2024-05-31 18:38:11'),
(5, 3, 6, '2024-06-01 03:31:51'),
(6, 3, 5, '2024-06-01 03:31:57'),
(7, 3, 4, '2024-06-01 03:32:02'),
(8, 2, 6, '2024-06-13 16:18:49'),
(9, 2, 1, '2024-06-13 16:24:27'),
(10, 2, 9, '2024-06-13 16:34:19'),
(11, 2, 7, '2024-06-13 16:34:30'),
(12, 2, 1, '2024-06-13 16:55:01'),
(13, 3, 1, '2024-06-22 14:06:41'),
(14, 3, 10, '2024-06-24 15:47:50');

-- --------------------------------------------------------

--
-- Структура таблицы `sobit`
--

CREATE TABLE `sobit` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` datetime NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sobit`
--

INSERT INTO `sobit` (`id`, `name`, `location`, `event_date`, `description`, `image_url`) VALUES
(1, 'Мастеркласс \"Создай свой меч\"', 'Музей кузнечного мастерства в Тюмени', '2024-06-16 14:00:00', 'Мастеркласс по кузнечному мастерству', 'img/sobit-pic1.jpg'),
(2, 'Мастеркласс \"Нарисуй свою картину\"', 'Музей И. Я. Словцова', '2024-06-17 14:00:00', 'Мастеркласс по рисованию', 'img/sobit-pic2.jpg'),
(3, 'Лекция по истории Колокольниковых', 'Усадьба Колокольниковых', '2024-06-20 14:00:00', 'Лекция по истории', 'img/sobit-pic3.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `museum_id` int(11) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SecondName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `Name`, `SecondName`, `Email`, `Password`, `Role`) VALUES
(1, 'Admin', 'Admin', 'admin@ex.com', '123', 'admin'),
(2, 'Данина', 'Лапулька', 'myyyyyyyr@bk.ru', '123', 'user'),
(3, 'фыв', 'кен', 'Para17@gmail.com', '123', 'user'),
(4, 'йцуr', 'кен', 'Para178@gmail.com', '123', 'user'),
(5, 'admin2', 'second', 'admin2@example.com', '111', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `museum_id` (`museum_id`);

--
-- Индексы таблицы `exhibits`
--
ALTER TABLE `exhibits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `museum_id` (`museum_id`);

--
-- Индексы таблицы `museums`
--
ALTER TABLE `museums`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `sobit`
--
ALTER TABLE `sobit`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `museum_id` (`museum_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `exhibits`
--
ALTER TABLE `exhibits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `museums`
--
ALTER TABLE `museums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `requests`
--
ALTER TABLE `requests`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `sobit`
--
ALTER TABLE `sobit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`museum_id`) REFERENCES `museums` (`id`);

--
-- Ограничения внешнего ключа таблицы `exhibits`
--
ALTER TABLE `exhibits`
  ADD CONSTRAINT `exhibits_ibfk_1` FOREIGN KEY (`museum_id`) REFERENCES `museums` (`id`);

--
-- Ограничения внешнего ключа таблицы `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`museum_id`) REFERENCES `museums` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
