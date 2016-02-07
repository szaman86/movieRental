<?php
/**
 * Created by PhpStorm.
 * User: bmarszal
 * Date: 07.02.16
 * Time: 12:18
 */

namespace movieRental;

class Film
{
    const CHILDRENS = 2;
    const REGULAR = 0;
    const NEW_RELEASE = 1;

    /**
     * Movie Title
     *
     * @var string
     */
    private $title;

    /**
     * Unique code for product
     *
     * @var string
     */
    private $priceCode;

    public function __construct($title, $priceCode)
    {
        $this->title = $title;
        $this->priceCode = $priceCode;
    }

    /**
     * Setting price code for Movie
     *
     * @param $priceCode
     */
    public function setPriceCode($priceCode)
    {
        $this->priceCode = $priceCode;
    }

    /**
     * @return string
     */
    public function getPriceCode()
    {
        return $this->priceCode;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}