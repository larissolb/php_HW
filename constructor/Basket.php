<?php

class Basket
{
    private $good;
    private $name;
    private $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getGoodName()
    {
        return $this->good->name;
    }

    public function getGoodPrice()
    {
        return $this->good->price;
    }
    
    public function setGood(Good $good)
    {
        $this->good = $good;
    }

    public function getName()
    {
        return $this->name;
    }
    
        public function getPrice()
    {
        return $this->price;
    }
}