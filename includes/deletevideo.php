<?php

require_once('connection.php');

$error = array();

$deletetutor = $_POST['deletetutor'];

$sql = "DELETE FROM post WHERE id = '$deletetutor'";
$result = mysqli_query($connect, $sql);

if($result){
    unlink("tutorialuploads/".$deletefile);
}

?>