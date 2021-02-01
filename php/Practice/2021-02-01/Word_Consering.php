<?php

$find = array('is','php','tutorial');
$replace=array('IS','P*P','Tutorial');

if (isset($_POST['user_input'])&&!empty($_POST['user_input'])){
    $user_input= $_POST['user_input'];
    $user_input_new= str_replace($find,$replace,$user_input);

    echo $user_input_new;
}




?>

<hr>

<form action="Word_Consering.php" method="POST">

<textarea name="user_input" cols="26" rows="6"><?php echo $user_input;?></textarea><br><br>
<input type="submit" name="Submit">



</form>