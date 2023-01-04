<?php

session_start();
require_once('connection.php');

if($_POST['action'] == 'add') {
	//when add to cart button is clicked
			//create session variable to store datas and check if it has data or not
			if(isset($_SESSION["shopping_cart"])){ 
				$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
				echo '<script>alert("Item Added, Check Cart")</script>';
				if (!in_array($_POST["itemid"], $item_array_id)) {
					//check if item has been added to cart or not
					$count = count($_SESSION["shopping_cart"]);
					$item_array = array(
						'item_id' => $_POST["itemid"],
						'item_name' => $_POST["itemname"],
						'item_price' => $_POST["itemprice"],
						'item_quantity' => $_POST["itemquantity"]
					);
					//store item details in session variable with proper index number
					$_SESSION["shopping_cart"][$count] = $item_array;
				}else{
					echo '<script>alert("Item Already Added")</script>';
					echo '<script>window.location="products.php"</script>';
				}
			}else{
				$item_array = array(
					'item_id' => $_POST["itemid"],
					'item_name' => $_POST["itemname"],
					'item_price' => $_POST["itemprice"],
					'item_quantity' => $_POST["itemquantity"]
				);
				//store item details into session variable
				$_SESSION["shopping_cart"][0] = $item_array;
			}
}


if ($_POST["action"] == "delete") {

	foreach ($_SESSION["shopping_cart"] as $keys => $values) {
		if ($values["item_id"] == $_POST["itemid"]) {
			unset($_SESSION["shopping_cart"] [$keys]);
			echo '<script>alert("Item Removed")</script>';
			echo '<script>window.location="products.php"</script>'; 
		}
	}
}



?>