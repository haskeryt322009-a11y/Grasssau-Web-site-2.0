    <?php

    session_start();

    require_once __DIR__ . '/src/helpers.php';

    $connect = getDB();

    $idUser = $_SESSION['user']['id'];

    if ($idUser == '') {
        header("Location: /Grasssau-Web-site%202.0/login.php");
    }

    $sql = "SELECT * FROM `users` WHERE `id` = ('$idUser')";

    $result = mysqli_query($connect, $sql);
    $result = mysqli_fetch_all($result);



    foreach($result as $item) {
        $login = $item[1];
    }


    ?>


<!DOCTYPE html>
<html lang="de">

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grassau GmbH</title>
    <link rel="stylesheet" href="./styles/style.css">

    <link rel="icon" type="image/png" href="./favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="./favicon/favicon.svg" />
    <link rel="shortcut icon" href="./favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="./favicon/apple-touch-icon.png" />
    <link rel="manifest" href="./favicon/site.webmanifest" />
</head>
    <body style="background-color: #f4f4f4;">
    <main >


       <div id="verx2">
        <a href="index.php">
            <img src="./img/Grassau logo.png" alt="logo" id="imglog;" width="340px">
        </a>
    </div>

    <div id="box-login">
        <div class="form-container">



        <h2>Persönliches Konto</h2>
        <p class="textone">Willkommen!<strong> <?= $login ?></strong></p>



          


        <a href="src/logout.php" class="button-exit">
        
<p>Abmelden von Ihrem Konto</p>
        </a>

    </div>
    </main>

    </body>
    </html>