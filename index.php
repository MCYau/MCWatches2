<!DOCTYPE HTML>
<html>
        <style>
            body{
                padding: 0px;
                width: 98vw;
            }

            header{
                grid-row: 1 / 3;
                display: grid;
                grid-template-rows: repeat(4, 1fr);
                height: 280px;
            }

            .header-container {
                position: relative;
            }

            .header-container img {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
            }

            .nav{
                background-color: #00eeff;
                display: flex;
                justify-content: center;
                align-items: flex-end;
            }

            .navList li{
                display: inline;
                margin-right: 100px;
            }

            .navList a{
                border: 1px solid #00eeff;
                background-color: #00eeff;
                padding: 5px;
                color: black;
                text-decoration: none; 
                font-family: Apple Chancery, cursive;
            }

            .navList a:hover{
                text-decoration: underline;
                font-size: larger;
            }


            .slideshow-container{
                grid-column: 1 / 6;
                grid-row: 1 / 2;
                background-color: #cdd9ff;
                text-align: center;
            }

            .fade{
                animation-name: fade;
                animation-duration: 1.5s;
            }

            @keyframes fade{
                from {opacity: 0.4;}
                to {opacity: 1;}
            }


            footer{
                height: 400px;
                background-color: #00eeff;
                font-family: Apple Chancery, cursive;
                color: black;
                font-size: 1.5em;
            }

            .fb:hover{                /*hover effect*/
                width: 60px;
                height: 60px;
                transition: 0.1s;
            }

            .instagram:hover{          /*hover effect*/
                width: 60px;
                height: 60px;
                transition: 0.1s;
            }

            .open-button {                 
                background-color: #555;
                color: white;
                padding: 16px 20px;
                border: none;
                cursor: pointer;
                opacity: 0.8;
                width: 100px;
                float: right;

            }                                
            .form-popup {                  /* popup form hidden by default */
                visibility: hidden; 
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 15%;
                border: 3px solid #f1f1f1;
                z-index: 9;
            }

            .form-popup.active {            /*popup form visible when click "Login"*/
                visibility: visible;
                opacity: 1;
                transition: 0.5s;
            }

            .form-container {             /* form container */
                max-width: 300px;
                padding: 10px;
                background-color: white;
            }

            /* Full-width input fields */
            .form-container input[type=text], .form-container input[type=password] {
                width: 50%;
                padding: 18px;
                margin: 5px 0 22px 0;
                border: none;
                background: #f1f1f1;
            }
            /* When the inputs get focus, do something */
            .form-container input[type=text]:focus, .form-container input[type=password]:focus {
                background-color: #ddd;
                outline: none;
            }
            
            .form-container .login-btn {            /* style for submit/login button */
                background-color: #04AA6D;
                color: white;
                padding: 16px 20px;
                border: none;
                cursor: pointer;
                width: 100%;
                margin-bottom:10px;
                opacity: 0.8;
            }

            .admin-login-btn{               /* style for admin login button*/
                background-color: Blue;
                color: white;
                padding: 16px 20px;
                border: none;
                cursor: pointer;
                width: 100%;
                margin-bottom:10px;
                opacity: 0.8;
            }

            .close-btn{                     /* style for close button*/
                background-color: red;
                color: white;
                padding: 16px 20px;
                border: none;
                cursor: pointer;
                width: 100%;
                margin-bottom:10px;
                opacity: 0.8;
            }
            
            .form-container .cancel {           /* background for cancel button */
                background-color: red;
            }

            .form-container .btn:hover, .open-button:hover {    /*hover effect*/
                opacity: 1;
            }

            .container{
                position: relative;
                width: 100%;
                min-height: 100vh;  
            }

            .container#blur.active{
                filter: blur(20px);
                pointer-events: none;
                user-select: none;
            }

            .container#blur.inactive{
                filter: blur(0px);
            }

            
        </style>

<!-- Style ends here-->

    <main>
        <header>
            <div class="header-container">
                <img src="MCwatchlogo.PNG" height="65" style="position: center"/>
                <button onclick="window.location.href = 'login.php';">Login</button>
                <!--<button class="open-button" onclick="openForm();toogle();">Login</button>-->
            </div>
            <nav class="nav">
                <ul class="navList">
                    <!--<li><a href="BookingPage.html">Booking Page</a></li>-->
                    <!--<li><a href="RoomType.html">Room Type</a></li>-->
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="Testimonials.html">Testimonials</a></li>
                    <li><a href="ContactUs.html">Contact Us</a></li>
                </ul>
            </nav>
        </header>

    
        <body>


            <div class="container" id="blur">           <!--container for blur backgorund-->
                <div class="slideshow-container">        <!-- Banner container -->
                    <div class="my-slides fade">
                        <img src="gshockgmwb5000banner.jpeg" width="80%" height="600">
                    </div>
                    <div class="my-slides fade">
                        <img src="seikobanner.jpeg" width="80%" height="600">
                    </div>
                    <div class="my-slides fade">
                        <img src="tissotbanner.jpeg" width="80%" height="600">
                    </div>
                    <div class="my-slides fade">
                        <img src="orientstar.jpeg" width="80%" height="600">
                    </div>
                </div>
            </div>

            <div class="form-popup" id="myForm">
                <form action="/action_page.php" class="form-container">
                <h1>Login</h1>
            
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>
            
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
            
                <button type="button" class="admin-login-btn">Admin Login</button>
                <button type="submit" class="login-btn">Login</button>
                <button type="button" class="close-btn" onclick="toogle()">Close</button>
                <a href="CreateAccount.html">Not a member yet? Create account here</a>
                </form>
            </div>
              





            <script>
                var slideIndex = 0;
                showSlides();
                
                function openForm() {          /*make form visible*/
                    document.getElementById("myForm").style.display = "block";
                }

                function showSlides(){         /*slide show for banner*/
                    var i;
                    var slides = document.getElementsByClassName("my-slides")
                    for (i = 0; i < slides.length; i++){
                        slides[i].style.display = "none";
                    }                   
                    slides[slideIndex].style.display = "block";
                    slideIndex++;
                    if (slideIndex >= slides.length){
                        slideIndex = 0;
                    }
                    setTimeout(showSlides, 2000);
                }

                function toogle(){          /*toogle form on and off*/
                    let blur = document.getElementById("blur");
                    blur.classList.toggle("active");
                    let myForm = document.getElementById("myForm");
                    myForm.classList.toggle("active");
                }

            </script>



            <article>                     
                <h1>About us</h1>
                <br>
                <p>Write about us here</p>
            </article>


        </body>
        
        <footer style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
            <img src="MCwatchlogo.PNG" >
            <br>
            <p>Follow Us to catch more promotions !</p>
            <a href="https://www.facebook.com/LoewsPortofinoBay" target="_blank"><img class="fb"src="facebook.png" width="55px" height="55px" ></a>
            <a href="https://www.instagram.com/loewshotels/" target="_blank"><img class="instagram"src="instagram.png" width="55px" height="55px"></a>
            <br>
        </footer>

    </main>

</html>
