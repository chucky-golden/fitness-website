<?php
    require_once '../SwiftMailer/vendor/autoload.php';
	require_once('connection.php');
	$error = array();
	if (isset($_POST['submit'])) {
		$email = isset($_POST['email'])?trim($_POST['email']):'';

		if($email == "") {
			$error[] = urlencode("Please provide an email");
		}
		if(empty($error)) {
			$sql = "SELECT * FROM admin WHERE email = '$email' AND deleted = 1";
			$result = mysqli_query($connect, $sql);

			if(mysqli_num_rows($result) > 0) {
			$data = mysqli_fetch_array($result);
			
			
			 $mailContent = '
                <div class="container">
                    <div class="row">
                        <div>
                            <h3 class="w3-center w3-green">MabsFitness</h3>
                            <p>We got a request to reset your password, if this was you, click the link <b><i><a href="https://www.mabsfitness.com/passwordreset.php?email='.$email.'">Password reset</a></i></b> to reset password or ignore and nothing will happen to your account.</p>
                        </div>
                    </div>
                </div>';
			
                $message = Swift_Message::newInstance()

                // The subject of your email
                ->setSubject('Password Recovery')
                // The from address(es)
                ->setFrom(array('support@mabsfitness.com' => 'MabsFitness'))
                // The to address(es)
                ->setTo(array($email => 'MabsFitness'))
                // Here, you put the content of your email
                ->setBody($mailContent, 'text/html');
            
                    if (Swift_Mailer::newInstance(Swift_MailTransport::newInstance())->send($message)) {
                        $success = "check your mail";
                       header("location: ../login2.php?success=".$success);
                    } else {
                        $error = "please check your network";
                       header("location: ../login2.php?success=".$error);
                    } 
		

    		}else{
    				$failed = "Email does not exist";
    				echo $failed;
    		}
	}
}

?>

