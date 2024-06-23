<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="stylesheet" href="user.css">
</head>
<body>
    <div class="wrapper">
        <header class="nav">
            <nav>
                <ul>
                    <li><a href="index.php">Главная</a></li>
                    <li><a href="add_admin.php">Добавить админа</a></li>
                    <li class="dropdown">
                        <a href="#">Музеи</a>
                        <ul class="dropdown-content">
                            <li><a href="add_museum.php">Добавить музей</a></li>
                            <li><a href="edit_museum.php">Изменить музей</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">Экспонаты</a>
                        <ul class="dropdown-content">
                            <li><a href="add_exhibit.php">Добавить экспонат</a></li>
                            <li><a href="edit_exhibit.php">Изменить экспонат</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
    <a href="#">Мероприятия</a>
    <ul class="dropdown-content">
        <li><a href="add_event.php">Добавить мероприятие</a></li>
        <li><a href="edit_event.php">Изменить мероприятие</a></li>
    </ul>
</li>

<li class="dropdown">
    <a href="#">Управление</a>
    <ul class="dropdown-content">
        <li><a href="users.php">Список пользователей</a></li>
        <li><a href="requests.php">Запросы</a></li>
    </ul>
</li>

                    <li class="btn"><a style="color:aliceblue" href="../functions/logout.php">Выйти</a></li>
                </ul>
            </nav>
        </header>


        