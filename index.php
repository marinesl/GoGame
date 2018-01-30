<?php

    require_once("vendor/autoload.php");

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GoGame</title>
    <link rel="stylesheet" href="web/css/style.css">
</head>

<body>

    <header>
        <img src="web/images/jeu-de-go.png" alt="jeu-de-go">
        <h1>GoGame</h1>
    </header>

    <main>
        
        <?php
            $action = $_GET['action'];

            if ($action == 'game') {
                include_once('views/game.php');
            }
            else {
                include_once('views/subscribe.php');
            }
        ?>

    </main>

    <footer>
        &copy; FXB & ML
    </footer>
    
</body>

</html>