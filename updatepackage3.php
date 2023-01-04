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
    <link rel="stylesheet" type="text/css" href="css/log.css">
    <link rel="stylesheet" type="text/css" href="css/hover.css">
</head>

<body class="log">


  <div class="log_box">
      <h2><?php echo $_SESSION['fullname']; ?></h2>
      <form>
        <p>You are paying for:</p>
        <b>30 Days "Healthy Meal Plan"</b> <br> <br>

        <p>Price:</p>
        <b>$30.00</b>
        <button>Pay Now</button>
      </form>
  </div>











<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

</body>
</html>




