<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
} else {
    echo "0"; // Возвращаем 0, если пользователь не аутентифицирован
    exit;
}

$sql = "SELECT SUM(price) AS total FROM card WHERE user_id = '$userId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row['total'];
} else {
    echo "0";
}

$conn->close();
?>