<?php
include("header.php");
include("db.php");
?>
<!DOCTYPE html>
<head>
    <title>Contact Us</title>
</head>
<html>
<body>
<a href="trackcontactus.php" style="margin-left:50px; border: 1px solid black; padding: 5px; border-radius: 5px; background-color: rgba(0, 136, 169, 1);" id="feedback">See Feedback</a> 
<br>
<div style="height: 50px;"></div>
<div style="display: flex;" >
<div style="border: 1px solid black; width: 40%;; height: 570px; padding: 20px 50px; margin-left: 50px; font-size: 1.5em; color: rgba(0, 136, 169, 1);">
         <h1>Contact us</h1>
         <form action="contactus.php?action=submit" method="post">
             
<p style="margin-top: 20px;">
               <label for="name">Name:</label>
               <input type="text" name="name" id="name" required style="font-size: 1.1em; padding: 5px 10px; margin-left: 50px; ">
</p>
              
<p style="margin-top: 20px;">
               <label for="email">Email:</label>
               <input type="text" name="email" id="email" required style="font-size: 1.1em; padding: 5px 10px; margin-left: 50px;">
</p>

<p style="margin-top: 20px;">
               <label for="msg">Message:</label>
               <textarea type="text" name="msg" id="msg" required rows="8" cols="40" style="font-size: 1.3em; padding: 10px;"></textarea>
            </p>

            <input type="submit" value="Submit" style="border: 4px solid rgba(0, 136, 169, 1); border-radius: 5px; padding: 10px; color: rgba(0, 136, 169, 1); cursor: pointer; margin-top:8px;">
         </form>
</div>
<br>
<img src="image/forcontactus.png" height="570px;" style="margin-left: 50px;">
</div>

    <center>
        <?php
 
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        if(isset($_GET["action"]) && $_GET["action"]=="submit"){
        $conn = mysqli_connect("localhost", "root", "", "mcwatches");
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        // Taking all 5 values from the form data(input)
        $name =  $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $msg =  $_REQUEST['msg'];
         
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO feedback VALUES (NULL,
            '$name','$email','$msg')";
         
        if(mysqli_query($conn, $sql)){
            echo "<script>alert('Thank you for your feedback!') ; window.location.href = 'contactus.php'</script>";
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
    }
?>
    </center>
</body>

 
</html>
    <?php
    include("footer.php");
    $username = $_SESSION['username'];
$adminQuery    = "SELECT * FROM `users` WHERE username='$username' AND isAdmin = 1";
$adminResult = mysqli_query($con, $adminQuery);
$adminRows = mysqli_num_rows($adminResult);
if ($adminRows == 1){
    ?>
    <script>
    document.getElementById("feedback").style.display = "auto";
    </script>
    <?php
    } else {
    ?>
    <script>
    document.getElementById("feedback").style.display = "none";
    </script>
    <?php 
    }
    ?>