<?php

/**
 *
 */
class Goban
{

  private $board;
  private $size;

  function __construct($size)
  {
    $this->size = $size;
    $this->board = $this->createGoban();
  }

  /**
   * Create array with the size of the goban
   */
  public function createGoban() {
    for ($i=0; $i < $this->size; $i++) {
      for ($j=0; $j < $this->size; $j++) {
        $array[i][j] = "";
      }
    }
    return $array;
  }

}

?>
