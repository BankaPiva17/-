<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../functions/login.php");
    exit();
}

require_once '../lib/db.php';

$user_id = $_SESSION['id'];
$stmt = $conn->prepare("SELECT Name, SecondName, Email FROM user  WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <div class="wrapper">
        <header class="container">
            <nav>
                <ul>
                    <li><a href="../indexAuth.php">Главная</a></li>
                    <li class="btn" style="margin-right: 25px;"><a href="../functions/logout.php">Выйти</a></li>
                </ul>
            </nav>
        </header>

        <div class="container feedback">
            <h2 style="font-size: 50px; text-align:center; color:chocolate">Личный кабинет</h2>
            <h2>Изменить данные</h2>
            <form action="../lib/update_user.php" method="post">
                <label for="name">Имя:</label><br>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($user['Name']) ?>" required><br>
                <label for="second_name">Фамилия:</label><br>
                <input type="text" id="second_name" name="second_name" value="<?= htmlspecialchars($user['SecondName']) ?>" required><br>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['Email']) ?>" required><br>
                <input type="submit" value="Обновить">
            </form>

            <h2>Мои Билеты</h2>
            <table class="table">
                <tr>
                    <th>Музей</th>
                    <th>Дата</th>
                    <th>Время</th>
                    <th>Описание</th>
                    <th>Цена</th>
                    <th>Действие</th>
                </tr>
                <?php
                $stmt = $conn->prepare("
                    SELECT events.name, events.event_date, events.description, events.price, museums.name as museum_name
                    FROM events
                    JOIN requests ON events.id = requests.event_id
                    JOIN museums ON events.museum_id = museums.id
                    WHERE requests.user_id = ?
                ");
                $stmt->execute([$user_id]);
                $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($events as $event) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($event['museum_name']) . "</td>";
                    echo "<td>" . htmlspecialchars(date('Y-m-d', strtotime($event['event_date']))) . "</td>";
                    echo "<td>" . htmlspecialchars(date('H:i', strtotime($event['event_time']))) . "</td>";
                    echo "<td>" . htmlspecialchars($event['description']) . "</td>";
                    echo "<td>" . htmlspecialchars($event['price']) . "</td>";
                    echo "<td><a href='../functions/cancel_event.php?event_id=" . htmlspecialchars($event['id']) . "'>Отменить</a></td>";                    echo "</tr>";
                }
                ?>
            </table>
        </div>

        <?php require_once '../blocks/footerP.php'; ?>
    </div>
</body>
</html>
