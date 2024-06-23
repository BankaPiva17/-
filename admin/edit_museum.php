<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../functions/login.php");
    exit();
}

require_once '../lib/db.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];

    $stmt = $conn->prepare("UPDATE museums SET name = ?, address = ?, description = ?, image_url = ? WHERE id = ?");
    if ($stmt->execute([$name, $address, $description, $image_url, $id])) {
        $message = "Музей успешно обновлен!";
    } else {
        $message = "Ошибка при обновлении музея.";
    }
}

$stmt = $conn->prepare("SELECT * FROM museums");
$stmt->execute();
$museums = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменить музей</title>
    <link rel="stylesheet" href="user.css">
</head>
<body>
    <div class="wrapper">
    <?php require_once '../blocks/headerU.php'; ?>
        <div class="container feedback">
            <h2>Изменить музей</h2>
            <?php if (isset($message)) { echo "<p>$message</p>"; } ?>
            <form method="post" action="edit_museum.php">
                <select name="id" required>
                    <option value="">Выберите музей</option>
                    <?php
                    foreach ($museums as $museum) {
                        echo "<option value='" . htmlspecialchars($museum['id']) . "'>" . htmlspecialchars($museum['name']) . "</option>";
                    }
                    ?>
                </select><br>
                <label for="name">Название музея:</label><br>
                <input type="text" id="name" name="name" required><br>
                <label for="address">Адрес:</label><br>
                <input type="text" id="address" name="address" required><br>
                <label for="description">Описание:</label><br>
                <textarea id="description" name="description" required></textarea><br>
                <label for="image_url">URL изображения:</label><br>
                <input type="text" id="image_url" name="image_url" required><br>
                <input type="submit" name="update" value="Обновить">
            </form>
        </div>
        <?php require_once '../blocks/footerU.php'; ?>
    </div>
</body>
</html>
