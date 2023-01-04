<?php

require_once('connection.php');
require_once('function.php');
$error = array();

$image_allow = array('jpg', 'jpeg', 'png','gif');

$itemname = $_POST['itemname'];
$itemamount = $_POST['itemamount'];
$itemquantity = $_POST['itemquantity'];

if(empty($error)){

        trim($itemname);
        trim($itemamount);
        trim($itemquantity);

        $itemname = TrimData($_POST['itemname']);
        $itemamount = TrimData($_POST['itemamount']);
        $itemquantity = TrimData($_POST['itemquantity']);


        $itemname = mysqli_real_escape_string($connect, $itemname);
        $itemamount = mysqli_real_escape_string($connect, $itemamount);
        $itemquantity = mysqli_real_escape_string($connect, $itemquantity);


        if(isset($_FILES) && !empty($_FILES)) {
		    if($_FILES['shop']['name'] != "") {		      	

		      	$fileName = $_FILES['shop']['name'];

				$fileType = $_FILES['shop']['type'];

				$fileTmp = $_FILES['shop']['tmp_name'];

				$fileExt = explode('.', $fileName);
				$fileActualExt = strtolower(end($fileExt));

				$pic = uniqid('',true).'.'.$fileActualExt;

				$location = "productupload/".$pic;

			    // filename to insert into database
			    $filename = $_FILES['shop']['name'];

			    if (in_array($fileActualExt, $image_allow)) {            
                    compressImage($fileTmp,"500",100,$location);            
                   	$main_date =  date("Y-m-d h:i:sa");
					$sql = "INSERT INTO products(name,image,price,quantityava)VALUES('$itemname', '$pic', '$itemamount', '$itemquantity')";
					$result = mysqli_query($connect, $sql);

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