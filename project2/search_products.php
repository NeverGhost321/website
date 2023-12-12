<?php
session_start();

// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получаем данные из POST-запроса
$searchInput = isset($_POST['searchInput']) ? $_POST['searchInput'] : '';

// Ищем товары по названию
$sql = "SELECT * FROM products WHERE name LIKE '%$searchInput%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Возвращаем результаты поиска в формате JSON
    $products = array();
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    echo json_encode(array('success' => true, 'products' => $products));
} else {
    echo json_encode(array('success' => false, 'message' => 'Товары не найдены'));
}

// Закрытие соединения с базой данных
$conn->close();
?>
