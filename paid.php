<?php
  require_once('includes/connection.php');
  session_start();
  $data = json_decode(base64_decode($_COOKIE['mabsuser']));
  $id = $data->id;

  $sql = "SELECT * FROM users WHERE id = '$id' AND deleted = 1";
  $result2 = mysqli_query($connect, $sql);
  $row = mysqli_fetch_assoc($result2);
  $fullname = $row['fullname'];

  $main_date =  date("Y-m-d h:i:sa");

  $expire = date('Y-m-d h:i:sa', strtotime($main_date. ' + 3 months'));

  $qury = "UPDATE `users` SET `paid` = 1, `createddate` = '$main_date', `expires` = '$expire' WHERE `id` = '$id'";
  
  $result = mysqli_query($connect, $qury);

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
      <h2><?php echo $fullname; ?></h2>
      <form action="dashboard1.php">
        <p>You have successfully paid for:</p>
        <b>3 months Group "Body Transformation Challenge"</b> <br> <br>

        <p>Price:</p>
        <b>$120.00</b>
        <button id="continue">Click here to continue</button>
      </form>
  </div>











<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script>
  $('#continue').click(function(e){   
    window.location.href="dashboard1.php";
  });
</script>
</body>
</html>




