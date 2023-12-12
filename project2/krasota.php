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

// Получаем данные из POST-запроса
$productId = isset($_POST['productId']) ? $_POST['productId'] : null;
$price = isset($_POST['price']) ? floatval($_POST['price']) : 0;

// Получаем идентификатор пользователя из сессии
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
} else {
    // Если пользователь не аутентифицирован, можете обработать этот случай соответственно
    echo json_encode(array('success' => false, 'message' => 'User not authenticated.'));
    exit;
}

// Добавление товара в корзину в базе данных
$sql = "INSERT INTO card (user_id, price, product_id) VALUES ('$userId', '$price', '$productId')
        ON DUPLICATE KEY UPDATE price = '$price'";
if ($conn->query($sql) === TRUE) {
    echo json_encode(array('success' => true, 'message' => 'Product added to cart.'));
} else {
    echo json_encode(array('success' => false, 'message' => 'Error adding product to cart: ' . $conn->error));
}

// Закрытие соединения с базой данных
$conn->close();

// Поиск по названию товара
if (isset($_POST['searchInput'])) {
    $searchInput = $_POST['searchInput'];

    $searchSql = "SELECT * FROM products WHERE name LIKE '%$searchInput%'";
    $searchResult = $conn->query($searchSql);

    if ($searchResult->num_rows > 0) {
        $products = array();

        while ($row = $searchResult->fetch_assoc()) {
            $products[] = array(
                'productId' => $row['id'],
                'name' => $row['name'],
                'description' => $row['description'],
                'price' => $row['price'],
                'image' => $row['image'],
                'category' => $row['category'],
                'quantity' => $row['quantity']
            );
        }

        echo json_encode(array('success' => true, 'products' => $products));
    } else {
        echo json_encode(array('success' => false, 'message' => 'No products found.'));
    }
}
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
		<td  align="center"><a class="button" href="dostavka.php">Покупателям</a></td>
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
				
			<div class="product-item">
				<img src="https://img.mvideo.ru/Pdb/20082692b.jpg">
				<div class="product-list">
				  <h3>Массажер для тела Xiaomi Massage Gun BHR5608EU </h3>
					<span class="price">₽ 68 485</span>
					<a href="#" class="button add-to-card-btn" data-product-id="4" data-product-price="68485">В корзину</a>
				</div>
			  </div>

			  <div class="product-item">
				<img src="https://img.mvideo.ru/Pdb/20077539m.jpg">
				<div class="product-list">
				  <h3>Весы напольные Picooc Mini Lite Black</h3>
					<span class="price">₽ 2 485</span>
					<a href="#" class="button add-to-card-btn" data-product-id="5" data-product-price="2485">В корзину</a>
				</div>
			  </div>

			  <div class="product-item">
				<img src="https://ir.ozone.ru/s3/multimedia-i/c1000/6289398078.jpg">
				<div class="product-list">
				  <h3>Фен для волос Dyson Supersonic </h3>
					<span class="price">₽ 18 485</span>
					<a href="#" class="button add-to-card-btn" data-product-id="6" data-product-price="18485">В корзину</a>
				</div>
			  </div>

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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
function addToCart(event) {
    event.preventDefault();

    var productId = $(this).data('product-id');
    var price = $(this).data('product-price');

    $.ajax({
        type: 'POST',
        url: 'add_to_cart.php',
        data: { productId: productId, price: price },
        success: function(response) {
            console.log(response);
            // Обработка успешного ответа, например, обновление отображения корзины
        },
        error: function(error) {
            console.error('Ошибка при добавлении в корзину:', error);
            // Обработка ошибки
        }
    });
}



// Привязываем событие click непосредственно к кнопке без дополнительного блока $(document).ready()


$(document).ready(function() {
    $('.add-to-card-btn').on('click', addToCart);
});
</script>

<script>
	function addToCart(event) {
    event.preventDefault();

    var productId = $(this).data('product-id');
    var price = $(this).data('product-price');

    $.ajax({
        type: 'POST',
        url: 'add_to_cart.php',
        data: { productId: productId, price: price },
        success: function(response) {
            console.log(response);

            // Обработка успешного ответа
            // Обновление отображения общей стоимости корзины
            updateCartTotal();
        },
        error: function(error) {
            console.error('Ошибка при добавлении в корзину:', error);
            // Обработка ошибки
        }
    });
}

// Функция для обновления общей стоимости корзины
function updateCartTotal() {
    $.ajax({
        type: 'GET',
        url: 'get_cart_total.php', // Создайте новый файл PHP для получения общей стоимости корзины
        success: function(total) {
            $('#cart-total').text('₽ ' + total);
        },
        error: function(error) {
            console.error('Ошибка при получении общей стоимости корзины:', error);
        }
    });
}
	$(document).ready(function(){
	  // Инициализация Slick Carousel
	  $('.slider').each(function(index, element) {
		var slider = $(element);
		
		slider.slick({
		  arrows: false
		});
  
		// Обработка событий для кнопок
		slider.closest('.slider-container').find('.prev-btn').on('click', function(){
		  slider.slick('slickPrev');
		});
  
		slider.closest('.slider-container').find('.next-btn').on('click', function(){
		  slider.slick('slickNext');
		});
	  });
	});
  </script>
 <script>
        // Ваш текущий JavaScript-код

        function displayProducts(products) {
            $('#product-list-container').empty();

            if (products.length > 0) {
                products.forEach(function(product) {
                    var productContainer = $('<div class="product-list"></div>');
                    var productName = $('<h3>' + product.name + '</h3>');
                    var productDescription = $('<p>' + product.description + '</p>');
                    var productPrice = $('<span class="price">₽ ' + product.price + '</span>');
                    var addToCartButton = $('<a href="#" class="button add-to-cart-btn" data-product-id="' + product.productId + '" data-product-price="' + product.price + '">В корзину</a>');

                    productContainer.append(productName, productDescription, productPrice, addToCartButton);
                    $('#product-list-container').append(productContainer);
                });
            } else {
                $('#product-list-container').text('Товары не найдены.');
            }
        }
    </script>
<script>
function searchProducts() {
    var searchInput = $('#searchInput').val();

    // Отправляем AJAX-запрос на сервер
    $.ajax({
        type: 'POST',
        url: '/project2/search_products.php', // Укажите правильный путь к файлу обработчику на сервере
        data: { searchInput: searchInput },
        success: function(response) {
            console.log(response);

            // Обработка успешного ответа
            // Очищаем текущий контент и добавляем новый контент
            $('#product-list-container').empty();

            if (response.success) {
                // Перебираем полученные продукты и добавляем их на страницу
                response.products.forEach(function(product) {
                    // Создаем элементы HTML для товара
                    var productContainer = $('<div class="product-list"></div>');
                    var productName = $('<h3>' + product.name + '</h3>');
                    var productDescription = $('<p>' + product.description + '</p>');
                    var productPrice = $('<span class="price">₽ ' + product.price + '</span>');
                    var addToCartButton = $('<a href="#" class="button add-to-cart-btn" data-product-id="' + product.productId + '" data-product-price="' + product.price + '">В корзину</a>');

                    // Добавляем созданные элементы в контейнер
                    productContainer.append(productName, productDescription, productPrice, addToCartButton);

                    // Добавляем контейнер с товаром на страницу
                    $('#product-list-container').append(productContainer);
                });
            }
        },
        error: function(error) {
            console.error('Ошибка при выполнении поиска товара:', error);
        }
    });
}

</script>
</html>