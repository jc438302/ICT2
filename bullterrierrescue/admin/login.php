<link href="http://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister" rel="stylesheet" type="text/css">
<link href="../ICT1/ProjectFinalStage/main.css" rel="stylesheet">

<div class="wrapper">
<header><h1>Car Craze</h1>

<nav>

			<ul>
			<li><a href="../ICT1/ProjectFinalStage/index.php">Home</a></li>
			<li>
            <div class="dropdown">
  <button class="dropbtn">Buy Cars</button>
  <div class="dropdown-content">
    <a href="../ICT1/ProjectFinalStage/newcars.html">New Cars</a>
    <a href="../ICT1/ProjectFinalStage/usedcars.html">Used Cars</a>
   
  </div>
</div></li>
			<li><a href="../ICT1/ProjectFinalStage/insurance.html">Insurance</a></li>
			<li><a href="../ICT1/ProjectFinalStage/aboutus.php">About Us</a></li>
			<li><a href="../ICT1/ProjectFinalStage/contactus.html">Contact Us</a></li>
            <li><a href="../ICT1/ProjectFinalStage/login.html">Login/Sign Up</a></li>
			</ul>		
			
		
</nav>
</header>
<br/><br/><br/><br/><br/><br/>
<?php
//must appear BEFORE the <html> tag
session_start();
include_once('../ICT1/ProjectFinalStage/config.php');	

if( isset($_POST["admin"])&& isset($_POST["password"]) )
{
	$admin = $_POST["admin"];
		
	$password = $_POST["password"];
	
	if ($admin && $password)
	{
	  // if the user has just tried to log in
	
	  //make the database connection
	  $conn  = db_connect();	
	  
	  //make a query to check if user login successfully
	  $sql = "select * from admin where username='$admin' and password='$password'";
	  $result = $conn -> query($sql);
	  $numOfRows = $result -> num_rows;

	  if ($numOfRows)
	  {
		// login successfully, keep the user's email
		$_SESSION['valid_user'] = $admin;
	  }
	  $conn -> close();
	}
}
if (isset($_SESSION['valid_user']))
{
  header("location: members_only.php");  
}
else
{
  if (isset($email))
  {
    // if user tried and failed to log in
    echo "<b>Incorrect - Please try it again </b><br>";
	echo "<a href=\"registration.html\">Sign-up</a><br>";
  }
  else 
  {
    // user has not tried to log in yet or has logged out
    echo "<br/><b>You are not logged in</b><br><br/><br/>";
  }

  // provide form to log in: same page for action  
  echo "<form method=post action=\"login.php\">";
  echo "<table>";
  echo "<tr><td>Email:</td>";
  echo "<td><input type=text name=email></td></tr>";
  echo "<tr><td>Password:</td>";
  echo "<td><input type=password name=password></td></tr>";
  echo "<tr><td colspan=2 align=center>";
  echo "<input type=submit value=\"Log in\"></td></tr>";
  echo "</table></form>";
}

?>





