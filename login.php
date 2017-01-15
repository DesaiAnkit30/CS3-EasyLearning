<html>
<?php
 $userid = $_POST["uid"]; 
 $password = $_POST["pwd"];
$con = mysql_connect("localhost","root","anu");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("cs3", $con);
$result = mysql_query("SELECT userid,password FROM users where userid='$userid' and password='$password' ");

if($row = mysql_fetch_array($result))
  {
     	$user=$row['userid'];
	$paswd=$row['password'];

	if(!(strcmp($user,$userid) && strcmp($paswd,$password)))
	{
		session_start();
		$_SESSION[uid]=$user;
		header("Location: main.html");
		//echo "valid";
	}
	
//  echo "<br />";
  }
echo "invalid user...";

mysql_close($con);
?> 
</html>