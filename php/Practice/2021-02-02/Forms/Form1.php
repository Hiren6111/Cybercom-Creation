<?php

// define variables and set to empty values
$fnameErr = $fpasswordErr = $fgenderErr = $fgameErr=$faddressErr =$filenameErr= "";
$fname = $fpassword = $fgender = $fgame = $faddress =$filename= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["fname"])) {
      $fnameErr = "Name is required";
   }else {
      $fname = test_input($_POST["fname"]);
   }


   if (empty($_POST["fpassword"])) {
    $fpasswordErr = "password is required";
   }else {
     $fpassword = test_input($_POST["fpassword"]);
}
   
    if (empty($_POST["faddress"])) {
      $faddressErr = "address is required";
   }else {
      $faddress = test_input($_POST["faddress"]);
   }

   
   
   if (empty($_POST["fgame"])) {
      $fgameErr = "Please select game";
   }else {
      $fgame = test_input($_POST["fgame"]);
   }
   
   if (empty($_POST["fgender"])) {
      $fgenderErr = "Gender is required";
   }else {
      $fgender = test_input($_POST["fgender"]);
   }
   if (empty($_POST["filename"])) {
        $filenameErr = "Please choose the file";
   }else {
        $filename = test_input($_POST["filename"]);
 }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form 1</title>
    <script src="Form1.js"></script>
    <style>
        
        td,
        table {
            border: solid black;
            background-color: rgb(91, 144, 230);

        }
        th{
            border: solid black;
            background-color: darkkhaki;
            
        }

        input,
        textarea {
            display: inline block;
            margin-left: 50px;
            background-color: aquamarine;
        }
        .Formerror{
            color : red;
        }

        
        
    </style>
</head>

<body>

    <table>
        <form action="Form1.php" name="Form1"  method="post">

            <tr>
                <th align="center" colspan="2"> USER FORM</th>
            </tr>
            <tr>
                <div class="formdesign" id="name">
                <td>Enter Name:</td>
                <td><input type="text" name="fname" >
                <b><span class="Formerror"><?php echo $fnameErr;?></span></b>
            
            </td>
    </div>
            </tr>
            <tr>
                <div class="formdesign" id="password">
                <td>Enter Password:</td>
                <td><input type="password" name="fpassword">
                <b><span class="Formerror"><?php echo $fpasswordErr;?></span></b>
            </td>
    </div>
            </tr>
            <tr>
                <div class = "formdesign" id="address">
                <td>Enter Address:</td>
                <td><textarea name="faddress" cols="40" rows="6"></textarea>
                <b><span class="Formerror"><?php echo $faddressErr;?></span></b>
            </td>
            </tr>
            <tr>
                <div class="formdesign" id="game">
                <td>Select Game:</td>
                <td><input type="checkbox" name="fgame">Hockey <br>
                    <input type="checkbox" name="fgame">Football <br>
                    <input type="checkbox" name="fgame">Badminton <br>
                    <input type="checkbox" name="fgame">Cricket <br>
                    <input type="checkbox" name="fgame">Volleyball <br>
                    <b><span class="Formerror"> <?php echo $fgameErr;?></span></b>

                </td>
    </div>
            </tr>
            <tr>
                <div class="formdesign" id="gender">
                <td>Gender: </td>
                <td><input type="radio" name="fgender"> Male
                    <input type="radio" name="fgender"> Female
                    <b><span class="Formerror"> <?php echo $fgenderErr;?></span></b>
    </div>

                </td>
            </tr>
            <tr>
                <div class="formdesign" id="myFile">
                <td colspan="2">
                    <input type="file" id="myFile" name="filename">
                    <b><span class="Formerror"> <?php echo $filenameErr;?></span></b>
                </td>
    </div>
            </tr>
            <tr>
                
                 <td colspan="2">
                    <input type="submit" value="submit">
                    <input type="reset" value="Reset Form">
                    <b><span class="Formerror"></span></b>
                </td>
            </tr>

        </form>
    </table>


    <?php
         echo "<h2>Your given values are as:</h2>";
         echo $fname;
         echo "<br>";
         
         echo $faddress;
         echo "<br>";

         echo $fpassword;
         echo "<br>";
         
         echo $fgame;
         echo "<br>";
         
         echo $fgender;
         echo "<br>";
         
         echo $filename;
      ?>


</body>


</html>