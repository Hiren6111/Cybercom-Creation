<?php

$mysql_host = 'localhost:3307';
$mysql_user ='root';
$mysql_paas ='';
$mysql_db ='registration';

class ServerEception extends Exception{}
class DatabaseException extends Exception{}

try{

    if(!mysqli_connect($mysql_host,$mysql_user,$mysql_paas)){
        throw new ServerException ('Could not connect to server');
    }
    
    else if(!mysqli_select_db($mysql_db)) {
        throw new DatabaseException ('Could not connect database');

    }else{
        echo 'Connected';
    }
}
catch(Exception $ex){
    echo 'Error :'.$ex -> getmessage();
 }

catch(Exception $ex){
    echo 'Error :'.$ex -> getmessage();
 }
?>