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
                
                $product_id = 2;
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
                            <img src='https://main-cdn.sbermegamarket.ru/big1/hlr-system/-2/02/23/33/41/56/23/100024243946b0.jpg' width='300' height='300' alt='Washing Machine' style='float:left; margin-right:20px;'>
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
                
                <h2 style="text-align: center; white-space: nowrap; margin-right: 350px;">Характеристики товара:</h2>
                <table border="1" cellpadding="10" cellspacing="5">
                    <tr>
                        <td>Заводские данные</td>
                        <td colspan="5">Гарантия продавца / производителя - 12 мес.</td>
                    </tr>
                    <tr>
                        <td>Страна-производитель</td>
                        <td colspan="5">Малайзия</td>
                    </tr>
                    <tr>
                        <td>Общие параметры</td>
                        <td>Тип</td>
                        <td>микроволновая печь</td>
                        <td>Модель</td>
                        <td colspan="2">Samsung ME88SUG/BW</td>
                    </tr>
                    <tr>
                        <td>Основной цвет</td>
                        <td colspan="5">черный</td>
                    </tr>
                    <tr>
                        <td>Дополнительный цвет</td>
                        <td colspan="5">черный</td>
                    </tr>
                    <tr>
                        <td>Цвет, заявленный производителем</td>
                        <td colspan="5">черный</td>
                    </tr>
                    <tr>
                        <td>Основные характеристики</td>
                        <td>Внутренний объем</td>
                        <td>23 л</td>
                        <td>Внутреннее покрытие камеры</td>
                        <td colspan="2">биокерамическая эмаль</td>
                    </tr>
                    <tr>
                        <td>Поворотный стол</td>
                        <td colspan="5">есть</td>
                    </tr>
                    <tr>
                        <td>Диаметр поддона</td>
                        <td colspan="5">28.8 см</td>
                    </tr>
                    <tr>
                        <td>Тип дверцы</td>
                        <td colspan="5">навесная</td>
                    </tr>
                    <tr>
                        <td>Тип открывания дверцы</td>
                        <td colspan="5">кнопка</td>
                    </tr>
                    <tr>
                        <td>Функции и управление</td>
                        <td>Вид управления</td>
                        <td>кнопки</td>
                        <td>Дисплей</td>
                        <td colspan="2">есть</td>
                    </tr>
                    <tr>
                        <td>Часы</td>
                        <td colspan="5">есть</td>
                    </tr>
                    <tr>
                        <td>Отключение звукового сигнала</td>
                        <td colspan="5">нет</td>
                    </tr>
                    <tr>
                        <td>Таймер</td>
                        <td colspan="2">есть</td>
                        <td>Время таймера</td>
                        <td colspan="2">99 мин</td>
                    </tr>
                    <tr>
                        <td>Отсрочка старта</td>
                        <td colspan="5">есть</td>
                    </tr>
                    <tr>
                        <td>Инверторное управление мощностью</td>
                        <td colspan="5">нет</td>
                    </tr>
                    <tr>
                        <td>Защита от детей</td>
                        <td colspan="5">есть</td>
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
