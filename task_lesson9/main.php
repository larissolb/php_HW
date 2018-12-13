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


class Operation {
    protected $a;
    protected $b;
    
      public function __construct($a, $b) {
        
        $this->a = $a;
        $this->b = $b;
    }
    
    public function execute() {
      return;
    }
    
}

class Plus extends Operation {
    
    function __construct($a, $b) {

        parent::__construct($a, $b);
    }
    
    
    public function execute(){
        
        return $this->a + $this->b;
    
    }
   
}

class Minus extends Operation {
    
    public function __construct($a, $b) {

        parent::__construct($a, $b);
    }
    
    
    public function execute(){
      return $this->a - $this->b;
    
    
    }
    
}

class Calculator {
    
    public static function getInstance($a, $b, $operation){
         if($operation == "+"){
             return new Plus($a, $b);
         }
         return new Minus($a, $b);
}
}

$post = $_POST;
$a = $post["a"];
$b = $post["b"];
$op = $post["operation"];
$sum = $a+$b;
$total = $post["total"];


$operation = Calculator::getInstance($a, $b, $op);
$operation->execute();
var_dump($operation);
var_dump($sum);

?>
<!--//форма из $POST значения и передать их-->

<!DOCTYPE html>
<form name="calculate" action="main.php" method="POST">
    <input type="number" name="a">
        <input type="text" name="operation">
    <input type="number" name="b">

    <input type="submit" value="="> <span><?php echo $sum ?>
    </span>

    
    
    
</form>



