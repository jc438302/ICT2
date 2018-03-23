<?php
include_once('config.php');
if(isset($_POST['fname'])) {
	$fname = $_POST['fname'];
//make the database connection
$conn  = db_connect();

// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_query($con,"DELETE * FROM avaialabledog WHERE Firstname='$fname'");
mysqli_close($con);
header("Location: deletedogs.php");
}
?> 