<?php
require_once('connection.php');
require_once('function.php');

$image_allow = array('jpg', 'jpeg', 'png','gif');

  $error = array();
  if (isset($_POST['submit'])) {
    $imagecount = sizeof($_FILES['file']['name']);
    if($imagecount > 2){
      $error = "only two pictures required";
      header("location: ../index.php?error=".$error);
    }
    if ($_FILES['file']['size'] == [' ']) {
        $invalid = "please you must upload picture";
        header("location: ../index.php?error=".$invalid);
      }else{

         if (isset($_FILES['file'])) {
        //getting total number of file uploaded      
            for($i=0; $i<sizeof($_FILES['file']['name']); $i++) {
              $filename = $_FILES['file']['name'][$i];
              $fileSize = $_FILES['file']['size'][$i];
              $fileExt = explode('.', $filename);
              $fileActualExt = strtolower(end($fileExt));

              //checking if right type and size of file is uploaded
              if (!in_array($fileActualExt, $allow) && $fileSize > 400000) {

                $invalid = "invalid file format or file is too large";
                header("location: ../index.php?error=".$invalid);         
              }
            }
          }
      }




    $name = isset($_POST['name'])?trim($_POST['name']):'';
    $comment = isset($_POST['comment'])?trim($_POST['comment']):'';
    $email = isset($_POST['email'])?trim($_POST['email']):'';

    if ($name == "" || $comment == "" || $email == "") {
      $error[] = urlencode("All fields are required");
    }else{  
      $name = TrimData($_POST['name']);
      $comment = TrimData($_POST['comment']);
      $email = TrimData($_POST['email']);
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error[] = "invalid email format";
      }

    if (empty($error)) {
      $email = mysqli_real_escape_string($connect, $email);
      $name = mysqli_real_escape_string($connect, $name);
      $comment = mysqli_real_escape_string($connect, $comment);  
      
      $main_date =  date("Y-m-d h:i:sa");

      //inserting into database
      $sql = "INSERT INTO testify(name, email, comment, createddate)VALUES('$name', '$email', '$comment', '$main_date')";

      $result = mysqli_query($connect, $sql);

      if($result){
          $sql5= "SELECT * FROM testify WHERE createddate = '$main_date'";
          $result5 = mysqli_query($connect, $sql5);

          if (mysqli_num_rows($result5) > 0) {
            while ($row5 = mysqli_fetch_assoc($result5)) {
                $post_id = $row5['id'];
            }
          }

          if (isset($_FILES['file'])) {
            for($i=0; $i<sizeof($_FILES['file']['name']); $i++) {
              if($_FILES['file']['name'][$i] != "") {

                $filename = $_FILES['file']['name'][$i];

                $fileTmp = $_FILES['file']['tmp_name'][$i];

                $fileExt = explode('.', $filename);
                $fileActualExt = strtolower(end($fileExt));

                   // filename to insert into database
                $media = uniqid('',true).'.'.$fileActualExt;

                $location = 'testifyvideo/'.$media;

                  // $destination = 'include\\postpic\\'.$media;
                        
                $sql4 = "INSERT INTO testifypic(testifyid, picture)VALUES('$post_id', '$media')";
                    $result3 = mysqli_query($connect, $sql4);

                if (in_array($fileActualExt, $image_allow)) {

                  $compressedimage = compressImage($fileTmp,"500",100,$location);

                  if(!$compressedimage){
                    $success = "review sent";
                    header('location: ../index.php?success='.$success);
                  }else{
                    $error = "error processing review";
                    header('location: ../index.php?error='.$error);
                  }

                }            
              }
            }
          }

      }else{
        $failed = "Error sending review";
        header("location: ../index.php?error=".$failed);
      }
    }else{
      header("location: ../index.php?error=".join($error, urlencode('<br>')));
    }
  }



  function TrimData($data){
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripcslashes($data);

    return $data;
  }

?>