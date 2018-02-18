<?php

namespace MyGoGame;

/**
 * Defines a player
 */
class Player
{
    /**
     * @var string  $name   The name of the player
     * @var int     $score  Their score
     * @var string  $color  Their stone color
     */
    private $name;
    private $score;
    private $color;

    /**
     * __construct
     *
     * @param string $name  The name of the player
     * @param string $color Their stone color
     */
    public function __construct($name,$color)
    {
        $this->name = $name;
        $this->score = 0;
        $this->color = $color;
    }

    /**
     * Set the name of the player
     *
     * @param string $name  The name of the player
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get the name of the player
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the score of the player
     *
     * @param int $score    The score
     * @return void
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * Add points to the score of the player
     *
     * @param int $score_to_add     The number of points to ass to the score
     * @return void
     */
    public function addToScore($score_to_add) {
        $this->score += $score_to_add;
    }

    /**
     * Get the score of the player
     *
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Get the color of the player
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }
}


?>
