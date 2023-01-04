<?php

	require_once('connection.php');

	$error = array();
	if (isset($_POST['submit'])) {
		$password = isset($_POST['password'])?trim($_POST['password']):'';
		$con_password = isset($_POST['con_password'])?trim($_POST['con_password']):'';
		$email = $_POST['email'];

		if($password == "") {
			$error[] = urlencode("Please enter your password");
		}
		if($password != $con_password) {
			$error[] = urlencode("Password mismatch");
		}
		
		if(empty($error)) {
			$password = TrimData($_POST['password']);
			$password = mysqli_real_escape_string($connect, $password);
			$new_pass = md5($password);
			
			//update the password
			$sql = "UPDATE `users` SET `password` = '$new_pass' WHERE `email` = '$email' AND `deleted` = 1";
			$result = mysqli_query($connect, $sql);
			
			if($result) {
				$success = "password changed, go back to site and log in.";
				header("location: ../passwordreset.php?success=".$success);
						
			}else{
				$failed = "error updatting password";
				header("location: ../passwordreset.php?error=".$failed);
			}
		}
	}


 function TrimData($data){
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripcslashes($data);

    return $data;
  }


?>