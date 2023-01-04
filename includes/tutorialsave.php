<?php

require_once('connection.php');
require_once('function.php');
$error = array();

$image_allow = array('jpg', 'jpeg', 'png','gif');
$video_allow = array('webm', 'mpg', 'mp2', 'mpeg', 'mpe', 'mpv', 'mp4', 'avi', 'm4p', 'm4v', 'mkv');

$package = $_POST['package'];
$caption = $_POST['caption'];

if(empty($error)){

        trim($package);
        trim($caption);

        $package = TrimData($_POST['package']);
        $caption = TrimData($_POST['caption']);


        $package = mysqli_real_escape_string($connect, $package);
        $caption = mysqli_real_escape_string($connect, $caption);


        if(isset($_FILES) && !empty($_FILES)) {
		    if($_FILES['uploadFile']['name'] != "") {		      	

		      	$fileName = $_FILES['uploadFile']['name'];

				$fileType = $_FILES['uploadFile']['type'];

				$fileTmp = $_FILES['uploadFile']['tmp_name'];

				$fileExt = explode('.', $fileName);
				$fileActualExt = strtolower(end($fileExt));

				$pic = uniqid('').'.'.$fileActualExt;

				$location = "tutorialuploads/".$pic;

			    // filename to insert into database
			    $filename = $_FILES['uploadFile']['name'];

			    if (in_array($fileActualExt, $image_allow)) {            
                    compressImage($fileTmp,"500",100,$location);            
                   	$main_date =  date("Y-m-d h:i:sa");
					$sql = "INSERT INTO post(package,writeup,file,createddate)VALUES('$package', '$caption', '$pic', '$main_date')";
					$result = mysqli_query($connect, $sql);

                }else if (in_array($fileActualExt, $video_allow)) {                            
                   $main_date =  date("Y-m-d h:i:sa");
					 if (move_uploaded_file($fileTmp, $location)) {
					$sql = "INSERT INTO post(package,writeup,file,createddate)VALUES('$package', '$caption', '$pic', '$main_date')";
					$result = mysqli_query($connect, $sql);            
                   // PostcompressVideo($fileTmp,$pic); 
                   
                   } 
            
                }

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