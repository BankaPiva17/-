<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../functions/login.php");
    exit();
}

require_once 'db.php';

$user_id = $_SESSION['id'];
$name = $_POST['name'];
$second_name = $_POST['second_name'];
$email = $_POST['email'];

// Обновление данных пользователя в базе данных
$stmt = $conn->prepare("UPDATE user SET Name = ?, SecondName = ?, Email = ? WHERE id = ?");
if ($stmt->execute([$name, $second_name, $email, $user_id])) {
    $message = "Данные успешно обновлены!";
} else {
    $message = "Ошибка при обновлении данных.";
}

// Перенаправление обратно на страницу пользователя с сообщением
echo "<script type='text/javascript'>alert('$message'); window.location.href='../user/user.php';</script>";
?>
