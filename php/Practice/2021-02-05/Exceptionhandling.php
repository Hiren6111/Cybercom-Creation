<?php

function divide($num1,$num2){

    if($num2==0){
        throw new Exception ('Can not divide by 0');
    }else{
         return $num1/$num2;
    }
}

echo divide(10,0);





?>