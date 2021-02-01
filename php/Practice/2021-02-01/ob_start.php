<?php  ob_start();?>

<h1>MyPage</h1>



<?php

$redirect_page= 'http://google.com';
$redirect = true;

header('Location: '.$redirect_page);


ob_end_clean();
?>