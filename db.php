<?php
    // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
    $con = mysqli_connect("localhost","root","","MCWatches");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = 'SELECT id, price, image FROM tblproduct';

    // get the result set (set of rows)
    $result = mysqli_query($con, $sql);

    // fetch the resulting rows as an array
    $productItem = mysqli_fetch_all($result, MYSQLI_ASSOC);
    print_r($productItem);

    // free the $result from memory (good practise)
    mysqli_free_result($result);

    /*// close connection
    mysqli_close($con);*/
?>
