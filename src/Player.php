<?php

namespace MyGoGame;

/**
 *
 */
class Player
{

    private $name;
    private $score;
    private $color;

    public function __construct($name,$color)
    {
        $this->name = $name;
        $this->score = 0;
        $this->color = $color;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setScore($score)
    {
        $this->score = $score;
    }

    public function addToScore($score_to_add) {
        $this->score += $score_to_add;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function getColor()
    {
        return $this->color;
    }
}


?>
