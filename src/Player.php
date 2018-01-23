<?php

/**
 *
 */
class Player
{

  private $name;
  private $score;
  private $color;

  function __construct($name,$color)
  {
    $this->name = $name;
    $this->score = 0;
    $this->color = $color;
  }
}


?>
