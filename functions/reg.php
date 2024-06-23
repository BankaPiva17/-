<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
    <link rel="stylesheet" href="../css/main.css">
    <script type="text/javascript">
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            if (password != confirmPassword) {
                alert("Пароли не совпадают!");
                return false;
            }
            return true;
        }

        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const message = urlParams.get('message');
            if (message) {
                alert(message);
            }
        }
    </script>
</head>
<body>
<div class="wrapper">
    <div class="feedback">
        <div class="container">
    <h2>Регистрация</h2>
    <form action="../functions/reg_process.php" method="post" onsubmit="return validateForm()">
                <div class="inline">
                    <div>
        <label for="name">Имя:</label><br>
        <input type="text" id="name" name="name" required><br>
        </div>
                    <div>
        <label for="second_name">Фамилия:</label><br>
        <input type="text" id="second_name" name="second_name" required><br>
        </div>
                </div>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Пароль:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="confirm_password">Подтвердите пароль:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>
        <button type="submit">Регистрация</button>
    </form>
        </div>
        </div>
        </div>


    <?php require_once '../blocks/footerP.php' ?>
</body>
</html>