<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../functions/login.php");
    exit();
}

require_once 'db.php';

$name = $_POST['name'];
$address = $_POST['address'];
$description = $_POST['description'];
$image_url = $_POST['image_url'];

$stmt = $conn->prepare("INSERT INTO museums (name, address, description, image_url) VALUES (?, ?, ?, ?)");
if ($stmt->execute([$name, $address, $description, $image_url])) {
    $message = "Музей успешно добавлен!";
} else {
    $message = "Ошибка при добавлении музея.";
}

echo "<script type='text/javascript'>alert('$message'); window.location.href='../admin/add_museum.php';</script>";
?>
