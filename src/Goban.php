<?php

namespace MyGoGame;

use MyGoGame\Stone;

/**
 * Defines the goban
 */
class Goban
{
	/**
	 * @var int		$size	The number of cell in a line or column of the goban
	 * @var array	$board	The board containing all the cells of the goban
	 */
    private $size;
    private $board;

	/**
	 * __construct
	 *
	 * @param int $size		The size of the goban
	 */
    public function __construct($size)
    {
        $this->size = $size;
        $this->board = $this->createGoban();
    }

	/**
	 * Create array with the size of the goban
	 *
	 * @return array
	 */
    public function createGoban()
    {
        for ($i = 0; $i < $this->size*$this->size; $i++) {
            $array[$i] = null; 
        }
        return $array;
    }

	/**
	 * Place a new stone on the goban
	 *
	 * @param int $player	The numero of the stone's owner
	 * @param int $index	The index of the cell where to put the stone
	 * @return void
	 */
    public function placeStone($player, $index)
    {
        $this->board[$index] = new Stone($player, $index);
    }

	/**
	 * Get the stone at a particular index of the goban
	 *
	 * @param int $index	The index of the targeted cell
	 * @return Stone|null
	 */
    public function getStone($index)
    {
        return $this->board[$index];
    }

	/**
	 * Shorcut function to get the owner of the stone in a cell of the goban
	 *
	 * @param int $index	The index of the targeted cell
	 * @return int|null
	 */
    public function getStoneOwner($index)
    {
        if ($this->getStone($index) == null) {
            return null;
        } else {
            return $this->getStone($index)->getOwner();
        }
    }

	/**
	 * Swap the owner of a stone. Called when a stone is taken by the opponent
	 *
	 * @param int $index	The index of the targeted cell
	 * @return void
	 */
    public function swapStone($index)
    {
        $this->board[$index]->swapOwner();
    }

	/**
	 * Get the size of the goban
	 *
	 * @return int
	 */
    public function getSize()
    {
        return $this->size;
    }

	/**
	 * Access the board of the goban
	 *
	 * @return array
	 */
    public function getBoard()
    {
        return $this->board;
    }

}
