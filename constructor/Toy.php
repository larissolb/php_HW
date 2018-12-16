<?php

include_once "Good.php";

// дочерний класс
class Toy extends Good
{
    // конструктор
    public function __construct($toy_name, $toy_brand, $toy_price)
    {
        parent::__construct($toy_name, $toy_brand, $toy_price);
        
    }
    public function getDiscount($discount){
        var_dump("Цена на " . $this->name . " снижена на " . $discount); 
    }
}