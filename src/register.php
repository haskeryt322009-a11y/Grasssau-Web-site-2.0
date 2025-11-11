<?php 

//Получение данных из формы регистрации

require_once __DIR__ . "/helpers.php";

//Запись данных в базу данных

$login = $_POST["login"];
$password = $_POST["password"];

// $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Хешируем пароль 

$connect = getDB();

$checkSql = "SELECT * FROM `users` WHERE login = '{$login}' LIMIT 1";

try {
    $result = $connect->query($checkSql);
    
    if ($result->num_rows > 0) {
        echo "Данный пользователь уже зарегистрирован :(";
    } else {
        $sql = "INSERT INTO `users` (login, password) VALUES('{$login}', '{$password}')";
        
        if ($connect->query($sql) === TRUE) {
            // echo "Регистрация прошла успешно!";
            header("Location: ../login.php");
        } else {
            echo "Ошибка при регистрации :(";
        }
    }
} catch (Exception $e) {
    echo "Данный пользователь уже зарегистрирован :(";
}

?>