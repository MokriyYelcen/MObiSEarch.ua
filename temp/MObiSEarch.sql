-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 22 2018 г., 19:41
-- Версия сервера: 5.6.37
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `MObiSEarch`
--

-- --------------------------------------------------------

--
-- Структура таблицы `manufecturers`
--

CREATE TABLE `manufecturers` (
  `id_manufacturer` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `manufecturers`
--

INSERT INTO `manufecturers` (`id_manufacturer`, `name`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'HTC'),
(4, 'Huawei'),
(5, 'Xiaomi'),
(6, 'Meizu'),
(7, 'Nokia');

-- --------------------------------------------------------

--
-- Структура таблицы `mobile_phones`
--

CREATE TABLE `mobile_phones` (
  `id_phone` int(11) NOT NULL,
  `id_manufacturer` int(11) NOT NULL,
  `id_OS` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `memory` int(11) DEFAULT NULL,
  `screen` int(11) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `sim_card` int(10) DEFAULT NULL,
  `img` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `mobile_phones`
--

INSERT INTO `mobile_phones` (`id_phone`, `id_manufacturer`, `id_OS`, `price`, `memory`, `screen`, `model`, `sim_card`, `img`) VALUES
(1, 1, 2, 650, 64, 5, 'IPHONE XS', 1, NULL),
(2, 1, 2, 690, 120, 5, 'IPHONE XS', 1, NULL),
(3, 1, 2, 750, 240, 5, 'IPHONE XS', 1, NULL),
(5, 2, 1, 540, 32, 6, 'SAMSUNG S8', 2, NULL),
(7, 6, 3, 169, 16, 5, 'MEIZU M5', 2, NULL),
(8, 4, 1, 229, 32, 5, 'XIAOMI S2', 2, NULL),
(9, 1, 2, 580, 240, 5, 'IPHONE X', 1, NULL),
(10, 1, 2, 520, 64, 5, 'IPHONE X', 1, NULL),
(11, 1, 2, 550, 120, 5, 'IPHONE X', 1, NULL),
(12, 2, 1, 342, 32, 5, 'SAMSUNG S9', 2, NULL),
(13, 2, 1, 360, 64, 5, 'SAMSUNG S9', 2, NULL),
(14, 2, 1, 275, 64, 6, 'SAMSUNG GALAXY NOTE 9', 2, NULL),
(15, 6, 1, 165, 16, 5, 'MEIZU M5 NOTE', 2, NULL),
(16, 6, 1, 175, 32, 5, 'MEIZU M5 NOTE', 2, NULL),
(17, 1, 2, 315, 32, 5, 'IPHONE 6S', 1, NULL),
(18, 1, 2, 325, 64, 5, 'IPHONE 6S', 1, NULL),
(19, 1, 2, 340, 120, 5, 'IPHONE 6S', 1, NULL),
(20, 1, 2, 409, 120, 5, 'IPHONE 7', 1, NULL),
(21, 1, 2, 439, 240, 5, 'IPHONE 7', 1, NULL),
(22, 2, 1, 560, 64, 6, 'SAMSUNG S8', 2, NULL),
(23, 2, 1, 590, 120, 6, 'SAMSUNG S8', 2, NULL),
(24, 2, 1, 640, 240, 6, 'SAMSUNG S8', 2, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `OS`
--

CREATE TABLE `OS` (
  `id_OS` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `OS`
--

INSERT INTO `OS` (`id_OS`, `name`) VALUES
(1, 'Android '),
(2, 'IOS'),
(3, 'Flyme');

-- --------------------------------------------------------

--
-- Структура таблицы `usertbl`
--

CREATE TABLE `usertbl` (
  `id` int(11) NOT NULL,
  `full_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `usertbl`
--

INSERT INTO `usertbl` (`id`, `full_name`, `email`, `username`, `password`) VALUES
(1, 'user1', 'user1@mail.com', 'king_bars', '111'),
(2, 'Данил Стрельченя', 'Strelyanstr@ebail.com', 'strela228', '3333'),
(3, 'user2', 'user2@ebail.com', 'user2', 'user2'),
(4, 'assdad', 'assdad@dfdf.com', 'assdad', 'assdad'),
(5, 'danya baranichenko', 'popgaus@gmail.com', 'danya baranichenko', '0000'),
(6, '', '', 'M_Krays', '777'),
(7, '', '', 'user3', 'user3'),
(8, '', '', 'user4', 'user4'),
(9, '', '', 'user7', 'user7'),
(10, '', '', 'dady3', 'dady3'),
(11, '', '', 'asdf', '123'),
(12, '', '', 'hgh', 'hgh'),
(13, '', '', 'херсгоры', 'херсгоры'),
(14, '', '', '12345', '12345'),
(15, '', '', 'user10', 'user10'),
(16, '', '', 'uwer4', 'uwer4'),
(17, '', '', 'earll', 'Tel6180474'),
(18, '', '', 'daytime', 'min'),
(19, '', '', 'perez228', '123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `manufecturers`
--
ALTER TABLE `manufecturers`
  ADD PRIMARY KEY (`id_manufacturer`);

--
-- Индексы таблицы `mobile_phones`
--
ALTER TABLE `mobile_phones`
  ADD PRIMARY KEY (`id_phone`);

--
-- Индексы таблицы `OS`
--
ALTER TABLE `OS`
  ADD PRIMARY KEY (`id_OS`);

--
-- Индексы таблицы `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `manufecturers`
--
ALTER TABLE `manufecturers`
  MODIFY `id_manufacturer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `mobile_phones`
--
ALTER TABLE `mobile_phones`
  MODIFY `id_phone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT для таблицы `OS`
--
ALTER TABLE `OS`
  MODIFY `id_OS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
