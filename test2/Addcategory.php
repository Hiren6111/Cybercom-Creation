<?php

     session_start();
     error_reporting(0);

     // initializing variables
     $titlee = "";
     $contentt = "";
     $urll    = "";
     $mtitle = "";
     $pcategory= "";
     $image="";
     
     $filename=$_FILES['uploadfile']["name"];
     $tempname=$_FILES['uploadfile']["tmp_name"];
     $folder="Image/".$filename;
     move_uploaded_file($tempname,$folder);
     
     // connect to the database
     $db = mysqli_connect('localhost:3307', 'root', '', 'registration');
     if($db){
         echo "connected";
     }else{ echo "not";}
     
     // REGISTER USER
     if (isset($_POST['submit3'])) {
         // receive all input values from the form
         $titlee = mysqli_real_escape_string($db, $_POST['titlee']);
         $contentt = mysqli_real_escape_string($db, $_POST['contentt']);
         $urll = mysqli_real_escape_string($db, $_POST['urll']);
         $mtitle = mysqli_real_escape_string($db, $_POST['mtitle']);
         $pcategory = mysqli_real_escape_string($db, $_POST['pcategory']);
         $image = mysqli_real_escape_string($db, $_POST['iamge']);
        }
     
     // Finally, register user if there are no errors in the for
        $query = "INSERT INTO `blog_post` (`Id`, `User id`, `Title`, `Url`, `Content`, `Image`, `Published_At`, `Created_At`, `Updated_At`) VALUES (NULL, '', '$titlee', '$urll', '$contentt', '$folder', '', '', '');";
         $fire=mysqli_query($db, $query);
         if($fire){
             echo "query run";
         }else{
             echo "not run";
         }
     

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addcategory</title>
</head>

<body>
    <h3>Add New Category Post</h3>

    <table>
        <form action="Addcategory.php" method="post" enctype="multipart/form-data">

            <tr>
                <td>Title</td>
                <td><input type="text" name="titlee" value="<?php echo $titlee;?>"></td>
            </tr>



            <tr>
                <td>Content</td>
                <td><input type="text" name="contentt" value="<?php echo $contentt;?>"></td>
            </tr>
            <tr>
                <td>Url</td>
                <td><input type="text" name="urll" value="<?php echo $urll;?>"></td>
            </tr>

            <tr>
                <td>Meta title</td>
                <td><input type="text" name="mtitle" value="<?php echo $mtitle;?>"></td>
            </tr>
            <tr>
                <td> Parent category</td>
                <td><select name="pcategory" id="pcategory" value="<?php echo $pcategory;?>">
                    <option value=""></option>
                    <option value="Lifestyle">Lifestyle</option>
                    <option value="Health">Health</option>
                    <option value="Education">Education</option>
                    <option value="Music">Music</option></select>
                </td>
                </td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input type="file" name="uploadfile" value="<?php echo $folder;?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit3" value="submit"></td>
            </tr>


</body>

</html>

