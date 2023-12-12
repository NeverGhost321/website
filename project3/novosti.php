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
    <link rel="stylesheet" href="novosti.css">
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
        <div class="vse-novosti">
            <div class="novosti product">
                <img src="https://www.major-renault.ru/images/news/news_list/crop_1.jpg" alt="Renault news 1">
                <p class="description">Автомобили Renault в России будут...</p>
                <div class="description full-description">
                    <h2>Автомобили Renault в России будут обслуживаться в обычном порядке.</h2>
                    <p>С уходом Renault из России для владельцев автомобилей французской компании ничего не изменится - это следует из соглашения, заключенного АВТОВАЗом, ставшим правопреемником Renault, и российскими дилерами Renault.</p>
                    <p>Согласно достигнутой договоренности, до конца текущего месяца между дилерами Renault и АВТОВАЗом будет налажено сотрудничество по обслуживанию автомобилей по гарантии. Ремонт и обслуживание авто по-прежнему будет осуществляться в дилерских центрах Renault с полным сохранением гарантийных условий и с использованием оригинальных запасных частей. Также для владельцев Renault по-прежнему продолжит работать и горячая линия.</p>
                </div>
            </div>
            <div class="novosti product">
                <img src="https://www.major-renault.ru/images/news/news_list/crop_7_1.jpg" alt="Renault news 2">
                <p class="description">Легендарный "Москвич" возвращается.</p>
                <div class="description full-description">
                    <h2>Легендарный “Москвич” возвращается.</h2>
                    <p>Ранее на заводе «Рено Россия» производственной мощностью 188 тысяч автомобилей в год выпускались кроссоверы Renault Duster, Renault Kaptur, купе-кроссовер Renault Arkana, а также кроссовер Nissan Terrano. Однако из-за введения международных санкций в марте 2022 года советом директоров Renault Group было принято решение приостановить работу предприятия на неопределенное время. </p>
                    <p>Согласно подписанным соглашениям, владельцем 100% акций ЗАО «Рено Россия» теперь является правительство Москвы. Таким образом московские власти будут принимать самостоятельные решения о дальнейшей судьбе предприятия. </p>
                </div>
            </div>
            <div class="novosti product">
                <img src="https://www.major-renault.ru/images/news/news_list/crop_8_1.jpg" alt="Renault news 3">
                <p class="description">Renault оформила патент на новый компактный седан.</p>
                <div class="description full-description">
                    <h2>Renault оформила патент на новый компактный седан.</h2>
                    <p>По внешнему виду и техническому содержанию Taliant схож с седаном Dacia Logan третьего поколения, к тому же модели построены на одной и той же модульной платформе CMF-B и имеют практически одинаковые габаритные размеры. Тем не менее, есть и отличия. Например, у Taliant менее крупная, чем у Dacia Logan, решетка радиатора, иная геометрия капота, а также другая форма передних фар и задних фонарей.</p>
                    <p>Седан Renault Taliant оснащается трехцилиндровым атмосферным 65-ти сильным двигателем объемом 1,0 литра с пятиступенчатой механической коробкой переключения передач, турбомотором аналогичного объема мощностью 90 л.с., а также 100-сильной работающей на пропане версией, оснащенными на выбор шестиступенчатой МКПП или вариатором. </p>
                </div>
            </div>
            <div class="novosti product">
                <img src="https://www.major-renault.ru/images/news/news_list/crop_9_1.jpg" alt="Renault news 4">
                <p class="description">В России продано 500 000 "Дастеров".</p>
                <div class="description full-description">
                    <h2>В России продано 500 000 "Дастеров".</h2>
                    <p>Цифра в полмиллиона “Дастеров” основана на анализе данных Ассоциации европейского бизнеса по продажам модели с момента ее запуска на российском рынке в 2012 году. Так, по подсчетам АЕБ, до марта 2022 года российскими дилерами Renault было продано 501 053 кроссоверов Duster. Таким образом полумиллионная отметка объема реализации кроссовера Рено Дастер на рынке России преодолена.</p>
                    <p>Сборка кроссовера Duster первого поколения стартовала в конце 2011 года, а в первые месяцы 2012 года модель стала доступна в салонах официальных российских дилеров. В марте прошлого года в продажу поступил Дастер второго поколения. На сегодняшний день купить Renault Duster можно в любой из 13 доступных на территории нашей страны модификациях. Диапазон стоимости Рено Дастер на российском рынке составляет от 1 618 000 до 2 229 000 рублей.</p>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer">
        <p>© Все права защищены</p>
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const products = document.querySelectorAll('.product');
            products.forEach(product => {
                product.addEventListener('click', () => {
                    const description = product.querySelector('.full-description');
                    if (description.style.display === 'block') {
                        description.style.display = 'none';
                    } else {
                        description.style.display = 'block';
                    }
                });
            });
        });
    </script>
</body>

</html>