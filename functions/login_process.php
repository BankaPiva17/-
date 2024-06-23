<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "museum";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE Email='$email' AND Password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['Name'];
    $_SESSION['second_name'] = $row['SecondName'];
    $_SESSION['email'] = $row['Email'];
    $_SESSION['role'] = $row['Role'];

    if ($_SESSION['role'] == 'admin') {
        header("Location: ../admin/index.php");
    } else {
        header("Location: ../IndexAuth.php");
    }
} else {
    $message = "Неверный email или пароль!";
    echo "<script type='text/javascript'>alert('$message'); window.location.href='../functions/login.php';</script>";
}

$conn->close();
?>