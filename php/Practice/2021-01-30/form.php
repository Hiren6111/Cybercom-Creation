<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>

    <style>
form {
    margin-left: 300px;
    margin-right: 300px;
}

label {
    display: inline-block;
    width: 210px;
    text-align: left;
}

textarea {
    margin-left: 138px;
}

#img {
    margin-left: 162px;
}

.container {
    box-sizing: border-box;
    margin-top: 20px;
    margin-left: 450px;
}
</style>

</head>

<body>
    <?php

    $nameErr = $cnameErr = $snameErr =  $lnameErr ="";
    $fname = $Sname =$Cname = $lname = "";
    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["fname"])) {
           $nameErr = "Firsr Name is required";
        }else {
           $fname = test_input($_POST["fname"]);
        }


        if (empty($_POST["lname"])) {
            $lnameErr = "Last Name is required";
         }else {
            $lname = test_input($_POST["lanme"]);


        if (empty($_POST["Cname"])) {
             $cnameErr = "City is required";
        }else {
             $Cname = test_input($_POST["Cname"]);
            
                
        if (empty($_POST["Sname"])) {
            $snameErr = "Strret is required";
        }else {
             $Sname = test_input($_POST["Sname"]);
        }
    }
}
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }

    ?>

    <h1 align="center"> Registration Form</h1>

    <p><span class = "error">* required field.</span></p>

    <form>
        <fieldset>

            <!--   For address-->
            <legend>Your Address</legend>

            <span class = "error">* <?php echo $nameErr;?></span>

            <label for="fname">First name:</label>
            <input type="text" id="fname" name="fname"><br><br>


            <span class = "error">* <?php echo $lnameErr;?></span>
            <label for="lname">Last name:</label>
            <input type="text" id="lname" name="lname"><br><br>
            
            <span class = "error">* <?php echo $snameErr;?></span>
            <label for="Sname">Steet:</label>
            <input type="text" id="Sname" name="Sname"><br><br>
            
            <span class = "error">* <?php echo $cnameErr;?></span>

            <label for="Cname">City:</label>
            <input type="text" id="Cname" name="Cname"><br><br>
            

        </fieldset>

        <fieldset>


            <!-- For Additional Details-->

            <legend> Additional details</legend>

            <lable for="bio">Biography :</lable>
            <textarea id="bio" name="Biography" rows="4" cols="12"> </textarea><br><br>
            <lable for="img">Image :</lable>
            <input type="file" id="img" name="filename"><br><br>
            <label for="Age">Agegroup:</label>
            <select id="Age" name="Age">
                <option value="0to9">0 to 9</option>
                <option value="10to30">10 to 30</option>
                <option value="31to50">31 to 50</option>
                <option value="51to60">51 to 60</option>
            </select>



        </fieldset>
        <fieldset>

            <!--   For Intrest-->
            <legend>Intrest</legend>

            <label for="hobby">Hobbies:</label>
            <input type="text" id="hobby" name="hobby"><br><br>
            <label for="carname">Favourite Car:</label>
            <select id="carname" name="carname">
                <option value="volvo">Volvo</option>
                <option value="saab">Saab</option>
                <option value="fiat">Fiat</option>
                <option value="audi">Audi</option>
            </select><br><br>

            <label for="tport">Favourite Public Transport?:</label>
            <input type="text" id="tport" name="tport"><br><br>



        </fieldset>

        <!-- submit  button -->
        <div class="container">
            <input type="submit">
        </div>
    </form>

    <?php
         echo "<h2>Your given values are as :</h2>";
         echo ("<p>Your First name is $fname</p>");
         echo ("<p> your Last name is $lname</p>");
         echo ("<p>Your City is $Cname</p>");
         echo ("<p>your Street is $Sname </p>");

         ?>




</body>
</html>