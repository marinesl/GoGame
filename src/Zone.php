<?php

namespace MyGoGame;

use MyGoGame\Goban;

/**
 * Defines a zone of stones owned by the same player
 *
 * A zone is a group of adjacent stones surronded by the other player's stones.
 * If a zone is open, meaning it touches the edge of the goban or an empty cell, then the zone is not valid.
 */
class Zone
{
    /**
     * @var int     $owner      The numero of the zone's owner
     * @var Goban   $goban      The goban
     * @var int[]   $stones     The indexes of the stones forming the zone
     * @var bool    $valid      Boolean to determine if the zone is a valid zone or not
     */
    private $owner;
    private $goban;
    private $stones;
    private $valid;

    /**
     * __construct
     *
     * @param int $start_pos    The index of the position from where we start searching for a zone
     * @param int $player       The owner of the zone
     * @param Goban $goban      The goban
     */
    public function __construct($start_pos, $player, $goban)
    {
        $this->owner = $player;
        $this->$goban = $goban;
        $this->stones = [$start_pos];
        $this->valid = true;
        $this->get_zone();
    }

    /**
     * Recursize function that checks the directions from the stating position to create or extend the zone
     *
     * @param int $position     The index of the targeted cell
     * @return void
     */
    public function get_zone($position)
    {
        //First we get the directions
        $directions = $this->getDirections($position);

        //if there are not 4 directions, it means that the zone touches the edge of the boars, and is therefore not a valid zone
        if (count($directions) == 4) {
            foreach ($directions as $next_pos) {
                //We see if we didn't already process the direction
                if (!in_array($next_pos, $this->stones)) {
                    $val = $this->goban->getStoneOwner($next_pos);
                    //if the value of the adjacent cell is null, it means that the zone is open, and is therefore not a valid zone
                    if ($val == null) {
                        $this->valid = false;
                        $this->stones = [];
                    } elseif ($val == $this->owner && $this->valid) { 
                        //else, if the zone is still valid and the adjacent cell contains a stone of the same owner, we add the adjacent cell's index to the zone, and we continue to extend the zone from this cell 
                        $this->stones[] = $next_pos;
                        $this->get_zone($next_pos);
                    }
                }
            }
        } else {
            $this->valid = false;
            $this->stones = [];
        }
    }

    /**
     * Get the size of the zone
     *
     * @return int
     */
    public function getSize()
    {
        return count($this->stones);
    }

    /**
     * Return if the zone is a valid zone or not
     *
     * @return boolean
     */
    public function isValidZone()
    {
        return $this->valid;
    }

    /**
     * Get the available directions from a particular cell
     *
     * @param int $position     The index of the cell to get directions from
     * @return array
     */
    public function getDirections($position)
    {
        $size = $this->goban->getSize();
        $arr = [];
        if ($position - size >= 0) {
            $arr[] = $position - size;
        }
        if ($position + 1 < $size * $size) {
            $arr[] = $position + 1;
        }
        if ($position + size < $size * $size) {
            $arr[] = $position + size;
        }
        if ($position - 1 >= 0) {
            $arr[] = $position - 1;
        }
        return $arr;
    }

    /**
     * Swap the owner of the zone
     *
     * @return void
     */
    public function swapOwner()
    {
        $this->owner = $this->owner == 1 ? 2 : 1;
        foreach ($this->stones as $stone_position) {
            $this->goban->swapStone($stone_position);
        }
    }

    /**
     * Search for a particular position to see if it's in the zone
     *
     * @param int $position     The position to search for
     * @return bool
     */
    public function searchZone($position) {
        return in_array($position, $this->stones);
    }
}
