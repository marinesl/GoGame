<?php

    require_once("vendor/autoload.php");

    use MyGoGame\Game;

    $game = new Game(13,"Name1","Name2");
    $goban = $game->getGoban();

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
        <h1>GoGame</h1>
    </header>

    <main>
        <table>
            <?php
                
                for ($i = 0; $i < $goban->getSize(); $i++) { 
                    echo "<tr>";
                    for ($j = 0; $j < $goban->getSize(); $j++) { 
                        echo "<td></td>";
                    }
                    echo "</tr>";
                }

            ?>
        </table>
    </main>

    <footer>
        &copy; FXB & ML
    </footer>
    
</body>

</html>