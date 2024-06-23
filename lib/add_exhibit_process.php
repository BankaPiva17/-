<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../functions/login.php");
    exit();
}

require_once 'db.php';

$museum_id = $_POST['museum_id'];
$name = $_POST['name'];
$description = $_POST['description'];
$image_url = $_POST['image_url'];

$stmt = $conn->prepare("INSERT INTO exhibits (museum_id, name, description, image_url) VALUES (?, ?, ?, ?)");
if ($stmt->execute([$museum_id, $name, $description, $image_url])) {
    $message = "Экспонат успешно добавлен!";
} else {
    $message = "Ошибка при добавлении экспоната.";
}

echo "<script type='text/javascript'>alert('$message'); window.location.href='../admin/add_exhibit.php';</script>";
?>
