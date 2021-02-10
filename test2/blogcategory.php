<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Category</title>
    <style>
    
    .header{
        display: inline;
    }
    
    </style>
</head>
<body>

     <div class="container">
     
     <a href="blogcategory.php" class="header">Mange Category</a>
     <a href="#" class="header">My Profile</a>
     <a href="#" class="header">Log out</a>

     
     <hr>

     <h3>Blog Category</h3>

     <form action="Addcategory.php" method="post">
     <input type="submit" name="submit1" value="Add category">
     </form>
     <hr>

     <?php
     error_reporting(0);
    $con =  mysqli_connect("localhost:3307", "root", "", "registration");

    if (!$con) {
        die('not connected');
    }
    $con =  mysqli_query($con, "SELECT post_catagory.Category_Id,blog_post.Image,blog_post.Content FROM blog_post INNER JOIN post_catagory ON blog_post.Id=post_catagory.Category_Id");

    ?>
    <div>

        <table border="1">
            <th>Catagory id</th>
            <th>Catagory Image</th>
            <th>Category Name</th>
            <th>Created Date</th>
            <th colspan="2">Actions</th>

            <?php

            while ($row =  mysqli_fetch_array($con)) {
                echo "
        
                <tr>
                 <td>" . $row['id']." </td>
                    <td>" . $row['folder']."</td>
                    <td>" . $row['name']."</td>
                    <td>" . $row['Phone']."</td>
                    <td><a href='update.php?rn=$row[id] &nm=$row[Name] &em=$row[Email] &ph=[Phone]& ti=$row[Title] &cr=$row[Created]'>Edit</a></td>
                    <td><a href='delete.php?rn=$row[id] onclick='return checkdelete()'>Delete</a></td>
                    </tr>
                    ";
        
            }
                ?>
     
     
     
     
     </div>    


</body>
</html>