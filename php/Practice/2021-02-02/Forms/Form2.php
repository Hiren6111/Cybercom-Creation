<?php
if(isset($_POST['fname']) && isset($_POST['fpassword'])&&isset($_POST['gender'])){

echo $fname= $_POST['fname'];
echo "<br>";

echo $fpassword= $_POST['fpassword'];
echo "<br>";

echo $gender= $_POST['gender'];
echo "<br>";

echo $faddress= $_POST['faddress'];
echo "<br>";

echo $month= $_POST['month'];
echo "<br>";

echo $year= $_POST['year'];
echo "<br>";

echo $day= $_POST['day'];
echo "<br>";

echo $fgame= $_POST['fgame'];
echo "<br>";
echo $mstatus= $_POST['mstatus'];
echo "<br>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form2</title>
    <script src="Form2.js"></script>

    <style>
        fieldset {
            width: 50px;
            background-color: rgb(67, 223, 134);
            
        }
        table{
            margin left:250px;
        }
    </style>
</head>

<body>

    <fieldset>
        <legend align="center">USER FORM</legend>
        <table>
            <form action="Form2.php" method="POST" onclick= "return validateForm()">

                <tr>
                    <td>
                        <ul>
                            <li>FIRST NAME</li>
                        </ul>
                    </td>
                    <td><input type="text" name="fname"><span class="error"></span></td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <li>PASSWORD</li>
                        </ul>
                    </td>
                    <td><input type="password" name="fpassword"><span class="error"></span></td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <li>GENDER</li>
                        </ul>
                    </td>
                    <td><input type="radio" name="gender" id="male" value="male">Male
                        <input type="radio" name="gender" id="female" value="female">Female
                        <span class="error"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <li>ADDRESS</li>
                        </ul>
                    </td>
                    <td><textarea cols="30" rows="6" name="faddress"></textarea><span class="error"></span></td>
                    <span class="error"></span></td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <li>D.O.B.</li>
                        </ul>
                    </td>
                    <td>
                        <select name="month" id="month">
                            <option value="jan" selected>January</option>
                            <option value="Feb">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                        </select>


                        <select name="day" id="day">
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>


                        <select name="year" id="year">
                            <option value="1990">1990</option>
                            <option value="1991">1991</option>
                            <option value="1992">1992</option>
                            <option value="1993">1993</option>
                        </select>
                        <span class="error"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <li>SELECT GAMES</li>
                        </ul>

                    <td><input type="checkbox" name="fgame">Hockey
                        <input type="checkbox" name="fgame">Football
                        <input type="checkbox" name="fgame">Cricket
                        <input type="checkbox" name="fgame">Volleyball
                        <span class="error"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <li>MARITAL STATUS</li>
                        </ul>
                    </td>
                    <td><input type="radio" name="mstatus" id="Married" value="Married">Married
                        <input type="radio" name="mstatus" id="Unmarried" value="Unmarried">Unmarried
                        <span class="error"></span>
                    </td>
                </tr>
                <tr>

                    <td></td>
                    <td><input type="submit" value="Submit">
                        <input type="reset" value="Reset"><span class="error"></span>
                    </td>
                </tr>
                <tr>

                    <td></td>
                    <td><input type="checkbox" name="fterms">I accept this agrement<span class="error"></span></td>
                </tr>








    </fieldset>





    </form>
</body>




</html>