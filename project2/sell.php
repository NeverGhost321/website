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
}

// При выходе пользователя
if (isset($_POST['logout'])) {
    // Очищаем сессию и перенаправляем на страницу входа
    session_destroy();
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
	<link href="styles/style.scss" rel="stylesheet" type="text/css" />
	<script src="/js/sample.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<table border="0" width="900" cellpadding="0" cellspacing="0" align="center" bgcolor="#ff8000">
	<tr>
	<td width="150" align="center">
		<img src="img/dnshop.jpg"width="150" height="150" alt="Dns shop">
	</td>
	<td class="Zagolovok" align="center"><H1>DNS SHOP</H1></td>
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
	
		<td  align="center"><a class="button" href="sell.php">Акции</a></td>
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
				
			
				<img   align="center" src="https://27region.ru/stopkadr/albums/userpics/13814/RR_51.JPG" width="250" height="250" style="position: relative; left: 100px;">
                <img  align="cetner" src="https://magazinnoff.ru/online/dns-poimai-svou-skidky---deistvyet-s-01-02-2022-do-28-02-2022/original/1.jpg" width="250" height="250"style="position: relative; left: 100px;">
                <img  align="center" src="https://sun9-45.userapi.com/c636117/v636117166/efcf/TqrmXvL_Zk0.jpg" width="250" height="250"style="position: relative; left: 100px;">
				
				 

			  

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