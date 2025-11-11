    <?php

    session_start();

    require_once __DIR__ . '/src/helpers.php';

    $connect = getDB();

    $idUser = $_SESSION['user']['id'];

    if ($idUser == '') {
        header("Location: ../index.php");
    }

    $sql = "SELECT * FROM `users` WHERE `id` = ('$idUser')";

    $result = mysqli_query($connect, $sql);
    $result = mysqli_fetch_all($result);



    foreach($result as $item) {
        $login = $item[1];
    }


    ?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/styles/style.css">
        <title>Профиль</title>
    </head>
    <body>
        
    <main>

        <h2>Личный кабинет</h2>

        <p>Добро пожаловать! <?= $login ?></p>

        <a href="src/logout.php">Выход</a>

    </main>

    </body>
    </html>