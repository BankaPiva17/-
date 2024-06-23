<?php
require_once 'db.php'; // Подключаемся к базе данных

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Получаем данные из формы
    $event_id = $_POST['event_id'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_time = $_POST['event_time'];
    $event_description = $_POST['event_description'];
    $event_price = $_POST['event_price'];
    $museum_id = $_POST['museum_id'];

    // Проверяем, что все данные заполнены
    if (empty($event_id) || empty($event_name) || empty($event_date) || empty($event_time) || empty($event_description) || empty($event_price) || empty($museum_id)) {
        echo "Пожалуйста, заполните все поля.";
        exit;
    }

    // Обновляем данные мероприятия в базе данных
    $query = "UPDATE events SET name = ?, date = ?, time = ?, description = ?, price = ?, museum_id = ? WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$event_name, $event_date, $event_time, $event_description, $event_price, $museum_id, $event_id]);

    echo "Мероприятие успешно обновлено.";
    header("Location: edit_event.php");
    exit();
}
?>
