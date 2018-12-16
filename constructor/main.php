<?php


include_once "Toy.php";

// создание объекта

$toy = new Toy("Consctructor", "Lego", 450);
$toy->getDiscount("15%");

var_dump($toy);


require_once "Basket.php";

$basket = new Basket(1, 0);
$basket->setGood($toy);

echo "Находится в корзине " . $basket->getGoodName() . ". Итоговая цена: " . $basket->getGoodPrice();