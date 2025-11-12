<?php 
session_start();

// === ПЕРЕМЕННАЯ ДЛЯ ОШИБКИ ===
$error = '';

// === ПРОВЕРКА: Отправлена ли форма? ===
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    require_once __DIR__ . "/src/helpers.php";
    
    $login = $_POST["login"];
    $password = $_POST["password"];
    
    $connect = getDB();
    
    $sql = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'";
    
    $result = $connect->query($sql);
    
    if ($result->num_rows > 0) {
        // === УСПЕХ! ===
        $row = $result->fetch_assoc();
        
        $_SESSION['user']['id'] = $row['id'];
        $_SESSION['user']['login'] = $row['login'];
        
        header("Location: profile.php");
        exit;
        
    } else {
        // === ОШИБКА! ===
        $error = "Falsche Anmeldedaten oder falsches Passwort";
    }
}
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grassau GmbH</title>
    <link rel="stylesheet" href="./styles/login.css">

    <link rel="icon" type="image/png" href="./favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="./favicon/favicon.svg" />
    <link rel="shortcut icon" href="./favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="./favicon/apple-touch-icon.png" />
    <link rel="manifest" href="./favicon/site.webmanifest" />

</head>

<body>
    <div id="verx">
        <a href="index.php">
            <img src="./img/Grassau logo.png" alt="logo">
        </a>
    </div>

    <div id="box-login">
        <div class="form-container">
          <form action="login.php" method="POST">
            <h2>Anmelden</h2>

            <!-- ПОКАЗ ОШИБКИ - ЗДЕСЬ! -->

            <p class="register-link">
              Noch kein Konto? <a href="register.php">Registrieren</a>
            </p>

            <label for="login">Login</label>
            <input type="text" name="login" id="email" required />

            <label for="password">Passwort</label>
            <input type="password" name="password" id="password" required />

            <a href="pasword.html" class="forgot-password">Passwort vergessen?</a>

            <button type="submit">Einloggen</button>

            <?php if ($error != ''): ?>
                <div class="error-message">
                    <?= $error ?>
                </div>
            <?php endif; ?>
          </form>
        </div>
    </div>
</body>

</html>