<?php

include ('server.php');

if(isset($_POST['deleteid'])){

    $userid=$_POST['deleted'];
    $deletequery = "DELETE FROM lists WHERE id='$userid'";
    mysqli_query($db, $deletequery);
}

?>