<h1>All dogs</h1>
<?php
include_once('config.php');
//make the database connection
$conn  = db_connect();
//create and execute a query
$sql = "SELECT * FROM avaialabledog;";
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
  //look at each field
  foreach ($row as $col=>$val){
    print "  <td>$val</td>\n";
	
  } // end foreach
   echo "  <td><input type=\"submit\" value=\"delete dog\"></td>\n";
  print "</tr>\n\n";
}// end while
print "</table>\n";
$conn -> close();
?>
