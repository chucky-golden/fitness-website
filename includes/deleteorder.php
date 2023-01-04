<?php

require_once('connection.php');

$error = array();

$deleteorder = $_POST['deleteorder'];

$sql = "DELETE FROM orders WHERE id = '$deleteorder'";
$result = mysqli_query($connect, $sql);

?>