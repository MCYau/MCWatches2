<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<style>
    .form {
    margin: 50px auto;
    width: 300px;
    padding: 30px 25px;
    background: white;
}
body {
    background: #3e4144;
}
body{
    display: flex;
    justify-content: center;
}
</style>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>You are now user dashboard page.</p>
        <p><a href="logout.php">Logout</a></p>
    </div>
<?php 
  header( "refresh:3; url=products.php" ); 
?>
</body>
</html>