<?php

$browser =get_browser(null,true);
$browser =strtolower($browser['browser']);

if($browser!='chrome'){

    echo 'You are not using google chrome.Please do';
}
?>