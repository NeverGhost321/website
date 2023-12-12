<?php
// Замените следующие строки своими данными для подключения к базе данных
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "users2";


// Создаем соединение с базой данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Получаем данные из формы
$name = $_POST['name'];
$email = $_POST['email'];
$msg = $_POST['msg'];

// Генерируем SQL-запрос для вставки данных в таблицу 'support'
$sql = "INSERT INTO support (support_id, name, email, message) VALUES (NULL, '$name', '$email', '$msg')";

// Выполняем запрос
if ($conn->query($sql) === TRUE) {
    echo "Данные успешно отправлены в базу данных";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

// Закрываем соединение с базой данных
$conn->close();
?>