<?php

if(isset($_POST['sub'])){

    $rand = rand(1,6);
    echo 'you rolled is'.$rand;
}




?>

<form action="Random_number.php" method="POST">

<input type="submit" name ="sub" value="Roll Dice.">

</form>