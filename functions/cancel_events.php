<?php
session_start();
require_once '../lib/db.php'; // Подключение к базе данных

if (!isset($_SESSION['id']) || !isset($_GET['event_id'])) {
    header("Location: ../functions/login.php");
    exit();
}

$user_id = $_SESSION['id'];
$event_id = $_GET['event_id'];

$stmt = $conn->prepare("DELETE FROM requests WHERE user_id = ? AND event_id = ?");
$stmt->execute([$user_id, $event_id]);

header("Location: ../user/user.php");
exit();
?>
