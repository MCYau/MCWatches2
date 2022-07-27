<?php
  include("header.php");
?>
<html lang="en" dir="ltr">
  <head>
    
    <meta charset="utf-8">
    <title>Testimonial</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    
</head>
   
  <body>
    
 
    <div class="testimonials">
      <div class="inner">
        <h1>Testimonials</h1>
        <div class="border"></div>
 
        <div class="row">
          <div class="col">
            <div class="testimonial">
              <img src="image/stevejobs.jpg" alt="">
              <div class="name">Steve Jobs</div>
              <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
 
              <p>
              MCWatch has always delivered authentic and best quality watches to me. Yours purchased goods will always arrive on schedule !
              </p>
            </div>
          </div>
 
          <div class="col">
            <div class="testimonial">
              <img src="image/jackma.jpg" alt="">
              <div class="name">Jack Ma</div>
              <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
              </div>
 
              <p>
              I can say that the website of MC Watches is overall nicely done, they provide good customer service. Overall it is a good experience but still needs improvement compared to larger e-commerce sites.
              </p>
            </div>
          </div>
 
          <div class="col">
            <div class="testimonial">
              <img src="image/billgates.jpg" alt="">
              <div class="name">Bill Gates</div>
              <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
              </div>
 
              <p>
              The product is amazing! Didn't expect the product and the service to be this good. Worth purchasing at this place.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="filler-bg" style="height:120px;">
  </div>
 
  </body>

</html>
	<?php
	include("footer.php");
	?>

<style>
{
  margin: 0;
  padding: 0;
  font-family: "montserrat",sans-serif;
 
}
body{
  background:  white;;
}
.testimonials{
  margin-top: 100px;
  margin-left: 200px;
  padding: 30px 0;
  background: #f1f1f1;
  color: #434343;
  text-align: center;
  border-bottom-left-radius: 50px;
  border-top-left-radius: 50px;
box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
 
}
 
.inner{
  max-width: 1200px;
  margin: auto;
  overflow: hidden;
  padding: 0 20px;
}
 
.border{
  width: 160px;
  height: 5px;
  background: rgba(0, 136, 169, 1);
  margin: 26px auto;
}
 
.row{
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}
.col{
  flex: 33.33%;
  max-width: 31.33%;
  box-sizing: border-box;
  padding: 15px;
}
.testimonial{
  background: #fff;
  padding: 40px;
  margin-bottom:30px;
box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
}
.testimonial img{
  width: 100px;
  height: 100px;
  border-radius: 50%;
}
.name{
  font-size: 20px;
  text-transform: uppercase;
  margin: 20px 0;
}
.stars{
  color: rgba(0, 136, 169, 1);
  margin-bottom: 20px;
}
 
 
@media screen and (max-width:960px) {
.col{
  flex: 100%;
  max-width: 80%;
}
}
 
@media screen and (max-width:600px) {
.col{
  flex: 100%;
  max-width: 100%;
}
}
</style>