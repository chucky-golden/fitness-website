<?php

require_once('connection.php');

$error = array();

$newquan = $_POST['newquan'];
$editid = $_POST['editid'];
$editaction = $_POST['editaction'];

if(empty($error)){

        trim($newquan);

        $newquan = TrimData($_POST['newquan']);

        $newquan = mysqli_real_escape_string($connect, $newquan);

        if($_POST['editaction'] == 'edit'){

            $sql = "UPDATE `products` SET `quantityava` = '$newquan' WHERE `id` = '$editid'";
            $result = mysqli_query($connect, $sql);
        }
        if($_POST['editaction'] == 'delete'){

            $sql = "DELETE FROM products WHERE id = '$editid'";
            $result = mysqli_query($connect, $sql);
        }

}






function TrimData($data){
		$data = htmlspecialchars($data);
		$data = trim($data);
		$data = stripcslashes($data);

		return $data;
	}

?>