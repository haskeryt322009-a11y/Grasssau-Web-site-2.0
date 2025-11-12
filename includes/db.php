<?php
// Настройки подключения к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$database = "database";

// Создаём подключение
$conn = mysqli_connect($servername, $username, $password, $database);

// Проверяем подключение
if (!$conn) {
    die("Datenbankverbindungsfehler: " . mysqli_connect_error());
}

// Устанавливаем кодировку UTF-8 (для русского/немецкого языка)
mysqli_set_charset($conn, "utf8mb4");
?>