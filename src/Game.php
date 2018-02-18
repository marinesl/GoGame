<?php

namespace MyGoGame;
use MyGoGame\Player;
use MyGoGame\Goban;
use MyGoGame\Zone;
use MyGoGame\Stone;


class Game
{
	private $player1;
	private $player2;
	private $goban;
	private $currentPlayer;

	function __construct($size,$name1,$name2)
	{
		$this->player1 = new Player($name1,"black");
		$this->player2 = new Player($name2,"white");
		$this->goban = new Goban($size);
		$this->currentPlayer = 1;
		$this->otherPlayer = 2;
	}

	/**
	 */
	public function play($postion) {
		
		$is_taken_zone = new Zone($postion, $this->currentPlayer, $this->goban);
		
		$can_take_zones = [];
			
		foreach($this->getDirections($postion) as $next_pos) {
			if ($this->goban->getStoneOwner($next_pos) == $this->otherPlayer) {
				$zone = new Zone($next_pos, $this->otherPlayer, $this->goban);
				if ($zone->isValidZone()) {
					$can_take_zones[] = $zone;
				}
			}
		}
		
		$is_taken = $is_taken_zone->isValidZone() ? true : false;
		$can_take = count($can_take_zones) ? true : false;
		
		if ($is_taken && !$can_take) {
			//illegal
			return 'Illegal move';
			
		} elseif ((!$is_taken && $can_take) || ($is_taken && $can_take) ) { 
			//take
			$this->playStone($position);
			foreach ($can_take_zones as $zone) {
				$zone->swapOwner();
				$this->{'player'+strval($this->currentPlayer)}->addToScore($zone->getSize);
			}
			
		} elseif (!$is_taken && !$can_take) {
			//play
			$this->playStone($position);
			
		}
		
		$this->swapPlayers();			
	}

	public function playStone($index) {
		$this->goban->setStone($this->currentPlayer, $index);
	}
	

	public function swapPlayers() {
		$temp = $this->currentPlayer;
		$this->currentPlayer = $this->otherPlayer;
		$this->currentPlayer = $temps;
	}

	public function getPlayer1() {
		return $this->player1;
	}

	public function getPlayer2(){
		return $this->player2;
	}

	public function getGoban(){
		return $this->goban;
	}

	public function getCurrentPlayer(){
		return $this->currentPlayer;
	}
}


?>
