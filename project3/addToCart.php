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
$productId = isset($_POST['product_id']) ? $_POST['product_id'] : null;
$price = isset($_POST['price']) ? floatval($_POST['price']) : 0;

// Получаем идентификатор пользователя из сессии
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
} else {
    // Если пользователь не аутентифицирован, можете обработать этот случай соответственно
    echo json_encode(array('success' => false, 'message' => 'User not authenticated.'));
    exit;
}

// Добавление товара в корзину в базе данных
$sql = "INSERT INTO cart (user_id, price, product_id) VALUES ('$userId', '$price', '$productId')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array('success' => true, 'message' => 'Product added to cart.'));
} else {
    echo json_encode(array('success' => false, 'message' => 'Error adding product to cart: ' . $conn->error));
}

// Закрытие соединения с базой данных
$conn->close();
?>