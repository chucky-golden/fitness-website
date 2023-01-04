<?php
require_once('connection.php');
session_start();
  if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    
    $sql = "SELECT * FROM users WHERE id = '$id' AND deleted = 1 AND paid = 1";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $current_user_id = $row['id'];
    $fullname = $row['fullname'];
    $email = $row['email'];
    $expires = $row['expires'];

    $todays_date = date("Y-m-d");

    $date1 = new DateTime($todays_date);
    $date2 = new DateTime($expires);
    if ($date1 > $date2) {
      session_start();
      $_SESSION['email'] = $email;
      $_SESSION['id'] = $id;
      $_SESSION['fullname'] = $fullname;
      
      $error = "please purchase new plan... previous plan has expired";
      header("location: register2.php?error=".$error);
    }
  }else{
     $error = "Please Login First";
     header("location: login.php?error=".$error);
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
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="css/hover.css">
</head>

<body>