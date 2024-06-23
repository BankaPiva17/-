<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../functions/login.php");
    exit();
}

require_once '../lib/db.php';
?>
        <?php require_once '../blocks/headerU.php'; ?>


        <div class="container">
            <h1>Список пользователей</h1>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Email</th>
                    <th>Роль</th>
                </tr>
                <?php
                $stmt = $conn->prepare("SELECT id, Name, SecondName, Email, Role FROM user");
                $stmt->execute();
                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($users as $user) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($user['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($user['Name']) . "</td>";
                    echo "<td>" . htmlspecialchars($user['SecondName']) . "</td>";
                    echo "<td>" . htmlspecialchars($user['Email']) . "</td>";
                    echo "<td>" . htmlspecialchars($user['Role']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>

        <?php require_once '../blocks/footerU.php'; ?>
    </div>
</body>
</html>
