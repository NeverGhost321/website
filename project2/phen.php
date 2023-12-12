<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="icon" type="img/jpg" href="img/dnshop.jpg">
    <title>Магазин DNS</title>
    <link href="styles/style.css" rel="stylesheet" type="text/css" />
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
                <H1>DNS SHOP</H1>
            </td>
            <td width="200" bgcolor="#fce051">
                <table cellpadding="5" width="100%">

                    <tr>
                        <td width="40%" align="right">Логин: </td>
                        <td align="right"><input type="text" value="Введите логин"></td>
                    </tr>
                    <tr>
                        <td width="40%" align="right">Пароль: </td>
                        <td align="right"><input type="password" value="Введите пароль"></td>
                    </tr>
                    <tr>
                        <td width="40%" align="right"><A HREF="#"></A></td>
                        <td class="vhod" align="justify "><input type="submit" value="Вход">&nbsp;<A
                                HREF="#"></A></td>
                    </tr>
                    <tr>
                        <td width="40%" align="right"><A HREF="#"></A></td>
                        <td class="register" align="justify"><a href="register.html"> <input type="submit"
                                    value="Регистрация">&nbsp;</a></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table border="0" width="900" cellpadding="5" cellpadding="0" align="center">
        <tr>

            <td align="center"><a class="button" href="sell.html">Акции</a></td>
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
            <BR>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "root";
                $dbname = "users";
                
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                $product_id = 3;
                $sql_product = "SELECT * FROM products WHERE productId = $product_id"; // обновлено на productId
                $result_product = $conn->query($sql_product);
                
                if ($result_product->num_rows > 0) {
                    $row = $result_product->fetch_assoc();
                    
                    $name = $row["name"];
                    $description = $row["description"];
                    $price = $row["price"];
                    $quantity = $row["quantity"];
                
                    echo "
                        <p align='justify'>
                            <img src='https://ir.ozone.ru/s3/multimedia-i/c1000/6289398078.jpg' width='300' height='300' alt='Washing Machine' style='float:left; margin-right:20px;'>
                            <strong>$name</strong> - $description
                        </p>
                        <p><strong style='color: #FF5733;'>Цена:</strong> ₽ $price</p>
                        <p><strong style='color: #FF5733;'>Количество на складе:</strong> $quantity</p>
                        <button style='display:block; margin-top: 10px; padding: 10px 20px; font-size: 18px; background-color: #ee8829; color: white; border: none; border-radius: 5px; cursor: pointer;'>Купить</button>
                    ";
                } else {
                    echo "Товар не найден";
                }
                
                $conn->close();
                ?>
                <h2>Характеристики товара:</h2>
                <table border="1" cellpadding="10" cellspacing="5">
                    <tr>
                        <td>Заводские данные</td>
                        <td colspan="5">Гарантия продавца - 12 мес.</td>
                    </tr>
                    <tr>
                        <td>Общие параметры</td>
                        <td>Тип</td>
                        <td>фен</td>
                        <td>Вид</td>
                        <td colspan="2">компактный</td>
                    </tr>
                    <tr>
                        <td>Профессиональный фен</td>
                        <td colspan="5">да</td>
                    </tr>
                    <tr>
                        <td>Модель</td>
                        <td colspan="5">Dyson Supersonic HD08</td>
                    </tr>
                    <tr>
                        <td>Код производителя</td>
                        <td colspan="5">[389928-01]</td>
                    </tr>
                    <tr>
                        <td>Основной цвет</td>
                        <td colspan="5">серый</td>
                    </tr>
                    <tr>
                        <td>Дополнительный цвет</td>
                        <td colspan="5">коричневый</td>
                    </tr>
                    <tr>
                        <td>Основные характеристики и питание</td>
                        <td>Мощность</td>
                        <td>1600 Вт</td>
                        <td>Количество температурных режимов</td>
                        <td colspan="2">4</td>
                    </tr>
                    <tr>
                        <td>Количество скоростей воздушного потока</td>
                        <td colspan="5">3</td>
                    </tr>
                    <tr>
                        <td>Источник питания</td>
                        <td colspan="5">от сети</td>
                    </tr>
                    <tr>
                        <td>Напряжение питания</td>
                        <td colspan="5">220-240 В / 50-60 Гц</td>
                    </tr>
                    <tr>
                        <td>Тип мотора</td>
                        <td colspan="5">EC (BLDC)</td>
                    </tr>
                    <tr>
                        <td>Съемный фильтр</td>
                        <td colspan="5">есть</td>
                    </tr>
                    <tr>
                        <td>Функции и возможности</td>
                        <td>Независимая регулировка нагрева и воздушного потока</td>
                        <td colspan="5">есть</td>
                    </tr>
                    <tr>
                        <td>Подача холодного воздуха</td>
                        <td colspan="5">есть</td>
                    </tr>
                    <tr>
                        <td>Ионизация</td>
                        <td colspan="5">генератор ионов</td>
                    </tr>
                    <tr>
                        <td>Защита от перегрева</td>
                        <td colspan="5">есть</td>
                    </tr>
                    <tr>
                        <td>Насадки в комплекте</td>
                        <td>Количество насадок</td>
                        <td>5 шт</td>
                        <td>Насадка-диффузор</td>
                        <td colspan="2">есть</td>
                    </tr>
                    <tr>
                        <td>Насадка-концентратор</td>
                        <td colspan="5">есть</td>
                    </tr>
                    <tr>
                        <td>Другие насадки</td>
                        <td colspan="5">насадка для бережного высушивания, насадка для непослушных волос</td>
                    </tr>
                    <tr>
                        <td>Конструкция</td>
                        <td>Складная ручка</td>
                        <td colspan="5">нет</td>
                    </tr>
                    <tr>
                        <td>Вращение шнура</td>
                        <td colspan="5">нет</td>
                    </tr>
                    <tr>
                        <td>Петля для подвешивания</td>
                        <td colspan="5">нет</td>
                    </tr>
                    <tr>
                        <td>Дополнительная информация</td>
                        <td>Длина сетевого шнура</td>
                        <td>2.8 м</td>
                        <td>Комплектация</td>
                        <td colspan="2">документация, комплект насадок</td>
                    </tr>
                    <tr>
                        <td>Габариты и вес</td>
                        <td>Ширина</td>
                        <td>78 мм</td>
                        <td>Высота</td>
                        <td>245 мм</td>
                        <td>Глубина</td>
                        <td>98 мм</td>
                    </tr>
                    <tr>
                        <td>Вес</td>
                        <td colspan="5">659 г</td>
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

                <BR><a href="https://www.dns-shop.ru/"> <img src="img/banner1.jpg" width="200" height="100"
                        alt="banner1"></a><BR>
                <BR><a href="https://www.dns-shop.ru/"> <img src="img/banner2.jpg" width="200" height="100"
                        alt="banner1"></a><BR>
                <BR><a href="https://www.dns-shop.ru/"> <img src="img/banner3.jpg" width="200" height="100"
                        alt="banner1"></a><BR>
            </td>
            <!-- -->
        </tr>
        <!-- 	<tr>
        <td colspan=3 cellpadding="5" valign="top" align="center" bgcolor="#ff8000">
        ������1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        ������2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        ������3 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;(������� - ������������ �������� �� ��������)
    </td>
    </tr> -->
    </table>

    <footer style="background-color: #808080; color: white; text-align: center; padding: 20px 0;">

        ©Все права защищены>



    </footer>
</body>

</html>
