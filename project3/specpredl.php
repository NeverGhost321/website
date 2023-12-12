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
    <link rel="stylesheet" href="specpredl.css">
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
                <img src="https://www.major-renault.ru/images/actions/actions_list/crop_768x400_3.jpg" alt="Renault spec1">
                <p class="description">Подарок при прохождении ТО</p>
                <div class="description full-description">
                    <h2>ПРОЙДИТЕ ТО И ПОЛУЧИТЕ КАРТУ ПОМОЩИ НА ДОРОГЕ RENAULT ASSISTANCE В ПОДАРОК!</h2>
                    <p>Владельцы автомобилей Renault, прошедшие определенное техническое обслуживание (ТО) в период проведения данного специального предложения, получают карту помощи на дороге Renault Assistance в подарок.</p>
                    <small>*Предложение действует с 1 декабря 2022 г. по 31 января 2023 г. и распространяется на владельцев автомобилей Renault, прошедших техническое обслуживание (ТО) в официальных Дилерских центрах Renault, участвующих в данной программе. При прохождении определенного ТО можно получить карту помощи на дороге Renault Assistance (Рено ассистанс): при прохождении ТО-1, ТО-2 — карту Renault Assistance Plus (Рено ассистанс плюс);при прохождении ТО-3, ТО-4 — карту Renault Assistance Drive (Рено ассистанс драйв); при прохождении ТО-5 и далее — карту Renault Assistance Optimal (Рено ассистанс оптимал). Услуги помощи на дороге оказывает общество с ограниченной ответственностью «Ассистанс Поволжье» (адрес: 420124, Казань, пр-т Ямашева, д. 45А, пом. 1018, офис 1, ОГРН: 1211600063443, ИНН: 1657270407). Услуга не подлежит обязательной сертификации и лицензированию. Узнать подробную информацию о предложении можно у сотрудников официального дилерского центра Renault. Предложение ограничено, список дилеров Renault, участвующих в данном предложении, представлен на www.lada.ru. Не является публичной офертой.</small>
                </div>
            </div>
            <div class="novosti product">
                <img src="https://www.major-renault.ru/images/actions/actions_list/crop_768x400_1.jpg" alt="Renault spec2">
                <p class="description">Бесплатная комплексная диагностика по 30 пунктам</p>
                <div class="description full-description">
                    <h2>ПОЧУВСТВУЙТЕ СЕБЯ УВЕРЕННЕЕ НА ДОРОГАХ ВНЕ ЗАВИСИМОСТИ ОТ СЕЗОНА!</h2>
                    <p>Перечень проверок вашего автомобиля:</p>
                    <ol>
                        <li>Проверка ходовой части (люфты, повреждения, крепление, уплотнение, негерметичность)</li>
                        <li>Двигатель и моторный отсек</li>
                        <li>Проверка тормозной системы</li>
                        <li>Проверка уровней технических жидкостей</li>
                        <li>Электропроводка и оборудование</li>
                    </ol>
                    <br><br><br><br><br>
                    <small>*Предложение действует с 1 декабря 2022 г. по 31 января 2023 г. Данную диагностику клиент может получить за 0 рублей при условии покупки запасных частей и услуг по их замене у официального дилера Renault, проводящего диагностику; без данного условия стоимость диагностики по 30 пунктам — 799 рублей. Цена указана в рублях с учетом НДС на сезонную комплексную диагностику, которая включает следующие проверки: двигателя и моторного отсека, уровней технических жидкостей, ходовой части, тормозной системы, электропроводки и оборудования. Предложение ограничено, список дилеров Renault, участвующих в данном предложении, представлен на www.lada.ru. Не является публичной офертой.</small>
                </div>
            </div>
            <div class="novosti product">
                <img src="https://www.major-renault.ru/images/actions/actions_list/crop_768x400_2.jpg" alt="Renault spec3">
                <p class="description">Сервис в рассрочку</p>
                <div class="description full-description">
                    <h2>РАССРОЧКА НА УСЛУГИ СЕРВИСА И ЗАПАСНЫЕ ЧАСТИ ОТ 3 МЕСЯЦЕВ!</h2>
                    <ol>
                        <li>Получите сервисную услугу или приобретите части RENAULT</li>
                        <li>Оплачивайте стоимость услуг или запасных частей без переплат</li>
                    </ol>
                    <small>*Скидки по данным специальным предложениям и текущим акциям в официальных дилерских центрах не суммируются. Одобрение происходит на усмотрение банков — партнеров программы (ПАО «Совкомбанк», генеральная лицензия Банка России №963 от 5 декабря 2014 г.; АО «Тинькофф Банк», лицензия ЦБ РФ №2673; ООО «Микрофинансовая компания «Т-Финанс» лицензия №2-12-01-77-001895) в соответствии с условиями банков. Предложения не являются публичной офертой, все указанные цены и скидки носят информационный характер, подробную информацию о данной программе уточняйте у сотрудников официального дилерского центра Renault. Список дилеров Renault, участвующих в данной программе, ограничен и представлен на www.lada.ru.</small>
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