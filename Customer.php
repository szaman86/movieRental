<?php
/**
 * Created by PhpStorm.
 * User: bmarszal
 * Date: 07.02.16
 * Time: 12:07
 */

namespace movieRental;

class Customer
{

    /**
     * Customer name
     *
     * @var string
     */
    private $name;

    /**
     * Rented movies
     *
     * @var array
     */
    private $rentals;

    /**
     * Customer constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->rentals = array();
    }

    /**
     * Adding new item to rentals
     *
     * @param Rental $rental
     */
    public function addRental(Rental $rental)
    {
        array_push($this->rentals, $rental);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getStatement()
    {
        $frequentRenterPoints = 0;

        // Initial statement
        $result = "Rental Record for " . $this->getName() . "\n";

        foreach ($this->rentals as $rental) {
            /* @var $rental Rental */
            $thisAmount = 0;
            $thisAmount += $rental->getCoast();

            // add frequent renter points
            $frequentRenterPoints++;

            // add bonus for a two day new release rental
            // TODO: Use this value in statement result
            if ($rental->getFilm()->getPriceCode() == Film::NEW_RELEASE && $rental->getDaysRented() > 1)
                $frequentRenterPoints++;

            //show figures for this rental
            $result .= "\t" . $rental->getFilm()->getTitle() . "\t" . $thisAmount . "\n";
        }

        return $result;
    }
}