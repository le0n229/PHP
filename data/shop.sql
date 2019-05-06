-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 06 2019 г., 12:17
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
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `session` text CHARACTER SET utf32 NOT NULL,
  `good` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `session`, `good`) VALUES
(42, 'spb7hm9fe6rmf4cj33986rrkocfte0o7', 8),
(43, 'spb7hm9fe6rmf4cj33986rrkocfte0o7', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`) VALUES
(4, 'Олег', 'Сообщение'),
(18, 'Олег', 'Все хорошо');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback_goods`
--

CREATE TABLE `feedback_goods` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `feedback` text CHARACTER SET utf32 NOT NULL,
  `id_good` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback_goods`
--

INSERT INTO `feedback_goods` (`id`, `name`, `feedback`, `id_good`) VALUES
(3, 'Олег', 'Отзыв2', 2),
(5, 'Иван', 'УРА', 9),
(6, 'Иван', 'Вот это кораблик!', 9),
(7, 'Иван', 'А мне этот нравится3', 2),
(8, 'Олег2', 'КУКУК2', 1),
(9, 'Олег', 'Сообщение2', 9),
(10, '111', '222', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `idx` int(11) NOT NULL,
  `filename` text NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `name` text CHARACTER SET utf32 NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`idx`, `filename`, `likes`, `name`, `price`) VALUES
(1, '01.jpg', 98, 'Товар 1', 2),
(2, '02.jpg', 85, 'Товар 2', 3),
(3, '03.jpg', 9, 'Товар 3', 5),
(4, '04.jpg', 10, 'Товар 4', 4),
(5, '05.jpg', 8, 'Товар 5', 3),
(6, '06.jpg', 8, 'Товар 6', 5),
(7, '07.jpg', 9, 'Товар 7', 6),
(8, '08.jpg', 11, 'Товар 8', 5),
(9, '09.jpg', 143, 'Товар 9', 5),
(10, '10.jpg', 18, 'Товар 10', 11);

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
(1, 1, 'Вице-премьер Италии призвал бороться против антироссийских санкций', 'Глава движения Пять звезд, министр экономического развития, труда и социальной политики Италии Луиджи Ди Майо\r\n© AFP 2019 / Alberto Pizzolo\r\nМОСКВА, 10 фев — РИА Новости. Правительство Италии намерено добиться пересмотра антироссийских санкций, заявил вице-премьер и министр экономического развития страны Луиджи Ди Майо. Об этом сообщило информационное агентство ANSA.\r\nДи Майо подчеркнул, что санкционный режим в отношении Москвы наносит значительный ущерб итальянскому бизнесу. По его словам, если компании несут огромные потери из-за антироссийских ограничений, то санкционную политику надо пересмотреть.'),
(2, 1, 'В России оценили призыв посла США к Германии увеличить расходы на оборону', 'Покровский собор (храм Василия Блаженного) и площадь Васильевский спуск \r\n© РИА Новости / Григорий Сысоев\r\nМОСКВА, 10 фев — РИА Новости. В обеих палатах парламента отреагировали на заявление посла США в Германии Ричарда Греннела о том, что \"Россия стоит на пороге\".\r\nТаким образом американский дипломат \"аргументировал\" необходимость увеличить расходы Берлина на оборону НАТО с полутора процентов до двух к 2024 году.');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_session` text NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `date` datetime NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `id_session`, `name`, `phone`, `date`, `status`) VALUES
(6, '0fq27vt74fqik4c1f76t7m37vt4bom14', 'Михаил', '12345678', '2019-05-05 19:49:27', 'Подтверждён'),
(7, '0fq27vt74fqik4c1f76t7m37vt4bom14', 'Михаил', '12345678', '2019-05-05 19:51:53', 'Подтверждён'),
(8, 'v0pqatkert9l28ha90c7q51ns4730qd3', 'Михаил', '12345678', '2019-05-05 19:56:54', 'Ожидает подтверждения'),
(9, 'j8em9m5bh905mq73ltrhhugcdsvo755k', 'Михаил', '12345678', '2019-05-05 20:03:32', 'Ожидает подтверждения'),
(12, 'qpi89rg07elb3a06pdpsv2dohdfkq9tg', 'Михаил', '12345678', '2019-05-06 10:19:07', 'Ожидает подтверждения'),
(13, 'qpi89rg07elb3a06pdpsv2dohdfkq9tg', 'Михаил', '12345678', '2019-05-06 10:33:30', 'Ожидает подтверждения');

-- --------------------------------------------------------

--
-- Структура таблицы `orders_goods`
--

CREATE TABLE `orders_goods` (
  `id` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `id_goods` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders_goods`
--

INSERT INTO `orders_goods` (`id`, `id_orders`, `id_goods`) VALUES
(3, 8, 1),
(4, 9, 9),
(5, 10, 1),
(6, 10, 1),
(7, 11, 9),
(8, 11, 1),
(11, 12, 9),
(16, 13, 9),
(17, 13, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `hash` text NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`, `admin`) VALUES
(1, 'admin', '$2y$11$tfg45gyj4ggdgsag4534guOHMHyI4YWphWy/j3Ln3lry6GaHgoIA.', '', 1),
(2, 'admin3', '$2y$10$QS2p7jxDxtst2raMjgUvR.EjNBdtqsRJ3dzSDWJ.uLVNAeLQ0DLli', '$2y$10$QS2p7jxDxtst2raMjgUvR.EjNBdtqsRJ3dzSDWJ.uLVNAeLQ0DLli', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback_goods`
--
ALTER TABLE `feedback_goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`idx`);

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
-- Индексы таблицы `orders_goods`
--
ALTER TABLE `orders_goods`
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
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `feedback_goods`
--
ALTER TABLE `feedback_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `orders_goods`
--
ALTER TABLE `orders_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
