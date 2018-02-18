<?php

namespace MyGoGame;
use MyGoGame\Goban;

/**
 *
 */
class Zone
{

    private $color;
    private $goban;
    private $stones;
    private $valid;

    function __construct($start_pos, $player, $goban)
    {
        $this->owner = $player;
        $this->$goban = $goban;
        $this->stones = [$start_pos];
        $this->valid = true;
        $this->get_zone();
    }




    public function get_zone($position) {
		$directions = $this->getDirections($position);

		if (count($directions) == 4) {
			foreach ($directions as $next_pos) {
                if (!in_array($next_pos, $this->stones)) {
                    $val = $this->goban->getStoneOwner($next_pos);
                    if ( $val == null) {
                        $this->valid = false;
                        $this->stones = [];
                    } elseif ($val == $this->owner && $this->valid) {
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
    
    public function getSize() {
        return count($this->stones);
    }

    public function isValidZone() {
        return $this->valid;
    }

    public function getDirections($position) {
        $size = $this->goban->getSize();
        $arr = [];
        if ($position-size >= 0) {
            $arr[] = $position-size;
        }
        if ($position+1 < $size*$size) {
            $arr[] = $position+1;
        }
        if ($position+size < $size*$size) {
            $arr[] = $position+size;
        }
        if ($position-1 >= 0) {
            $arr[] = $position-1;
        }
		return $arr;
    }
    
    public function swapOwner() {
        $this->owner = $this->owner == 1 ? 2 : 1;
        foreach ($this->stones as $stone_position) {
            $this->goban->swapStone($stone_position);
        }
    }
}


?>
