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
    <link rel="stylesheet" href="modul.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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
        <div class="product-container">
        <div class="product">
    <img src="https://www.major-renault.ru/images/models/model_resize/crop_logan.jpg" alt="Renault Logan">
    <p class="description">Renault Logan</p>
    
    <div class="description full-description">
        <h2>от 1 124 000 &#8381</h2>
        <a href="tovar1.php">Узнать подробнее:</a>
    </div>
    <form method="post" action="addToCart.php">
        <input type="hidden" name="product_id" value="1">
        <button type="submit" name="add_to_cart" class="custom-button">Купить</button>
    </form>
</div>
            <div class="product">
                <img src="https://www.major-renault.ru/images/models/model_resize/crop_logan_stepway.jpg" alt="Renault Logan Stepway">
                <p class="description">Renault Logan Stepway</p>
                <div class="description full-description">
                    <h2>от 1 301 000 &#8381</h2>
                    <a href="tovar2.php">Узнать подробнее:</a>
                </div>
                <form method="post" action="addToCart.php">
        <input type="hidden" name="product_id" value="2">
        <button type="submit" name="add_to_cart" class="custom-button">Купить</button>
    </form>
            </div>
            <div class="product">
                <img src="https://www.major-renault.ru/images/models/model_resize/crop_sandero_1.jpg" alt="Renault Sandero">
                <p class="description">Renault Sandero</p>
                <div class="description full-description">
                    <h2>от 1 258 000 &#8381</h2>
                    <a href="tovar3.php">Узнать подробнее:</a>
                </div>
                <form method="post" action="addToCart.php">
        <input type="hidden" name="product_id" value="3">
        <button type="submit" name="add_to_cart" class="custom-button">Купить</button>
    </form>
            </div>
            <div class="product">
                <img src="https://www.major-renault.ru/images/models/model_resize/crop_sandero.jpg" alt="Renault Sandero Stepway">
                <p class="description">Renault Sandero Stepway</p>
                <div class="description full-description">
                    <h2>от 1 373 000 &#8381</h2>
                    <a href="tovar4.php">Узнать подробнее:</a>
                </div>
                <form method="post" action="addToCart.php">
        <input type="hidden" name="product_id" value="4">
        <button type="submit" name="add_to_cart" class="custom-button">Купить</button>
    </form>
            </div>
            <div class="product">
                <img src="https://www.major-renault.ru/images/models/model_resize/crop_duster.jpg" alt="Renault Duster">
                <p class="description">Renault Duster</p>
                <div class="description full-description">
                    <h2>от 1 618 000 &#8381</h2>
                    <a href="tovar5.php">Узнать подробнее:</a>
                </div>
                <form method="post" action="addToCart.php">
        <input type="hidden" name="product_id" value="5">
        <button type="submit" name="add_to_cart" class="custom-button">Купить</button>
    </form>
            </div>
            <div class="product">
                <img src="https://www.major-renault.ru/images/models/model_resize/crop_kaptur.jpg" alt="Renault Kaptur6">
                <p class="description">Renault Kaptur</p>
                <div class="description full-description">
                    <h2>от 1 724 000 &#8381</h2>
                    <a href="tovar6.php">Узнать подробнее:</a>
                </div>
                <form method="post" action="addToCart.php">
        <input type="hidden" name="product_id" value="6">
        <button type="submit" name="add_to_cart" class="custom-button">Купить</button>
    </form>
            </div>
            <div class="product">
                <img src="https://www.major-renault.ru/images/models/model_resize/crop_arkana.jpg" alt="Renault Arkana">
                <p class="description">Renault Arkana</p>
                <div class="description full-description">
                    <h2>от 1 874 000 &#8381</h2>
                    <a href="tovar7.php">Узнать подробнее:</a>
                </div>
                <form method="post" action="addToCart.php">
        <input type="hidden" name="product_id" value="7">
        <button type="submit" name="add_to_cart" class="custom-button">Купить</button>
    </form>
            </div>
            <div class="product">
                <img src="https://www.major-renault.ru/images/models/model_resize/crop_master1.jpg" alt="Renault Master">
                <p class="description">Renault Master</p>
                <div class="description full-description">
                    <h2>от 3 294 000 &#8381</h2>
                    <a href="tovar8.php">Узнать подробнее:</a>
                </div>
                <form method="post" action="addToCart.php">
        <input type="hidden" name="product_id" value="8">
        <button type="submit" name="add_to_cart" class="custom-button">Купить</button>
    </form>
            </div>
        </div>
        <!-- Добавьте остальные товары здесь -->
    </main>
    <footer class="footer">
        <p>© Все права защищены</p>
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const products = document.querySelectorAll('.product');
            products.forEach(product => {
                product.addEventListener('click', () => {
                    if (product.classList.contains('active')) {
                        product.classList.remove('active');
                    } else {
                        product.classList.add('active');
                    }
                });
            });
        });
    </script>
<script>
$(document).ready(function() {
    // Обработчик события отправки формы
    $('form').submit(function(e) {
        e.preventDefault(); // Предотвратить отправку формы по умолчанию

        // Получение данных из формы
        var formData = $(this).serialize();

        // Проверка, является ли это запросом на выход
        var isLogout = $(this).find('[name="logout"]').length > 0;

        // Синхронный POST-запрос на сервер
        var request = $.ajax({
            type: 'POST',
            url: isLogout ? 'logout.php' : 'addToCart.php',
            data: formData,
            async: false, // Синхронный запрос
            dataType: 'json',
            success: function(response) {
                console.log(response);

                // Обработка ответа здесь (например, обновление данных на странице)
                if (response.success) {
                    alert(isLogout ? 'Logged out successfully!' : 'Product added to cart!');
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function(error) {
                console.log(error);
                alert('Error: ' + error.statusText);
            }
        });

        // Перенаправление на страницу index.php после выхода
        if (isLogout) {
            window.location.href = 'index.php';
        }
    });
});
</script>
    </body>
    
    
    </html>