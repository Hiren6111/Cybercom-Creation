<?php

$age=12;

try{

    if($age>=18)
    {
        echo 'Old enough';
    }
    else
    {
        throw new Exception('Age is Not enough. ');
    }
}
catch(Exception $ex)
{
    echo 'Error :'.$ex -> getmessage();
 }
?>