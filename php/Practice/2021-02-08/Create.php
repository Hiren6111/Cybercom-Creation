<?php include('server.php'); ?>


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
    <h2>Create Contacts </h2>
    <hr>
    <table>
        <form action="create.php" method="post" name="form">
            <?php include('errors.php'); ?>
            <tr>
                <td>ID</td>
                <td>Name</td>
            </tr>
            <tr>
                <td><input type="text" name="id" placeholder="auto"></td>
                <td><input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>Phone</td>
            </tr>
            <tr>
                <td><input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>"></td>
                <td><input type="phone" name="phone" placeholder="Phone" value="<?php echo $phone; ?>"></td>
            </tr>
            <tr>
                <td>Title</td>
                <td>Created</td>
            </tr>
            <tr>
                <td><input type="text" name="title" placeholder="Title" value="<?php echo $title; ?>"></td>
                <td><input type="text" name="created" placeholder="Created" id="date" value="<?php $time = time();
                                                                                                $created = date('D M Y @ H:i:s', $time);
                                                                                                echo $created ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" id="btn" name="create" value="Creat" onclick="success();"></td>
            </tr>

    </table>
    </form>
</body>
<script>
   



    function validateForm() {

        if (document.Form1.name.value == "") {
            alert("Please provide your name!");
            document.Form1.name.focus();
            return false;
        }
        if (document.Form1.email.value == "") {
            alert("Please provide your email!");
            document.Form1.email.focus();
            return false;
        }
        if (document.Form1.phone.value == "") {
            alert("Please provide your phone!");
            document.Form1.phone.focus();
            return false;
        }
        if (document.Form1.title.value == "") {
            alert("Please provide your title");
            document.Form1.title.focus();
            return false;
        }
        if (document.Form1.Created.value == "") {
            alert("Please provide your Created");
            document.Form1.Created.focus();
            return false;
        }
        return (true);


    }
</script>


</html>