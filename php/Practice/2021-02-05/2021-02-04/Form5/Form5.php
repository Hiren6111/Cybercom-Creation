<?php include('server.php')?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form 5</title>
    <style>
        .header {
            color: azure;
            background-color: rgb(233, 35, 35);
        }
        .container{
            background-color: azure;
            display: flexbox;
            box-sizing: border-box;
        }
        #submit{
            border-radius: 2px;
            background-color: rgb(114, 231, 114);
        }
        body{
            margin-left: 650px;
            margin-top: 250px;
        }    </style>

</head>

<body>
    <table>
        <form action="Form5.php" method="post">




            <th class="header">Sign In</th>

            <?php include('errors.php')?>

            <div class="container">
                <tr>
                    <td>E-mail address</td>


                </tr>
            </div>
            <div class="container">
                <tr>
                    <td><input type="text" name="email" placeholder="mail@address.com" value="<?php echo $email?>"required></td>

                </tr>
            </div>
            <div class="container">
                <tr>
                    <td>Password</td>

                </tr>
            </div>
            <div class="container">
                <tr>
                    <td><input type="password" name="password" value="<?php echo $password?>" placeholder="........" required></td>

                </tr>
            </div>
            <div class="container">
                <th class="footer"><input type="submit" name="sign_in" value="Sign in" id="submit"></th>

            </div>
        </form>
    </table>

</body>

</html>