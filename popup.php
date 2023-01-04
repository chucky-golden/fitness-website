<?php
  require_once('includes/connection.php');

  $error = array();
  if (isset($_POST['create'])) {
    $fullname = isset($_POST['fullname'])?trim($_POST['fullname']):'';
    $address = isset($_POST['address'])?trim($_POST['address']):'';
    $email = isset($_POST['email'])?trim($_POST['email']):'';
    $city = isset($_POST['city'])?trim($_POST['city']):'';
    $password = isset($_POST['password'])?trim($_POST['password']):'';
    $conpassword = isset($_POST['con_password'])?trim($_POST['con_password']):'';
    $country = isset($_POST['country'])?trim($_POST['country']):'';
    $zipcode = isset($_POST['zipcode'])?trim($_POST['zipcode']):'';
    $package = isset($_POST['package'])?trim($_POST['package']):'';


    if ($fullname == "" || $address == "" || $email == "" || $city == "" || $password == "" || $conpassword == "" || $country == "" || $zipcode == "" || $package == "") {
      $error[] = urlencode("All fields are required");
    }else{  
      $fullname = TrimData($_POST['fullname']);
      $address = TrimData($_POST['address']);
      $email = TrimData($_POST['email']);
      $city = TrimData($_POST['city']);
      $password = TrimData($_POST['password']);
      $conpassword = TrimData($_POST['con_password']);
      $country = TrimData($_POST['country']);
      $zipcode = TrimData($_POST['zipcode']);
      $package = TrimData($_POST['package']);
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error[] = "invalid email format";
      }
    if ($password !== $conpassword) {
      $error[] = "password mismatch";
      }

    if (empty($error)) {
      $email = mysqli_real_escape_string($connect, $email);
      $fullname = mysqli_real_escape_string($connect, $fullname);
      $address = mysqli_real_escape_string($connect, $address);
      $city = mysqli_real_escape_string($connect, $city);
      $password = mysqli_real_escape_string($connect, $password);
      $country = mysqli_real_escape_string($connect, $country);
      $zipcode = mysqli_real_escape_string($connect, $zipcode);
      $package = mysqli_real_escape_string($connect, $package);
      
      $check = "SELECT * FROM users WHERE email = '$email'";
      $check_result = mysqli_query($connect, $check);
      if (mysqli_num_rows($check_result) == 1) {
        $exist = "User with email address already exits";
        header("location: package1.php?error=".$exist);
      }else{
        $new_password= md5($password);
        $main_date =  date("Y-m-d h:i:sa");

        $expire = date('Y-m-d h:i:sa', strtotime($main_date. ' + 3 months'));

        //inserting into database
        $sql = "INSERT INTO users(fullname, email, password, address, city, country, zipcode, package, createddate, expires)VALUES('$fullname', '$email', '$new_password', '$address', '$city', '$country', '$zipcode', '$package', '$main_date', '$expire')";

        $result = mysqli_query($connect, $sql);

        //checking if the values were saved sucessfully
        if ($result) {
          $sqll = "SELECT * FROM users WHERE email = '$email'";
          $resultt = mysqli_query($connect, $sqll);

          if (mysqli_num_rows($resultt) > 0) {
            while ($roww = mysqli_fetch_assoc($resultt)) {
              session_start();
              $_SESSION['email'] = $roww['email'];
              $_SESSION['id'] = $roww['id'];
              $_SESSION['fullname'] = $roww['fullname'];

              if(isset($_SESSION['id'])){
                $id = $_SESSION['id'];
                $email = $_SESSION['email'];
                setcookie('mabsuser', base64_encode(json_encode(['email' => $email, 'id' => $id])), time() + (86400 * 120), "/", NULL, FALSE, TRUE);
              }else{
                $failed = "Error registering your details";
                header("location: package1.php?error=".$failed);
              }
            }
          }

        }else{
          $failed = "Error registering your details";
          header("location: package1.php?error=".$failed);
        }
      }
      
    }else{
      header("location: package1.php?error=".join($error, urlencode('<br>')));
    }
  }



  function TrimData($data){
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripcslashes($data);

    return $data;
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
      <h2><?php echo $_SESSION['fullname']; ?></h2>
      <form>
        <p>You are paying for:</p>
        <b>3 months Group "Body Transformation Challenge"</b> <br> <br>

        <p>Price:</p>
        <b>$120.00</b>
        <button>Pay Now</button>
      </form>
  </div>











<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

</body>
</html>




