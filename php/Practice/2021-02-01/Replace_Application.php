<?php

$offset=0;

if(isset($_POST['text'])&& isset($_POST['searchfor'])&&isset($_POST['replacewith'])){
    $text = $_POST['text'];
    $search = $_POST['searchfor'];
    $replace = $_POST['replacewith'];

    $search_length= strlen($search);

    if(!empty($text)&&!empty($search)&&!empty($replace)){

        while($strpos= strpos($text,$search,$offset)){
            $offset = $strpos + $search_length;
            $text = substr_replace($text,$replace,$strpos,$search_length);
        }
       

       
        }
     }



?>

<form action="Replace_Application.php" method="POST">
<textarea name="text" cols="30" rows="6"></textarea><br><Br>

Serching For: <br>
<input type="text" name="searchfor"><br><br>

Replace For: <br>
<input type="text" name="replacewith"><br><br>

<input type="submit" value="Find And Replace">

</form>