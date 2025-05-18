<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/pages.css">
    <title>Оборудование</title>
    <style>
       
    </style>
</head>
<body>
<header>
    <div class="nav">
        <a href="Classroom.php">Аудитория</a>
        <a href="#" style="color: #dc3545; font-weight: bold;">Оборудование</a>
        <a href="Inventory.php">Инвентаризация</a>
        <a href="EquipmentLog.php">Логи оборудования</a>
        <a href="EquipmentMovie.php">Перемещение оборудования</a>
        <a href="InventoryResults.php">Результаты инвентаризации</a>
        <a href="NetworkSettings.php">Настройки сети</a>
        <a href="Users.php">Пользователи</a>
    </div>
    <p>Admin</p>
    <img src="../img/down.png" alt="">
</header>
<main>
    <div class="search-container">
        <input type="text" class="search-box" placeholder="Поиск...">
        <div class="buttons">
            <button class="btn btn-import">Импортировать в SVG</button>
            <button class="btn btn-add">Добавить запись</button>
            <button class="btn btn-delete">Удалить</button>
        </div>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th><input type="checkbox"></th>
                    <th>Наименование</th>
                    <th>Фотография</th>
                    <th>Инв. номер</th>
                    <th>Цена</th>
                    <th>Направление</th>
                    <th>Статус</th>
                    <th>Тип обр.</th>
                    <th>Модель</th>
                    <th>Комментарий</th>
                    <th>Созданно</th>
                    <th>Обновлено</th>
                    <th>Номер аудитории</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Ноутбук Dell</td>
                    <td>laptop1.jpg</td>
                    <td>IT-001</td>
                    <td>47000 руб</td>
                    <td>Мехатроника</td>
                    <td>На ремонте</td>
                    <td>Ноутбук</td>
                    <td>Dell Latitude 5400</td>
                    <td>Новый, 2024 г.в.</td>
                    <td>2025-05-12 12:37:08.</td>
                    <td>2025-05-12 12:37:18</td>
                    <td>1</td>
                    <td class="action-icons">
                        <img src="../img/edit.png" alt="Edit">
                        <img src="../img/delete.png" alt="Delete">
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Ноутбук Dell</td>
                    <td>laptop1.jpg</td>
                    <td>IT-001</td>
                    <td>47000 руб</td>
                    <td>Мехатроника</td>
                    <td>На ремонте</td>
                    <td>Ноутбук</td>
                    <td>Dell Latitude 5400</td>
                    <td>Новый, 2024 г.в.</td>
                    <td>2025-05-12 12:37:08.</td>
                    <td>2025-05-12 12:37:18</td>
                    <td>1</td>
                    <td class="action-icons">
                        <img src="../img/edit.png" alt="Edit">
                        <img src="../img/delete.png" alt="Delete">
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Ноутбук Dell</td>
                    <td>laptop1.jpg</td>
                    <td>IT-001</td>
                    <td>47000 руб</td>
                    <td>Мехатроника</td>
                    <td>На ремонте</td>
                    <td>Ноутбук</td>
                    <td>Dell Latitude 5400</td>
                    <td>Новый, 2024 г.в.</td>
                    <td>2025-05-12 12:37:08.</td>
                    <td>2025-05-12 12:37:18</td>
                    <td>1</td>
                    <td class="action-icons">
                        <img src="../img/edit.png" alt="Edit">
                        <img src="../img/delete.png" alt="Delete">
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Ноутбук Dell</td>
                    <td>laptop1.jpg</td>
                    <td>IT-001</td>
                    <td>47000 руб</td>
                    <td>Мехатроника</td>
                    <td>На ремонте</td>
                    <td>Ноутбук</td>
                    <td>Dell Latitude 5400</td>
                    <td>Новый, 2024 г.в.</td>
                    <td>2025-05-12 12:37:08.</td>
                    <td>2025-05-12 12:37:18</td>
                    <td>1</td>
                    <td class="action-icons">
                        <img src="../img/edit.png" alt="Edit">
                        <img src="../img/delete.png" alt="Delete">
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Ноутбук Dell</td>
                    <td>laptop1.jpg</td>
                    <td>IT-001</td>
                    <td>47000 руб</td>
                    <td>Мехатроника</td>
                    <td>На ремонте</td>
                    <td>Ноутбук</td>
                    <td>Dell Latitude 5400</td>
                    <td>Новый, 2024 г.в.</td>
                    <td>2025-05-12 12:37:08.</td>
                    <td>2025-05-12 12:37:18</td>
                    <td>1</td>
                    <td class="action-icons">
                        <img src="../img/edit.png" alt="Edit">
                        <img src="../img/delete.png" alt="Delete">
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Ноутбук Dell</td>
                    <td>laptop1.jpg</td>
                    <td>IT-001</td>
                    <td>47000 руб</td>
                    <td>Мехатроника</td>
                    <td>На ремонте</td>
                    <td>Ноутбук</td>
                    <td>Dell Latitude 5400</td>
                    <td>Новый, 2024 г.в.</td>
                    <td>2025-05-12 12:37:08.</td>
                    <td>2025-05-12 12:37:18</td>
                    <td>1</td>
                    <td class="action-icons">
                        <img src="../img/edit.png" alt="Edit">
                        <img src="../img/delete.png" alt="Delete">
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Ноутбук Dell</td>
                    <td>laptop1.jpg</td>
                    <td>IT-001</td>
                    <td>47000 руб</td>
                    <td>Мехатроника</td>
                    <td>На ремонте</td>
                    <td>Ноутбук</td>
                    <td>Dell Latitude 5400</td>
                    <td>Новый, 2024 г.в.</td>
                    <td>2025-05-12 12:37:08.</td>
                    <td>2025-05-12 12:37:18</td>
                    <td>1</td>
                    <td class="action-icons">
                        <img src="../img/edit.png" alt="Edit">
                        <img src="../img/delete.png" alt="Delete">
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Ноутбук Dell</td>
                    <td>laptop1.jpg</td>
                    <td>IT-001</td>
                    <td>47000 руб</td>
                    <td>Мехатроника</td>
                    <td>На ремонте</td>
                    <td>Ноутбук</td>
                    <td>Dell Latitude 5400</td>
                    <td>Новый, 2024 г.в.</td>
                    <td>2025-05-12 12:37:08.</td>
                    <td>2025-05-12 12:37:18</td>
                    <td>1</td>
                    <td class="action-icons">
                        <img src="../img/edit.png" alt="Edit">
                        <img src="../img/delete.png" alt="Delete">
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Ноутбук Dell</td>
                    <td>laptop1.jpg</td>
                    <td>IT-001</td>
                    <td>47000 руб</td>
                    <td>Мехатроника</td>
                    <td>На ремонте</td>
                    <td>Ноутбук</td>
                    <td>Dell Latitude 5400</td>
                    <td>Новый, 2024 г.в.</td>
                    <td>2025-05-12 12:37:08.</td>
                    <td>2025-05-12 12:37:18</td>
                    <td>1</td>
                    <td class="action-icons">
                        <img src="../img/edit.png" alt="Edit">
                        <img src="../img/delete.png" alt="Delete">
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Ноутбук Dell</td>
                    <td>laptop1.jpg</td>
                    <td>IT-001</td>
                    <td>47000 руб</td>
                    <td>Мехатроника</td>
                    <td>На ремонте</td>
                    <td>Ноутбук</td>
                    <td>Dell Latitude 5400</td>
                    <td>Новый, 2024 г.в.</td>
                    <td>2025-05-12 12:37:08.</td>
                    <td>2025-05-12 12:37:18</td>
                    <td>1</td>
                    <td class="action-icons">
                        <img src="../img/edit.png" alt="Edit">
                        <img src="../img/delete.png" alt="Delete">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
</body>