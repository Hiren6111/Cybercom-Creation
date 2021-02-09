<?php include('server.php'); 
error_reporting(0);
$rn =$_GET['rn'];
$nm=$_GET['nm'];
$em=$_GET['em'];
$ph=$_GET['ph'];
$ti=$_GET['ti'];
$cr=$_GET['cr'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update page</title>

    <link rel="stylesheet" href="contact.css">

</head>

<body>
    <div class="container">

        <h3 class="item">Website title</h3>
        <a href="index.php" class="item" id="home">Home</a>
        <a href="contact.php" class="item" id="contact">Contact US</a>

    </div>
    <h2>Update Contacts </h2>
    <hr>
    <table>
        <form action="contact.php" method="GET" name="form">
            <?php include('errors.php'); ?>
            <tr>
                <td>ID</td>
                <td>Name</td>
            </tr>
            <tr>
                <td><input type="text" name="id" id="id" placeholder="auto" value="<?php echo $rn; ?>"></td>
                <td><input type="text" name="name" placeholder="Name" value="<?php echo $nm; ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>Phone</td>
            </tr>
            <tr>
                <td><input type="email" name="email" placeholder="Email" value="<?php echo $em; ?>"></td>
                <td><input type="phone" name="phone" placeholder="Phone" value="<?php echo $ph; ?>"></td>
            </tr>
            <tr>
                <td>Title</td>
                <td>Created</td>
            </tr>
            <tr>
                <td><input type="text" name="title" placeholder="Title" value="<?php echo $ti; ?>"></td>
                <td><input type="text" name="created" placeholder="Created" id="date" value="<?php $time = time();
                                                                                                $created = date('D M Y @ H:i:s', $time);
                                                                                                echo $created ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" id="btn" name="update" value="Update"></td>
            </tr>

    </table>
    </form>
</body>


</html>
<?php
if($_POST['update']){


    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $title=$_POST['title'];
    $created=$_POST['created'];

    $query="UPDATE list SET id='',Name='$name',Email='$email',Phone='$phone',Title='$title',Created='$created'";
    
    $data = mysqli_query($db,$query);
    if($data)
    {
      echo "Record updated";
    }
    else{
        echo "fails to update";
    }
    

}


?>