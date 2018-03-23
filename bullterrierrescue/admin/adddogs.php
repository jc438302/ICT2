<?php
include_once('config.php');

if(isset($_POST['fname'],$_POST['lname'], $_POST['dob'],  $_POST['gender'],  $_POST['height'],  $_POST['color'],  $_POST['weight'])) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$height = $_POST['height'];
	$color = $_POST['color'];
	$weight = $_POST['weight'];

	//make the database connection
	$conn  = db_connect();
	//create an insert query 	
	$sql = "insert into avaialabledog (Firstname,Lastname, DOB, Gender, Height, Color, Weight) 
			VALUES ('$fname','$lname', '$dob', '$gender', '$height', '$color', '$weight')";
	//execute the query
	if($conn -> query($sql))
	{
		echo "insert succesfully";
		
	}
	$conn -> close();		
}
else {
	die("Input error");
}
?>
