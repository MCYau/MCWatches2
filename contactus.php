
<!DOCTYPE html>
<html>
 
<head>
    <?php
    include("header.php");
    ?>
    <title>Insert Page page</title>
</head>
 
<body>
<center>
         <h1>Contact us</h1>
         <form action="contactus.php?action=submit" method="post">
             
<p>
               <label for="name">Name:</label>
               <input type="text" name="name" id="name" required>
</p>
 
             
<p>
               <label for="email">Email:</label>
               <input type="text" name="email" id="email" required>
            </p>
<p>
               <label for="msg">Message:</label>
               <textarea type="text" name="msg" id="msg" required></textarea>
            </p>
 
            <input type="submit" value="Submit">
         </form>
      </center>
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
         
        // Close connection
        //mysqli_close($conn);
        ?>
    </center>
    <footer>
    <?php
    include("footer.php");
    ?>
</footer>
</body>

 
</html>