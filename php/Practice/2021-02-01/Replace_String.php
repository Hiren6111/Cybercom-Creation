<?php

$find = array('is','php','tutorial');
$replace=array('IS','PHP','Tutorial');

$string='This is a php tutorial.';
 
$new_string = str_replace($find,$replace,$string);

echo $new_string;



?>