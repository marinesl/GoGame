<?php

namespace MyGoGame\Stone;

/**
 * Defines a stone on the goban
 */
class Stone
{
    /**
     * @var int $owner      The numero of the owner of the stone
     * @var int $position   The index of the cell in which the stone is located
     */
    private $owner;
    private $position;

    /**
     * __construct
     *
     * @param int $player   The numero of the owner of the stone
     * @param int $position The index of the cell in which the stone is located
     */
    public function __construct($player, $position)
    {
        $this->owner = $player;
        $this->position = $position;
    }

    /**
     * Change the owner of the stone
     *
     * @return void
     */
    public function swapOwner()
    {
        $this->owner = $this->owner == 1 ? 2 : 1;
    }

    /**
     * Get the owner of the stone
     *
     * @return int
     */
    public function getOwner()
    {
        return $this->owner;
    }

}
