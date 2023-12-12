<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Проверка авторизации пользователя (пример)
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Получение данных пользователя из базы данных
    $sql = "SELECT name, email FROM users WHERE id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_name = $row['name'];
        $user_email = $row['email'];
    }
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Автосалон Renault</title>
    <link rel="stylesheet" href="yslygi.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap');
    </style>



</head>

<body>
    <header>
        <div class="header">
        <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td><img width="150" align="right" src="img(header)/pngwing.com (1).png" alt="логотип RENAULT"></td>
                    <td align="center">
                        <h1>Автосалон RENAULT</h1>
                    </td>
                    <td width="200">
            <?php if (isset($_SESSION['user_id'])): ?>
    <td width="200">
        <table cellpadding="5" width="100%">
            <tr>
                <td><strong>Имя:</strong> <?php echo $user_name; ?></td>
            </tr>
            <tr>
                <td><strong>Email:</strong> <?php echo $user_email; ?></td>
            </tr>
            <tr>
                <td>
                <form method="post" action="logout.php">
    <input type="hidden" name="logout" value="1">
    <button type="submit">Выход</button>
</form>
                </td>
            </tr>
        </table>
    </td>
<?php endif; ?>
                        
                          
                         
                        </table>
                    </td>
                </tr>
            </table>
        </div>

        <div class="border">
            <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td>
                        <ul>
                            <li><a href="main.php">Главная</a></li>
                            <li><a href="modul.php">Модельный ряд</a></li>
                            <li><a href="onas.php">О нас</a></li>
                            <li><a href="kontakt.php">Контакты</a></li>
                            <li><a href="korzina.php">Корзина</a></li>
                        </ul>
                    </td>
                </tr>
            </table>
        </div>
    </header>
    
    <main class="main">
        <table id="main" border="0" width="100%" cellpadding="5" cellspacing="0" align="center">
            <tr>
                <td width="150" cellpadding="5" valign="top" align="left">
                    <a href="pokupateliam.php">Покупателям</a><br>
                    <a href="vladel.php">Владельцам</a><br>
                    <a href="specpredl.php">Спецпредложения</a><br>
                    <a href="novosti.php">Новости</a><br>
                    <a href="yslygi.php">Услуги</a>
                </td>
            </tr>
        </table>
    
        <section class="product">
            <div class="product-image">
                <img src="https://www.major-renault.ru/files/resources/service/renault_logan_326033.jpg" alt="Плановое ТО"
                    width="300px">
            </div>
            <div class="product-info">
                <h2>Плановое ТО</h2>
                <p>Единая цена на комплекс-сервис "Регулярное техническое обслуживание" включает в себя стоимость работы,
                    запасных частей и расходных материалов у всех официальных дилеров Renault.</p>
                <p> Renault рекомендует проводить техническое обслуживание вашего автомобиля
                    в соответствии со специально адаптированным под российские условия эксплуатации
                    Комплекс-сервисом "Регулярное техническое обслуживание".</p>
                <p> Регионы России поделены на две тарифные зоны в соответствии со стоимостью нормо-часа.</p>
                <p> Обслуживая свой автомобиль у официальных дилеров Renault, Вы получаете 1 год гарантии на оригинальные запчасти и работы.</p>
                <p> Обслуживание в официальной сети Renault доступно, выгодно и надежно.</p>
                <p><b>Цена: Уточняйте по номеру +7 (495) 153-77-72</b></p>
                <button class="add-to-cart">Добавить в корзину</button>
            </div>
        </section>

        <section class="product2">
            <div class="product-image2">
                <img src="https://www.major-renault.ru/files/resources/service/7d7ece2665.jpg" alt="Кузовной ремонт"
                    width="300px">
            </div>
            <div class="product-info">
                <h2>Кузовной ремонт</h2>
                <p>Кузовная станция выполняет восстановительный ремонт кузова автомобиля любой категории сложности.</p>
                <p>Спектр услуг варьируется от локального косметического ремонта мелких повреждений до конструктивного восстановления геометрии кузова 
                    с заменой или восстановлением любых несущих элементов. Окраска c использованием самых 
                    современных технологий и материалов. Наши специалисты смогут оказать Вам квалифицированную и своевременную консультационную помощь 
                    по всем вопросам, связанным с восстановлением автомобиля от описания технологии и этапов ремонта до 
                    составления полной сметы восстановительного ремонта.</p>
                <p> Современный автомобиль является сочетанием сложнейших технических элементов и конструкций, и высочайшего качества отделочных материалов. 
                    Кузов является основной составляющей частью автомобиля, поэтому мы уделяем особое внимание данному направлению. 
                    Правильность такого решения подтверждается стабильно высокой оценкой результатов нашими клиентами.</p>
                <p> Обслуживание в официальной сети Renault доступно, выгодно и надежно.</p>
                <p><b>Цена: Уточняйте по номеру +7 (495) 153-77-72</b></p>
                <button class="add-to-cart">Добавить в корзину</button>
            </div>
        </section>

        <section class="product3">
            <div class="product-image3">
                <img src="https://www.major-renault.ru/files/resources/service/8911419e48.jpg" alt="RENAULT Assistance"
                    width="300px">
            </div>
            <div class="product-info">
                <h2>RENAULT Assistance</h2>
                <p>RENAULT Assistance — служба техпомощи на дорогах.
                    Самое быстрое и эффективное решение проблем Вашего автомобиля.</p>
                <p>RENAULT Assistance — первая служба технической помощи в России, работающая по новым европейским стандартам качества услуг.</p>
                <p> Служба RENAULT Assistance работает в Москве и Московской области, в Уфе и Республике Башкортостан, в Воронеже и Воронежской области, 
                    Владивостоке и пригороде.</p>
                <p> Обслуживание в официальной сети Renault доступно, выгодно и надежно.</p>
                <p><b>Цена: Уточняйте по номеру +7 (495) 153-77-72</b></p>
                <button class="add-to-cart">Добавить в корзину</button>
            </div>
        </section>
    
    </main>
    <footer class="footer">
        <p>© Все права защищены</p>
    </footer>
    </body>
    
    </html>