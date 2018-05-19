
<div class="currentdogs">
<?php
include("connect.php");
$conn  = db_connect();
$sql = "select * from adddogs1 order by rand() LIMIT 0,4";
$run = $conn->query($sql);

    while($row = $run->fetch_assoc()) {
	$dog_id	= $row['dog_id'];
    $fname = $row['dog_fname'];
	$color = $row['dog_color'];
	$height = $row['dog_height'];
	$weight = $row['dog_weight'];
	$image = $row['dog_image'];
	$content = substr($row['dog_content'],0,200);
?>
<h2><a href="pages.php?id=<?php echo $dog_id;?>">
<?php echo $fname;?></h2></a>
<p> Color: &nbsp;&nbsp;<b><?php echo $color;?></b></p>
<p> Height: &nbsp;&nbsp;<b><?php echo $height;?></b></p>
<p> Weight: &nbsp;&nbsp;<b><?php echo $weight;?></b></p>
<center><img src="images/<?php echo $image; ?>"/></center>
<p> Story: &nbsp;&nbsp;<b><?php echo $content;?></b></p>
<p align="right"><a href="pages.php?id=<?php echo $dog_id;?>">Read More</a></p>
<?php } ?>
</div>
