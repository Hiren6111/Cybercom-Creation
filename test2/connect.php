<?php
session_start();

// initializing variables
$prefix = "";
$fname = "";
$lname    = "";
$email = "";
$phone = "";
$password = "";
$cpassword = "";
$info = "";
$terms = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost:3307', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['submit'])) {
    // receive all input values from the form
    $prefix = mysqli_real_escape_string($db, $_POST['prefix']);
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $cpassword = mysqli_real_escape_string($db, $_POST['cpassword']);
    $info = mysqli_real_escape_string($db, $_POST['info']);


    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($prefix)) {
        array_push($errors, "Prefix is required");
    }
    if (empty($fname)) {
        array_push($errors, "Firstname is required");
    }
    if (empty($lname)) {
        array_push($errors, "lastname is required");
    }
    if (empty($email)) {
        array_push($errors, "email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if ($password != $cpassword) {
        array_push($errors, "The two passwords do not match");
    }
    if (empty($phone)) {
        array_push($errors, "Mobile number  is required");
    }

    if (empty($info)) {
        array_push($errors, "Information is required");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM user WHERE  email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user['email'] === $email) {
        array_push($errors, "email already exists");
    }
}

// Finally, register user if there are no errors in the form
if (count($errors) == 0) {
    $password = md5($cpassword); //encrypt the password before saving in the database

    $query = "INSERT INTO `user` (`Id`, `Prefix`, `Firstname`, `Lastname`, `Email`, `Password`, `Lastlogin At`, `Information`, `Created At`, `Updated At`) VALUES (NULL, '$prefix', '$fname', '$lname', '$email', '$password', '', '$info', '', '');";
    $fire=mysqli_query($db, $query);
    

    

}
?>