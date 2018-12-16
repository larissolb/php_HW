<?php

class Good
{
    const GOOD = "GOOD";

    public $name = "Без имени";
    public $brand;
    public $price;

    public function __construct($good_name, $good_brand, $good_price)
    {
        $this->name = $good_name;
        $this->brand = $good_brand;
        $this->price = $good_price;
    }

    public function getDiscount(Good $discount){
        var_dump($this->name . "снижена на " . $discount->name);
    }
}