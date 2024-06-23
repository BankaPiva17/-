<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div class="wrapper">
        <header class="conteiner">
            <img class="logo" src="img/pngwing.com (3).png">
            <nav>
                <ul>
                    <li class="active"><a href="/">Главная</a> </li>
                    <li><a href="museum.php">Музеи</a></li>
                    <li><a href="ecspon.php">Экспонаты</a></li>
                    <li><a href="sobit.php">События</a></li>
                    <li class="btn"><a href="./user/user.php">Аккаунт</a></li>

                </ul>
            </nav>
        </header>
        <div class="hero conteiner">
            <div class="hero--info">
                <h2>Брашюра</h2>
                <h1>Музеи Тюменской области</h1>
                <p>Тюменская область обладает одними из редчайших коллекций историй современности. Если желаете
                    познакомится с нашим достоянием, то ждем в гости!</p>
                <button class="btn">Выбрать музей</button>
            </div>
            <img src="img/glav.jpg" alt="">
        </div>



        <div class="conteiner trending">
            <a href="museum.php" class="see--all">Все музеи</a>
            <h3>Топ музеев за последний месяц</h3>
            <div class="museum">
                <div class="ff">
                    <div class="block">
                        <img src="img/pic/5.jpg">
                        <p>Усадьба Колокольниковых</p>
                    </div>
                    <span class="fire"><img src="img/fire.svg" alt="">70 посещений</span>
                </div>
                <div class="ff">
                    <div class="block">
                        <img src="img/pic/6.jpg">
                        <p>Музей И. Я. Словцова</p>

                    </div>
                    <span class="fire"><img src="img/fire.svg" alt="">70 посещений</span>
                </div>
                <div class="ff">
                    <div class="block">
                        <img src="img/pic/3.jpg">
                        <p>Музей природы и человека</p>

                    </div>
                    <span class="fire"><img src="img/fire.svg" alt="">70 посещений</span>

                </div>
            </div>
        </div>
        <div class="conteiner big--text">
            <P>Сеть государственных и муниципальных музеев в Тюменской области включает 35 музеев. За 1 квартал 2024
                года музеи Тюменской области посетили 436,51 тыс. человек. Музеями открыто 160 новых выставочных
                проектов и экспозиций, проведено 4 249 культурно-образовательных мероприятий и 7 113 экскурсий.

                Учреждениями культуры организовано 766 мероприятий, популяризирующих декоративно-прикладное искусство,
                число посетителей составило 189,577 тыс. человек.</P>

        </div>
        <div class="container banner">
            <img src="img/ian-dooley-ZLBzMGle-nE-unsplash.jpg" alt="">
        </div>
    </div>

    <div class="features">
        <h2>Что у нас есть интересного?</h2>
        <div class="container">
            <div class="info">
                <div class="block">
                    <img class="icon" src="img/vist.png" alt="">
                    <h3>Экскурсии</h3>
                    <p>музеи проводят как общие, так и специальные экскурсии для посетителей, чтобы рассказать им о
                        коллекциях и истории музея.</p>
                    <img class="arr" src="img/arrow.png" alt="">
                </div>
            </div>
            <div class="info">
                <div class="block">
                    <img class="icon" src="img/cart.png" alt="">
                    <h3>Выставки и экспозиции</h3>
                    <p>музеи регулярно организуют выставки произведений и предметов искусства, исторические экспозиции,
                        археологические находки и многое другое.</p>
                    <img class="arr" src="img/arrow.png" alt="">
                </div>
            </div>
            <div class="info">
                <div class="block">
                    <img class="icon" src="img/vist2.png" alt="">
                    <h3>Лекции и мастер-классы</h3>
                    <p>музеи приглашают специалистов, исследователей и художников для проведения лекций и мастер-классов
                        для посетителей.</p>
                    <img class="arr" src="img/arrow.png" alt="">
                </div>


            </div>
        </div>
    </div>
    <div class="wrapper">
        <div class="container projects">
            <h3>Что мы можем показать?</h3>
            <div class="images">
                <img id="image1" src="img/pic1.jpg" alt="">
                <img id="image2" src="img/pic2.jpg" alt="">
                <img id="image3" src="img/pic3.jpg" alt="">
                <img id="image4" src="img/pic4.jpg" alt="">
                <img id="image5" src="img/pic5.jpg" alt="">
            </div>
            <a href="ecspon.php" class="see--all">Коллекции</a>
        </div>
        <!-- <div class="container number">
            <h3>Онлайн экскурсии</h3>
            <p>Если вам не хочется выходить из дома или нет возможности посещать музеи, то специально для вас мы
                предоставляем возможность в онлане ознакомиться с культурным наследие Тюменской области</p>
            <div class="blocks">
                <div>
                    <h4>Запись на онлайн экскурсию</h4>
                    <p>Оставьте свой номер телефона и наш менеджер с вами свяжется для уточнения даты и время проведения
                        экскурсии!</p>
                </div>
                <div>
                    <input type="tel" id="NumberField" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required
                        placeholder="+7-(xxx)-xxx-xx-xx">
                    <button onclick="CheckNumber()">Отправить</button>
                </div>
            </div>
        </div>

    </div>

    <script>
        function CheckNumber() {
            let number = document.querySelector('#NumberField').value;
            if (number.length !== 12 && number.length !== 11) {
                alert('Неправильно введены данные :с');
            } else {
                alert('Мы скоро с вами свяжемся!');
            }
        }
    </script> -->
    <?php require_once 'blocks/footer.php' ?>
</body>

</html>