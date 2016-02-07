<?php

/**
 * Created by PhpStorm.
 * User: bmarszal
 * Date: 07.02.16
 * Time: 12:06
 */
class Rental
{
    public function __construct($film, $daysRented)
    {
        $this->_film = $film;
        $this->_daysRented = $daysRented;
    }

    public function getDaysRented()
    {
        return $this->_daysRented;
    }

    /**
     * @return Film
     */
    public function getFilm()
    {
        return $this->_film;
    }

    private $_film;
    private $_daysRented;
}