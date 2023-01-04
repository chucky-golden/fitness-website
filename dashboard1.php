<?php require_once('includes/header.php') ?>

<div class="container">
  <div class="col-sm-12">
    <div class="navbar-fixed-top dash">
      <h4> Welcome <span class="fa fa-smile-o"></span> </h4>
      <h3> <?php echo $fullname; ?></h3>
      <h4><a href="includes/logout.php"><b>Logout</b></a></h4>
      <p> Body Transformation Program </p>
      <img src="img/figure.png" class="img-responsive">
    </div>
  </div>

</div>

<div class="top">


  <div class="post">
  <?php 
    require_once('includes/connection.php');

    $sql2 = "SELECT * FROM post WHERE package = 'body transformation' AND deleted = 1";

    $result2 = mysqli_query($connect, $sql2);

    if (mysqli_num_rows($result2) > 0) { 
        while ($row2 = mysqli_fetch_assoc($result2)) { 
          $id = $row2['id'];  
          $writeup = $row2['writeup'];
          $file = $row2['file'];

  ?>
    <div class="container">
      <div class="col-sm-6">
      <?php
         $fileExt = explode('.', $file);
         $fileActExt = strtolower(end($fileExt));
        if ($fileActExt == 'mp4' || $fileActExt == 'mkv' || $fileActExt == 'webm' || $fileActExt == 'mp3') {  ?>
         <video controls>
          <source src="includes/tutorialuploads/<?php echo $file;?>" type="video/mp4">
        </video>
      <?php } elseif($fileActExt == 'jpeg' || $fileActExt == 'jpg' || $fileActExt == 'png') { ?>
        <img src="includes/tutorialuploads/<?php echo $file;?>">
      <?php } ?>
      </div>
      <div class="col-sm-6">
        <p> <?php echo $writeup; ?> </p>
      </div>
    </div><br><br>

        <?php } ?>
    <?php } ?>

  </div>


</div>






<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

</body>
</html>