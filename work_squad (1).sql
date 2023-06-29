-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 25 2023 г., 17:09
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `work_squad`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_order` int NOT NULL,
  `id_client` int NOT NULL,
  `id_employee` int NOT NULL,
  `phone` varchar(12) NOT NULL,
  `date` date NOT NULL,
  `date_booking` date NOT NULL,
  `time_booking` time NOT NULL,
  `room` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_order`, `id_client`, `id_employee`, `phone`, `date`, `date_booking`, `time_booking`, `room`) VALUES
(14, 4, 3, '+79615245874', '2023-06-24', '2023-07-12', '15:30:00', 1),
(15, 4, 3, '+79615245874', '2023-06-24', '2024-04-12', '15:30:00', 2),
(17, 2, 3, '+79654126587', '2023-06-25', '2023-07-23', '10:00:00', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `order_status`
--

CREATE TABLE `order_status` (
  `id_order` int NOT NULL,
  `id_status` int NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `order_status`
--

INSERT INTO `order_status` (`id_order`, `id_status`, `date`) VALUES
(14, 2, '2023-06-24'),
(15, 3, '2023-06-24'),
(17, 1, '2023-06-25');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id_role` int NOT NULL,
  `title_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id_role`, `title_role`) VALUES
(1, 'Администратор'),
(2, 'Клиент'),
(3, 'Сотрудник');

-- --------------------------------------------------------

--
-- Структура таблицы `rooms`
--

CREATE TABLE `rooms` (
  `id_room` int NOT NULL,
  `title_room` varchar(100) NOT NULL,
  `quantity` int NOT NULL,
  `description` varchar(500) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `cost` int NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `rooms`
--

INSERT INTO `rooms` (`id_room`, `title_room`, `quantity`, `description`, `photo`, `cost`, `location`) VALUES
(1, 'Комната настольных игр', 8, 'В этой зоне вы можете не только поиграть в настольный футюол, но и сразиться в PlayStation 4 или Xbox One S. Или даже размяться за игрой в Just Dance! Для этого там установлена самая совершенная система распознавания движений - Kinect 2.0. Без музыки вам тоже скучать не придется - к вашим услугам умная колонка от Яндекс.\nА от жары вас спасёт установленный в зале кондиционер.\nТакже этот зал подходит для проведения больших презентаций, мастер-классов или больших застолий.', 'img/catalog/1.jpg', 200, 'Ул. Ленина, 156, Уфа'),
(2, 'Комната кино', 4, 'Вы можете забронировать эту атмосферную комнату, просто оставив на данном сайте заявку. Обратите внимание - в комнате в комнате запрещено находиться с едой и напитками. Также нужно будет снять обувь.', 'img/catalog/5.jpg', 200, 'Ул. Ленина, 156, Уфа'),
(3, 'Игровая комната', 6, 'В комнате находятся 2 телевизора и игровые консоли Xbox One S и PlayStation 4. Также к вашим услугам будут караоке-колонка и смарт-тв с оплаченной подпиской Кинопоиск.', 'img/catalog/2.jpg', 500, 'Ул. Ленина, 156, Уфа'),
(4, 'Музыкальная комната', 8, 'В этой зоне к вашим услугам: сцена с профессиональным оборудованием (колонки, микшер, комбоусилители, процессор эффектов), музыкальные инструменты, виртуальная реальность, караоке (до 22:00), проектор.', 'img/catalog/6.jpg', 800, 'Ул. Ленина, 156, Уфа'),
(5, 'Комната гримерки', 4, 'В комнате находятся 2 телевизора и игровые консоли XBox One S и PlayStation 4. Также к вашим услугам будут караоке-колонка и смарт-тв с оплаченной подпиской Кинопоиск. Все остальные развлечения у нас находятся в общем доступе и можно будет пользоваться всем, что не занято - игровые приставки (есть во всех комнатах)', 'img/catalog/7.jpg', 300, 'Ул. Ленина, 156, Уфа');

-- --------------------------------------------------------

--
-- Структура таблицы `status_order`
--

CREATE TABLE `status_order` (
  `id_title_status_order` int NOT NULL,
  `title_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `status_order`
--

INSERT INTO `status_order` (`id_title_status_order`, `title_status`) VALUES
(1, 'Новая'),
(2, 'Принято'),
(3, 'Отклонено');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `surname` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `patronymic` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `surname`, `name`, `patronymic`, `birthday`, `email`, `login`, `password`, `phone`, `role`) VALUES
(1, 'Лазарев', 'Сергей', 'Петрович', '1993-06-02', 'dela@mail.ru', 'admin', 'admin11', '+79458254012', 1),
(2, 'Гореев', 'Роман', 'Русланович', '1995-09-04', 'shah_mat@mail.ru', 'fers', 'ladya', '+78945631471', 2),
(3, 'Монгол', 'Олег', 'Иосифович', '1996-06-12', 'rabotnik@mail.ru', 'stalini', 'vissarionovich', '+73843335003', 3),
(4, 'qwe', 'qwe', 'qwe', '2013-06-05', 'qwe@mail.ru', 'qwe', 'qweqwe', '+77777777777', 2),
(7, 'qwad', 'fad', 'fsdfsd', '2312-03-21', 'fsf@mail.r', 'stalin', '123', '+79615245874', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_client` (`id_client`,`id_employee`,`room`),
  ADD KEY `id_employee` (`id_employee`),
  ADD KEY `room` (`room`);

--
-- Индексы таблицы `order_status`
--
ALTER TABLE `order_status`
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_ order` (`id_order`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id_room`);

--
-- Индексы таблицы `status_order`
--
ALTER TABLE `status_order`
  ADD PRIMARY KEY (`id_title_status_order`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id_room` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `status_order`
--
ALTER TABLE `status_order`
  MODIFY `id_title_status_order` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_employee`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`room`) REFERENCES `rooms` (`id_room`);

--
-- Ограничения внешнего ключа таблицы `order_status`
--
ALTER TABLE `order_status`
  ADD CONSTRAINT `order_status_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`),
  ADD CONSTRAINT `order_status_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `status_order` (`id_title_status_order`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
