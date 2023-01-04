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
          <a class="navbar-brand" href="index.php"> <img src="img/logo.png" class="img-responsive"> </a>
        </div>
        <ul class="navbar-nav menu set">
          <li class="active"> <a href="index.php"> HOME </a> </li>
          <li> <a href="request.php"> REQUEST A PROGRAM </a> </li>
          <li> <a href="products.php"> PRODUCTS </a> </li>
        </ul>
        

        <div class="open_nav view">
          <button  onclick="openNav()"> <span class="fa fa-bars"></span> </button>
        </div>

        <div id="myNav" class="overlay view">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="color: #c848b9;">×</a>
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
              <a href="testimony.php"> REVIEWS </a>
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

<div class="container testify">
<div class="row">
    <h3>mabs</h3>
    <p>My before and after look</p>
    <div class="col-sm-6">
      <img src="img/mab.jpeg" class="img-responsive">
    </div>
  </div>
<?php
require_once("includes/connection.php");
$sql = "SELECT * FROM testify";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) { 
  while($row = mysqli_fetch_assoc($result)){
    $id = $row['id'];
    $name = $row['name'];
    $comment = $row['comment'];

    $sql2 = "SELECT * FROM testifypic WHERE testifyid = '$id'";
    $result2 = mysqli_query($connect, $sql2);

    $row2 = mysqli_fetch_assoc($result2);
    $picture = $row2['picture'];
?>
  <div class="row">
    <h3><?php echo $name; ?></h3>
    <p><?php echo $comment; ?></p>
    <div class="col-sm-6">
      <img src="includes/testifyvideo/<?php echo $picture;?>" class="img-responsive">
    </div>
  </div>
<?php } ?>
<?php }?>
</div><br><br>


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
            <p><a href="mailto: support@mabsfitness.com">support@mabsfitness.com</a></p>
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




