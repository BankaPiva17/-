<?php
// Подключение к базе данных
require_once 'db_connect.php';

// Проверка, что форма была отправлена
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event_id = $_POST['event_id'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_description = $_POST['event_description'];

    // Подготовка SQL-запроса для обновления данных
    $sql = "UPDATE events SET name=?, date=?, description=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $event_name, $event_date, $event_description, $event_id);

    // Выполнение запроса и проверка на успешность
    if ($stmt->execute()) {
        echo "Мероприятие успешно обновлено!";
    } else {
        echo "Ошибка: " . $stmt->error;
    }

    // Закрытие соединения
    $stmt->close();
    $conn->close();
}
?>
