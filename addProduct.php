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
        //$image =  $_REQUEST['image'];
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "./image/" . $filename;
        $price = $_REQUEST['price'];
        $descp = $_REQUEST['descp'];
         
        /*$lastId = "SELECT id FROM tblproduct ORDER BY id DESC LIMIT 1";
        //$lastIdData = mysqli_query($conn, $lastId);
        $lastIdData = $conn->query($lastId);
        //$lastIdData = intval($lastIdData[0])+1;*/

        // Performing insert query execution
        // here our table name is tblproduct
        $sql = "INSERT INTO tblproduct  VALUES (NULL,'$name', '$descp',
            '$code','image/$filename','$price')";

        move_uploaded_file($tempname, $folder);
         
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully."
                . " You will be redirected to admin page"
                . " to view the updated data</h3>";
                header( "refresh:2; url=admin.php" ); 
 
            echo nl2br("\n$name\n $code\n "
                . "$filename\n $price");
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