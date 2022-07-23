<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        echo "<script>alert('Please login first.') ; window.location.href = 'login.php'</script>";
        //header("Location: login.php");
        exit();
    }
?>