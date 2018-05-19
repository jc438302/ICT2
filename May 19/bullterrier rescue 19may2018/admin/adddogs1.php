
<html>
<head>
<meta charset="utf-8">
<title>Admin Panel</title>
</head>


<body>
<form method="post" action="adddogs1.php" enctype=
"multipart/form-data">
<table align="center" border="10" width="600">
<tr>
<td align="center" colspan="5" bgcolor="yellow"><h1>Insert New Dog</h1></td>
</tr>
<tr>
<td align="right">Name:</td>
<td><input type="text" name="fname" size="30"></td>
</tr>
<tr>
<td align="right">Color:</td>
<td><input type="text" name="color"></td>
</tr>
<tr>
<td align="right">Height:</td>
<td><input type="text" name="height"></td>
</tr>
<tr>
<td align="right">Weight:</td>
<td><input type="text" name="weight"></td>
</tr>
<tr>
<td align="right">image:</td>
<td><input type="file" name="image"></td>
</tr>
<tr>
<td align="right">Content:</td>
<td><textarea name="content" cols="40" row="20"></textarea></td>
</tr>
<tr>
<td align="center" colspa="5"><input type="submit" name="submit" value="Add now"></td>
</tr>
</table>
</form>
</body>
</html>
<?php
include("connect.php");
if(isset($_POST['submit'])){
	 $fname = $_POST['fname'];
	 $color = $_POST['color'];
	 $height = $_POST['height'];
	 $weight = $_POST['weight'];
	 $image_name = $_FILES['image']['name'];
	 $image_type = $_FILES['image']['type'];
	 $image_size = $_FILES['image']['size'];
	 $image_tmp = $_FILES['image']['tmp_name'];
	 $content = $_POST['content'];
	 if($fname =='' or $color =='' or $height=='' or $weight =='' or $content==''){
		 echo "<script>alert ('Any field is empty')</script>";
		 exit();
	 }
	 if($image_type=="image/jpeg" or $image_type=="image/png" or $image_type=="image/gif"){
		 if($image_size<=80000){
			 move_uploaded_file($image_tmp,"images/$image_name");
				 }
				 else{
				echo"<script>alert('image is larger,only 80kb size is allowed')</script>";	 
				 }
	 }
    else{
		echo"<script>alert('image type is invalid')</script>";
	}
	$conn  = db_connect();
	$sql ="insert into adddogs1
 (dog_fname,dog_color,dog_height,dog_weight,dog_image,dog_content) values('$fname','$color','$height','$weight','$image_name','$content')";
 if($conn -> query($sql))
	{
		echo "<center><h1>dog has been added</h1></center>";
		
	}
	$conn -> close();
 
}



?>



