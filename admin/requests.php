<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}
require_once '../lib/db.php'; // Подключение к базе данных
?>
        <?php require_once '../blocks/headerU.php'; ?>

        <div class="container">
            <h2>Запросы пользователей</h2>
            <table>
                <tr>
                    <th>ID запроса</th>
                    <th>Имя пользователя</th>
                    <th>Фамилия пользователя</th>
                    <th>Мероприятие</th>
                    <th>Дата запроса</th>
                </tr>
                <?php
                $stmt = $conn->prepare("
                    SELECT requests.id, user.Name, user.SecondName, events.name AS event_name, requests.request_date
                    FROM requests
                    JOIN user ON requests.user_id = user.id
                    JOIN events ON requests.event_id = events.id
                ");
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $requests = $stmt->fetchAll();
                foreach ($requests as $request) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($request['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($request['Name']) . "</td>";
                    echo "<td>" . htmlspecialchars($request['SecondName']) . "</td>";
                    echo "<td>" . htmlspecialchars($request['event_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($request['request_date']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
        <footer>
            <div class="blocks container">
                <div>
                    <p>Музеи Тюменской области</p>
                </div>
            </div>
            <hr>
            <p>Copyright © 2024 Все права защищены</p>
        </footer>
    </div>
</body>
</html>
