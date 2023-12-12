<?php
session_start();

// Если установлен параметр logout, разрушаем сессию
if (isset($_POST['logout'])) {
    // Разрушение всех данных сессии
    $_SESSION = array();
    session_destroy();
    
    // Перенаправление на страницу index.php
    header("Location: index.php");
    exit();
} else {
    // Возвращаем сообщение об ошибке, если параметр logout не установлен
    echo json_encode(['error' => 'Invalid request']);
    exit();
}
?>
