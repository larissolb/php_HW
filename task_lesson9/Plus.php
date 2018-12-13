<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Operation
 *
 * @author larissolb
 */
require_once 'Operation.php';

class Plus extends Operation {
    
    public function __construct($a, $b) {

        parent::__construct($a, $b);
    }
    
    
    public function execute($a, $b){
        $c = $a + $b;
         var_dump($c);
    
    
    }
    
   
}

