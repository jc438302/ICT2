<html>
    <head>
	     <title>Admin Panel</title>
<link rel="stylesheet" href="admin_style.css">
	</head>
<body>
<header>
<h1><a href="indexforadmin.php">Welcome to Admin Panel of Bullterrier</a></h1>
</header>
<aside> <h2>Manage Site</h2>
<h2><a href="adddogs1.php?"> Add New Dog</a><h2>
<h2><a href="indexforadmin.php?view=view"> View Post </a><h2>
<h2><a href="logout'php"> Logout</a><h2></aside>
<center><h2><b>This is your Admin Panel</b></h2>
<p><b> You can manage your website here</b></p></center>


<?php
include("connect.php");
//make the database connection
$conn  = db_connect();
//create and execute a query
$sql = "SELECT * FROM adddogs1;";
$result = $conn -> query($sql);
print "<table border = 1>\n";
//get field names
print "<tr>\n";
while ($field = $result -> fetch_field())
{
  print "<th>" . strtoupper($field->name) . "</th>\n";
} // end while
print "</tr>\n\n";
//get row data as an associative array
while ($row = $result -> fetch_assoc()){
  print "<tr>\n";
  
  foreach ($row as $col=>$val){
    print "  <td>$val</td>\n";
	
  } // end foreach
    echo "  <td><input type=\"submit\" value=\"Edit\"></td>\n";
	echo "  <td><input type=\"submit\" value=\"Delete\"></td>\n";
	
	
    //echo "  <td><form action="deletedogs.php" method="POST" ><input type="hidden" value=".$row['dog_id']" name="Delete/><input type=\"submit\" value=\"Delete\"></form></td>\n";
  print "</tr>\n\n";
}// end while
print "</table>\n";
$conn -> close();
?>


</body>
</html>