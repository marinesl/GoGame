<?php

/**
 *
 */
class Stone
{

  private $player;
  private $positionX;
  private $positionY;

  function __construct($player,$positionX,$positionY)
  {
    $this->player = $player;
    $this->positionX = $positionX;
    $this->positionY = $positionY;
  }
}


?>
