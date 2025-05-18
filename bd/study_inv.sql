-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 17 2025 г., 05:13
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `study_inv`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Classrooms`
--

CREATE TABLE `Classrooms` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `short_name` varchar(20) DEFAULT NULL,
  `responsible_user_id` int DEFAULT NULL,
  `temp_responsible_user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Classrooms`
--

INSERT INTO `Classrooms` (`id`, `name`, `short_name`, `responsible_user_id`, `temp_responsible_user_id`) VALUES
(1, 'Компьютерный класс №1', 'КК-1', 2, NULL),
(2, 'Лаборатория мехатроники', 'Лаб.Мех', 2, 3),
(3, 'Аудитория 301', 'А-301', 4, NULL),
(4, 'Серверная', 'Серверная', 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `Equipment`
--

CREATE TABLE `Equipment` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `inventory_number` varchar(50) NOT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `direction` enum('Мехатроника','Общее','Информатика') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Общее',
  `status` enum('На ремонте','Используется','На складе') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'На складе',
  `equipment_type` enum('Ноутбук','Проектор','Принтер','Компьютер','Доска') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `comment` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `classroom_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Equipment`
--

INSERT INTO `Equipment` (`id`, `name`, `photo_path`, `inventory_number`, `cost`, `direction`, `status`, `equipment_type`, `model`, `comment`, `created_at`, `updated_at`, `classroom_id`) VALUES
(1, 'Ноутбук Dell', '/photos/laptop1.jpg', 'IT-001', '47000.00', 'Мехатроника', 'На ремонте', 'Ноутбук', 'Dell Latitude 5400', 'Новый, 2024 г.в.', '2025-05-12 09:37:08', '2025-05-15 06:21:18', 2),
(2, 'Проектор Epson', '/photos/projector1.jpg', 'AV-002', '35000.00', 'Общее', 'Используется', 'Проектор', 'Epson EB-535W', '', '2025-05-12 09:37:08', '2025-05-15 06:03:23', 3),
(3, 'Принтер HP', '/photos/printer1.jpg', 'IT-003', '18000.00', 'Информатика', 'На ремонте', 'Принтер', 'HP LaserJet Pro', 'Требуется замена картриджа', '2025-05-12 09:37:08', '2025-05-15 06:03:23', 1),
(4, 'Системный блок', '/photos/pc1.jpg', 'IT-004', '32000.00', 'Мехатроника', 'Используется', 'Компьютер', 'Lenovo ThinkCentre', '', '2025-05-12 09:37:08', '2025-05-15 06:03:23', 2),
(5, 'Интерактивная доска', '/photos/board1.jpg', 'AV-005', '125000.00', 'Общее', 'Используется', 'Доска', 'Smart Board 6065', 'Установлена в КК-1', '2025-05-12 09:37:08', '2025-05-15 06:03:23', 1);

--
-- Триггеры `Equipment`
--
DELIMITER $$
CREATE TRIGGER `log_equipment_changes` AFTER UPDATE ON `Equipment` FOR EACH ROW BEGIN
    INSERT INTO EquipmentLog (
        equipment_id, 
        action_type, 
        old_data, 
        new_data, 
        changed_by
    )
    VALUES (
        NEW.id,
        'UPDATE',
        JSON_OBJECT(
            'name', OLD.name,
            'inventory_number', OLD.inventory_number,
            'cost', OLD.cost,
            'status', OLD.status,
            'classroom_id', OLD.classroom_id
        ),
        JSON_OBJECT(
            'name', NEW.name,
            'inventory_number', NEW.inventory_number,
            'cost', NEW.cost,
            'status', NEW.status,
            'classroom_id', NEW.classroom_id
        ),
        CURRENT_USER()
    );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `EquipmentLog`
--

CREATE TABLE `EquipmentLog` (
  `id` int NOT NULL,
  `equipment_id` int NOT NULL,
  `action_type` enum('INSERT','UPDATE','DELETE') NOT NULL,
  `old_data` json DEFAULT NULL,
  `new_data` json DEFAULT NULL,
  `changed_by` varchar(100) DEFAULT NULL,
  `change_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `EquipmentLog`
--

INSERT INTO `EquipmentLog` (`id`, `equipment_id`, `action_type`, `old_data`, `new_data`, `changed_by`, `change_timestamp`) VALUES
(1, 1, 'UPDATE', '{\"cost\": 45000.0, \"name\": \"Ноутбук Dell\", \"status\": \"Используется\", \"classroom_id\": 2, \"inventory_number\": \"IT-001\"}', '{\"cost\": 47000.0, \"name\": \"Ноутбук Dell\", \"status\": \"На ремонте\", \"classroom_id\": 2, \"inventory_number\": \"IT-001\"}', 'root@%', '2025-05-15 06:21:18');

-- --------------------------------------------------------

--
-- Структура таблицы `EquipmentMovementHistory`
--

CREATE TABLE `EquipmentMovementHistory` (
  `id` int NOT NULL,
  `equipment_id` int NOT NULL,
  `classroom_id` int NOT NULL,
  `responsible_user_id` int DEFAULT NULL,
  `temp_responsible_user_id` int DEFAULT NULL,
  `movement_date` date NOT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `EquipmentMovementHistory`
--

INSERT INTO `EquipmentMovementHistory` (`id`, `equipment_id`, `classroom_id`, `responsible_user_id`, `temp_responsible_user_id`, `movement_date`, `comment`) VALUES
(1, 1, 1, 2, NULL, '2025-01-15', 'Первоначальное размещение'),
(2, 1, 2, 2, 3, '2025-03-10', 'Временное перемещение для занятий'),
(3, 2, 3, 4, NULL, '2025-02-20', 'Установка в аудитории'),
(4, 3, 1, 2, NULL, '2025-01-20', 'Первоначальное размещение'),
(5, 5, 1, 2, NULL, '2025-01-25', 'Установка в компьютерном классе'),
(6, 4, 2, 2, NULL, '2025-02-15', 'Первоначальное размещение в лаборатории');

-- --------------------------------------------------------

--
-- Структура таблицы `Inventory`
--

CREATE TABLE `Inventory` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Inventory`
--

INSERT INTO `Inventory` (`id`, `name`, `start_date`, `end_date`, `created_by`) VALUES
(1, 'Годовая инвентаризация 2025', '2025-05-01', '2025-05-15', 1),
(2, 'Внеплановая проверка', '2025-03-01', '2025-03-05', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `InventoryResults`
--

CREATE TABLE `InventoryResults` (
  `id` int NOT NULL,
  `inventory_id` int NOT NULL,
  `equipment_id` int NOT NULL,
  `checked_by` int NOT NULL,
  `check_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(25) NOT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `InventoryResults`
--

INSERT INTO `InventoryResults` (`id`, `inventory_id`, `equipment_id`, `checked_by`, `check_date`, `status`, `comment`) VALUES
(1, 1, 1, 2, '2025-05-12 09:37:41', 'Используется', 'Оборудование на месте'),
(2, 1, 2, 4, '2025-05-12 09:37:41', 'Используется', ''),
(3, 1, 3, 2, '2025-05-12 09:37:41', 'На ремонте', 'Отсутствует, отправлен в ремонт'),
(4, 1, 5, 2, '2025-05-12 09:37:41', 'Используется', ''),
(5, 2, 1, 2, '2025-05-12 09:37:41', 'Используется', 'Проверено после возврата из лаб.мехатроники');

-- --------------------------------------------------------

--
-- Структура таблицы `NetworkSettings`
--

CREATE TABLE `NetworkSettings` (
  `id` int NOT NULL,
  `equipment_id` int NOT NULL,
  `ip_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `subnet_mask` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gateway` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dns1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dns2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `NetworkSettings`
--

INSERT INTO `NetworkSettings` (`id`, `equipment_id`, `ip_address`, `subnet_mask`, `gateway`, `dns1`, `dns2`) VALUES
(1, 1, '192.168.001.010', '255.255.255.000', '192.168.001.001', '008.008.008.008', '008.008.004.004'),
(2, 4, '192.168.001.011', '255.255.255.000', '192.168.001.001', '008.008.008.008', '008.008.004.004');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `id` int NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','teacher','employee') NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`id`, `login`, `password`, `role`, `email`, `last_name`, `first_name`, `middle_name`, `phone`, `address`) VALUES
(1, 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', 'admin@college.edu', 'Иванов', 'Иван', 'Иванович', '+79123456789', 'ул. Ленина, 1'),
(2, 'teacher1', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 'petrov@college.edu', 'Петров', 'Петр', 'Петрович', '+79123456780', 'ул. Пушкина, 10'),
(3, 'employee1', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'employee', 'sidorov@college.edu', 'Сидоров', 'Сидор', 'Сидорович', '+79123456781', 'ул. Гагарина, 5'),
(4, 'teacher2', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 'smirnova@college.edu', 'Смирнова', 'Ольга', 'Владимировна', '+79123456782', 'ул. Мира, 15');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Classrooms`
--
ALTER TABLE `Classrooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `responsible_user_id` (`responsible_user_id`),
  ADD KEY `temp_responsible_user_id` (`temp_responsible_user_id`);

--
-- Индексы таблицы `Equipment`
--
ALTER TABLE `Equipment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inventory_number` (`inventory_number`),
  ADD KEY `idx_equipment_status` (`status`),
  ADD KEY `idx_equipment_name` (`name`),
  ADD KEY `idx_equipment_type` (`equipment_type`),
  ADD KEY `fk_equipment_classroom` (`classroom_id`);

--
-- Индексы таблицы `EquipmentLog`
--
ALTER TABLE `EquipmentLog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipment_id` (`equipment_id`);

--
-- Индексы таблицы `EquipmentMovementHistory`
--
ALTER TABLE `EquipmentMovementHistory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipment_id` (`equipment_id`),
  ADD KEY `classroom_id` (`classroom_id`),
  ADD KEY `responsible_user_id` (`responsible_user_id`),
  ADD KEY `temp_responsible_user_id` (`temp_responsible_user_id`),
  ADD KEY `idx_movement_date` (`movement_date`);

--
-- Индексы таблицы `Inventory`
--
ALTER TABLE `Inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Индексы таблицы `InventoryResults`
--
ALTER TABLE `InventoryResults`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_id` (`inventory_id`),
  ADD KEY `equipment_id` (`equipment_id`),
  ADD KEY `checked_by` (`checked_by`);

--
-- Индексы таблицы `NetworkSettings`
--
ALTER TABLE `NetworkSettings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipment_id` (`equipment_id`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Classrooms`
--
ALTER TABLE `Classrooms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `Equipment`
--
ALTER TABLE `Equipment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `EquipmentLog`
--
ALTER TABLE `EquipmentLog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `EquipmentMovementHistory`
--
ALTER TABLE `EquipmentMovementHistory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `Inventory`
--
ALTER TABLE `Inventory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `InventoryResults`
--
ALTER TABLE `InventoryResults`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `NetworkSettings`
--
ALTER TABLE `NetworkSettings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Classrooms`
--
ALTER TABLE `Classrooms`
  ADD CONSTRAINT `classrooms_ibfk_1` FOREIGN KEY (`responsible_user_id`) REFERENCES `Users` (`id`),
  ADD CONSTRAINT `classrooms_ibfk_2` FOREIGN KEY (`temp_responsible_user_id`) REFERENCES `Users` (`id`);

--
-- Ограничения внешнего ключа таблицы `Equipment`
--
ALTER TABLE `Equipment`
  ADD CONSTRAINT `fk_equipment_classroom` FOREIGN KEY (`classroom_id`) REFERENCES `Classrooms` (`id`) ON DELETE SET NULL;

--
-- Ограничения внешнего ключа таблицы `EquipmentLog`
--
ALTER TABLE `EquipmentLog`
  ADD CONSTRAINT `equipmentlog_ibfk_1` FOREIGN KEY (`equipment_id`) REFERENCES `Equipment` (`id`);

--
-- Ограничения внешнего ключа таблицы `EquipmentMovementHistory`
--
ALTER TABLE `EquipmentMovementHistory`
  ADD CONSTRAINT `equipmentmovementhistory_ibfk_1` FOREIGN KEY (`equipment_id`) REFERENCES `Equipment` (`id`),
  ADD CONSTRAINT `equipmentmovementhistory_ibfk_2` FOREIGN KEY (`classroom_id`) REFERENCES `Classrooms` (`id`),
  ADD CONSTRAINT `equipmentmovementhistory_ibfk_3` FOREIGN KEY (`responsible_user_id`) REFERENCES `Users` (`id`),
  ADD CONSTRAINT `equipmentmovementhistory_ibfk_4` FOREIGN KEY (`temp_responsible_user_id`) REFERENCES `Users` (`id`);

--
-- Ограничения внешнего ключа таблицы `Inventory`
--
ALTER TABLE `Inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `Users` (`id`);

--
-- Ограничения внешнего ключа таблицы `InventoryResults`
--
ALTER TABLE `InventoryResults`
  ADD CONSTRAINT `inventoryresults_ibfk_1` FOREIGN KEY (`inventory_id`) REFERENCES `Inventory` (`id`),
  ADD CONSTRAINT `inventoryresults_ibfk_2` FOREIGN KEY (`equipment_id`) REFERENCES `Equipment` (`id`),
  ADD CONSTRAINT `inventoryresults_ibfk_3` FOREIGN KEY (`checked_by`) REFERENCES `Users` (`id`);

--
-- Ограничения внешнего ключа таблицы `NetworkSettings`
--
ALTER TABLE `NetworkSettings`
  ADD CONSTRAINT `networksettings_ibfk_1` FOREIGN KEY (`equipment_id`) REFERENCES `Equipment` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
