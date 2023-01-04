<?php
  require_once('includes/connection.php');

//number of users count
$sql1 = "SELECT COUNT(*) AS usercount FROM users";
$result1 = mysqli_query($connect, $sql1);
$row1 = mysqli_fetch_array($result1);
$userscount = $row1['usercount'];


?>
<!DOCTYPE html>
<html>
<head>
	<title>Mabs Fitness</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/hover.css">
</head>

<body>

<div class="left">
  <center>
    <h1>MABS FITNESS STORE</h1>
  </center>

      <ul class="nav nav-pills">
        <li class="active"><a data-toggle="pill" href="#dashboard"> Dashboard </a></li>
        <li><a data-toggle="pill" href="#invest"> Upload Products for Sale </a></li>
        <li><a data-toggle="pill" href="#withdraw"> Upload WorkOut Tutorial </a></li>
        <li><a data-toggle="pill" href="#product"> View products </a></li>
        <li><a data-toggle="pill" href="#questions"> View Order</a></li>
        <li><a data-toggle="pill" href="#review"> View review</a></li>
        <li><a data-toggle="pill" href="#videos"> View videos</a></li>
      </ul>
</div>

<div class="right">
  <div class="heads">
    <h2>ADMINISTRATIVE PANEL</h2>
  </div>



  <div class="tab-content">
    <div id="dashboard" class="tab-pane fade in active">
      <div class="container dash">
          <div class="row">
            <div class="col-sm-4">
              <h2>Welcome Admin</h2>
              <h1> Mabs</h1>
            </div>

            <div class="col-sm-6">
              <h3>TOTAL REGISTERED MEMBERS</h3>
              <h4><?php echo $userscount ?></h4>

             <!--  <h3>TOTAL REVENUE GENERATED</h3>
              <h4>1,000,000</h4> -->

            </div>

          </div>
      </div>
    </div>

    <div id="invest" class="container tab-pane fade in">
        <h1>UPLOAD PRODUCTS</h1> 

        <div id="item_error" class="val_error"></div>
      <form action="" name="shop-file" id="form-shop-file" enctype="multipart/form-data"> 
            <div class="col-lg-12">                    
              <div class="input-group">
                <input type="file" id="shop" name="file" multiple  />
              </div>
            </div>

              <!-- <div class="container">
                <div class="col-md-12" style="margin-bottom: 20px;">
                  <div class="gallery"></div>
                </div>
              </div> -->
          

            <div class="invest-opt container">
        
                <li> <p>Item Name:</p> <input type="text" id="itemname" name="" placeholder="Item Name"> </li>

                <li> <p>Amount:</p> <input type="number" id="itemamount" name="" placeholder="Amount"> </li>

                <li> <p>Quantity Available:</p> <input type="number" id="itemquantity" name="" placeholder="Quantity"> </li>

            </div>

            <span class="input-group-btn"> <button type="submit" name="submit" id="itemsubmit" class="btn" style="margin-top: 20px; margin-bottom: 20px; border-radius: 10px;"> Upload Products </button>  </span>
      </form>



    </div>

    <div id="withdraw" class="container tab-pane fade in">
         <h1>UPLOAD TUTORIAL VIDEOS</h1> 

        <div id="describe_error" class="val_error"></div>
      <form action="" name="upload-file" id="form-upload-file" enctype="multipart/form-data" > 
            <div class="col-lg-12">                    
              <div class="input-group">
                 <input id="uploadFile" type="file" name="uploadFile" required required="" />
              </div>
            </div><br>

              <!-- <div class="container">
                <div class="col-md-12" style="margin-bottom: 20px; margin-top: 20px;">
                  <img src="" id="profile_img_tag" width="100" height="100">
                  <video>
                    <source src="" type="">
                  </video>
                </div>
              </div> -->
          

            <div class="invest-opt container">
        
                <li> <p>Video/Image Caption</p> <textarea rows="5" id="caption" required=""></textarea> </li>

                <li> <p>Category:</p> 
                  <select id="package">
                    <option value="body transformation">Body Transformation Program</option>
                    <option value="get fit">GET FIT Challenge</option>
                    <option value="healthy meal">Healthy Meal Plan</option>
                  </select>
                </li>

            </div>

            <span class="input-group-btn"> <button type="submit" name="submit" id="save" class="btn" style="margin-top: 20px; margin-bottom: 20px; border-radius: 10px;"> Upload Tutorial </button>  </span>

            <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
            <h3 id="status"></h3>
      </form>
    </div>


    <div id="questions" class="container tab-pane fade in">
      <div id="rowsss">
        <?php 

        $sql3 = "SELECT * FROM orders WHERE paid = 1 AND deleted = 1";

        $result3 = mysqli_query($connect, $sql3);

        if (mysqli_num_rows($result3) > 0) { 
            while ($row3 = mysqli_fetch_assoc($result3)) { 
              $orderid = $row3['id'];  
              $user_name = $row3['user_name'];  
              $itemname = $row3['itemname'];
              $totalprice = number_format($row3['totalprice']);  
              $createddate = $row3['createddate'];
              $email = $row3['email'];
              $address = $row3['address'];


              ?>
      <div class="col-sm-3 text-center">
        <p>customer name: <b><?=$user_name?></b></p>
        <p>customer email: <b><?=$email?></b></p>
        <p>customer address: <b><?=$address?></b></p>
        <p>Goods Purchased: <b><?=$itemname?></b></p>
        <p>Price: <b>$ <?php echo $totalprice; ?></b></p>
        <p>Date Ordered: <b><?=$createddate?></b></p>
        <button class="btn btn-default" id="<?php echo $orderid; ?>deleteorder" onclick="return deleteorder('<?php echo $orderid; ?>')" data-id="<?php echo $orderid; ?>" data-action="deleteorder">Delete</button>
      </div> 

         <?php } ?>
    <?php } ?>
      </div>
    </div>
    <div id="review" class="container tab-pane fade in">
      <div id="rowssss">
        <?php 

        $sql5 = "SELECT * FROM testify";

        $res5 = mysqli_query($connect, $sql5);

        if (mysqli_num_rows($res5) > 0) { 
            while ($row5 = mysqli_fetch_assoc($res5)) { 
              $reviewid = $row5['id'];  
              $name = $row5['name'];  
              $reviewemail = $row5['email'];
              $comment = $row5['comment'];  
              $reviewcreateddate = $row5['createddate'];  

              $sl = "SELECT * FROM testifypic WHERE testifyid = '$reviewid'";
              $re = mysqli_query($connect, $sl);

              $row6 = mysqli_fetch_assoc($re);
              $picture = $row6['picture'];


              ?>
      <div class="col-sm-3 text-center">
        <p><b><?=$name?></b></p>
        <p><b><?=$reviewemail?></b></p>
        <p><b><?=$comment?></b></p>
        <p><b><?=$reviewcreateddate?></b></p>
        <center>
          <img src="includes/testifyvideo/<?php echo $picture;?>" class="img-responsive" width="100" height="100">
        </center><br>        

        <button class="btn btn-default" id="<?php echo $reviewid; ?>deletereview" onclick="return deletereview('<?php echo $reviewid; ?>')" data-id="<?php echo $reviewid; ?>" data-action="deletereview">Delete</button>
      </div> 

         <?php } ?>
    <?php } ?>
      </div>
    </div>

    <div id="product" class="container tab-pane fade in">
      <div class="table-responsive">
      <table class="table table-striped tables table-hover"  id="rowss">
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Action</th>
        </tr>

    <?php 

        $sql = "SELECT * FROM products";

        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) > 0) { 
            while ($row = mysqli_fetch_assoc($result)) { 
              $id = $row['id'];  
              $name = $row['name'];
              $price = number_format($row['price']);
              $image = $row['image'];
              $quantityava = $row['quantityava'];  ?>
        <tr>
          <td><img src="includes/productupload/<?php echo $image;?>" class="img-responsive" width="100" height="100"/></td>
          <td><?=$name?></td>
          <td>$ <?php echo $price; ?></td>
          <td><?=$quantityava?><br>
            <input type="number" name="" id="<?php echo $id; ?>newquan" placeholder="enter new quantity">
          </td>
          <td><button class="btn btn-success"  id="<?php echo $id; ?>editquantity" onclick="return editquantity('<?php echo $id; ?>')" data-id="<?php echo $id; ?>" data-action="edit" >Edit Quantity</button></td>
          <td><button class="btn btn-danger"  id="<?php echo $id; ?>deleteitem" onclick="return deleteitem('<?php echo $id; ?>')" data-id="<?php echo $id; ?>" data-action="delete" >Delete</button></td>
        </tr>

         <?php } ?>
    <?php } ?>

      </table>
    </div>
    </div>

    <div id="videos" class="container tab-pane fade in">
      <div class="table-responsive">
      <table class="table table-striped tables table-hover"  id="row2">
        <tr>
          <th>Category</th>
          <th>Image / Video</th>
          <th>Description</th>
          <th>Action</th>
        </tr>

    <?php 

        $sql45 = "SELECT * FROM post";

        $result45 = mysqli_query($connect, $sql45);

        if (mysqli_num_rows($result45) > 0) { 
            while ($row45 = mysqli_fetch_assoc($result45)) { 
              $id45 = $row45['id'];  
              $package = $row45['package'];
              $writeup = $row45['writeup'];
              $file = $row45['file'];

              $fileExt = explode('.', $file);
              $fileActExt = strtolower(end($fileExt)); ?>
        <tr>
          <td><?=$package?></td>
          <td>
          <?php
            if ($fileActExt == 'mp4' || $fileActExt == 'mkv' || $fileActExt == 'webm' || $fileActExt == '3gpp' || $fileActExt == '3gp' || $fileActExt == 'mp3') {
          ?>
          <video controls="true" width="100" height="100"> <source src="../include/tutorialuploads/<?php echo $file;?>" type="video/mp4"> Your browser does not support the video tag.</video>
          
          <?php }elseif($fileActExt == 'jpeg' || $fileActExt == 'jpg' || $fileActExt == 'png'){ ?>
          <img src="includes/tutorialuploads/<?php echo $file;?>" class="img-responsive" width="100" height="50"/>
          <?php } ?>
          </td>
          <td><?=$writeup?></td>
          <td><button class="btn btn-danger"  id="<?php echo $id45; ?>deletetutor" onclick="return deletetutor('<?php echo $id45; ?>')" data-id="<?php echo $id45; ?>" data-action="delete" >Delete</button></td>
        </tr>

         <?php } ?>
    <?php } ?>

      </table>
    </div>
    </div>




  </div>
  
</div>

<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/preview.js"></script>
<script>
$('#save').click(function(e){
  var save = document.querySelector('button#save');
  var package = $("#package").val();
  var caption = $("#caption").val();
  var describe_error = document.getElementById("describe_error");
  var uploadFile = $("#uploadFile").val();

    if (package == null || package == "") {
        describe_error.textContent = "All fields are required";
        describe_error.style.color = "red";
        return false;

    }else if (caption == null || caption == "") {
        describe_error.textContent = "All fields ares required";
        describe_error.style.color = "red";
        return false;

    }else{
      e.preventDefault();
      save.textContent = 'Processing';
      save.disabled = true;
      var formData = new FormData();

      formData.append('package', package);
      formData.append('caption', caption);
      formData.append('uploadFile', $('#uploadFile')[0].files[0]);

      var ajax = new XMLHttpRequest();
      ajax.upload.addEventListener("progress", progressHandler, false);
      ajax.addEventListener("load", completeHandler, false);
      ajax.addEventListener("error", errorHandler, false);
      ajax.addEventListener("abort", abortHandler, false);
      ajax.open("POST", "includes/tutorialsave.php"); // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
      //use file_upload_parser.php from above url
      ajax.send(formData);

      function progressHandler(event) {
        var percent = (event.loaded / event.total) * 100;
        $("#progressBar").val(Math.round(percent));
        document.getElementById('status').innerHTML = Math.round(percent) + "% uploaded... please wait";
      }

      function completeHandler(event) {
        document.getElementById('status').innerHTML = event.target.responseText;
        $("#progressBar").val("0"); //wil clear progress bar after successful upload
        save.textContent = 'Upload Tutorial';
        save.disabled = false;
        $("#package").val("");
        $("#caption").val("");
        $("#uploadFile").val("");
      }

      function errorHandler(event) {
       document.getElementById('status').innerHTML = "Upload Failed";
      }

      function abortHandler(event) {
        document.getElementById('status').innerHTML = "Upload Aborted";
      }
        
        // //upload using jQuery
        // $.ajax({
        //     url: 'includes/tutorialsave.php',
        //     data: formData,
        //     cache: false,
        //     contentType: false,
        //     processData: false,
        //     type: 'POST',
        //     success: function(response) {
        //       save.textContent = 'Upload Tutorial';
        //       save.disabled = false;
        //       $("#package").val("");
        //       $("#caption").val("");
        //       $("#uploadFile").val("");
        //     }
        // });
    }

});

</script>
<script>
$('#itemsubmit').click(function(e){

  var itemsubmit = document.querySelector('button#itemsubmit');
  var itemname = $("#itemname").val();
  var itemamount = $("#itemamount").val();
  var itemquantity = $("#itemquantity").val();
  var item_error = document.getElementById("item_error");
  var shop = $("#shop").val();

    if (itemname == null || itemname == "") {
        item_error.textContent = "All fields are required";
        item_error.style.color = "red";
        return false;

    }else if (itemamount == null || itemamount == "") {
        item_error.textContent = "All fields ares required";
        item_error.style.color = "red";
        return false;

    }else if (itemquantity == null || itemquantity == "") {
        item_error.textContent = "All fields ares required";
        item_error.style.color = "red";
        return false;

    }else{
      e.preventDefault();
      itemsubmit.textContent = 'Processing';
      itemsubmit.disabled = true;
      var formData = new FormData();

      formData.append('itemname', itemname);
      formData.append('itemamount', itemamount);
      formData.append('itemquantity', itemquantity);
      formData.append('shop', $('#shop')[0].files[0]);
        
        //upload using jQuery
        $.ajax({
            url: 'includes/productsave.php',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function(response) {
              itemsubmit.textContent = 'Upload Products';
              itemsubmit.disabled = false;
              $("#itemname").val("");
              $("#itemamount").val("");
              $("#itemquantity").val("");
              $("#shop").val("");
            }
        });
    }

});

</script>
<script>
  function editquantity(id){
    var rowss = $('#rowss');
    var newquan = $('#' + id + 'newquan').val();
    var editaction = $('#' + id + 'editquantity').data('action');
    var editid = $('#' + id + 'editquantity').data('id');

    newquan = Number(newquan);

    var formData = new FormData();

    formData.append('newquan', newquan);
    formData.append('editaction', editaction);
    formData.append('editid', editid);

    $.ajax({
            url: 'includes/products.php',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function(response) {
               $('#rowss').load("admin.php #rowss > *");
            }
        });
  }
</script>
<script>
  function deleteitem(id){
    var rowss = $('#rowss');
    var editaction = $('#' + id + 'deleteitem').data('action');
    var editid = $('#' + id + 'deleteitem').data('id');

    var formData = new FormData();

    formData.append('editaction', editaction);
    formData.append('editid', editid);

    $.ajax({
            url: 'includes/products.php',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function(response) {
               $('#rowss').load("admin.php #rowss > *");
            }
        });
  }
</script>
<script>
  function deleteorder(id){
    var rowsss = $('#rowsss');
    var deleteorder = $('#' + id + 'deleteorder').data('id');

    var formData = new FormData();

    formData.append('deleteorder', deleteorder);

    $.ajax({
            url: 'includes/deleteorder.php',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function(response) {
               $('#rowsss').load("admin.php #rowsss > *");
            }
        });
  }
</script>
<script>
  function deletereview(id){
    var rowssss = $('#rowssss');
    var deletereview = $('#' + id + 'deletereview').data('id');

    var formData = new FormData();

    formData.append('deletereview', deletereview);

    $.ajax({
            url: 'includes/deletereview.php',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function(response) {
               $('#rowssss').load("admin.php #rowssss > *");
            }
        });
  }
</script>
<script>
  function deletetutor(id){
    var row2 = $('#row2');
    var deletetutor = $('#' + id + 'deletetutor').data('id');

    var formData = new FormData();

    formData.append('deletetutor', deletetutor);

    $.ajax({
            url: 'includes/deletevideo.php',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function(response) {
               $('#row2').load("admin.php #row2 > *");
            }
        });
  }
</script>
</body>
</html>