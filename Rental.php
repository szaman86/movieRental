<?php

/**
 * Created by PhpStorm.
 * User: bmarszal
 * Date: 07.02.16
 * Time: 12:06
 */
namespace movieRental;

use movieRental\Film;

class Rental
{

    /**
     * Film from rental library
     *
     * @var Film
     */
    private $film;

    /**
     * Days amount for rented movie
     *
     * @var integer
     */
    private $daysRented;

    public function __construct(Film $film, $daysRented)
    {
        $this->film = $film;
        $this->daysRented = $daysRented;
    }

    /**
     * @return int
     */
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