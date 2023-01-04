<?php
  require_once('includes/connection.php');
  session_start();

  $holder = array();

  $total = $_SESSION['total'];
  $reff = md5(uniqid('', true));
  $main_date =  date("Y-m-d h:i:sa");

  foreach ($_SESSION["shopping_cart"] as $keys => $values) { 
    $name = strval($values["item_name"]);
    $quantity = strval($values["item_quantity"]);
    $price = strval($values["item_price"]);

    $holder[] = $quantity." " . $name;
  }
  function tostring($key, $value){
    global $var;
     $var .= $key . ",";
   }
  array_walk($holder, "tostring");

  if(isset($_POST['name'])){ 
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    $sql4 = "INSERT INTO orders(user_name, address, email, itemname, totalprice, reference, createddate)VALUES('$name', '$address', '$email', '$var', '$total', '$reff', '$main_date')";
    $result4 = mysqli_query($connect, $sql4);
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
        <p>You are paying <b>$<?php echo number_format($total); ?></b> for:</p>

        <?php
          foreach ($_SESSION["shopping_cart"] as $keys => $values) { ?>

        <p><?php echo $values["item_name"]; ?> <b><?php echo $values["item_quantity"]; ?></b></p>

        <?php } ?>
        <div class="form-group">
          <input type="text" name="name" id="name" class="form-control" placeholder="enter customer name here" required>
        </div>
        <div class="form-group">
          <input type="text" name="address" id="address" class="form-control" placeholder="enter customer address here" required>
        </div>
        <div class="form-group">
          <input type="email" name="email" id="email" class="form-control" placeholder="enter customer email here" required>
        </div>
        <div id="item_error" class="val_error"></div>
        <div id="save">
          <button id="continue">Continue</button>
        </div>
        <div id="pay">
          <div id="paypal-payment-button">
  
          </div>
        </div>
  </div>











<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<!-- add paypal account javascript linking -->
<script>
  $("#pay").hide();
  var reference = "<?php echo $reff; ?>";
  var total = "<?php echo $total; ?>";
  paypal.Buttons({
  style:{
    color: 'blue',
    shape: 'pill',
    label: 'pay'
  },
  createOrder: function(data, actions){
    return actions.order.create({
      purchase_units : [{
        amount: {
          value: total,
          currency: 'USD'
        }
      }]
    });
  },
  onApprove: function(data, actions){
    return actions.order.capture().then(function(details){
      console.log(details)
      window.location.replace("https://www.mabsfitness.com/orderplaced.php?reference="+reference)
    })
  },
  onCancel:function(data){
    window.location.replace("https://www.mabsfitness.com/index.php")
  }
}).render('#paypal-payment-button');
</script>
<script>
  $('#continue').click(function(e){
  var itemsubmit = document.querySelector('button#continue');
  var address = $("#address").val();
  var email = $("#email").val();
  var name = $("#name").val();
  var item_error = document.getElementById("item_error");

    if (address == null || address == "") {
        item_error.textContent = "All fields are required";
        item_error.style.color = "red";
        return false;

    }else if (email == null || email == "") {
        item_error.textContent = "All fields ares required";
        item_error.style.color = "red";
        return false;

    }else if (name == null || name == "") {
        item_error.textContent = "All fields ares required";
        item_error.style.color = "red";
        return false;

    }else{
      e.preventDefault();
      itemsubmit.textContent = 'Processing';
      itemsubmit.disabled = true;
      var formData = new FormData();

      formData.append('address', address);
      formData.append('email', email);
      formData.append('name', name);
        
        //upload using jQuery
        $.ajax({
            url: 'checkout.php',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function(response) {
              itemsubmit.textContent = 'Continue';
              itemsubmit.disabled = true;
              $("#save").hide();
              $("#pay").fadeIn(500);
            }
        });
    }

});
</script>
</body>
</html>




