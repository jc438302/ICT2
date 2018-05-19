<?php
include_once('connect.php');
if(isset($_POST['Delete'])) {
	$dogid = $_POST['Delete'];
//make the database connection
$conn  = db_connect();

// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_query($con,"DELETE * FROM adddogs1 WHERE dog_id=".$dogid");
mysqli_close($con);
header("Location: indexforadmin.php");
}
?> 
