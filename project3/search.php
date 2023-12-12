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

// Получение поискового запроса из GET-параметра
$searchTerm = $_GET['search'];

// Запрос к базе данных для поиска товаров
$sql = "SELECT p.product_id, p.name, p.price, i.url AS image_url
        FROM products p
        LEFT JOIN image i ON p.product_id = i.product_id
        WHERE p.name LIKE '%$searchTerm%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID товара</th><th>Название товара</th><th>Цена товара</th><th>Изображение товара</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['product_id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>$" . $row['price'] . "</td>";
        echo "<td>";
        if (!empty($row['image_url'])) {
            echo "<img src='" . $row['image_url'] . "' alt='Изображение товара'>";
        }
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Ничего не найдено";
}

// Закрытие соединения с базой данных
$conn->close();
?>