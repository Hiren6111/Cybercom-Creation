<?php
class User{
    public $firstname = "hiren";
    public $lastname ="patel";
    
    public function hello(){
        
        return "Hello";
    }
}
$user1= new USer();

$user1 ->firstname ='john';
$user1->lastname ='doe';

echo $user1 ->firstname;
echo $user1->lastname ;

?>
