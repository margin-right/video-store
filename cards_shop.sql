-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 23 2022 г., 19:49
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cards_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cards`
--

CREATE TABLE `cards` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `linkName` varchar(255) NOT NULL,
  `cost` int NOT NULL,
  `img` varchar(255) NOT NULL,
  `techprocess` int NOT NULL,
  `memValue` int NOT NULL,
  `bus` int NOT NULL,
  `stock` varchar(100) NOT NULL DEFAULT 'да',
  `garant` int NOT NULL,
  `series` varchar(100) NOT NULL,
  `year` int NOT NULL,
  `memType` varchar(10) NOT NULL,
  `memSpeed` int NOT NULL,
  `archect` varchar(100) NOT NULL,
  `minMHZ` int NOT NULL,
  `maxMHZ` int NOT NULL,
  `ALU` int NOT NULL,
  `RTX` varchar(20) NOT NULL,
  `ports` varchar(200) NOT NULL,
  `maxResolution` varchar(20) NOT NULL,
  `displayCount` int NOT NULL,
  `dopPower` varchar(100) NOT NULL,
  `dopPowerPort` varchar(20) NOT NULL,
  `maxEnergy` int NOT NULL,
  `recommendedBlock` int NOT NULL,
  `coolingType` varchar(100) NOT NULL,
  `fanCount` int NOT NULL,
  `lowProfile` varchar(10) NOT NULL,
  `slotsCount` int NOT NULL,
  `length` int NOT NULL,
  `complectation` varchar(200) NOT NULL,
  `light` varchar(100) NOT NULL,
  `chipCompany` varchar(50) NOT NULL,
  `vendor` varchar(50) NOT NULL,
  `spec` varchar(20) NOT NULL DEFAULT 'for-game'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `cards`
--

INSERT INTO `cards` (`id`, `name`, `linkName`, `cost`, `img`, `techprocess`, `memValue`, `bus`, `stock`, `garant`, `series`, `year`, `memType`, `memSpeed`, `archect`, `minMHZ`, `maxMHZ`, `ALU`, `RTX`, `ports`, `maxResolution`, `displayCount`, `dopPower`, `dopPowerPort`, `maxEnergy`, `recommendedBlock`, `coolingType`, `fanCount`, `lowProfile`, `slotsCount`, `length`, `complectation`, `light`, `chipCompany`, `vendor`, `spec`) VALUES
(1, 'Gigabyte GeForce RTX 3060 Ti GAMING OC (LHR)', 'GigabyteGeForceRTX3060TiGamingOC(LHR)', 101999, 'gigabyte3060ti', 8, 8, 256, 'да', 36, 'GIGABYTE Gaming', 2021, 'GDDR6', 448, 'Ampere', 1410, 1740, 4864, 'да', 'DisplayPort x2, HDMI x2', '7680x4320', 4, 'есть', '8-pin', 180, 600, 'активное воздушное', 3, 'нет', 2, 282, 'документация', 'есть', 'Nvidia', 'Gigabyte', 'for-game'),
(2, 'GIGABYTE GeForce GTX 1650 D6 OC (rev. 2.0)', 'GigabyteGeForceGTX1650D6OCv2', 34999, 'gigabyte1650D6', 12, 4, 128, 'да', 36, 'GIGABYTE MINI', 2019, 'GDDR6', 192, 'Turing', 1410, 1635, 896, 'нет', 'HDMI, DisplayPort, DVI-D', '7680x4320', 3, 'есть', '6-pin', 75, 300, 'активное воздушное', 1, 'нет', 2, 172, 'документация', 'нет', 'Nvidia', 'Gigabyte', 'for-game'),
(3, 'MSI GeForce GT 730', 'msiGeForceGT730', 6199, 'msiGT730', 28, 2, 128, 'да', 36, '-', 2014, 'GDDR3', 28, 'Kepler', 700, 800, 96, 'нет', 'DVI-D, HDMI, VGA (D-Sub)', '4096x2160', 2, 'нет', 'нет', 49, 300, 'активное воздушное\r\n', 1, 'нет', 2, 151, 'документация', 'нет', 'Nvidia', 'MSI', 'for-office'),
(4, 'GIGABYTE AMD Radeon RX 6600 EAGLE', 'GigabyteRadeonRX6600EAGLE', 68999, 'gigabyteRadeonRX6600EAGLE', 7, 8, 128, 'да', 36, 'GIGABYTE EAGLE', 2021, 'GDDR6', 224, 'RDNA 2', 1968, 2359, 1792, 'да', 'HDMI, DisplayPort x3', '7680x4320', 4, 'есть', '8-pin', 160, 500, 'активное воздушное', 3, 'нет', 2, 282, 'документация', 'да', 'AMD', 'Gigabyte', 'for-game'),
(5, 'INNO3D GeForce GTX 1660 Ti TWIN X2', 'Inno3DGeForceGTX1660TiTwinX2', 64999, 'inno3d1660tiTwinX2', 12, 6, 192, 'да', 36, 'Inno3D TWIN', 2019, 'GDDR6', 288, 'Turing', 1500, 1770, 1536, 'нет', 'HDMI, DisplayPort x3', '7680x4320', 3, 'есть', '8-pin', 120, 500, 'активное воздушное', 2, 'нет', 2, 196, 'документация', 'нет', 'Nvidia', 'INNO3D', 'for-game'),
(6, 'MSI GeForce GTX 1660 Ti ARMOR OC', 'MSIGeForceGTX1660TiArmorOC', 65999, 'msi1660tiArmor', 12, 6, 192, 'да', 36, 'MSI ARMOR', 2019, 'GDDR6', 288, 'Turing', 1500, 1860, 1536, 'нет', 'HDMI, DisplayPort x3', '7680x4320', 4, 'есть', '8-pin', 130, 450, 'активное воздушное', 2, 'нет', 2, 243, 'документация', 'нет', 'Nvidia', 'MSI', 'for-game'),
(7, 'KFA2 GeForce GT 710', 'Kfa2GeForceGT710', 4499, 'Kfa2GeForceGT710', 28, 2, 64, 'да', 24, '-', 2014, 'GDDR3', 12, 'Kepler', 954, 976, 192, 'нет', 'DVI-D, HDMI, VGA (D-Sub)', '4096x2160', 3, 'нет', 'нет', 19, 300, 'пассивное', 0, 'да', 1, 172, 'документация', 'нет', 'Nvidia', 'KFA2', 'for-office'),
(8, 'PNY Quadro T600', 'PnyQuadroT600', 20999, 'PnyQuadroT600', 12, 4, 128, 'да', 36, 'PNY Quadro', 2021, 'GDDR6', 160, 'Turing', 735, 1330, 640, 'нет', 'Mini DisplayPort x4', '7680x4320', 4, 'нет', 'нет', 40, 300, 'активное воздушное', 1, 'да', 1, 156, 'переходник miniDisplayPort - DisplayPort x4, документация, низкопрофильная планка', 'нет', 'Nvidia', 'PNY', 'prof');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `token` varchar(255) NOT NULL,
  `products` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `adres` text NOT NULL,
  `cost` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `cart` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `token`, `cart`) VALUES
(7, 'admin', '$2y$10$.oRm654F8W9Q.1Db..OyzuQuelLVD5BCAxtTQvr1ZIvX3fwOd30lG', '083dc2e5bb094a40ce382f3407a5a3cbaab29f7f', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `token` (`token`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`token`) REFERENCES `users` (`token`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
