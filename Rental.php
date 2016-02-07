<?php

/**
 * Created by PhpStorm.
 * User: bmarszal
 * Date: 07.02.16
 * Time: 12:06
 */

class Rental
{
    private $film;
    private $daysRented;

    public function __construct($film, $daysRented)
    {
        $this->film = $film;
        $this->daysRented = $daysRented;
    }

    public function getDaysRented()
    {
        return $this->daysRented;
    }

    /**
     * @return Film
     */
    public function getFilm()
    {
        return $this->film;
    }
}