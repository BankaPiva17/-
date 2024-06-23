
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "museum";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$second_name = $_POST['second_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if ($password != $confirm_password) {
    $message = "Пароли не совпадают!";
    echo "<script type='text/javascript'>alert('$message'); window.location.href='../admin/add_admin.php';</script>";
    $conn->close();
    exit();
}

$sql = "SELECT * FROM user WHERE Email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $message = "Пользователь с таким email уже существует!";
    echo "<script type='text/javascript'>alert('$message'); window.location.href='../admin/add_admin.php';</script>";
    $conn->close();
    exit();
}


$sql = "INSERT INTO user (Name, SecondName, Email, Password, Role)
        VALUES ('$name', '$second_name', '$email', '$password', 'admin')";

if ($conn->query($sql) === TRUE) {
    $message = "Администратор успешно добавлен!";
    echo "<script type='text/javascript'>alert('$message'); window.location.href='../admin/index.php';</script>";
} else {
    $message = "Ошибка: " . $sql . "<br>" . $conn->error;
    echo "<script type='text/javascript'>alert('$message'); window.location.href='../admin/add_admin.php';</script>";
}

$conn->close();
?>