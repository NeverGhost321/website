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

    // Получение данных пользователя и изображения из базы данных
    $sql = "SELECT u.name, u.email, i.url AS image_url
            FROM users u
            LEFT JOIN image i ON u.id = i.product_id
            WHERE u.id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_name = $row['name'];
        $user_email = $row['email'];
        $product_image_url = $row['image_url'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Автосалон Renault</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img(header)/pngwing.com (1).png">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap');
     
    .search-result {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
    }

    .search-result img {
        max-width: 100%;
        height: auto;
        margin-top: 10px;
    }
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
                            <li><a href="index.php">Главная</a></li>
                            <li><a href="modul.php">Модельный ряд</a></li>
                            <li><a href="onas.php">О нас</a></li>
                            <li><a href="kontakt.php">Контакты</a></li>
                            <li><a href="korzina.php">Корзина</a></li>
           
        <div class="middle-container container">
            <!-- Добавленная строка поиска -->
        
                <form id="searchForm">
        <label for="search">Поиск товара:</label>
        <input type="text" id="search" name="search">
        <input type="button" value="Поиск" onclick="searchProducts()">
    </form>

    <div class="profile block">
        <!-- Блок для отображения результатов поиска -->
        <div id="searchResults" style="background-color: white;"></div>
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
    </main>
    <script>

        function searchProducts() {
            var searchTerm = document.getElementById('search').value;

            // Создаем объект XMLHttpRequest
            var xhr = new XMLHttpRequest();

            // Настраиваем запрос
            xhr.open('GET', 'search.php?search=' + searchTerm, true);

            // Устанавливаем обработчик события завершения запроса
            xhr.onload = function () {
                if (xhr.status >= 200 && xhr.status < 300) {
                    // Обновляем блок с результатами поиска
                    document.getElementById('searchResults').innerHTML = xhr.responseText;
                } else {
                    console.error(xhr.statusText);
                }
            };

            // Отправляем запрос
            xhr.send();
        }
    </script>

    <footer class="footer">
        <p>© Все права защищены</p>
    </footer>
    <script src="script.js"></script>
</body>

</html>



