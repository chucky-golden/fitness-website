<?php
  require_once('includes/connection.php');
  session_start();

  if (isset($_GET['reference'])) {
    $reff = $_GET['reference'];

    $qury = "UPDATE `orders` SET `paid` = 1 WHERE `reference` = '$reff'";
  
    $result = mysqli_query($connect, $qury);
  }

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
        <center>
        <span class="fa fa-check"></span><br>
        <p>Your order was received</p>
        <button id="continue">Click here to continue</button>
        </center>
  </div>











<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script>
  $('#continue').click(function(e){   
    window.location.href="index.php";
  });
</script>
</body>
</html>




