<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}
?>
        <?php require_once '../blocks/headerU.php'; ?>


        <div class="container feedback">
            <h2>Добавить нового администратора</h2>
            <form action="./../lib/add_admin_process.php" method="post">
                <label for="name">Имя:</label><br>
                <input type="text" id="name" name="name" required><br>
                <label for="second_name">Фамилия:</label><br>
                <input type="text" id="second_name" name="second_name" required><br>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required><br>
                <label for="password">Пароль:</label><br>
                <input type="password" id="password" name="password" required><br><br>
                <label for="confirm_password">Подтвердите пароль:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>
                <input type="submit" value="Добавить администратора">
            </form>
        </div>

        <?php require_once '../blocks/footerU.php'; ?>
    </div>
</body>
</html>