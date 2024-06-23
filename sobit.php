<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <div class="wrapper">
    <header class="conteiner">
      <img class="logo" src="img/pngwing.com (3).png">
      <nav>
        <ul>
          <li><a href="IndexAuth.php">Главная</a> </li>
          <li><a href="museum.php">Музеи</a></li>
          <li><a href="ecspon.php">Экспонаты</a></li>
          <li class="active"><a href="sobit.html">События</a></li>
          <li class="btn"><a href=".user/user.php">Аккаунт</a></li>

        </ul>
      </nav>
      <div class="hero conteiner">
        <div class="hero--info">
          <h2>Особенные события</h2>
          <h1>Не Пропусти!</h1>
          <p>Частеньео музеи устраивают такие мероприятия которые не входят в основную программу, но которые обязательно
            стоит посетить!</p>
          <button class="btn"><a href="#section">Выбрать музей</a></button>
        </div>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
              aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
              aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="img/sobit-pic1.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Мастеркласс "Создай свой меч"</h5>
                <p>16.06. Музей кузнечного мастерства в Тюмени</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="img/sobit-pic2.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Мастеркласс "Нарисуй свою картину"</h5>
                <p>17.06 В музее Музей И. Я. Словцова</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="img/sobit-pic3.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Лекция по истории Колокольниковых</h5>
                <p>20.06 В Усадьбе Колокольниковых</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Предыдущий</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Следующий</span>
          </button>
        </div>
      </div>
      <div class="zap" id="section">
        <h4>Заинтересовались?</h4>
        <p>Записаться на все эти интересные мастер-классы вы можете прямо здесь!</p>
        <div class="button-container">
            <span class="arrow"><img src="img/arrow.png" alt=""></span>
            <a href="museum.php">Выбрать музей</a>
        </div>
    </div>
    </div>
    <?php require_once 'blocks/footer.php' ?>
</body>
</html> 