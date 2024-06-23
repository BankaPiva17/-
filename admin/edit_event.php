<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../functions/login.php");
    exit();
}

require_once '../lib/db.php';

// Сохраняем выбор мероприятия в сессии
if (isset($_POST['event_id_select'])) {
    $_SESSION['event_id'] = $_POST['event_id_select'];
}

// Получение списка мероприятий для выпадающего списка
$stmt = $conn->prepare("SELECT id, name FROM events");
$stmt->execute();
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Получение списка музеев для выпадающего списка
$stmt = $conn->prepare("SELECT id, name FROM museums");
$stmt->execute();
$museums = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Получаем информацию о выбранном мероприятии
$event = null;
if (isset($_SESSION['event_id'])) {
    $event_id = $_SESSION['event_id'];
    $stmt = $conn->prepare("SELECT * FROM events WHERE id = ?");
    $stmt->execute([$event_id]);
    $event = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Обработка запроса на обновление
if (isset($_POST['update'])) {
    $event_id = $_POST['event_id'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_time = $_POST['event_time'];
    $event_description = $_POST['event_description'];
    $event_price = $_POST['event_price'];
    $museum_id = $_POST['museum_id'];

    // Проверяем, что все данные заполнены
    if (empty($event_id) || empty($event_name) || empty($event_date) || empty($event_time) || empty($event_description) || empty($event_price) || empty($museum_id)) {
        $message = "Пожалуйста, заполните все поля.";
    } else {
        $stmt = $conn->prepare("UPDATE events SET name = ?, description = ?, event_date = ?, event_time = ?, price = ?, museum_id = ? WHERE id = ?");
        $result = $stmt->execute([$event_name, $event_description, $event_date, $event_time, $event_price, $museum_id, $event_id]);

        if ($result) {
            $message = "Мероприятие успешно обновлено!";
        } else {
            $message = "Ошибка при обновлении мероприятия.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменить мероприятие</title>
    <link rel="stylesheet" href="user.css">
    <script>
        function submitForm() {
            document.getElementById("selectForm").submit();
        }
    </script>
</head>
<body>
    <div class="wrapper">
        <?php require_once '../blocks/headerU.php'; ?>
        <div class="container feedback">
            <h2>Изменить мероприятие</h2>
            <?php if (isset($message)) { echo "<p>$message</p>"; } ?>
            
            <form id="selectForm" method="post" action="edit_event.php">
                <label for="event_id_select">Выберите мероприятие:</label>
                <select id="event_id_select" name="event_id_select" onchange="submitForm()" required>
                    <option value="">Выберите мероприятие</option>
                    <?php foreach ($events as $event_item): ?>
                        <option value="<?= htmlspecialchars($event_item['id']) ?>" <?= isset($event) && $event['id'] == $event_item['id'] ? 'selected' : '' ?>><?= htmlspecialchars($event_item['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </form>

            <?php if (isset($event)): ?>
                <form method="post" action="edit_event.php">
                    <!-- Добавляем скрытое поле для передачи event_id -->
                    <input type="hidden" id="event_id" name="event_id" value="<?= htmlspecialchars($event['id']) ?>">
                    
                    <label for="event_name">Название мероприятия:</label>
                    <input type="text" id="event_name" name="event_name" value="<?= htmlspecialchars($event['name']) ?>" required><br>
                    
                    <label for="event_date">Дата мероприятия:</label>
                    <input type="date" id="event_date" name="event_date" value="<?= htmlspecialchars($event['event_date']) ?>" required><br>
                    
                    <label for="event_time">Время мероприятия:</label>
                    <input type="time" id="event_time" name="event_time" value="<?= htmlspecialchars($event['event_time']) ?>" required><br>
                    
                    <label for="event_description">Описание мероприятия:</label>
                    <textarea id="event_description" name="event_description" required><?= htmlspecialchars($event['description']) ?></textarea><br>
                    
                    <label for="event_price">Цена мероприятия:</label>
                    <input type="number" id="event_price" name="event_price" step="0.01" value="<?= htmlspecialchars($event['price']) ?>" required><br>
                    
                    <label for="museum_id">Музей:</label>
                    <select id="museum_id" name="museum_id" required>
                        <?php foreach ($museums as $museum): ?>
                            <option value="<?= htmlspecialchars($museum['id']) ?>" <?= $museum['id'] == $event['museum_id'] ? 'selected' : '' ?>><?= htmlspecialchars($museum['name']) ?></option>
                        <?php endforeach; ?>
                    </select><br>
                    
                    <input type="submit" name="update" value="Обновить">
                </form>
            <?php endif; ?>
        </div>
        <?php require_once '../blocks/footerU.php'; ?>
    </div>
</body>
</html>
