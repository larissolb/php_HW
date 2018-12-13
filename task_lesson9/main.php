<?php

        
include_once 'Operation.php';
include_once 'Plus.php';
include_once 'Minus.php';

//создание объекта
$operation = new Operation();



$plus = new Plus(3, 4);
var_dump($plus);
$plus->execute(3, 4);
var_dump($plus);

$minus = new Minus(1, 5);
var_dump($minus);
$minus->execute(1, 5);
var_dump($minus);





