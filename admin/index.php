<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}
?>
        <?php require_once '../blocks/headerU.php'; ?>


        <div class="container welcome">
            <h1>Добро пожаловать в админскую панель</h1>
            <p>Используйте меню для навигации по функциям админской панели.</p>
        </div>

        <?php require_once '../blocks/footerU.php'; ?>
    </div>
</body>
</html>