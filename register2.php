<?php
session_start();
?>
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
    
<div class="programs">
  <center>
    <h2>Please purchase/update your plan.</h2>
    <h4>We have three major fitness programs that you can pick from to suit your needs</h4>
  </center>

  <div class="container">
      <div class="row">
      <div class="form-group">
        <?php
          if (isset($_GET['error'])) {?>
            <div class="alert alert-danger"><?=urldecode($_GET['error'])?></div>
        <?php }elseif(isset($_GET['success'])){?>
            <div class="alert alert-success"><?=urldecode($_GET['success'])?></div>
        <?php } ?>
      </div>
          <div class="col-sm-4">
            <a href="updatepackage1.php">
            <div class="one">
              <img src="img/figure.png">
              <h3>Body Transformation Program</h3>
              <h4>3 Months</h4>
              <p>Jumpstart your journey with the 3 Months challenge</p>
              <b>$120.00 USD</b>
            </div>
            </a>
          </div>

          <div class="col-sm-4">
            <a href="updatepackage2.php">
            <div class="two">
              <img src="img/dumb.png">
                <h3>GET FIT Challenge</h3>
                <h4>30 Days</h4>
                <p>Jumpstart your journey with the 30 days challenge</p>
                <b>$50.00 USD</b>
            </div>
            </a>
          </div>

          <div class="col-sm-4">
            <a href="updatepackage3.php">
            <div class="three">
              <img src="img/band.png">
                <h3>Healthy Meal Plan</h3>
                <h4>30 Days</h4>
                <p>Jumpstart your journey with the 30 days Fitness Meal</p>
                <b>$30.00 USD</b>
            </div>
            </a>
          </div>
      </div>

      <div class="col-sm-4">
        
      </div>
  </div>
</div>




















<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

</body>
</html>




