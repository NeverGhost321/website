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

if (isset($user['user_id'])) {
    $userId = $user['user_id'];
    $cartQuery = "SELECT * FROM card WHERE user_id = '$userId'";
    $cartResult = $conn->query($cartQuery);
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
}



// При выходе пользователя
if (isset($_POST['logout'])) {
    // Очищаем сессию и перенаправляем на страницу входа
    session_destroy();
    header("Location: index.html");
    exit();
}

// Получение данных из корзины
if (isset($user['user_id'])) {
    $userId = $user['user_id'];
    $cartQuery = "SELECT * FROM card WHERE user_id = '$userId'";
    $cartResult = $conn->query($cartQuery);
}

// Закрытие соединения с базой данных
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" type="img/jpg" href="img/dnshop.jpg">
	<title>������� 2</title>
	<link href="styles/style.scss" rel="stylesheet" type="text/css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>

<table border="0" width="900" cellpadding="0" cellspacing="0" align="center" bgcolor="#ff8000">
	<tr>
	<td width="150" align="center">
		<img src="img/dnshop.jpg"width="150" height="150" alt="Dns shop">
	</td>
	<td class = "Zagolovok" align ="center"><H1>DNS SHOP</H1></td>
	<td width="200" bgcolor="#fce051">
		<!-- Проверка авторизации -->
		<?php
		if (isset($_SESSION['username'])) {
		    echo '<div style="text-align: right; padding: 10px;">
		            Привет, ' . $_SESSION['username'] . '! 
		            <form method="post" action="">
		                <input type="submit" name="logout" value="Выход">
		            </form>
		          </div>';
		} else {
		    // Если пользователь не аутентифицирован, отобразить форму входа
		    echo '<form action="auth.php" method="post">
		            <table cellpadding="5" width="100%">
		                <tr>
		                    <td width="40%" align="right">Логин: </td>
		                    <td align="right"><input type="text" name="username" placeholder="Введите логин"></td>
		                </tr>
		                <tr>
		                    <td width="40%" align="right">Пароль: </td>
		                    <td align="right"><input type="password" name="password" placeholder="Введите пароль"></td>
		                </tr>
		                <tr>
		                    <td width="40%" align="right"></td>
		                    <td class="vhod" align="justify"><input type="submit" value="Вход"></td>
		                </tr>
		                <tr>
		                    <td width="40%" align="right"></td>
		                    <td class="register" align="justify"><a href="register.html"><input type="button" value="Регистрация"></a></td>
		                </tr>
		            </table>
		          </form>';
		}
		?>
		<!-- Конец проверки авторизации -->
	</td>
	</tr>
</table> 

<table border="0" width="900" cellpadding="5" cellpadding="0" align="center" >
	<tr>
	
		<td  align="center"><a class="button" href="sell.html">Акции</a></td>
		<td  align="center"><a class="button" href="https://moscow.flamp.ru/filials/dns_magazin_cifrovojj_i_bytovojj_tekhniki-70000001041583354">Магазины</a></td>
		<td  align="center"><a class="button" href="dostavka.html">Покупателям</a></td>
		<td  align="center"><a class="button" href="krasota.php">Юридическим лицам</a></td>
		<td  align="center"><a class="button" href="korzina.php">Корзина</a></td>
		<td  align="center"><a class="button" href="contact.php">Контакты</a></td>
		
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
		<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

// Предполагаем, что у вас есть переменная $userId, содержащая идентификатор пользователя
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    $cartQuery = "SELECT card.product_id, COUNT(card.product_id) as quantity, 
                         SUM(products.price) as total_price, 
                         products.name, products.image 
                  FROM card 
                  JOIN products ON card.product_id = products.productId
                  WHERE card.user_id = '$userId'
                  GROUP BY card.product_id";

    $cartResult = $conn->query($cartQuery);
}

// Вывод товаров в корзине
if ($cartResult !== false && $cartResult->num_rows > 0) {
    echo '<table border="1" width="900" cellpadding="5" cellpadding="0" align="center">
            <tr>
                <th>Наименование товара</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Изображение</th>
            </tr>';

    while ($cartItem = $cartResult->fetch_assoc()) {
        $productName = $cartItem['name'];
        $price = $cartItem['total_price']; // Используем total_price вместо price
        $quantity = $cartItem['quantity'];
        $imageBlob = $cartItem['image'];

        // Преобразовываем Blob в base64
        $imageData = base64_encode($imageBlob);
        $imageSrc = 'data:image/jpeg;base64,' . $imageData;

        echo '<tr>
                <td>' . $productName . '</td>
                <td>' . $price . '</td>
                <td>' . $quantity . '</td>
                <td><img src="' . $imageSrc . '" alt="Product Image" style="width: 50px; height: 50px;"></td>
              </tr>';
    }

    echo '</table>';

    // Вывод общей стоимости
    $totalQuery = "SELECT SUM(products.price) as total_price
                   FROM card 
                   JOIN products ON card.product_id = products.productId
                   WHERE card.user_id = '$userId'";

    $totalResult = $conn->query($totalQuery);

    if ($totalResult !== false && $totalResult->num_rows > 0) {
        $total = $totalResult->fetch_assoc()['total_price'];
        echo '<div style="text-align: center; padding: 10px;">
                <p>Общая стоимость: ' . $total . '</p>
              </div>';
    }

    // Кнопка "Оплатить"
    echo '<div style="text-align: center; padding: 10px;">
            <form action="dostavka.html" method="get">
                <input type="submit" value="Оплатить" style="background-color: #ff8000; color: white; padding: 10px;">
            </form>
          </div>';
} else {
    echo '<div style="text-align: center; padding: 10px;">Корзина пуста</div>';
}

$conn->close();
?>

        </td>
        <td width="190" cellpadding="5" valign="top" align="center" bgcolor="#ff8000">

			<BR><a href="https://www.dns-shop.ru/"> <img src ="img/banner1.jpg" width="200" height="100" alt="banner1"></a><BR>
				<BR><a href="https://www.dns-shop.ru/"> <img src ="img/banner2.jpg" width="200" height="100" alt="banner1"></a><BR>
					<BR><a href="https://www.dns-shop.ru/"> <img src ="img/banner3.jpg" width="200" height="100" alt="banner1"></a><BR>
		</td><!-- -->
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
