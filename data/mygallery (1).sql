-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 05 2019 г., 00:46
-- Версия сервера: 5.7.25
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mygallery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_session` text NOT NULL,
  `id_goods` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `id_session`, `id_goods`) VALUES
(4, '5', '2'),
(5, '5', '1'),
(7, 'm384el77isb6cnp8c08l7ki45qol6fen', '2'),
(8, 'm384el77isb6cnp8c08l7ki45qol6fen', '2'),
(10, '0fq27vt74fqik4c1f76t7m37vt4bom14', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Спорт'),
(2, 'Политика');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `price`, `description`, `picture`) VALUES
(1, 'Товар1', 10, 'Супер товар', '01.jpg'),
(2, 'Товар2', 10.3, 'Супер товар', '02.jpg'),
(3, 'Товар3', 9.4, 'Супер товар', '03.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `prev` text NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `category`, `prev`, `text`) VALUES
(1, 2, 'В штабе Зеленского не признают референдум в Крыму', 'КИЕВ, 15 апр — РИА Новости. Пресс-служба кандидата в президенты Украины Владимира Зеленского заявила, что в его штабе не признают референдум о воссоединении Крыма с Россией.\r\n\"Так называемый \"референдум\" не может считаться актом, свидетельствующим о свободном волеизъявлении жителей Крыма\", — говорится в заявлении, которое имеется в распоряжении РИА Новости.'),
(2, 2, 'Путин подписал закон о запрете размещения хостелов в жилых домах', 'МОСКВА, 15 апр - РИА Новости. Владимир Путин подписал закон о запрете размещения хостелов в многоквартирных домах с первого октября 2019 года, соответствующий документ опубликован на официальном портале правовой информации.\r\nЗакон запрещает использовать жилые помещения в качестве гостиницы или другого средства временного размещения. Предусматривается, что оказывать гостиничные услуги можно лишь после перевода жилого помещения в нежилое и оснащения его оборудованием надлежащего качества:');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `phone` text NOT NULL,
  `id_session` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `phone`, `id_session`) VALUES
(1, '12345678', '0fq27vt74fqik4c1f76t7m37vt4bom14'),
(2, '12345678', '0fq27vt74fqik4c1f76t7m37vt4bom14');

-- --------------------------------------------------------

--
-- Структура таблицы `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `path` varchar(11) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pictures`
--

INSERT INTO `pictures` (`id`, `path`, `views`) VALUES
(1, '01.jpg', 4),
(2, '02.jpg', 8),
(4, '03.jpg', 1),
(5, '04.jpg', 1),
(6, '05.jpg', 3),
(7, '06.jpg', 1),
(8, '07.jpg', 2),
(9, '08.jpg', 1),
(10, '09.jpg', 1),
(11, '10.jpg', 1),
(12, '11.jpg', 1),
(13, '12.jpg', 2),
(14, '13.jpg', 1),
(15, '14.jpg', 1),
(16, '15.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_feedback`
--

CREATE TABLE `product_feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_feedback`
--

INSERT INTO `product_feedback` (`id`, `name`, `text`, `product_id`) VALUES
(9, 'Михаил', '2', 2),
(10, 'Михаил', '3', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `hash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`) VALUES
(1, 'admin', '$2y$10$GAh95KWqFf1Fw4YyH/BCnuODYbJ1Mln78vDuOIwj7WQvChhR8QcX.', '8623857935ccdb7a06bf307.55315600'),
(4, 'admin2', '$2y$10$0j/k427NnbfdaoWo4QMisuJU9oUeY9eWcCRsivY3/TG07cIQR0muK', '$2y$10$0j/k427NnbfdaoWo4QMisuJU9oUeY9eWcCRsivY3/TG07cIQR0muK'),
(5, 'admin3', '$2y$10$5SO75gqFXXEKi588YhiBOOP/tlV.MO2AFlNni9uWWg/dD6NEiSL3C', '$2y$10$5SO75gqFXXEKi588YhiBOOP/tlV.MO2AFlNni9uWWg/dD6NEiSL3C');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_feedback`
--
ALTER TABLE `product_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `product_feedback`
--
ALTER TABLE `product_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
