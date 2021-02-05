<?php

class DatabaseConnection{

    public function __constuct($db_host,$db_user,$db_pass){
        echo $db_user.'<br>' .$db_user.'<br>'.  $db_pass.'<br>';
    }
}
$connect = new DatabaseConnection ();
?>