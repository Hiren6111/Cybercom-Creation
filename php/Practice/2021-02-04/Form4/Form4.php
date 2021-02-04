<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form 4</title>
    <link rel="stylesheet" type="text/css" href="Form4.css" />
</head>


</head>

<body>
    <table>
        <form action="Form4.php" method="post">

        <?php include('errors.php')?>

        <th class="header">CONTACT US!</th>
        <tr>
            <td class="row"><input type="text" name="fname" placeholder="Name..." value="<?php  echo $fname?>"></td>
        </tr>
        <tr>
            <td class="row"><input type="email" name="email" placeholder="Email..." value="<?php echo $email?>"></td>
        </tr>
        <tr>
            <td class="row"><input type="text" name="subject" placeholder="Subject..." value="<?php echo $subject?>"></td>
        </tr>
        <tr>
            <td class="row"><textarea name="message" cols="31" rows="6" placeholder="Message..." value="<?php echo $message?>"></textarea></td>
        </tr>
        <th class="footer"><input type="submit" value="SEND MESSAGE" id="submit" name="sending"></th>
        </form>
    </table>
</body>

</html>