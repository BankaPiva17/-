<!DOCTYPE html>
<html>
<head>
    <title>Вход</title>
    <script type="text/javascript">
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const message = urlParams.get('message');
            if (message) {
                alert(message);
            }
        }
    </script>
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <div class="wrapper">
      

    

    <div class="feedback">
        <div class="container">
            <h2>Вход</h2>
            

            <form method="post" action="../functions/login_process.php">
                
            <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Пароль:</label><br>
        <input type="password" id="password" name="password" required><br><br>

                
                <button type="button"><a href="reg.php">Регистрация</a></button>
                <button type="submit">Войти</button>
            </form>
        </div>
    </div>

    <?php require_once '../blocks/footerP.php' ?>

</body>

</html>

