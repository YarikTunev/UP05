<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/pages.css">
    <title>Логи оборудования</title>
    <style>
       
    </style>
</head>
<body>
<header>
    <div class="nav">
        <a href="Classroom.php">Аудитория</a>
        <a href="Equipment.php">Оборудование</a>
        <a href="Inventory.php">Инвентаризация</a>
        <a href="#" style="color: #dc3545; font-weight: bold;">Логи оборудования</a>
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
                    <th>Номер оборудования</th>
                    <th>Изменение</th>
                    <th>Старое</th>
                    <th>Новое</th>
                    <th>Номер изменившева</th>
                    <th>Время изменения</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>1</td>
                    <td>Update</td>
                    <td>{
                        "cost": 45000,
                        "name": "Ноутбук Dell",
                        "status": "Используется",
                        "classroom_id": 2,
                        "inventory_number": "IT-001"
                    }
                    </td>
                    <td>{
                        "cost": 47000,
                        "name": "Ноутбук Dell",
                        "status": "На ремонте",
                        "classroom_id": 2,
                        "inventory_number": "IT-001"
                    }
                    </td>
                    <td>1</td>
                    <td>2025-05-15 09:21:18</td>
                    <td class="action-icons">
                        <img src="../img/edit.png" alt="Edit">
                        <img src="../img/delete.png" alt="Delete">
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>1</td>
                    <td>Update</td>
                    <td>{
                        "cost": 45000,
                        "name": "Ноутбук Dell",
                        "status": "Используется",
                        "classroom_id": 2,
                        "inventory_number": "IT-001"
                    }
                    </td>
                    <td>{
                        "cost": 47000,
                        "name": "Ноутбук Dell",
                        "status": "На ремонте",
                        "classroom_id": 2,
                        "inventory_number": "IT-001"
                    }
                    </td>
                    <td>1</td>
                    <td>2025-05-15 09:21:18</td>
                    <td class="action-icons">
                        <img src="../img/edit.png" alt="Edit">
                        <img src="../img/delete.png" alt="Delete">
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>1</td>
                    <td>Update</td>
                    <td>{
                        "cost": 45000,
                        "name": "Ноутбук Dell",
                        "status": "Используется",
                        "classroom_id": 2,
                        "inventory_number": "IT-001"
                    }
                    </td>
                    <td>{
                        "cost": 47000,
                        "name": "Ноутбук Dell",
                        "status": "На ремонте",
                        "classroom_id": 2,
                        "inventory_number": "IT-001"
                    }
                    </td>
                    <td>1</td>
                    <td>2025-05-15 09:21:18</td>
                    <td class="action-icons">
                        <img src="../img/edit.png" alt="Edit">
                        <img src="../img/delete.png" alt="Delete">
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>1</td>
                    <td>Update</td>
                    <td>{
                        "cost": 45000,
                        "name": "Ноутбук Dell",
                        "status": "Используется",
                        "classroom_id": 2,
                        "inventory_number": "IT-001"
                    }
                    </td>
                    <td>{
                        "cost": 47000,
                        "name": "Ноутбук Dell",
                        "status": "На ремонте",
                        "classroom_id": 2,
                        "inventory_number": "IT-001"
                    }
                    </td>
                    <td>1</td>
                    <td>2025-05-15 09:21:18</td>
                    <td class="action-icons">
                        <img src="../img/edit.png" alt="Edit">
                        <img src="../img/delete.png" alt="Delete">
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>1</td>
                    <td>Update</td>
                    <td>{
                        "cost": 45000,
                        "name": "Ноутбук Dell",
                        "status": "Используется",
                        "classroom_id": 2,
                        "inventory_number": "IT-001"
                    }
                    </td>
                    <td>{
                        "cost": 47000,
                        "name": "Ноутбук Dell",
                        "status": "На ремонте",
                        "classroom_id": 2,
                        "inventory_number": "IT-001"
                    }
                    </td>
                    <td>1</td>
                    <td>2025-05-15 09:21:18</td>
                    <td class="action-icons">
                        <img src="../img/edit.png" alt="Edit">
                        <img src="../img/delete.png" alt="Delete">
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>1</td>
                    <td>Update</td>
                    <td>{
                        "cost": 45000,
                        "name": "Ноутбук Dell",
                        "status": "Используется",
                        "classroom_id": 2,
                        "inventory_number": "IT-001"
                    }
                    </td>
                    <td>{
                        "cost": 47000,
                        "name": "Ноутбук Dell",
                        "status": "На ремонте",
                        "classroom_id": 2,
                        "inventory_number": "IT-001"
                    }
                    </td>
                    <td>1</td>
                    <td>2025-05-15 09:21:18</td>
                    <td class="action-icons">
                        <img src="../img/edit.png" alt="Edit">
                        <img src="../img/delete.png" alt="Delete">
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>1</td>
                    <td>Update</td>
                    <td>{
                        "cost": 45000,
                        "name": "Ноутбук Dell",
                        "status": "Используется",
                        "classroom_id": 2,
                        "inventory_number": "IT-001"
                    }
                    </td>
                    <td>{
                        "cost": 47000,
                        "name": "Ноутбук Dell",
                        "status": "На ремонте",
                        "classroom_id": 2,
                        "inventory_number": "IT-001"
                    }
                    </td>
                    <td>1</td>
                    <td>2025-05-15 09:21:18</td>
                    <td class="action-icons">
                        <img src="../img/edit.png" alt="Edit">
                        <img src="../img/delete.png" alt="Delete">
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>1</td>
                    <td>Update</td>
                    <td>{
                        "cost": 45000,
                        "name": "Ноутбук Dell",
                        "status": "Используется",
                        "classroom_id": 2,
                        "inventory_number": "IT-001"
                    }
                    </td>
                    <td>{
                        "cost": 47000,
                        "name": "Ноутбук Dell",
                        "status": "На ремонте",
                        "classroom_id": 2,
                        "inventory_number": "IT-001"
                    }
                    </td>
                    <td>1</td>
                    <td>2025-05-15 09:21:18</td>
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