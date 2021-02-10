<?php include('connect.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
    
</head>

<body>
<div class="container">
    <h3 align="center">Register</h3>

    <table align="center">
        <form action="blogpost.php" method="post" name="Form1">
            <?php include('errors.php'); ?>

            <tr>
                <td>Prefix</td>
                <td><select name="prefix" id="prefix" <?php echo $prefix ?>>
                        <option value=""></option>
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Ms">Ms</option> </select></td>
            </tr>
            <tr>
                <td>FirstName</td>
                <td><input type="text" name="fname" value="<?php echo $fname ?>"></td>
            </tr>
            <tr>
                <td>LastName</td>
                <td><input type="text" name="lname" value="<?php echo $lname ?>"></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="<?php echo $email ?>"></td>
            </tr>

            <tr>
                <td>Mobile Number</td>
                <td><input type="phone" name="phone" value="<?php echo $phone ?>"></td>
            </tr>

            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>

            <tr>
                <td>Confirm Password</td>
                <td><input type="password" name="cpassword"></td>
            </tr>

            <tr>
                <td>Information</td>
                <td><textarea cols="30" rows="6" name="info" value="<?php echo $info ?>"></textarea></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="checkbox" name="terms">Hereby,I accept Term & conditions.</td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" name="submit" id="submit" value="submit" onclick="validateForm();"></td>
            </tr>
            
            </form>

    </table>
</div>
</body>
<script src="register.js"></script>

</html>