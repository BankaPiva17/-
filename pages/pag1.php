<?php
require_once '../blocks/headerP.php';
require_once '../lib/db.php'; // Подключение к базе данных
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../functions/login.php");
    exit();
}

$user_id = $_SESSION['id'];
?>
<div class="container work">
    <h2>Мероприятия</h2>
    <div class="search">
        <input type="text" id="elastic" placeholder="Поиск..." style="height: 25px; width: 350px; border-radius: 5px; align-items:center; margin-left:650px; margin-top:15px;">
    </div>

    <?php
    // Получаем данные из таблицы events, включая название музея
    $stmt = $conn->prepare("SELECT events.id, events.name AS event_name, events.event_date, events.event_time, events.description, events.price, museums.name AS museum_name FROM events JOIN museums ON events.museum_id = museums.id ORDER BY museums.name, events.event_date, events.event_time");
    $stmt->execute();
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Группируем мероприятия по музеям
    $museums = [];
    foreach ($events as $event) {
        $museums[$event['museum_name']][] = $event;
    }
    ?>

    <ul class="elastic">
        <?php foreach ($museums as $museum_name => $events): ?>
            <div class="museum-block">
                <h3><?= htmlspecialchars($museum_name) ?></h3>
                <table>
                    <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Время</th>
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Цена</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($events as $event): ?>
                            <tr class="event-row">
                                <td><?= htmlspecialchars($event['event_date']) ?></td>
                                <td><?= htmlspecialchars($event['event_time']) ?></td>
                                <td><?= htmlspecialchars($event['event_name']) ?></td>
                                <td><?= htmlspecialchars($event['description']) ?></td>
                                <td><?= htmlspecialchars($event['price']) ?> Руб.</td>
                                <td><a href="../functions/book_event.php?event_id=<?= htmlspecialchars($event['id']) ?>" class="see--all">Хочу!</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endforeach; ?>
    </ul>
</div>

<?php require_once '../blocks/footerP.php'; ?>

<script>
    document.getElementById('elastic').addEventListener('input', function () {
        let searchValue = this.value.toLowerCase();
        let museumBlocks = document.querySelectorAll('.museum-block');

        museumBlocks.forEach(museumBlock => {
            let eventRows = museumBlock.querySelectorAll('.event-row');
            let hasVisibleEvents = false;

            eventRows.forEach(eventRow => {
                let text = eventRow.textContent.toLowerCase();
                if (text.includes(searchValue)) {
                    eventRow.style.display = '';
                    hasVisibleEvents = true;
                } else {
                    eventRow.style.display = 'none';
                }
            });

            if (hasVisibleEvents) {
                museumBlock.style.display = '';
            } else {
                museumBlock.style.display = 'none';
            }
        });
    });
</script>
</body>
</html>