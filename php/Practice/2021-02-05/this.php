<?php
class User{
    public $firstname = "hiren";
    public $lastname ="patel";
    
    public function hello(){
        
        return "Hello I am ". $this -> firstname .$this -> lastname ;
        
    }
}
$user1= new USer();

$user1 ->firstname ='john';
$user1->lastname ='doe';

echo $user1 -> hello();

?>
