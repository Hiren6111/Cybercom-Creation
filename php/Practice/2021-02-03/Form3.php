<?php


// define variables and set to empty values
$fnameErr =$lnameErr= $passwordErr =$cpasswordErr=$dateErr=$monthErr=$yearErr= $genderErr = $countryErr=$emailErr =$phoneErr=$ftermsErr ="";
$fname = $lname = $gender = $password = $cpassword = $date = $month = $year= $country =$email = $phone= $fterms="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["fname"])) {
      $fnameErr = "Name is required";
   }else {
      $fname = test_input($_POST["fname"]);
   }


   if (empty($_POST["lname"])) {
    $lnameErr = "lastname is required";
   }else {
     $lname = test_input($_POST["lname"]);
}
   
    if (empty($_POST["date"])) {
      $dateErr = "Date is required";
   }else {
      $date = test_input($_POST["date"]);
   }

    if (empty($_POST["month"])) {
        $monthErr = "Month is required";
    }else {
        $month = test_input($_POST["month"]);
    }
    
    if (empty($_POST["year"])) {
        $yearErr = "Year is required";
    }else {
        $year = test_input($_POST["year"]);
    }
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
     }else {
        $gender = test_input($_POST["gender"]);
     }

   
   
   if (empty($_POST["country"])) {
      $countryErr = "Please select country";
   }else {
      $country = test_input($_POST["country"]);
   }
   
   
   if (empty($_POST["email"])) {
        $emailErr = "Email is required";
   }else {
        $email = test_input($_POST["email"]);
 }
 
 if (empty($_POST["phone"])) {
    $phoneErr = "Phone number is required";
}else {
    $phone = test_input($_POST["phone"]);
}

if (empty($_POST["password"])) {
    $passwordErr = "password is required";
}else {
    $password = test_input($_POST["password"]);
}
if (empty($_POST["cpassword"])) {
    $cpasswordErr = "confirm password is required";
}else {
    $cpassword = test_input($_POST["cpassword"]);
}
if (empty($_POST["fterms"])) {
    $ftermsErr = "Please check the term and condition";
}else {
    $fterms = test_input($_POST["fterms"]);
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
    <title>Form3</title>
    <style>
        table{
            border: 0px;
            border-style: none;
            display: block;
            
        }
        .firstcol{
            color:darkgoldenrod;
        }
        tr{
            background-color: rgb(35, 35, 56);
        }
        th{
            background-color: chocolate;
        }
        .error{
            color: red;
        }
    </style>

</head>

<body>

    <table>
        <form action="Form3.php" name="Form3" method="POST" >

            <th colspan="2">Sign Up</th>
            <tr>
                <td class="firstcol">First Name</td>
                <td><input type="text" name="fname" placeholder="Enter First Name">
                    <span class="error"><?php echo $fnameErr;?></span>
                </td>
                
            </tr>
            <tr>
                <td class="firstcol">Last Name</td>
                <td><input type="text" name="lname" placeholder="Enter Last Name">
                    <span class="error"><?php echo $lnameErr;?></span>
                </td>
            </tr>
            <tr>
                <td class="firstcol">Date of Birth</td>
                <td>
                    <select name="date" id="date">
                        <option value="date">Date</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    <span class="error"><?php echo $dateErr;?></span>
                    <select name="month" id="month">
                        <option value="month">Month</option>
                        <option value="jan">January</option>
                        <option value="Feb">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                    </select>
                    <span class="error"><?php echo $monthErr;?></span>
                    <select name="year" id="year">
                        <option value="year">Year</option>
                        <option value="1990">1990</option>
                        <option value="1991">1991</option>
                        <option value="1992">1992</option>
                        <option value="1993">1993</option>
                    </select>
                    <span class="error"><?php echo $yearErr;?></span>


                </td>
            </tr>
            <tr>
                <td class="firstcol">Gender</td>
                <td class="firstcol"><input type="radio" name="gender" id="male" value="male">Male
                    <input type="radio" name="gender" id="female" value="female">Female
                    <span class="error"><?php echo $genderErr;?></span>
                </td>
            </tr>
            <tr>
                <td class="firstcol">Country</td>
                <td><select name="country" id="country">
                        <option value="country">Country</option>
                        <option value="india">India</option>
                        <option value="uk">U.K.</option>
                        <option value="usa">U.S.A</option>
                        <option value="pak">Pakistan</option>
                        <span class="error"><?php echo $countryErr;?></span>
                    </select> </td>
            </tr>
            <tr>
                <td class="firstcol">Email</td>
                <td><input type="text" name="email" placeholder="Enter E-mail">
                    <span class="error"><?php echo $emailErr;?></span>
                </td>
            </tr>
            
            <tr>
                <td class="firstcol">Phone</td>
                <td><input type="text" name="phone" placeholder="Enter phone">
                    <span class="error"><?php echo $phoneErr;?></span>
                </td>
            </tr>
            <tr>
                <td class="firstcol">Password</td>
                <td><input type="password" name="password" >
                    <span class="error"><?php echo $passwordErr;?></span>
                </td>
            </tr>
            <tr>
                <td class="firstcol">Confirm Password</td>
                <td><input type="password" name="cpassword" >
                    <span class="error"><?php echo $cpasswordErr;?></span>
                </td>
            </tr>
            <tr>
                <td class="firstcol"></td>
                <td class="firstcol"><input type="checkbox" name="fterms">I Agree to the Terms of use<span class="error"><?php echo $ftermsErr;?></span></td>
            </tr>
    
            <th colspan="2">
                
                <input type="submit" value="Submit">
                    <input type="reset" value="Cancle"><span class="error"></span>
            </th>



        </form>
    </table>

    <?php
         echo "<h2>Your given values are as:</h2>";
         echo $fname;
         echo "<br>";
         
         echo $lname;
         echo "<br>";

         echo $date;
         echo "<br>";
         
         echo $month;
         echo "<br>";
         
         echo $year;
         echo "<br>";

         echo $gender;
         echo "<br>";

         echo $country;
         echo "<br>";
         
         echo $email;
         echo "<br>";
         
         echo $phone;
         echo "<br>";

         echo $password;
         echo "<br>";
         
         echo $cpassword;
         echo "<br>";
         
         
         
      ?>


</body>

</html>