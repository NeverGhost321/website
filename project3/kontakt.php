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

if (isset($_POST['submit'])) {
    // Обработка данных формы
    $user_email = $_POST['email'];
    $message = $_POST['message'];

    // Проверка наличия данных перед добавлением в базу данных
    if (!empty($user_email) && !empty($message)) {
        // Добавление данных в базу данных
        $insert_sql = "INSERT INTO support (email, message) VALUES ('$user_email', '$message')";
        $conn->query($insert_sql);

        // Дополнительные действия, например, перенаправление или вывод сообщения об успешной отправке
    } else {
        // Обработка ошибок, если не все данные заполнены
        // Дополнительные действия, например, вывод сообщения об ошибке
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Автосалон Renault</title>
    <link rel="stylesheet" href="kontakt.css">
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap');
	  </style>
		
		
        <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('submitBtn').addEventListener('click', function(event) {
            event.preventDefault();

            var email = document.getElementById('email').value;
            var message = document.getElementById('message').value;

            fetch('<?php echo $_SERVER['PHP_SELF']; ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'email=' + encodeURIComponent(email) + '&message=' + encodeURIComponent(message),
            })
            .then(response => response.text())
            .then(data => {
                console.log(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
</script>
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
        
        <div class="container">
            <h1>Наши контакты:</h1>
            <td><img width="250" align="center" src="https://spravka.ru/uploads/0/0/8P/x_ZkYUuN_-KzBf1W_Sk5Izz9qVt3Kg/original_51a2fd8fa0f302a94a000013_5bdc2a553e7b9.jpg" alt=" MAJOR AUTO RENAULT"></td>
            <div class="page-block">
                <p>Major Renault Новорижский</p>
                <p>Адрес: г. Москва, Новорижское шоссе</p>
                <p>Часы работы ежедневно: с 8:00 до 21:00 (продажи с 9:00 до 21:00)</p>
                <p>Телефон: +7 (495) 153-77-72</p>
            </div>
        </div>
        <!-- Отступ между текстом и картой -->
        
        <div style="position:relative;overflow:hidden;">
            <iframe
                src="https://yandex.ru/map-widget/v1/org/major_renault_ofitsialny_diler_renault/40054871648/?from=mapframe&ll=37.251459%2C55.789046&source=mapframe&utm_source=mapframe&z=19.4"
                width="30%" height="600" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
        </div>
        <form class="form" method="post" action="">
    <div class="title">Contact us</div>
    <input type="text" name="email" placeholder="Your email" class="input">
    <textarea name="message" placeholder="Your message"></textarea>
    <button type="submit" name="submit">Submit</button>
</form>

    </main>
    <footer class="footer" style="padding: 10px 0;">
    <p style="margin: 0;">© Все права защищены</p>
</footer>


    </body>
    
    </html>