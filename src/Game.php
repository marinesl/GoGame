<?php

namespace MyGoGame;

use MyGoGame\Goban;
use MyGoGame\Player;
use MyGoGame\Stone;
use MyGoGame\Zone;

/**
 * The main class that handle the game
 */
class Game
{
    /**
     * @var Player      $player1        Player 1
     * @var Player      $player2        Player 2
     * @var Goban       $goban          The goban that holds the game
     * @var int         $currentPlayer  The number of the player currently playing (1 or 2)
     */
    private $player1;
    private $player2;
    private $goban;
    private $currentPlayer;

    /**
     * __construct
     *
     * @param int       $size       The size of the goban
     * @param string    $name1      Name of player 1
     * @param string    $name2      Name of Player 2
     */
    public function __construct($size, $name1, $name2)
    {
        $this->player1 = new Player($name1, "black");
        $this->player2 = new Player($name2, "white");
        $this->goban = new Goban($size);
        $this->currentPlayer = 1;
        $this->otherPlayer = 2;
    }

    /**
     * Perform a play
     *
     * Main function to play a stone.
     * 
     * @param int    $postion    The indx of the targeted cell
     * @return void
     */
    public function play($postion)
    {
        //Determine if placing the stone at $position would create a zone which would be takeable by the other player
        $is_taken_zone = new Zone($postion, $this->currentPlayer, $this->goban);

        //Determine if placing the stone at $position allow the current player to take zones from the other player
        $can_take_zones = [];
        foreach ($this->getDirections($postion) as $next_pos) {
            //Check if the adjacent stone is owned by the same player, and if it's not already in a zone
            if ($this->goban->getStoneOwner($next_pos) == $this->otherPlayer && !isAlreadyInZone($next_pos, $can_take_zones)) {
                //Form a new zone
                $zone = new Zone($next_pos, $this->otherPlayer, $this->goban);
                //If the zone is valid, it means it can be taken
                if ($zone->isValidZone()) {
                    $can_take_zones[] = $zone;
                }
            }
        }

        //Previous variables shorcuts for next conditionnal checks
        $is_taken = $is_taken_zone->isValidZone() ? true : false;
        $can_take = count($can_take_zones) ? true : false;

        if ($is_taken && !$can_take) {
            //Playing the stone at $position is illegal because it doesn't take an other player's zone, but it makes the other player take one from the current player
            return 'Illegal move';
        } elseif ((!$is_taken && $can_take) || ($is_taken && $can_take)) {
            //Playing the stone at $position is safe and allow the current player to take a zone from the other player
            //(Here, we also handle the "Ko" like a regular move)
            $this->playStone($position);
            foreach ($can_take_zones as $zone) {
                $zone->swapOwner();
                $this->{'player'+strval($this->currentPlayer)}->addToScore($zone->getSize());
            }
        } elseif (!$is_taken && !$can_take) {
            //Nothing happens, the player can place their stone freely
            $this->playStone($position);
        }

        //End turn and change player
        $this->swapPlayers();
    }

    /**
     * Place a stone on the goban
     *
     * @param int $index    The index of the cell to place the stone in
     * @return void
     */
    public function playStone($index)
    {
        $this->goban->placeStone($this->currentPlayer, $index);
    }

	/**
	 * Change current player
	 *
	 * @return void
	 */
    public function swapPlayers()
    {
        $temp = $this->currentPlayer;
        $this->currentPlayer = $this->otherPlayer;
        $this->currentPlayer = $temps;
    }

	/**
	 * Return the player 1
	 *
	 * @return Player
	 */
    public function getPlayer1()
    {
        return $this->player1;
    }

	/**
	 * Return the player 2
	 *
	 * @return Player
	 */
    public function getPlayer2()
    {
        return $this->player2;
    }

	/**
	 * Return the goban
	 *
	 * @return Goban
	 */
    public function getGoban()
    {
        return $this->goban;
    }

	/**
	 * Return the currentPlayer
	 *
	 * @return int
	 */
    public function getCurrentPlayer()
    {
        return $this->currentPlayer;
    }

    /**
     * Search all the zones in $zones to see if they contain $position
     *
     * @param int       $postion    The position to search for
     * @param Zones[]   $zones      The array of zones
     * @return boolean
     */
    public function isAlreadyInZone($postion, $zones) {
        $isAlready = false;
        foreach ($zones as $zone) {
            if ($zone->searchZone($position)) {
                $isAlready = true;
            }
        }
        return $isAlready;
    }
}