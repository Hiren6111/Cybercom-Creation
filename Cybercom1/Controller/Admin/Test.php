<?php
namespace Controller\Admin;

class Test extends \Controller\Core\Admin{
    protected $array = [];
  public function testAction()
  {
     $number = 4567;
     $fector = 6;

    

     $array[] = ($number % $fector); 

     


  }  
}


?>