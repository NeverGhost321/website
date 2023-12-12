<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Автосалон Renault</title>
    <link rel="shortcut icon" href="img(header)/pngwing.com (1).png">
    <link rel="stylesheet" href="register.css">
</head>
<body>

<div class="body">
    <div class="container">
        <?php
        // Обработка формы при отправке
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Подключение к базе данных
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "users";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Получение данных из формы
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

            // Вставка данных в базу данных
            $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

            if ($conn->query($sql) === TRUE) {
                echo "Регистрация успешна!";
            } else {
                echo "Ошибка: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
        ?>

        <form method="post" action="">
            <div class="head">
                <span>Регистрация</span>
                <p>Создайте бесплатный аккаунт, с помощью Вашей почты.</p>
            </div>
            <div class="inputs">
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit">Зарегистрироваться</button>
        </form>
        <div class="form-footer">
            <p>У Вас уже есть аккаунт? <a href="voiti.php">Войти</a></p>
            <p><a href="index.php">На главную</a></p>
        </div>
    </div>
</div>

</body>
</html>
