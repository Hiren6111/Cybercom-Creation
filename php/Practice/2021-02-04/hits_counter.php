<?php

require 'connect.inc.php';

$user_ip = $_SERVER['REMOTE_ADDR'];



function ip_exists($ip){
    global  $user_ip;
    echo $user_ip;


}
function update_count(){

    $query ="SELECT `count`FROM `hits_count`";

    if($query_run = mysqli_query($link,$query)){

        $count = mysqli_result($query_run,0,'count');

        echo $count;
    }
}
update_count();
?>

