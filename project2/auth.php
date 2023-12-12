<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Используем подготовленные запросы для безопасности
    $stmt = $conn->prepare("SELECT id, username FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        // Получаем данные пользователя
        $stmt->bind_result($user_id, $username);
        $stmt->fetch();

        // Начинаем сессию
        session_start();

        // Сохраняем данные пользователя в сессии
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;

        // Перенаправляем на страницу пользователя
        header("Location: user_page.php");
    } else {
        echo "Неправильные учетные данные. Попробуйте снова.";
    }

    $stmt->close();
}

$conn->close();
?>
