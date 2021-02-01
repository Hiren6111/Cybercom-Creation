<?php


if( isset ($_GET['user_name'])&&! empty ($_GET['user_name'])){
    $user_name = $_GET['user_name'];
    $user_name_lc = strtolower($user_name);

    if($user_name_lc="lucifer"){
        echo 'you are the best.';
    }
}


?>

<form action="Upper_Lower.php" method="get">

Name: <input type="text"  name="user_name"><br><br>
 <input type="submit" name="submit">

</form>