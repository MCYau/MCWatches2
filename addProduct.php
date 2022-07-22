<!DOCTYPE html>
<html>
 
<head>
    <title>Insert Page page</title>
</head>
 
<body>
    <center>
        <?php
 
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "root", "", "mcwatches");
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        // Taking all 5 values from the form data(input)
        //$id =  $_REQUEST['id'];
        $name =  $_REQUEST['name'];
        $code = $_REQUEST['code'];
        $image =  $_REQUEST['image'];
        $price = $_REQUEST['price'];
         
        $lastId = "SELECT id FROM tblproduct ORDER BY id DESC LIMIT 1";
        //$lastIdData = mysqli_query($conn, $lastId);
        $lastIdData = $conn->query($lastId);
        $lastIdData = intval($lastIdData[0])+1;

        // Performing insert query execution
        // here our table name is tblproduct
        $sql = "INSERT INTO tblproduct  VALUES ('$lastIdData','$name',
            '$code','$image','$price')";
         
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully."
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>";
 
            echo nl2br("\n$name\n $code\n "
                . "$image\n $price");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
         
        // Close connection
        //mysqli_close($conn);
        ?>
    </center>
</body>
 
</html>