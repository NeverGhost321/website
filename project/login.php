<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "users2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginemail = $_POST["email"];
    $loginpassword = $_POST["pass"];

    $stmt = $conn->prepare("SELECT id, hashpass, username FROM users WHERE email = ?");
    $stmt->bind_param("s", $loginemail);

    $stmt->execute();
    $stmt->bind_result($dbUserId, $dbHash, $dbUsername);

    if ($stmt->fetch() && password_verify($loginpassword, $dbHash)) {
        // Вход выполнен успешно
        $_SESSION["user_id"] = $dbUserId; // Сохранение user_id в сессии
        $_SESSION["username"] = $dbUsername;
        echo "Вход выполнен успешно! Добро пожаловать, " . $dbUsername . "!";
        
        // Перенаправление на user_page.php
        header("Location: user_page.php");
        exit();
    } else {
        // Неправильные учетные данные
        echo "Ошибка: Неправильные учетные данные.";
    }

    $stmt->close();
}

$conn->close();
?>
