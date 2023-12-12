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
    <link rel="stylesheet" href="korzina.css">
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
    <table cellpadding="5" width="100%">
        <tr>
            <td><strong>Имя:</strong> <?php echo $user_name; ?></td>
        </tr>
        <tr>
            <td><strong>Email:</strong> <?php echo $user_email; ?></td>
        </tr>
        <tr>
            <td>
                <form method="post" action="logout.php" style="margin-top: 10px;">
                    <input type="hidden" name="logout" value="1">
                    <button type="submit">Выход</button>
                </form>
            </td>
        </tr>
    </table>
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
 
        <?php
// Получение данных о товарах из корзины
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Обработка удаления товара из корзины
    if (isset($_GET['delete_product_id'])) {
        $delete_product_id = $_GET['delete_product_id'];

        // Запрос на удаление товара из корзины
        $delete_query = "DELETE FROM cart WHERE user_id = $user_id AND product_id = $delete_product_id";
        $conn->query($delete_query);
    }

    // Запрос на получение товаров из корзины с изображениями
    $cart_query = "SELECT products.product_id, products.name, products.price, image.url
                   FROM cart
                   JOIN products ON cart.product_id = products.product_id
                   LEFT JOIN image ON products.product_id = image.product_id
                   WHERE cart.user_id = $user_id";
    $cart_result = $conn->query($cart_query);

    if ($cart_result->num_rows > 0) {
        // Инициализация переменной для подсчета итоговой стоимости
        $totalCost = 0;

        // Вывод таблицы с товарами из корзины и изображениями
        echo '<table border="1" width="600" cellpadding="5" align="center">';
        echo '<tr>
                <th>Название товара</th>
                <th>Изображение</th>
                <th>Цена</th>
                <th>Действие</th>
              </tr>';

        while ($cart_row = $cart_result->fetch_assoc()) {
            // Суммирование цен товаров для подсчета итоговой стоимости
            $totalCost += $cart_row['price'];

            echo '<tr>
                    <td>' . $cart_row['name'] . '</td>
                    <td><img src="' . $cart_row['url'] . '" alt="Изображение товара" width="100"></td>
                    <td>' . $cart_row['price'] . '</td>
                    <td><a href="?delete_product_id=' . $cart_row['product_id'] . '">Удалить</a></td>
                  </tr>';
        }

        // Вывод строки для итоговой стоимости
        echo '<tr>
                <td colspan="3" align="right"><strong>Итоговая стоимость:</strong></td>
                <td><strong>' . $totalCost . '</strong></td>
              </tr>';

        echo '</table>';
    } else {
        echo '<p>Корзина пуста</p>';
    }
}
?>



    </main>
    
    <footer class="footer">
        <p>© Все права защищены</p>
    </footer>
    </body>
    
    </html>