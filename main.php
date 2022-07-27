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
                <p style="font-size: 2.2em;"> MC Watches is an exclusive site that will bring the utmost experience for users that are seeking for the watch that they desire.
We pride ourselves on having one of the most competent shopping systems offered with announcements at every process to inform you of your order status, as well as first-class customer service and support team who will be glad to assist you with any enquiry or problem, if one should arise.</p>
                <br><br><br>
            </article>
    </main>
</html>