<?php
session_start();

// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Проверяем, аутентифицирован ли пользователь
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Проверка пользователя в базе данных
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Пользователь найден
        $user = $result->fetch_assoc();
        // Здесь вы можете использовать данные пользователя, например, $user['user_id'], $user['email'], и т.д.
    } else {
        // Пользователь не найден, перенаправляем на страницу входа
        header("Location: login.html");
        exit();
    }
} else {
    // Если пользователь не аутентифицирован, перенаправляем его на страницу входа
    header("Location: login.html");
    exit();
}

// При выходе пользователя
if (isset($_POST['logout'])) {
    // Очищаем сессию и перенаправляем на страницу входа
    session_unset();
    header("Location: index.html");
    exit();
}

// Закрытие соединения с базой данных
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="icon" type="img/jpg" href="img/dnshop.jpg">
    <title>DNS SHOP</title>
    <link href="styles/style.scss" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<table border="0" width="900" cellpadding="0" cellspacing="0" align="center" bgcolor="#ff8000">
    <tr>
        <td width="150" align="center">
            <img src="img/dnshop.jpg" width="150" height="150" alt="Dns shop">
        </td>
        <td class="Zagolovok" align="center">
            <h1>DNS SHOP</h1>
        </td>
        <td width="200" bgcolor="#fce051">
            <table cellpadding="5" width="100%">
                <tr>
                    <td width="40%" align="right">Логин: </td>
                    <td align="right"><?php echo $username; ?></td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        <form method="post">
                            <input type="submit" name="logout" value="Выход">
                        </form>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<table border="0" width="900" cellpadding="5" cellpadding="0" align="center">
    <tr>
        <td align="center"><a class="button" href="sell.php">Акции</a></td>
        <td align="center"><a class="button"
                href="https://moscow.flamp.ru/filials/dns_magazin_cifrovojj_i_bytovojj_tekhniki-70000001041583354">Магазины</a>
        </td>
        <td align="center"><a class="button" href="dostavka.html">Покупателям</a></td>
        <td align="center"><a class="button" href="krasota.php">Юридическим лицам</a></td>
        <td align="center"><a class="button" href="korzina.php">Корзина</a></td>
        <td align="center"><a class="button" href="contact.php">Контакты</a></td>
    </tr>
</table>
<BR>
<table border="0" width="900" cellpadding="5" cellpadding="0" align="center">
    <tr>
        <td width="150" cellpadding="5" valign="top" align="center" bgcolor="#ff8000">
            <a class="button" href="sample.php">Бытовая техника</a><BR>
            <a class="button" href="krasota.php">Красота и здоровье</a><BR>
            <a class="button" href="smartophones.php">Смартфоны и фототехника</a><BR>
            <a class="button" href="tv.php">ТВ, консоли и аудио</a>
        <td>
        <td>
            <H1 align="center">WELCOME TO DNS</H1>
            <p align="justify">
                <img src="img/director.jpg" style="margin-right:20px;" align="left" width="180" height="140"
                    alt="Director" id="1998">
                Российская компания, владелец розничной сети, специализирующейся на продаже компьютерной, цифровой и
                бытовой техники, а также производитель компьютеров, в том числе ноутбуков, планшетов и смартфонов. По
                итогам 2019 года стала 6-й крупнейшей ритейл-компанией в России, в 2021 году - 22-й крупнейшей
                частной компанией России. В 2021 году сеть насчитывала более 2 тысяч магазинов. Штаб-квартира
                компании находится во Владивостоке.
            </p>
            <p align="justify">Группа компаний DNS обладает крупной сетью розничных магазинов по реализации цифровой и
                бытовой техники. Помимо этого, ведется производство, сборка ноутбуков и других технических товаров <B>p</B>,
                <B>br</B>, <B>h2</B>. Большую долю в объеме продаж занимает интернет-торговля. История организации
                насчитывает 10 лет, и за это время DNS стала одним из лидеров российского рынка, предлагая
                качественные товары, сервис и привлекательные цены. Штаб-квартира расположена во Владивостоке.
            </p>
            DNS Retail (русский: ООО «ДНС Ритейл", также известный на английском языке как CSN Retail LLC) является
            владельцем российской розничной сети<BR>
            <table border="1" cellpadding="20" cellspacing="5">
                <tr>
                    <td colspan="3">AMD FirePro M2000</td>
                    <td colspan="3">AMD FirePro M6000</td>
                </tr>
                <tr>
                    <td>Год выхода/актуальность</td>
                    <td>2012</td>
                    <td>2015</td>
                    <td>2012</td>
                    <td>2015</td>
                </tr>
                <tr>
                    <td>Архитектура/ядро</td>
                    <td>TeraScale 2</td>
                    <td>GCN 1.0</td>
                    <td>Tursk</td>
                    <td>Heathrow</td>
                </tr>
                <tr>
                </tr>
                <tr>
                </tr>
                <tr>
                </tr>
                <tr>
                </tr>
            </table><BR>
            Магазины в г.Москва:<BR>
            <ul class="markers" type="circle">
                <li> DNS Москва ТЦ «Круг»
                <li> DNS Москва ТЦ Водный
                <li> DNS ТЦ «ВЕСНА»
            </ul>
            <ol type="a">
                <li> DNS ТЦ «РИО»
                <li> Бунинская Аллея
                <li> Горбушкин двор
            </ol>
            <ol type="A">
                <li> метро Юго-Восточная
                </li>
                <li>Москва Коммунарка
                    <ol type="a">
                        <li>Москва ТРЦ «МИЛЯ»
                        </li>
                        <li>Москва ТРЦ Саларис
                        </li>
                    </ol>
                <li> Москва ТЦ «Парус»
            </ol>
        </td>
        <td width="190" cellpadding="5" valign="top" align="center" bgcolor="#ff8000">
            <BR><a href="https://www.dns-shop.ru/">
                <img src="img/banner1.jpg" width="200" height="100" alt="banner1"></a><BR>
            <BR><a href="https://www.dns-shop.ru/">
                <img src="img/banner2.jpg" width="200" height="100" alt="banner1"></a><BR>
            <BR><a href="https://www.dns-shop.ru/">
                <img src="img/banner3.jpg" width="200" height="100" alt="banner1"></a><BR>
        </td>
    </tr>
</table>

<footer style="background-color: #808080; color: white; text-align: center; padding: 20px 0;">
    ©Все права защищены>
</footer>
</body>
</html>