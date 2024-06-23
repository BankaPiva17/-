<?php
require_once 'lib/db.php'; // Подключение к базе данных
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Музеи</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div class="wrapper">
        <header class="container">
            <img class="logo" src="img/pngwing.com (3).png">
            <nav>
                <ul>
                    <li><a href="indexAuth.php">Главная</a></li>
                    <li class="active"><a href="museum.php">Музеи</a></li>
                    <li><a href="ecspon.php">Экспонаты</a></li>
                    <li><a href="sobit.php">События</a></li>
                    <li class="btn"><a href="user/user.php">Аккаунт</a></li>
                </ul>
            </nav>
        </header>

        <div class="container work">
            <h2>Наши музеи</h2>
            <div class="blocks">
                <div class="search">
                    <input type="text" id="elastic" placeholder="Поиск..." style="height: 25px; width: 350px; border-radius: 5px; align-items:center; margin-left:420px; margin-top:15px;">
                </div>
                <ul class="elastic">
                    <?php
                    $stmt = $conn->prepare("SELECT * FROM museums");
                    $stmt->execute();
                    $museums = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($museums as $museum) {
                        echo "<li class='block'>";
                        echo "<img src='" . htmlspecialchars($museum['image_url']) . "' alt=''>";
                        echo "<div class='info'>";
                        echo "<h3>" . htmlspecialchars($museum['name']) . "</h3>";
                        echo "<p>" . htmlspecialchars($museum['address']) . "</p>";
                        echo "<p>" . htmlspecialchars($museum['description']) . "</p>";
                        echo "</div>";
                        echo "<a href='pages/pag1.php?museum_id=" . htmlspecialchars($museum['id']) . "' class='see--all'>Хочу!</a>";
                        echo "</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <?php require_once 'blocks/footer.php'; ?>

    <script>
        document.getElementById('elastic').addEventListener('input', function () {
            let searchValue = this.value.toLowerCase();
            let items = document.querySelectorAll('.elastic li.block');
            items.forEach(item => {
                let text = item.textContent.toLowerCase();
                if (text.includes(searchValue)) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>