<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../functions/login.php");
    exit();
}

require_once '../lib/db.php';
?>
        <?php require_once '../blocks/headerU.php'; ?>

        <div class="container feedback">
            <h2>Добавить экспонат</h2>
            <form action="../lib/add_exhibit_process.php" method="post">
                <label for="museum_id">ID музея:</label><br>
                <input type="text" id="museum_id" name="museum_id" required><br>
                <label for="name">Название экспоната:</label><br>
                <input type="text" id="name" name="name" required><br>
                <label for="description">Описание:</label><br>
                <textarea id="description" name="description" required></textarea><br>
                <label for="image_url">URL изображения:</label><br>
                <input type="text" id="image_url" name="image_url" ><br>
                <input type="submit" value="Добавить">
            </form>
        </div>

        <?php require_once '../blocks/footerU.php'; ?>
    </div>
</body>
</html>
