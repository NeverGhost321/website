<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "users";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Получение данных из формы
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Защита от SQL-инъекций
    $email = mysqli_real_escape_string($conn, $email);

    // Хэширование пароля
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Поиск пользователя в базе данных
    $sql = "SELECT id, name, email, password FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Успешная авторизация
            $_SESSION['user_id'] = $row['id'];
            header("Location: user_page.php"); // Перенаправление на главную страницу после успешной авторизации
            exit();
        } else {
            // Неверный пароль
            echo "Неверный пароль";
        }
    } else {
        // Пользователь не найден
        echo "Пользователь не найден";
    }

    $conn->close();
}
?>
