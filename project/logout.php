<?php
session_start();

// Уничтожаем все данные сессии
session_destroy();

// Перенаправляем пользователя на главную страницу или другую страницу по вашему выбору
header("Location: index.html");
exit;
?>