<?php

class Car{

    public $color = 'blue';
    public $com = 'bmw';

    public function hello(){

    return "beep";
}
}

$color = new Car();
$com = new Car();

echo $color -> hello();
echo $com -> hello();




?>