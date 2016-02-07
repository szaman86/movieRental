<?php

/**
 * Created by PhpStorm.
 * User: bmarszal
 * Date: 07.02.16
 * Time: 12:06
 */
namespace movieRental;

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

    /**
     * Rental constructor.
     * @param Film $film
     * @param $daysRented
     */
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

    /**
     * @return float|int
     */
    public function getCoast()
    {
        switch ($this->getFilm()->getPriceCode()) {

            case Film::REGULAR:
                $coast = 2;
                if ($this->getDaysRented() > 2)
                    $coast += ($this->getDaysRented() - 2) * 1.5;
                return $coast;

            case Film::NEW_RELEASE:
                $coast = $this->getDaysRented() * 3;
                return $coast;

            case Film::CHILDREN:
                $coast = 1.5;
                if ($this->getDaysRented() > 3)
                    $coast += ($this->getDaysRented() - 3) * 1.5;
                return $coast;

            //TODO: Consult if we should use default
        }
    }
}