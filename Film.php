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

    private $title;
    private $priceCode;

    public function __construct($title, $priceCode)
    {
        $this->title = $title;
        $this->priceCode = $priceCode;
    }

    public function getPriceCode()
    {
        return $this->priceCode;
    }

    public function setPriceCode($value)
    {
        $this->priceCode = $value;
    }

    public function getTitle()
    {
        return $this->title;
    }
}