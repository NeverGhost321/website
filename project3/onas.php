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
    <link rel="stylesheet" href="onas.css">
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
        <div class="container">
            <h1>О компании Major Auto</h1>
            <div class="page-block">
                <p>Автомобильный холдинг Major является крупнейшим автомобильным холдингом в России и одним из главных
                    игроков на автомобильном рынке. Марка Renault представлена в автосалоне компании на Новорижском
                    шоссе, который входит в состав крупнейшего дилерского центра России Major City.</p>
                <p>Клиенты автосалонов могут воспользоваться услугой бесплатной техпомощи на дорогах Москвы. Для своих
                    клиентов дилерские центры Renault предлагают полный пакет услуг: продажа автомобилей, оригинальных
                    запасных частей, аксессуаров и дополнительного оборудования, сервисное и гарантийное обслуживание,
                    кредитные и лизинговые программы, страхование, специальные условия для корпоративных клиентов,
                    тест-драйв, trade-in.</p>
                <p>Среди уникальных услуг – программа «Персональный менеджер», включающая в себя полное сопровождение
                    клиента с момента покупки автомобиля и на протяжении всего периода взаимодействия автовладельца с
                    дилерским центром.</p>
            </div>
        </div>
        <!-- Отступ между текстом и картой -->
        <div style="margin-top: 70px;"></div>
        <div style="position:relative;overflow:hidden;">
            <iframe
                src="https://yandex.ru/map-widget/v1/org/major_renault_ofitsialny_diler_renault/40054871648/?from=mapframe&ll=37.251459%2C55.789046&source=mapframe&utm_source=mapframe&z=19.4"
                width="50%" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
        </div>

        <!-- Завершение кода вставки карты -->
    </main>

    <footer class="footer">
        <p>© Все права защищены</p>
    </footer>
</body>

</html>