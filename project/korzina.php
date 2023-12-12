<?php
session_start();

// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "users2";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Запрос к базе данных для выборки данных из таблицы cart с объединением таблицы products
$sql = "SELECT cart.product_id, products.name, products.image, cart.price FROM cart
        INNER JOIN products ON cart.product_id = products.product_id";

$result = $conn->query($sql);

// Закрытие соединения с базой данных
$conn->close();
?>
<html>
<head>
	
	<meta charset="UTF-8">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/slider.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .container {
            min-height: 100vh;
            position: relative;
        }

        footer {
            background-color: #62B6B7;
            color: white;
            text-align: center;
            padding: 20px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
<table border="0" width="1250" cellpadding="0" cellspacing="0" align="center" bgcolor="#a4e6e1">
        <tr>
            <td width="150" align="left">
                <img src="img/logo.png" width="30%" height="35" alt="logo">
            </td>
            <td width="200">
    <table cellpadding="5" width="100%">
    <td align="right">
    <?php
    if ($username !== 'Гость') {
        echo "Привет, " . $username . '! ';
        echo '<a href="logout.php"><button class="custom-button">Выход</button></a>';
    } else {
        echo '<button class="custom-button">Войти</button>&nbsp;<a href="register.php"><button class="custom-button">Регистрация</button></a>';
    }
    ?>
</td>
  
</tr>
                </table>
            </td>
        </tr>
    </table> 
    <div class="container">
	<!--<style>
		body {
			background-image: url('https://images.wallpaperscraft.ru/image/single/piatna_fon_svet_69091_300x168.jpg');
			background-size: cover; /* Растягивает изображение на всю область фона */
		}
		</style> -->


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
<table border="1" width="600" cellpadding="5" align="center">
    <tr>
        <th>Название товара</th>
        <th>Изображение</th>
        <th>Цена</th>
    </tr>
    <?php
    $totalCost = 0; // Инициализация переменной для итоговой стоимости

    // Вывод товаров из корзины
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['name'] . '</td>';
        
        // Кодирование BLOB в строку base64
        $imageData = base64_encode($row['image']);
        
        // Вывод изображения
        echo '<td><img src="data:image/jpeg;base64,' . $imageData . '" alt="Изображение товара" width="50" height="50"></td>';
        
        echo '<td>' . $row['price'] . '</td>';
        echo '</tr>';

        $totalCost += $row['price']; // Прибавляем цену каждого товара к итоговой стоимости
    }
    ?>
    <!-- Строка для итоговой стоимости -->
    <tr>
        <td colspan="2" align="right"><strong>Итоговая стоимость:</strong></td>
        <td><strong><?php echo $totalCost; ?></strong></td>
    </tr>
</table>
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
<script src="js/slider.js" type="text/javascript"></script>
<script>
    function redirectToKatalog() {
        // Используйте эту строку для перехода на страницу Katalog.php
        window.location.href = 'Katalog.php';
    }
</script>
<footer style="background-color: #62B6B7; color: white; text-align: center; padding: 20px 0; ">
	<font face="Arial">©Все права защищены</font>
</footer>


</body>
</html>