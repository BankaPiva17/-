<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}
?>
        <?php require_once '../blocks/headerU.php'; ?>


        <div class="container feedback">
            <h2>Добавить музей</h2>
            <form action="../lib/add_museum_process.php" method="post">
                <label for="name">Название музея:</label><br>
                <input type="text" id="name" name="name" required><br>
                <label for="address">Адрес:</label><br>
                <input type="text" id="address" name="address" required><br>
                <label for="description">Описание:</label><br>
                <textarea id="description" name="description" required></textarea><br>
                <label for="image_url">URL изображения:</label><br>
                <input type="text" id="image_url" name="image_url"><br><br>
                <input type="submit" value="Добавить музей">
            </form>
        </div>

        <?php require_once '../blocks/footerU.php'; ?>
    </div>
</body>
</html>