<?php
include("auth_session.php");
?>
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap');

/* Header */
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

/* Footer */



footer{

    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 10%;
}

.social_links {
    list-style: none;
}
.social_links li {
    display:inline-block;
    padding: 10px 80px;
}

/* footer{
    position: absolute;
    width: 100%;
}

footer{
    height: 15vh;
    bottom: 0;
} */
footer h2{
    height:15vh;
    bottom:0;
    margin:auto;
    width:50%;
    text-align: center;
}

</style>
</head>
<header>
        <img class="logo" src="image/MCWatchLogo.jpg" height="150" alt="logo">
        
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
        ?> <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
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
    }
    ?>