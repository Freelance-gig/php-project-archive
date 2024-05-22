<?php 
  include('serverfiles/app.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./media/css/index.css">
    <title>Novara Foods |  go-to resource for individuals seeking innovative cooking</title>
</head>
<body>
    <!-- Start Navigation  -->
    <?php 
      include('./import/navbar.php')  
    ?>
    <!-- End Navigation-->
    <!-- Start Top Background Image Wrapper -->
    <div class="wrapper">
        <div id="pageintro" class="hoc clear">
            <span>
                Eating the right food is equivelent<br> to having your goals in life
                fufill.
            </span>
                <h1 class="heading">We offers Special Dishes from Nigeria</h1>

            <span>Food at the right place</span>

            <button class="button"> Start Cooking </button>
        </div>
    </div>      
    <!-- End Top Background Image Wrapper -->

    <!-- Start Feature Recipes -->
    <div class="parent">
        <h2> Featured Recipe </h2>
        <div class="box-wrapper">
          <div class="box" id="one">
            <div class="img-wrapper">
                <img src="media/images/Nigeria-meat-pie-Pic3.png" alt="">
            </div>
            <p class="content"><a href="./recipe.html">Black Eyed Beans Salad</a></p>
          </div>
          <div class="box" id="two">
            <div class="img-wrapper" >
                <img src="media/images/Nigerian-okro-sou-Pic2.jpg" alt="error image">
                
            </div>
            <p class="content"><a href="./recipe.html">Nigeria Okro Soup</a></p>
          </div>
          <div class="box" id="three">
            <div class="img-wrapper">
                  <img src="media/images/Roast-gizzard-with-peanuts-Pic1.png" alt=""> 
            </div>
            <p class="content"><a href="./recipe.html">Roasted Gizzard</a></p>
          </div>
          <div class="box" id="four">
            <div class="img-wrapper">
                <img src="media/images/Fry-fish-Pic2.png" alt="">  
            </div>
            <p class="content"><a href="./recipe.html">Fried Fish</a></p>
          </div>
        </div>
      </div>

    <!-- End Feature Recipes-->

     <div id="contact-us">
      <img alt="logo-background" src="media/images/logo-background.png" />
      <form>
          <h2> Contact Us </h2>
          <input type="text" name="name" placeholder="Name"/>
          <input type="text" name="email" placeholder="Email"/>
          <textarea rows="4" name="" placeholder="Tell us what you think ..."> </textarea>
            <button type="submit" class="button-64 "> Send </button>
      </form>
    </div>
    <!-- Start Footer-->
    <div class="row4">
      <footer id="footer" class="hoc clear">
          <h4 class="heading">We are very delighted to hear from you</h4>
          <ul class="linklist">
            <li><i class="fa fa-map-marker"></i> <address>Robert Godorn University &amp; Number, Aberdeen, Postcode:AB10 6ER</address></li>
            <li><i class="fa fa-phone"></i> +44 7780433612</li>
            <li><i class="fa fa-envelope-o"></i> s.akan1@rgu.ac.uk</li>
          </ul>
      </footer>
    </div>
   

    <div class="row5">
      <div id="copyright" class="hoc clear">
        <p class="fl_left">
          Copyright &copy; 2024 - All Rights Reserved -    <a href="#">www.linkedin.com/in/sedeke-akan</a>
        </p>
        <p class="fl_right">
          Created by
          <a
            target="_blank"
            href="https://www.linkedin.com/in/sedeke-akan-938b5277//"
            title="Novara FOOD PLANET"
            >Novara</a
          >
        </p>
        
      </div>
    </div>
    <!-- End Footer -->
    
    <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>

    <script src="./media/scripts/index.js"></script>
</body>
</html>