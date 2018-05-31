<?php
	if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$address=$_POST['add'];
		$subject=$_POST['subject'];
		$msg=$_POST['msg'];

		$to='rd.dhillon15@gmail.com'; // Receiver Email ID, Replace with your email ID
		$subject='Contact Us';
		$message="Name :".$name."\n"."Email :".$email."\n"."Phone :".$phone."\n"."Address:".$address."\n"."Subject:".$subject."\n"."Message:".$msg;
		$headers="From: ".$email;

		if(mail($to, $subject, $message, $headers)){
			echo "<h1>Sent Successfully! Thank you"." ".$name.", We will contact you shortly!</h1>";
			echo file_get_contents("contact_us.html");
			echo "Sent Successfully! Thank you"." ".$name.", We will contact you shortly!";
		}
		else{
			echo "Something went wrong!";
		}
	}
?>