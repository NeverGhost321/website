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
    <link rel="stylesheet" href="vladel.css">
    <link rel="stylesheet" href="css/slider.css">
    <script src="js/slider.js"></script>
    <script src="js/index.js"></script>
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
        
    <div class="itk-slider" id="itk-slider1">
        <button class="btn-prev"> Назад </button>
        <img class="slide-img">
        <button class="btn-next"> Вперед </button>
    </div>
    


        <!-- <h1>СЕРВИС RENAULT</h1> -->
        <!-- Add the class "main-image" to the image tag -->
        <!-- <td><img class="main-image" src="https://www.major-renault.ru/files/resources/service/97cf5eaf64.jpg"
                alt="RENAULT сервис"></td>
        <p>Сервисные центры Renault — это профессиональный сервис и внимательное отношение к каждому клиенту.
            Сервисные центры Renault обладают инструментами и оборудованием, специально предназначенными для
            обслуживания
            Вашего
            автомобиля. Сервисные консультанты всегда готовы выслушать Вас и дать все необходимые разъяснения по
            вопросам
            правильной эксплуатации и обслуживания Вашего автомобиля.
            Сотрудники сервисных центров Renault стремятся максимально сократить сроки проведения ремонтных работ, чтобы
            Вы могли
            как можно быстрее воспользоваться Вашим автомобилем.
            Безопасность, надежность и мобильность — основные принципы работы сервисной сети Renault.</p> -->
        <!-- <div class="table2">
            <table border="3" cellpadding="20">
                <tbody>
                    <tr>
                        <td align="center" colspan="3" align="center">Для новых владельцев:</td>
                    </tr>
                    <tr>
                        <td align="centre" rowspan="2">Замена масла и диагностикаа за 1000р</td>
                        <td align="centre">Акция "Климат" - 4500р</td>
                        <td align="centre">Комплексная диагностика 0р</td>
                    </tr>
                    <tr>
                        <td align="centre">Приведи друга - АКЦИЯ, -30% на ВСЕ!</td>
                        <td align="centre">ТО по фиксированной цене!</td>
                    </tr>
                </tbody>
            </table>
        </div> -->
    </main>


    <footer class="footer">
        <p>© Все права защищены</p>
    </footer>

</body>

</html>