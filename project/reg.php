<?php
// Подключите файл с настройками вашего соединения с базой данных
// Замените "your_db_host", "your_db_username", "your_db_password" и "your_db_name" на ваши реальные учетные данные базы данных
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "users2";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $regemail = $_POST["regemail"];
    $regname = $_POST["regname"];
    $regpass = password_hash($_POST["regpass"], PASSWORD_DEFAULT); // Хешируем пароль для безопасности

    // Подготовка и привязка запроса для предотвращения SQL-инъекций
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $regname, $regemail, $regpass);

    // Выполнение запроса
    if ($stmt->execute()) {
        echo "Регистрация прошла успешно!";
    } else {
        echo "Ошибка: " . $stmt->error;
    }

    // Закрытие запроса
    $stmt->close();
}

// Закрытие соединения с базой данных
$conn->close();
?>