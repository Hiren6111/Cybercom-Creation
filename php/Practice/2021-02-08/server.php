<?php

session_start();

// initializing variables
$name = "";
$email = "";
$phone = "";
$title = "";
$created = "";
$id = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost:3307', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['create'])) {
    // receive all input values from the form
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $created = mysqli_real_escape_string($db, $_POST['created']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($name)) {
        array_push($errors, "Name is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($phone)) {
        array_push($errors, "Phone is required");
    }
    if (empty($title)) {
        array_push($errors, "Title is required");
    }
    if (empty($created)) {
        array_push($errors, "created is required");
    }
}



// Finally, register user if there are no errors in the form
if (count($errors) == 0) {
    $query =" INSERT INTO `list` (`id`, `Name`, `Email`, `Phone`, `Title`, `Created`) VALUES (NULL, '$name', '$email', '$phone', '$title', '$created')";
    $fire = mysqli_query($db, $query);
    if($fire){
        echo "Contact Successfully";
    }
    
    
}
