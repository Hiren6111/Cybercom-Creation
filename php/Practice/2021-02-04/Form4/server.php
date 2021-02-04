<?php


//initializing variables

$fname ="";
$email="";
$subject="";
$message="";
$errors = array();

//connect to database

$db=mysqli_connect('localhost:3307','root','','registration');

//register user

if(isset($_POST['sending'])){

//recieve all values from form

$fname = mysqli_real_escape_string($db,$_POST['fname']);
$email = mysqli_real_escape_string($db,$_POST['email']);
$subject = mysqli_real_escape_string($db,$_POST['subject']);
$message = mysqli_real_escape_string($db,$_POST['message']);

//form validation

if(empty($fname)){ array_push($errors,"Name is required");}
if(empty($email)){ array_push($errors,"Email is required");}
if(empty($subject)){ array_push($errors,"Subject is required");}
if(empty($message)){ array_push($errors,"Message is required");}

//register user if there is no error

if(count($errors)==0){

    $query= "INSERT INTO contact (Name,Email,Subject,Message)
    VALUES('$fname','$email','$subject','$message')";

    mysqli_query($db,$query);

    echo 'Message sent successfully';
}


}



?>