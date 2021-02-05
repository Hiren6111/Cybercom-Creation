<?php

// parent class
class Car{

    private $model;



    //Public setter method
   public function setModel($model)
  {
     $this -> model = $model;
  }
 
  public function hello()
  {
    return "beep! I am a <i>" . $this -> model . "</i><br />";
  }
}
    //child class

    class SuperCars extends Car{

    }

    $supercars = new SuperCars();

    $supercars -> setModel('Mercedes Benz');

    echo $supercars ->hello();









?>