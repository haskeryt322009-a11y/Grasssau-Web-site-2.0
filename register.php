<?php 

//Получение данных из формы регистрации
require_once __DIR__ . "/src/helpers.php";

$error = '';
$password_error = ''; 

//Обработка формы только при отправке
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $login = $_POST["login"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_confirm = $_POST["password_confirm"];

    if ($password === $password_confirm) {
        // Пароли совпадают, продолжаем регистрацию
        
        // TODO: Разкомментируй это!
        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $connect = getDB();
        
        // Проверяем И login И email
        $checkSql = "SELECT * FROM `users` WHERE login = '{$login}' OR email = '{$email}' LIMIT 1";
        
        try {
            $result = $connect->query($checkSql);
            
            if ($result->num_rows > 0) {
                // Узнаём, что именно занято
                $existingUser = $result->fetch_assoc();
                
                if ($existingUser['login'] === $login) {
                    $error = "Dieser Login ist bereits vergeben :(";
                } else if ($existingUser['email'] === $email) {
                    $error = "Diese E-Mail ist bereits registriert :(";
                }
            } else {
                // Добавляем email в INSERT
                $sql = "INSERT INTO `users` (login, email, password) VALUES('{$login}', '{$email}', '{$password}')";
                
                if ($connect->query($sql) === TRUE) {
                    header("Location: login.php");
                    exit();
                } else {
                    $error = "Ошибка при регистрации :(";
                }
            }
        } catch (Exception $e) {
            $error = "Ошибка: " . $e->getMessage();
        }
        
    } else {
        $password_error = "Die Passwörter stimmen nicht überein";
    }   
}
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grassau GmbH</title>
    <link rel="stylesheet" href="./styles/register.css">

    <link rel="icon" type="image/png" href="./favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="./favicon/favicon.svg" />
    <link rel="shortcut icon" href="./favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="./favicon/apple-touch-icon.png" />
    <link rel="manifest" href="./favicon/site.webmanifest" />

</head>

<body>
    <div id="verx">
        <div id="verx">
            <a href="index.php">
                <img src="./img/Grassau logo.png" alt="logo">
            </a>
        </div>

        <div></div>

        <div id="box-login">
            <div class="form-container">
                <form action="register.php" method="POST">
                    <h2>Registrierung</h2>

                    <p class="register-link">
                        Schon registriert? <a href="login.php">Anmelden</a>
                    </p>

                    <label for="login">Login</label>
                    <input type="text" name="login" id="login" required />

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required />

                    <label for="password">Passwort</label>
                    <input type="password" name="password" id="password" required />
                    
                    <label for="password_confirm">Passwort bestätigen</label>
                    <input type="password" name="password_confirm" id="password_confirm" required />

                    <button type="submit">Registrieren</button>

                    <?php if ($password_error != ''): ?>
                        <div class="errormessage">
                            <?= $password_error ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($error != ''): ?>
                        <div class="errormessage">
                            <?= $error ?>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>