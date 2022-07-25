<!DOCTYPE html>

<html>    
    <main>
            <div class="slideshow-container">
                <div class="my-slides fade">
                    <img src="image/Slide 1.jpg" width="80%" height="600">
                </div>
                <div class="my-slides fade">
                    <img src="image/Slide 2.jpg" width="80%" height="600">
                </div>
                <div class="my-slides fade">
                    <img src="image/Slide 3.jpg" width="80%" height="600">
                </div>
                <div class="my-slides fade">
                    <img src="image/Slide 4.jpg" width="80%" height="600">
                </div>
            </div>
            <script>
                var slideIndex = 0;
                showSlides();
                    
                function showSlides(){
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
            </script>
            <article style="text-align: center;">
            <br><br>
                <h1 style="font-size: 3.2em;">Welcome to MC Watches</h1>
                <br>
                <p style="font-size: 2.2em;"> MC Watches is an exclusive platform that enables users to search for brand of watches. 
                    The reason that this site is</p>
                <p style="font-size: 2.2em;"> Loews Portofino Bay Hotel—all the charm of Italy, with Florida sunshine and theme park fun guaranteed.</p>
                <br><br><br>
            </article>
    </main>
</html>