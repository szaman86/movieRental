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
     * @param Rental $rental
     * @return int
     */
    public function getCoast(Rental $rental)
    {
        switch ($rental->getFilm()->getPriceCode()) {

            case Film::REGULAR:
                $coast = 2;
                if ($rental->getDaysRented() > 2)
                    $coast += ($rental->getDaysRented() - 2) * 1.5;
                return $coast;

            case Film::NEW_RELEASE:
                $coast = $rental->getDaysRented() * 3;
                return $coast;

            case Film::CHILDRENS:
                $coast = 1.5;
                if ($rental->getDaysRented() > 3)
                    $coast += ($rental->getDaysRented() - 3) * 1.5;
                return $coast;

            //TODO: Consult if we should use default
        }
    }
}