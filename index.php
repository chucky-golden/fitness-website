<!DOCTYPE html>
<html>
<head>
	<title>Mabs Fitness</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="bg-style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/hover.css">
</head>



<body>
    <nav class="navbar navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php"> <img src="img/logo.jpg" class="img-responsive"> </a>
        </div>
        <ul class="navbar-nav menu set">
          <li class="active"> <a href="index.php"> HOME </a> </li>
          <li> <a href="request.php"> REQUEST A PROGRAM </a> </li>
          <li> <a href="products.php"> PRODUCTS </a> </li>
          <li> <a href="testimony.php"> REVIEWS </a> </li>
        </ul>
        

        <div class="open_nav view">
          <button  onclick="openNav()"> <span class="fa fa-bars"></span> </button>
        </div>

        <div id="myNav" class="overlay view">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="color: teal;">×</a>
          <div class="overlay-content">
            <div class="log">
              <center> <img src="img/man.png" class="img-responsive"></center>
              <a href="register.php">Register</a>
              <a href="login.php">Log In</a>
            </div>

            <div class="list">
              <a href="index.php"> HOME </a>
              <a href="request.php"> REQUEST A PROGRAM </a>
              <a href="products.php"> PRODUCTS </a>
            </div>
          </div>
        </div>

        <ul class="navbar-nav navbar-right set">
          <li> <img src="img/man.png" class="img-responsive"></li>
          <li> <a href="register.php"> Register </a> </li>
          <li> <a href="login.php"> Log In </a> </li>
        </ul>
      </div>
    </nav>
		
    <div class="search">
      <div class="float">
        <!-- <center> <input type="search" placeholder="Search..."> </center>  -->
      </div>
    </div>


<div class="intro">
    <h1> Welcome to Mabs Fitness </h1>
    <h4>Changing Lives One Person at a Time.</h4>
    <h4>"Get fit" with a US-Trained Fitness Coach and Sports Nutritionist.</h4>
    <h4>Experience a lifestyle Transformation.</h4>
</div>
<div class="container programs" style="margin-top: 2%; font-size: 20px;">
  <center>
    <h2>About Us</h2>
    <p>My name is Mabel Akuagwu. I am a certified Fitness Coach/ Personal trainer & a Sports Nutritionist trained by the International Sports Science Association (ISSA) USA.  Am also a mother of 4 wonderful kids ages 2,4,6 & 9 years old (as at Jan, 2021) <span data-toggle="modal" data-target="#mymodal" class="btn btn-link">read more</span></p>
  </center>
    <div class="container testimonial">
    <div class="col-sm-5 text-center">
      <h3>Mission</h3>
      <p>To transform people’s lives through fun workouts and a sustainable nutrition program</p>
    </div>
    <div class="col-sm-5 text-center" id="vision">
      <h3>Vision</h3>
      <p>Changing lives, one person at a time</p>
    </div>
  </div>
</div>  
<div class="programs">
  <center>
    <h2>Our Programs</h2>
  </center>

  <div class="container">
      <div class="row">
          <div class="col-sm-4">
            <a href="package1.php">
            <div class="one">
              <img src="img/figure.png">
              <!-- <h3>Body Transformation Program</h3>
              <h4>3 Months</h4>
              <p>Jum0pstart your journey with the 3 Months challenge</p>
              <b>$120.0 USD</b> -->
            </div>
            </a>
          </div>

          <div class="col-sm-4">
            <a href="package2.php">
            <div class="two">
              <img src="img/dumb.png">
                <!-- <h3>GET FIT Challenge</h3>
                <h4>30 Days</h4>
                <p>Jumpstart your journey with the 30 days challenge</p>
                <b>$50.00 USD</b> -->
            </div>
            </a>
          </div>

          <div class="col-sm-4">
            <a href="package3.php">
            <div class="three">
              <img src="img/band.png">
               <!--  <h3>Healthy Meal Plan</h3>
                <h4>30 Days</h4>
                <p>Jumpstart your journey with the 30 days Fitness Meal</p>
                <b>$30.00 USD</b> -->
            </div>
            </a>
          </div>
      </div>

      <div class="col-sm-4">
        
      </div>

      <div class="col-sm-4">
          <a href="request.php">
            <div class="four">
               <!--  <h3>Unsure of which program to choose?</h3>
                <p>Take our 30 Secs  quiz and get an instant answer along with the tips to begin your journey. Let's begin.</p> -->
            </div>
            </a>
      </div>
  </div>
  <div class="container">
    <div class="col-sm-6">
    <h2>Uplod your "Testimony"</h2>
      <form action="includes/testify.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <?php
          if (isset($_GET['error'])) {?>
            <div class="alert alert-danger"><?=urldecode($_GET['error'])?></div>
        <?php }elseif(isset($_GET['success'])){?>
            <div class="alert alert-success"><?=urldecode($_GET['success'])?></div>
        <?php } ?>
      </div>
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
          <label>Your Review</label>
          <textarea name="comment" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label>Select your before/after pictures</label>
          <input type="file" name="file[]">
        </div>
        <div class="form-group">
          <button class="btn" name="submit" style="background-color: teal; color: white">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="products">
    <center>
      <h2>Our Products</h2>
      <h4>Pick up any of our fitness products</h4>
    </center>

    <div class="container">
        <div class="row">
        <?php
        
         require_once("includes/connection.php");
         $sql = "SELECT * FROM products  ORDER BY RAND() LIMIT 3";
         $result = mysqli_query($connect, $sql);

          while($row = mysqli_fetch_assoc($result)){                
                $image = $row['image'];
                $name = $row['name']; ?>
            <div class="col-sm-3">
                <img src="includes/productupload/<?php echo $image;?>" class="img-responsive">
                <p> <?php echo $name;?> </p>
            </div>
            <?php } ?>
            <div class="col-sm-3 store">
              <center> <a href="products.php"><b>STORE</b></a> </center>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="mymodal">
     <div class="modal-dialog modal-md">
          <div class="modal-content">
               <div class="modal-header">
               <button class="close" data-dismiss="modal">&times;</button>
                    <h1>About Us</h1>
               </div>
               <div class="modal-body" style="font-size: 20px;">
               <p>My name is Mabel Akuagwu. I am a certified Fitness Coach/ Personal trainer & a Sports Nutritionist trained by the International Sports Science Association (ISSA) USA.  Am also a mother of 4 wonderful kids ages 2,4,6 & 9 years old (as at Jan, 2021).</p>
                    <p>Sports have always been an important part of my life. I became an athlete at the age of 7 and won lots of trophies for my school. This sparked & molded my interest in fitness earlier in life. However, as time went by, I completely forgot about my passion and dragged myself into an unfit lifestyle. This went on for many years and I couldn't help myself.  It was after I had my last child and gained a whopping 100 pounds that I finally had a SELF TALK. I never paid much attention to Nutrition and this was a major contributor to my weight gain as well as a stagnant lifestyle.  Without a healthy and portion-controlled nutrition, maintaining a healthy weight will always be challenging. I finally awakened the FITNESS POWER in me and began losing all that weight. Everyone wanted to know what I was doing...(the truth is that, I am as human as everyone else and I understand the struggles people go through to maintain a healthy weight).</p>
    <p> I established MABS FITNESS to help and guide awesome people like you to become FIT and to maintain an ideal weight through a healthy and sustainable fitness and nutrition program. The combination of being a fitness coach and a sports nutritionist has helped me in engaging with my clients, and helping them achieve their weight goals. I have a great passion in transforming people's lives through a healthy lifestyle change, and, I am more than happy to help you.</p>
               </div>
               <div class="modal-header">
                    <button class="btn btn-info close" data-dismiss="modal">close</button>
               </div>
          </div>
     </div>
     
</div>


<footer class="footer">

    <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <h3>Connect with us on social media</h3>
            <ul class="socials">
              <li> <center> <span class="fa fa-facebook"></span> <a href=""> </a> </center> </li>
              <li> <center> <a href=""> <span class="fa fa-instagram"></span> </a> </center> </li>
              <li> <center> <a href=""> <span class="fa fa-youtube"></span> </a> </center> </li>
            </ul>
          </div>

          <div class="col-sm-4">
            <h3>Address</h3>
            <p>200, Green block, NewYork</p> <br>
            <h3>Phone / WhatsApp</h3>
            <p>+1 (214)-491-8040</p>
          </div>

          <div class="col-sm-4">
            <h3>Contact us</h3>
            <p><a href="mailto: support@mabsfitness.com">support@mabsfitness.com</a></p><br>
          </div>
        </div>
    </div>

</footer>



































<script>
function openNav() {
    document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}
</script>

<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

</body>
</html>




