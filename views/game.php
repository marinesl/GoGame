<?php

    use MyGoGame\Game;

    $game = new Game(13,$_POST["player1"],$_POST["player2"]);
    $goban = $game->getGoban();

?>


<h2>Play!</h2>

<div id="game">

    <div id="player1">
        <h3>Player 1 : <?php echo $game->getPlayer1()->getName(); ?></h3>
        <p>Color : <?php echo $game->getPlayer1()->getColor(); ?></p>
        <p>Score : <?php echo $game->getPlayer1()->getScore(); ?></p>
    </div>

    <div id="space"></div>

    <div id="board">
        <table>
            <?php

                for ($i = 0; $i < $goban->getSize(); $i++) {

                    echo "<tr>";
                    for ($j = 0; $j < $goban->getSize(); $j++) {
                        if ($i == $goban->getSize() - 1 || $j == $goban->getSize() - 1) {
                            echo "<td class='hidden'></td>";
                        }
                        else {
                            echo "<td></td>";
                        }
                    }
                    echo "</tr>";
                }

            ?>
        </table>
    </div>

    <div id="space"></div>

    <div id="player2">
        <h3>Player 2 : <?php echo $game->getPlayer2()->getName(); ?></h3>
        <p>Color : <?php echo $game->getPlayer2()->getColor(); ?></p>
        <p>Score : <?php echo $game->getPlayer2()->getScore(); ?></p>
    </div>

</div>
