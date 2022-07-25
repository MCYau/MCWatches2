<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    
    if(strpos($_SERVER['REQUEST_URI'], '/index.php') == false){
    if(strpos($_SERVER['REQUEST_URI'], '/contactus.php') == false){
    if(strpos($_SERVER['REQUEST_URI'], '/testimonial.php') == false){
    if(!isset($_SESSION["username"])) {
        echo "<script>alert('Please login first.') ; window.location.href = 'login.php'</script>";
        exit();
    }
}}}
?>