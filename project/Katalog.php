<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "users2";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Проверка, авторизован ли пользователь
if (!empty($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = 'Гость';  // Или любой другой текст по умолчанию
}


// Закрытие соединения с базой данных
$conn->close();
?>
<html>
<head>
	<title>farengeit</title>
    <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
    <style>
    .products-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start; /* Теперь сдвигаем влево */
    }

    .product {
        margin: 10px;
        text-align: center;
        border: 2px solid #ff66b2; /* Розовая рамка */
        padding: 10px;
        border-radius: 8px;
    }

    .found-product {
        background-color: #ffccff; /* Цветовое выделение для найденных товаров */
    }
</style>
</head>
<body>
	<!--<style>
		body {
			background-image: url('https://images.wallpaperscraft.ru/image/single/piatna_fon_svet_69091_300x168.jpg');
			background-size: cover; /* Растягивает изображение на всю область фона */
		}
		</style> -->
<table border="0" width="1250" cellpadding="0" cellspacing="0" align="center" bgcolor="#a4e6e1">
	<tr>
		<td width="150" align="left">
			<img src="img/logo.png" width="30%" height="35" alt="logo">
		</td>
		<!--<td align="center"><H1><font size="5" color="black" face="Arial">Фаренгейт</font></H1></td>-->
		<td width="200">
			<table cellpadding="5" width="100%">
				<tr>
					<!-- <td width="40%" align="right">логин: </td> -->
		
                    <td align="right">
    <?php if (!empty($username) && $username !== 'Гость'): ?>
        Привет, <?= $username; ?>! <a href="logout.php"><button class="custom-button">Выйти</button></a>
    <?php else: ?>
        <table cellpadding="5" width="100%">
            <tr>
                <td align="right"><input type="text" value="<?= !empty($username) ? $username : 'Логин'; ?>" style="padding: 5px; border: 1px solid #000; border-radius: 5px; display: block; float: right; margin-bottom: 1px;"></td>
            </tr>
            <tr>
                <td align="right"><input type="password" value="Пароль" style="padding: 5px; border: 1px solid #000; border-radius: 5px; display: block; float: right; margin-bottom: 5px;"></td>
            </tr>    
            <tr>
                <td align="right"><button class="custom-button">Войти</button>&nbsp;<a href="register.php"><button class="custom-button">Регистрация</button></a></td>
            </tr>
        </table>
    <?php endif; ?>
</td>
				</tr>
			</table>
		</td>
	</tr>
</table> 

<table border="0" width="1250" cellpadding="5" cellpadding="0" align="center" bgcolor="#62B6B7">
	<tr>
		<style>
		a {
		text-decoration: none; 
		}
		</style>
	<td align="center"><a href="index.html"><font size="3" color="black" face="Arial">Главная</font></a></td>
		<td align="center"><a href="Katalog.php"><font size="3" color="black" face="Arial">Каталог</font></a></td>
		<td align="center"><a href="sales.html"><font size="3" color="black" face="Arial">Акции</font></a></td>
		<td align="center"><a href="dostavka.html"><font size="3" color="black" face="Arial">Доставка</font></a></td>
		<td align="center"><a href="support2.html"><font size="3" color="black" face="Arial">Контакты</font></a></td>
		<td align="center"><a href="korzina.php"><font size="3" color="black" face="Arial">Корзина</font></a></td>
	</tr>
</table> 
<BR>
<table border="0" width="1250" cellpadding="5" cellpadding="0" align="center">
	<tr>
		<style>
			p {
				line-height: 1.3;
			}
            m {
                line-height: 0.1;
            }
		</style>
		
			</m>
		<td>
            <!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<form action="" method="GET">
    <input type="text" name="search" placeholder="Поиск">
    <button type="submit">Искать</button>
</form>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "users2";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Обработка запроса поиска
if (isset($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']); // Защита от SQL-инъекций
    $query = "SELECT * FROM products WHERE name LIKE '%$search%' OR category LIKE '%$search%'";
    $result = $conn->query($query);

    if ($result) {
        // Вывод результатов поиска
        echo '<div class="products-container">'; // Обертка для продуктов
        while ($row = $result->fetch_assoc()) {
            $productClass = 'product'; // Исходный класс стиля для товара

            // Если товар найден по запросу, добавляем класс для цветового выделения
            if (stripos($row['name'], $search) !== false || stripos($row['category'], $search) !== false) {
                $productClass .= ' found-product';
            }
            ?>
            <div class="<?= $productClass ?>">
                <img src="data:image/jpeg;base64,<?= base64_encode($row['image']) ?>" alt="<?= $row['name'] ?>">
                <h2><?= $row['name'] ?></h2>
                <p><?= $row['category'] ?> - <?= $row['quantity'] ?> шт. - <?= $row['price'] ?> $.</p>
            </div>
            <?php
        }
        echo '</div>'; // Закрытие обертки
        $result->free_result();
    } else {
        echo "Ошибка выполнения запроса: " . $conn->error;
    }
}

// Закрытие соединения с базой данных
$conn->close();
?>

    <a href="Vodonagrev.php"><p align="left">
        
    <div class="product">
        
        <img src="https://farengeit-online.ru/upload/resize_cache_webp/iblock/5a5/o0s8vyymj458a7003wvo8nbgxosyj1ql/vodonagrev.webp" alt="Товар 1">
        <h2>Водонагреватели</h2>
        <p>Описание товара 1. Этот товар отличается чем-то важным и замечательным.</p></font></a>
    </div>
    <a href="Zapornya_armatyra.html">
    <div class="product">
        <img src="https://farengeit-online.ru/upload/resize_cache_webp/iblock/d28/ysyecqda3bq5hit7259v9cy3duoc9z4g/zapornaya.webp" alt="Товар 2">
        <h2>Запорная арматура</h2>
        <p>Описание товара 2. Этот товар также замечателен, но по-своему.</p></font></a>
    </div>
    <a href="Klimatich_tehnica.html">
    <div class="product">
        <img src="https://farengeit-online.ru/upload/resize_cache_webp/iblock/f0f/0dp34si8k0yddk17ygzwrnh4b1fxyptt/klimat.webp" alt="Товар 2">
        <h2>Климатическая техника</h2>
        <p>Описание товара 2. Этот товар также замечателен, но по-своему.</p></font></a>
    </div>
    <a href="Kotelnoe_oborydovanie.html">
    <div class="product">
        <img src="https://farengeit-online.ru/upload/resize_cache_webp/iblock/6e4/avj55w3jhonooaqe0v05gynluqgjp42b/kotelnoe.webp" alt="Товар 2">
        <h2>Котельное оборудование</h2>
        <p>Описание товара 2. Этот товар также замечателен, но по-своему.</p></font></a>
    </div>
    <a href="Nasosnoe_oborydovanie.html">
    <div class="product">
        <img src="https://farengeit-online.ru/upload/resize_cache_webp/iblock/1a5/4w421ch01a4j2r1fxniqu3yxbe52e580/nasos.webp" alt="Товар 2">
        <h2>Насосное оборудование</h2>
        <p>Описание товара 2. Этот товар также замечателен, но по-своему.</p></font></a>
    </div>
    <a href="Radiatori_otoplenia.html">
    <div class="product">
        <img src="https://farengeit-online.ru/upload/resize_cache_webp/iblock/75a/of0drfvma05f7w0fypaqo7kbmu4a7p5i/radiator.webp" alt="Товар 2">
        <h2>Радиаторы отопления</h2>
        <p>Описание товара 2. Этот товар также замечателен, но по-своему.</p></font></a>
    </div>
    <a href="Rashirennie_baki.html">
    <div class="product">
        <img src="https://farengeit-online.ru/upload/resize_cache_webp/iblock/375/alno7yfi7dzyp6n9xm6iuv6ukm0uripu/rashirbaki.webp" alt="Товар 2">
        <h2>Расширительные баки</h2>
        <p>Описание товара 2. Этот товар также замечателен, но по-своему.</p></font></a>
    </div>
    <a href="Santeknika.html">
    <div class="product">
        <img src="https://farengeit-online.ru/upload/resize_cache_webp/iblock/caf/xbmov2ekt5yyh5gr0fnpyygbewc340nb/santehnika.webp" alt="Товар 2">
        <h2>Сантехника</h2>
        <p>Описание товара 2. Этот товар также замечателен, но по-своему.</p></font></a>
    </div>
    <a href="Termoregyl_armatyra.html">
    <div class="product">
        <img src="https://farengeit-online.ru/upload/resize_cache_webp/iblock/e45/urvlnda481stqhhsfqyj8oa8fc4d0aq3/termoreg.webp" alt="Товар 2">
        <h2>Терморегулирующая арматура</h2>
        <p>Описание товара 2. Этот товар также замечателен, но по-своему.</p></font></a>
    </div>
    <a href="Trybi_i_fitingi.html">
    <div class="product">
        <img src="https://farengeit-online.ru/upload/resize_cache_webp/iblock/911/89exf0tga9dkmngbcdzypi2d2jys8fw9/trubifitingi.webp" alt="Товар 2">
        <h2>Трубы и фитинги</h2>
        <p>Описание товара 2. Этот товар также замечателен, но по-своему.</p></font></a>
    </div>

</body>
</html>

		






		
		
</tr>
<!-- 	<tr>
			<td colspan=3 cellpadding="5" valign="top" align="center" bgcolor="#ff8000">
			баннер1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			баннер2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			баннер3 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;(баннеры - произвольные картинки со ссылками)
		</td>
	</tr> -->
</table>

<footer style="background-color: #62B6B7; color: white; text-align: center; padding: 20px 0; ">
	<font face="Arial">©Все права защищены</font>
</footer>

</body>
</html>