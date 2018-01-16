<?php

/**
 *
 */
class Game
{
  private $player1;
  private $player2;
  private $goban;
  private $currentPlayer;

  function __construct($size,$name1,$name2)
  {
    $this->player1 = new Player($name1,"black");
    $this->player2 = new Player($name2,"white");
    $this->goban = new Goban($size);
    $this->currentPlayer = "player1";
  }

  /**
   * Create a Stone
   * Place the stone on the goban
   * Check around the stone
   * Score ++
   */
  public function play() {}
}


?>
