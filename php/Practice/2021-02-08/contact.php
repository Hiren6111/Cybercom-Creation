<?php?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
   <link rel="stylesheet" href="contact.css">
</head>

<body>
    <div class="container">

        <h3 class="item">Website title</h3>
        <a href="index.php" class="item" id="home">Home</a>
        <a href="contact.php" class="item" id="contact">Contact US</a>

    </div>
    <h2>Read Contacts </h2>
    <hr>
    <form action="Create.php" method="post">
        <input type="submit" id="btn" value="Creat Contact">
    </form>

    <?php
    $con =  mysqli_connect("localhost:3307", "root", "", "registration");

    if (!$con) {
        die('not connected');
    }
    $con =  mysqli_query($con, "select * from list");

    ?>
    <div>
        <td>Lists</td>
        <table border="1">
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Title</th>
            <th>Created</th>
            <th>Update/Delete</th>


            <?php

            while ($row =  mysqli_fetch_array($con)) {
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['Name']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td><?php echo $row['Phone']; ?></td>
                    <td><?php echo $row['Title']; ?></td>
                    <td><?php echo $row['Created']; ?></td>
                    <td><input type="button" id="edit" value="Edit" class="edit" onclick="location.href='update.php';">
                        <input type="button" value="Delete" class="delete" onclick="Deleteuser('$row[id]')">
                    </td>
                </tr>
            <?php
            }
            ?>
            
        </table>
    </div>
</body>
<script>
$(document).ready(function(){

    readREcords();
});

function Deleteuser(deleteid){
    var conf = confirm("Are you sure");
    if(conf == true){
        $.ajax({
            url:"delete.php",
            type:"post",
            data:{deleteid:deleteid},
            success:function(data,status){
                readREcords();
            }

        });
    }
}
</script>




</html>