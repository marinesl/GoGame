<?php

namespace MyGoGame;

/**
 *
 */
class Goban
{

	private $size;
	private $board;

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
				$array[i][j] = null;
			}
		}
		return $array;
	}
	
	public function setStone($player, $index) {
		$this->board[$index] = new Stone($player, $index);
	}

	public function getStone($index) {
		return $this->board[$index];
	}

	public function getStoneOwner($index) {
		if ($this->getStone($index) == null) {
			return null;
		} else {
			return $this->getStone($index)->getOwner();
		}
	}

	public function swapStone($index) {
		$this->board[$index]->swapOwner();
	}

	public function setSize($size) {
		$this->size = $size;
	}

	public function getSize() {
		return $this->size;
	}

	public function getBoard() {
		return $this->board;
	}



}

?>
