<?php

include ('server.php');

$no=$_GET['rn'];
$query ="DELETE FROM list WHERE id='$no' ";

$data = mysqli_query($db,$query);

if($data){

    echo "Deleted";
}
else{
    echo "not deleted";
}



?>