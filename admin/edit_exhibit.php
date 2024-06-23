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
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];

    $stmt = $conn->prepare("UPDATE exhibits SET name = ?, description = ?, image_url = ? WHERE id = ?");
    if ($stmt->execute([$name, $description, $image_url, $id])) {
        $message = "Экспонат успешно обновлен!";
    } else {
        $message = "Ошибка при обновлении экспоната.";
    }
}

$stmt = $conn->prepare("SELECT * FROM exhibits");
$stmt->execute();
$exhibits = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменить экспонат</title>
    <link rel="stylesheet" href="user.css">
</head>
<body>
    <div class="wrapper">
    <?php require_once '../blocks/headerU.php'; ?>
        <div class="container feedback">
            <h2>Изменить экспонат</h2>
            <?php if (isset($message)) { echo "<p>$message</p>"; } ?>
            <form method="post" action="edit_exhibit.php">
                <select name="id" required>
                    <option value="">Выберите экспонат</option>
                    <?php
                    foreach ($exhibits as $exhibit) {
                        echo "<option value='" . htmlspecialchars($exhibit['id']) . "'>" . htmlspecialchars($exhibit['name']) . "</option>";
                    }
                    ?>
                </select><br>
                <label for="name">Название экспоната:</label><br>
                <input type="text" id="name" name="name" required><br>
                <label for="description">Описание:</label><br>
                <textarea id="description" name="description" required></textarea><br>
                <label for="image_url">URL изображения:</label><br>
                <input type="text" id="image_url" name="image_url" required><br>
                <input type="submit" name="update" value="Обновить">
            </form>
        </div>
    </div>
</body>
</html>
