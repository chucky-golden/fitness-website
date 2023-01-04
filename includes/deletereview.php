<?php

require_once('connection.php');

$error = array();

$deletereview = $_POST['deletereview'];

$sql = "DELETE FROM testify WHERE id = '$deletereview'";
$result = mysqli_query($connect, $sql);

if ($result) {
	$sql2 = "DELETE FROM testifypic WHERE testifyid = '$deletereview'";
	$res = mysqli_query($connect, $sql2);
}

?>