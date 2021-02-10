<?php
     session_start();
     error_reporting(0);

     // initializing variables
     $title = "";
     $content = "";
     $url    = "";
     $published = "";
     $category= "";
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
     if (isset($_POST['submit2'])) {
         // receive all input values from the form
         $title = mysqli_real_escape_string($db, $_POST['title']);
         $content = mysqli_real_escape_string($db, $_POST['content']);
         $url = mysqli_real_escape_string($db, $_POST['url']);
         $published = mysqli_real_escape_string($db, $_POST['published']);
         $category = mysqli_real_escape_string($db, $_POST['category']);
         $image = mysqli_real_escape_string($db, $_POST['image']);
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
    <title>Addblog</title>
</head>

<body>
    <h3>Add New Blog Post</h3>

    <table>
        <form action="blogpost.php" method="post">

            <tr>
                <td>Title</td>
                <td><input type="text" name="title" value="<?php echo $title;?>"></td>
            </tr>



            <tr>
                <td>Content</td>
                <td><input type="text" name="content" value="<?php echo $content;?>"></td>
            </tr>
            <tr>
                <td>Url</td>
                <td><input type="text" name="url" value="<?php echo $url;?>"></td>
            </tr>

            <tr>
                <td>Published at</td>
                <td><input type="datetime-local" name="published" value="<?php echo $published;?>"></td>
            </tr>
            <tr>
                <td>category</td>
                <td><select name="category" id="category" value="<?php echo $category;?>">
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
                <td><input type="file" name="uploading" value="<?php echo $folder;?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit2" value="submit"></td>
            </tr>
</body>

</html>