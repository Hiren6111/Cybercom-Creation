<?php



$conn_error = 'Could not connect';
$mysql_host ='localhost';
$mysql_user= 'root';
$mysql_pass= '';

@mysqli_connect($mysql_host,$mysql_user,$mysql_pass,"forms");

echo 'Connected :)'




?>