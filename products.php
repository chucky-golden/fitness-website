<?php
 require_once('includes/connection.php');
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/cart.css">
    <link rel="stylesheet" type="text/css" href="css/hover.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
</head>
<body>
	<nav class="navbar navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php"> <img src="img/logo.png" class="img-responsive"> </a>
        </div>
        <ul class="navbar-nav menu set">
          <li class="active"> <a href="index.php"> HOME </a> </li>
          <li> <a href="request.php"> REQUEST A PROGRAM </a> </li>
          <li> <a href="products.php"> PRODUCTS </a> </li>
        </ul>
        

        <div class="open_nav view">
          <button  onclick="openNav()"> <span class="fa fa-bars"></span> </button>
        </div>

        <div id="myNav" class="overlay view">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="color: #c848b9;">×</a>
          <div class="overlay-content">
            <div class="log">
              <center> <img src="img/man.png" class="img-responsive"></center>
              <!-- <a href="register.php">Register</a> -->
              <a href="includes/logout.php">Log Out</a>
            </div>

            <div class="list">
              <a href="index.php"> HOME </a>
              <a href="request.php"> REQUEST A PROGRAM </a>
              <a href="products.php"> PRODUCTS </a>
            </div>
          </div>
        </div>

        <ul class="navbar-nav navbar-right set">
          <li> <img src="img/man.png" class="img-responsive"></li>
          <!-- <li> <a href="register.php"> Register </a> </li> -->
          <li> <a href="includes/logout.php"> Log out </a> </li>
        </ul>
      </div>
    </nav>

<div class="container">
  <div class="row">
	<div class="search navbar-fixed-top">
		<center>
			<ul class="nav nav-pills">
			  <li class="active"><a data-toggle="pill" href="#home">Items</a></li>
			  <li><a data-toggle="pill" href="#menu1"> <span class="fa fa-shopping-cart"></span> </a></li>
	   		  <!-- <li><a href="cart.php">Update</a></li> -->
			</ul>
		</center>
	</div>
<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <div class="container">
			<h1 class="text-center">Our Products</h1>
			<?php
				$query = "SELECT * FROM products ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						$itemid = $row["id"];
						$image = $row["image"];
						$name = $row["name"];
						$price = $row["price"];
						$quantityava = $row["quantityava"];
					?>
				<div class="col-sm-6 images">
					<form action="" id="form-upload-file">
						<div align="center">
							<img src="includes/productupload/<?php echo $image;?>" style="width: 50%;">
							<h4 class="text-info"><?php echo $name;?></h4>
						<?php
							if($quantityava == 0){ ?>
							<h4 class="text-danger">$ <?php echo $price;?></h4>
							<button disabled="" style="color: white;" class="btn btn-success">Out Of Stock</button>
						<?php } else{ ?>
							<h4 class="text-info"><?php echo $quantityava;?> Available</h4>							
							<h4 class="text-danger">$ <?php echo $price;?></h4>
							<input type="number" name="quantity" id="<?php echo $itemid; ?>quantity" class="form-control" value="1">
							<input type="hidden" name="name" id="<?php echo $itemid; ?>name" value="<?php echo $name;?>">		
							<input type="hidden" name="price" id="<?php echo $itemid; ?>price" value="<?php echo $price;?>">
							<button style="color: white;" class="btn btn-success" id="action_button3" data-action="add" data-id="<?php echo $itemid; ?>">Add To Cart</button>
						<?php } ?>
						</div>
					</form>
				</div>
				<?php	
				   }
			    }

		    ?>
		    </div>
		</div>
 <div id="menu1" class="container tab-pane fade">
		<div style="clear: both;"></div>
		<br>
		<h1 class="text-center">Order Details</h1>
		<div class="table-responsive" id="done">
			<table class="table table-bordered">
				<tr>
					<th width="40">Item Name</th>
					<th width="10">Quantity</th>
					<th width="20">Price</th>
					<th width="15">Total</th>
					<th width="5">Action</th>
				</tr>
				<?php
					if (!empty($_SESSION["shopping_cart"])) {
						//store total of item price
						$total = 0;
						foreach ($_SESSION["shopping_cart"] as $keys => $values) {
						?>
						<tr>
							<td><?php echo $values["item_name"]; ?></td>
							<td><?php echo $values["item_quantity"]; ?></td>
							<td>$ <?php echo number_format($values["item_price"]); ?></td>
							<td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
							<td><button class="btn btn-danger" id="action_button" data-action="delete" data-id="<?php echo $values["item_id"]; ?>">Delete</button></td>							
						</tr>
						<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
							$_SESSION['total'] = $total;
						   }
						?>
						<tr>
							<td colspan="3" align="right">Total</td>
							<td align="right">$ <?php echo number_format($total, 2); ?></td>
							<td><button onclick="return(window.location.href='checkout.php')" class="btn btn-success">checkout</button></td>
						</tr>
					<?php

					}
				?>
			</table>
		</div>
	</div>
	 </div>
  </div>
  </div>
</div>

	
		
	<br>



<script>
function openNav() {
    document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}
</script>

<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script>
	$(document).on('click', '#action_button3', function(e){
		e.preventDefault();

		var itemid = $(this).data('id');
		var action = $(this).data('action');
		var itemname = $('#' + itemid + 'name').val();
		var itemquantity = $('#' + itemid + 'quantity').val();
		var itemprice = $('#' + itemid + 'price').val();

      	var formData = new FormData();

      	formData.append('itemname', itemname);
      	formData.append('itemquantity', itemquantity);
      	formData.append('itemprice', itemprice);
      	formData.append('itemid', itemid);
      	formData.append('action', action);

        $.ajax({
            url: 'savetocart.php',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            success:function(data)
            {
    		  $('#done').load("products.php #done > *");
            }
        })
    });
</script>

<script>
	$(document).on('click', '#action_button', function(e){
		e.preventDefault();

		var itemid = $(this).data('id');
		var action = $(this).data('action');

      	var formData = new FormData();

      	formData.append('itemid', itemid);
      	formData.append('action', action);
      
        $.ajax({
            url: 'savetocart.php',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            success:function(data)
            {
    		  $('#done').load("products.php #done > *");
            }
        });
    });
</script>
</body>