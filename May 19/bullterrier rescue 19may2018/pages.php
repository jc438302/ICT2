<div class="post_body">
<?php
include("connect.php");
$page_id = $_GET['id'];
$conn  = db_connect();
$sql = "select * from adddogs1 where dog_id='$page_id'";
$run = $conn->query($sql);
 while($row = $run->fetch_assoc()) {
	
    $fname = $row['dog_fname'];
	$color = $row['dog_color'];
	$height = $row['dog_height'];
	$weight = $row['dog_weight'];
	$image = $row['dog_image'];
	$content =$row['dog_content'];
	
 }
?>
<h2>
<?php echo $fname;?></h2>
<p> Color: &nbsp;&nbsp;<b><?php echo $color;?></b></p>
<p> Height: &nbsp;&nbsp;<b><?php echo $height;?></b></p>
<p> Weight: &nbsp;&nbsp;<b><?php echo $weight;?></b></p>
<center><img src="images/<?php echo $image; ?>"/></center>
<p> Story: &nbsp;&nbsp;<b><?php echo $content;?></b></p>
</div>