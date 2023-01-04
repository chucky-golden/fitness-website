<!DOCTYPE html>
<html>
<head>
	<title>Mabs Fitness</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/log.css">
    <link rel="stylesheet" type="text/css" href="css/hover.css">
</head>

<body class="log">


  <div class="log_box">
      <h2>Sign in to Mabs Fitness</h2>
      <form action="includes/login.php" method="POST">
       <div class="form-group">
        <?php
          if (isset($_GET['error'])) {?>
            <div class="alert alert-danger"><?=urldecode($_GET['error'])?></div>
        <?php }elseif(isset($_GET['success'])){?>
            <div class="alert alert-success"><?=urldecode($_GET['success'])?></div>
        <?php } ?>
      </div>
        <li><input type="email" name="email" placeholder="Email Address" required=""></li>
        <li><input type="password" name="password" placeholder="Password" required=""></li>
        <li><input type="checkbox"> Remember me </li>
        <button name="submit">Sign In</button>
      </form>
      <center><a href="#" data-toggle="modal" data-target="#myModal">Forgot Password?</a></center>
  </div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times; </button>
          <h4 class="modal-title">Forgot Password?</h4>
        </div>
        <div class="modal-body">
            <form role="form" action="includes/reset.php" method="post">
          <div class="form-group">
            <label for="email"><b>Email:</b></label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Enter your email you registered with" required="">
          </div>
          <div class="text-center">
          <center> <input type="submit" id="pas_submit" value="Continue" class="btn hvr-bounce-in"></center>
        </div>
      </form>
        </div>
        
      </div>
      
    </div>
    <input type="hidden" id="numbers" value="0">
</div>










<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

</body>
</html>




