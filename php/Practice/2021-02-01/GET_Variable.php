<?php
if (isset($_GET['day'])&&isset($_GET['date'])&&isset($_GET['year'])){
    $day = $_GET['day'];
    $date=$_GET['date'];
    $year=$_GET['year'];
    if(!empty($date)&&!empty($date)&&!empty($year)){
        echo 'ok.'
    }
    else
    {
        echo 'Please fill all the fields.'
    }
}
?>

<form action="GET_Variable.php" method="get">

    Day:<br><input type="text" name="day"><br>
    Date:<br><input type="text" name="date"><br>
    Year:<br><input type="text" name="year"><br><br>

    <input type="submit" value="submit">
</form>