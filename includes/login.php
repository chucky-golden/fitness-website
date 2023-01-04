 <?php

	require_once('connection.php');

	$error = array();

	if (isset($_POST['submit'])) {
		$email = isset($_POST['email'])?trim($_POST['email']): '';
		$password = isset($_POST['password'])?trim($_POST['password']): '';

		if ($email == '' || $password == '') {
			$error[] = urlencode("ALL FIELDS ARE REQUIRED");
		}else{
			$email = TrimData($_POST['email']);
			$password = TrimData($_POST['password']);
		}

		if (empty($error)) {
			$email = mysqli_real_escape_string($connect, $email);
			$password = mysqli_real_escape_string($connect, $password);

			// compare encrypted in database password with login password
			$new_pass = md5($password);
			$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$new_pass' AND deleted = 1 AND paid = 1";

			$result = mysqli_query($connect, $sql);

			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					session_start();
					$_SESSION['fullname'] = $row['fullname'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['id'] = $row['id'];
					// $package = $row['package'];

					if(isset($_SESSION['id'])){
		              $id = $_SESSION['id'];
		              $email = $_SESSION['email'];
		              $cookie = setcookie('mabsuser', base64_encode(json_encode(['email' => $email, 'id' => $id])), time() + (86400 * 120), "/", NULL, FALSE, TRUE);

						// if ($package == "body transformation") {
						// 	header('location: ../dashboard1.php');
						// }else if($package == "get fit"){
						// 	header('location: ../dashboard2.php');
						// }else if($package == "healthy meal"){
						// 	header('location: ../dashboard3.php');
						// }else{
						// 	$errors = "email or password is empty";
						// 	header('location: ../login.php?error='.$errors);
						// }

		              	if ($cookie) {
							header('location: ../cat.php');
						}else{
							$errors = "email or password is empty";
							header('location: ../login.php?error='.$errors);
						}

					}
				}	

			}else if(empty(mysqli_num_rows($result))){
				$sql2 = "SELECT * FROM users WHERE email = '$email' AND password = '$new_pass' AND deleted = 1 AND paid = 0";

				$result2 = mysqli_query($connect, $sql2);
				if (mysqli_num_rows($result2) > 0) {
					while ($row2 = mysqli_fetch_assoc($result2)) {
						session_start();
						$_SESSION['fullname'] = $row2['fullname'];
						$_SESSION['id'] = $row2['id'];
						$package = $row2['package'];

						if (isset($_SESSION['id'])) {
							$id = $_SESSION['id'];
			              $email = $_SESSION['email'];
			              setcookie('mabsuser', base64_encode(json_encode(['email' => $email, 'id' => $id])), time() + (86400 * 120), "/", NULL, FALSE, TRUE);

							$errors = "please purchase a plan";
							header('location: ../register2.php?error='.$errors);
						}
					}
				}else{
					$errors = "email or password does not match";
					header('location: ../login.php?error='.$errors);
				}
				
			}
		}else{
			header('location: ../login.php?error='.join($error, urlencode('<br>')));
		}
	}





	function TrimData($data){
		$data = htmlspecialchars($data);
		$data = trim($data);
		$data = stripcslashes($data);

		return $data;
	}

?>