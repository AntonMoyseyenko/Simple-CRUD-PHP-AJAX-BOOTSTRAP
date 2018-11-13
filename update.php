<?php
require('conn.php');

$id=$_POST['id'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
mysqli_query($conn,"call spUpdateUser ('$id', '$firstname', '$lastname')");

?>