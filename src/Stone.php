<?php

namespace MyGoGame\Stone;

/**
 *
 */
class Stone
{

    private $owner;
    private $position;

    function __construct($player, $position)
    {
        $this->owner = $player;
        $this->position = $position;
    }

    public function swapOwner() {
        $this->owner = $this->owner == 1 ? 2 : 1;
    }


    public function getOwner() {
        return $this->owner;
    }

}


?>
