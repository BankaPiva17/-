<?php
session_start();
require_once '../lib/db.php'; // Подключение к базе данных

if (!isset($_SESSION['id']) || !isset($_GET['event_id'])) {
    header("Location: ../functions/login.php");
    exit();
}

$user_id = $_SESSION['id'];
$event_id = $_GET['event_id'];

$stmt = $conn->prepare("INSERT INTO requests (user_id, event_id) VALUES (?, ?)");
$stmt->execute([$user_id, $event_id]);

header("Location: ../user/user.php");
exit();
?>
