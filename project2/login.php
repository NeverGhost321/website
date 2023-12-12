<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получите данные из формы регистрации
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Ваш код для подключения к базе данных (как описано выше)

    $host = "localhost";
    $db_username = "root";
    $db_password = "root";
    $database = "users";

    $conn = new mysqli($host, $db_username, $db_password, $database);

    if ($conn->connect_error) {
        die("Ошибка подключения к базе данных: " . $conn->connect_error);
    }

    // Запрос для вставки новой записи в таблицу пользователей
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Регистрация прошла успешно.";
    } else {
        echo "Ошибка при регистрации: " . $conn->error;
    }

    $conn->close();
}
?>