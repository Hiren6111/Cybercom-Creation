<?php


//initializing variables

$email="";
$password="";
$errors = array();

//connect to database

$db=mysqli_connect('localhost:3307','root','','registration');

//register user

if(isset($_POST['sign_in'])){

//recieve all values from form

$email = mysqli_real_escape_string($db,$_POST['email']);
$password = mysqli_real_escape_string($db,$_POST['password']);

//form validation

if(empty($email)){ array_push($errors,"Email is required");}
if(empty($password)){ array_push($errors,"password is required");}

//register user if there is no error

if(count($errors)==0){

    $query= "INSERT INTO details (Email,password)
    VALUES('$email','$password')";

    mysqli_query($db,$query);

    echo 'sign in';
}


}



?>