<?php
include("auth_session.php");
$con = mysqli_connect("localhost","root","","MCWatches");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap');

/* header */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    background-color: white;
}

li, a, button {
    font-family: "Montserrat", sans-serif;
    font-weight: 500;
    font-size: 16px;
    color: black;
    text-decoration: none;
}

header{

    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 10%;
}

.logo {
    cursor: pointer;
    margin-left: -150px;
}

.nav__links {
    list-style: none;
}

.nav__links li {
    display: inline-block;
    padding: 10px 80px;
}

.nav__links li a {
    transition: all 0.3s ease 0s;
}

.nav__links li a:hover {
    color: #0088a9;
}

button{
    padding: 9px 25px;
    background-color: rgba(0, 136, 169, 1);
    border: none;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.3s ease 0s;
}

button:hover{
    background-color: rgba(0, 136, 169, 1);
}

</style>
</head>
<header>
        <a href="index.php"><img class="logo" src="image/MCWatchLogo.jpg" height="150" alt="logo"><a>
        
        <nav>
            <ul class="nav__links">
                <li><a href="products.php">Shop</a></li>
                <li><a href="testimonial.php">Testimonial</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
            </ul>
        </nav>
        <a id="login" href="login.php"><button>Login</button></a>
        <a id="logout" href="logout.php"><button>Logout</button></a>
        <?php
        if($_SESSION){
        ?> 
        <div id="admin-button"><a href="admin.php" style="padding: 9px 25px;
    background-color: rgba(0, 136, 169, 1);
    border: none;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.3s ease 0s;">Admin page</a></li></div>
        <p style="font-family: Montserrat, sans-serif;
        font-weight: 500;
        font-size: 16px;
        color: black;
        text-decoration: none;">Welcome, <?php echo $_SESSION['username']; ?>!</p>
        <?php
        }
        ?>
</header>
<?php
    if(!$_SESSION) {
    ?>
    <script>
    document.getElementById("login").style.display = "block"; 
    document.getElementById("logout").style.display = "none";
    </script>
    <?php
    }else{
    ?>
    <script>
    document.getElementById("login").style.display = "none";
    document.getElementById("logout").style.display = "block";
    </script>
    <?php
    $username = $_SESSION['username'];
    $adminQuery    = "SELECT * FROM `users` WHERE username='$username' AND isAdmin = 1";
    $adminResult = mysqli_query($con, $adminQuery);
    $adminRows = mysqli_num_rows($adminResult);
        
            if ($adminRows == 1){ ?>
            <script>
            document.getElementById("admin-button").style.display= "block";
            </script>
            <?php
            } else {
            ?>
            <script>
            document.getElementById("admin-button").style.display= "none";
            </script>
            <?php
            }}
    ?>
    