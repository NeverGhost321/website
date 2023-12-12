<?php
session_start();

// Проверяем, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Проверяем, была ли нажата кнопка 'add_to_cart'
    if (isset($_POST['add_to_cart'])) {
        // Валидация и санитизация входных данных
        $product_id = $_POST['product_id']; // Предполагается, что у вас есть скрытое поле для product_id
        $user_id = $_SESSION['user_id']; // Предполагается, что user_id хранится в сессии
        $price = $_POST['price']; // Предполагается, что у вас есть скрытое поле для цены

        // Вставляем данные в таблицу cart
        $pdo = new PDO("mysql:host=localhost;dbname=users2", "root", "root");
        $stmt = $pdo->prepare("INSERT INTO cart (user_id, product_id, price) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $product_id, $price]);
    }
}

// Проверяем, авторизован ли пользователь
if (!empty($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = 'Гость';
}
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>farengeit</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/vodonagrev.css">
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
                    <tr>
   
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
            <td width="1250" cellpadding="5" valign="top" align="center">
				<head>
					<title>Harvest vase</title>
					<link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">
				  </head>
				  
				  <body>
					<div class="wrapper">
					  <div class="product-img">
						<img src="https://farengeit-online.ru/upload/resize_cache_webp/iblock/461/zspnnyekqy8ksuzszluo8lw7mobp56x9/600_400_1/6f825157-6e4b-11ee-a215-005056b04686_6f825159-6e4b-11ee-a215-005056b04686.webp" height="420" width="327">
					  </div>
					  <div class="product-info">
						<div class="product-text">
						  <h1>Atlantic Elite Steatite 80</h1>
						  
						  <h2>by Farengeit</h2>
						  <p>Накопительный электрический водонагреватель Atlantic Elite Steatite 80<br>Steatite technology - "сухой" стеатитовый нагревательный элемент (ТЭН) находится в защитной колбе.<br></p>
						</div>
						<div class="product-price-btn">
						  <p><span>78</span>$</p>
						  <form method="post" action="addToCart.php">
    <input type="hidden" name="product_id" value="1"> <!-- Change the value to the actual product_id -->
    <input type="hidden" name="price" value="78"> <!-- Change the value to the actual price -->
    <button type="submit" name="add_to_cart" class="custom-button">Купить</button>
</form>
						</div>
					  </div>
					</div>

					<div class="wrapper">
						<div class="product-img">
						  <img src="https://farengeit-online.ru/upload/resize_cache_webp/iblock/d2f/n5j3ouskl5yrfpzt852xf8s5atnmq4y3/600_400_1/a90c498e-6e4c-11ee-a215-005056b04686_a90c498f-6e4c-11ee-a215-005056b04686.webp" height="420" width="200">
						</div>
						<div class="product-info">
						  <div class="product-text">
							<h1>KOMANCHI KWH/S 50</h1>
							<h2>by farengeit</h2>
							<p>Электрический накопительный водонагреватель Elsotherm Flat A 30V – это оптимальный выбор для обеспечения горячей водой кухни или ванной комнаты.<br></p>
						  </div>
						  <div class="product-price-btn">
							<p><span>88</span>$</p>
							<form method="post" action="addToCart.php">
                <input type="hidden" name="product_id" value="2"> <!-- Замените значение на фактический product_id -->
                <input type="hidden" name="price" value="88"> <!-- Замените значение на фактическую цену -->
                <button type="submit" name="add_to_cart" class="custom-button">Купить</button>
            </form>
						  </div>
						</div>
					  </div>

					  <div class="wrapper">
						<div class="product-img">
						  <img src="https://farengeit-online.ru/upload/resize_cache_webp/iblock/483/jjai71ihfyv0e59yovhc2puof4gu33fm/600_400_1/11abbc72-6387-11ee-a215-005056b04686_8bb1e826-642d-11ee-a215-005056b04686.webp" height="420" width="327">
						</div>
						<div class="product-info">
						  <div class="product-text">
							<h1>Elsotherm CH30T</h1>
							<h2>by farengeit</h2>
							<p>Flat C 30H от производителя Elsotherm представляет собой современный водонагреватель накопительного типа с электрическим нагревательным элементом. </p>
						  </div>
						  <div class="product-price-btn">
							<p><span>78</span>$</p>
							  <form method="post" action="addToCart.php">
                <input type="hidden" name="product_id" value="3"> <!-- Замените значение на фактический product_id -->
                <input type="hidden" name="price" value="78"> <!-- Замените значение на фактическую цену -->
                <button type="submit" name="add_to_cart" class="custom-button">Купить</button>
            </form>
						  </div>
						</div>
					  </div>
				  
				  </body>
		</td>
		
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

<script>
$(document).ready(function() {
    // Обработчик события отправки формы
    $('form').submit(function(e) {
        e.preventDefault(); // Предотвратить отправку формы по умолчанию

        // Получение данных из формы
        var formData = $(this).serialize();

        // Отправка асинхронного POST-запроса на сервер
        $.ajax({
            type: 'POST',
            url: 'addToCart.php', // Укажите путь к вашему PHP-скрипту
            data: formData,
            dataType: 'json',
            success: function(response) {
                console.log(response);

                // Обработка ответа здесь (например, обновление данных на странице)
                if (response.success) {
                    alert('Product added to cart!');
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function(error) {
                console.log(error);
                alert('Error: ' + error.statusText);
            }
        });
    });
});
</script>
<footer style="background-color: #62B6B7; color: white; text-align: center; padding: 20px 0; ">
	<font face="Arial">©2017-2023 Интернет-магазин Фаренгейт</font>
</footer>

</body>
</html>