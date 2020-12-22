-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 20 2020 г., 13:18
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mybase`
--

-- --------------------------------------------------------

--
-- Структура таблицы `assessments`
--

CREATE TABLE `assessments` (
  `id` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `idstud` int(11) UNSIGNED NOT NULL,
  `idsub` int(11) NOT NULL,
  `assessments` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `assessments`
--

INSERT INTO `assessments` (`id`, `date`, `idstud`, `idsub`, `assessments`) VALUES
(46, '21.08.2020', 53, 1, 5),
(47, '22.08.2020', 53, 1, 5),
(48, '22.08.2020', 53, 3, 3),
(49, '21.08.2020', 53, 2, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `namecomandsinsql`
--

CREATE TABLE `namecomandsinsql` (
  `comand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `namecomandsinsql`
--

INSERT INTO `namecomandsinsql` (`comand`) VALUES
('SELECT'),
('DROP'),
('USE'),
('CREATE'),
('SHOW'),
('DESCRIBE'),
('DELETE'),
('ALTER'),
('UPDATE'),
('INSERT'),
('SET'),
('JOIN');

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `idstud` int(11) UNSIGNED NOT NULL,
  `surname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `class` varchar(3) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`idstud`, `surname`, `name`, `lastname`, `class`, `file`) VALUES
(53, 'Тестовый', 'Тест', 'Тестович', '11А', 'uploads/water.png');

-- --------------------------------------------------------

--
-- Структура таблицы `subject`
--

CREATE TABLE `subject` (
  `idsub` int(11) UNSIGNED NOT NULL,
  `subname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subject`
--

INSERT INTO `subject` (`idsub`, `subname`) VALUES
(1, 'Математика'),
(2, 'Русский язык'),
(3, 'История');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isadmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `isadmin`) VALUES
(69, 'r@mail.ru', '$2y$10$aIbJ3NPws7gt9kDM0Fua6uGwJtC52Lf1NRis1/LwXoBrbXghFJIXy', 0),
(70, 'rr@mail.ru', '$2y$10$ntXhXrjoBST6wc0hPEjhhuKkfepnNGmCThcteRktWGPUM1MBvYF6e', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `assessments`
--
ALTER TABLE `assessments`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `idstud` (`idstud`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD UNIQUE KEY `idstud` (`idstud`);

--
-- Индексы таблицы `subject`
--
ALTER TABLE `subject`
  ADD UNIQUE KEY `idsub` (`idsub`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `assessments`
--
ALTER TABLE `assessments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `idstud` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT для таблицы `subject`
--
ALTER TABLE `subject`
  MODIFY `idsub` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `assessments`
--
ALTER TABLE `assessments`
  ADD CONSTRAINT `assessments_ibfk_1` FOREIGN KEY (`idstud`) REFERENCES `students` (`idstud`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
