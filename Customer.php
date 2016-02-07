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

    private $name;
    private $rentals;

    public function __construct($name)
    {
        $this->name = $name;
        $this->rentals = array();
    }

    public function addRental($rental)
    {
        array_push($this->rentals, $rental);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getStatement()
    {
        $totalAmount = 0;
        $frequentRenterPoints = 0;
        $result = "Rental Record for " . $this->getName() . "\n";
        foreach ($this->rentals as $rental) {
            /* @var $rental Rental */
            $thisAmount = 0;

            //determine amounts for each line
            switch ($rental->getFilm()->getPriceCode()) {
                case Film::REGULAR:
                    $thisAmount += 2;
                    if ($rental->getDaysRented() > 2)
                        $thisAmount += ($rental->getDaysRented() - 2) * 1.5;
                    break;
                case Film::NEW_RELEASE:
                    $thisAmount += $rental->getDaysRented() * 3;
                    break;
                case Film::CHILDRENS:
                    $thisAmount += 1.5;
                    if ($rental->getDaysRented() > 3)
                        $thisAmount += ($rental->getDaysRented() - 3) * 1.5;
                    break;
            }

            // add frequent renter points
            $frequentRenterPoints++;

            // add bonus for a two day new release rental
            if ($rental->getFilm()->getPriceCode() == Film::NEW_RELEASE && $rental->getDaysRented() > 1)
                $frequentRenterPoints++;

            //show figures for this rental
            $result .= "\t" . $rental->getFilm()->getTitle() . "\t" . $thisAmount . "\n";
            $totalAmount += $thisAmount;
        }

        return $result;
    }

}