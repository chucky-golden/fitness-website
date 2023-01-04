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
      <h2>change user password</h2>
      <form action="includes/passwordreset.php" method="POST">
       <div class="form-group">
        <?php
          if (isset($_GET['error'])) {?>
            <div class="alert alert-danger"><?=urldecode($_GET['error'])?></div>
        <?php }elseif(isset($_GET['success'])){?>
            <div class="alert alert-success"><?=urldecode($_GET['success'])?></div>
        <?php } ?>
      </div>
        <li><input type="password" name="password" placeholder="Enter Password" required=""></li>
        <li><input type="password" name="con_password" placeholder="Confirm Password" required=""></li>
        <input type="hidden" value="<?php echo $_GET['email'] ?>" name="email" style="display: none;">
        <button name="submit">Sign In</button>
      </form>
      <p class="text-center">Click <a href="index.php">HERE</a> to go back home</p>
  </div>


<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

</body>
</html>




