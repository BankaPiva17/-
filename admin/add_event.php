<?php
require_once '../lib/db.php';
require_once '../blocks/headerU.php';
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $museum_id = $_POST['id'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_time = $_POST['event_time'];
    $event_description = $_POST['event_description'];
    $event_price = $_POST['event_price'];

    $stmt = $conn->prepare("INSERT INTO events (name, description, event_date, event_time, price, museum_id) VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmt->execute([$event_name, $event_description, $event_date, $event_time, $event_price, $museum_id])) {
        $message = "Мероприятие успешно добавлено!";
    } else {
        $message = "Ошибка при добавлении мероприятия.";
    }
}

// Получение списка музеев для выпадающего списка
$stmt = $conn->prepare("SELECT id, name FROM museums");
$stmt->execute();
$museums = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<main class="feedback">
    <h2>Добавить мероприятие</h2>
    
    <?php if (isset($message)) { echo "<p>$message</p>"; } ?>
    
    <form action="add_event.php" method="post">
        <label for="id">Выберите музей:</label>
        <select name="id" id="id" required>
            <option value="">Выберите музей</option>
            <?php foreach ($museums as $museum): ?>
                <option value="<?= htmlspecialchars($museum['id']) ?>"><?= htmlspecialchars($museum['name']) ?></option>
            <?php endforeach; ?>
        </select><br>
        
        <label for="event_name">Название мероприятия:</label>
        <input type="text" id="event_name" name="event_name" required><br>
        
        <label for="event_date">Дата мероприятия:</label>
        <input type="date" id="event_date" name="event_date" required><br>
        
        <label for="event_time">Время мероприятия:</label>
        <input type="time" id="event_time" name="event_time" required><br>
        
        <label for="event_description">Описание мероприятия:</label>
        <textarea id="event_description" name="event_description" required></textarea><br>
        
        <label for="event_price">Цена мероприятия:</label>
        <input type="number" id="event_price" name="event_price" step="0.01" required><br>
        
        <input type="submit" value="Добавить">
    </form>
</main>

<?php require_once '../blocks/footerU.php'; ?>
