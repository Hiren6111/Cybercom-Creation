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
            <th colspan="2">Update/Delete</th>


            <?php

            while ($row =  mysqli_fetch_array($con)) {
                echo "
        
                <tr>
                 <td>" . $row['id']." </td>
                    <td>" . $row['Name']."</td>
                    <td>" . $row['Email']."</td>
                    <td>" . $row['Phone']."</td>
                    <td>" . $row['Title']."</td>
                    <td>" . $row['Created']."</td>
                    <td><a href='update.php?rn=$row[id] &nm=$row[Name] &em=$row[Email] &ph=[Phone]& ti=$row[Title] &cr=$row[Created]'>Edit</a></td>
                    <td><a href='delete.php?rn=$row[id] onclick='return checkdelete()'>Delete</a></td>
                    </tr>
                    ";
        
            }
                ?>

        </table>
    </div>
</body>
<script src="jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {

    });

    function Deleteuser(deleteid) {
        var conf = confirm("Are you sure");
        if (conf == true) {
            $.ajax({
                url: "delete.php",
                type: "post",
                data: {
                    deleteid: deleteid
                },
                success: function(data, status) {

                }

            });
        }
    }
</script>

</html>