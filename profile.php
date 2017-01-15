<html>
<head>
<link rel="stylesheet" type="text/css" href="pro.css">
</head>
<?php
session_start();
$userid = $_SESSION['uid'];
$imgs="users/".$userid."/images/photo.jpg";
$sql="select name,address,class,phone from users where userid='$userid' ";

$con = mysql_connect("localhost","root","anu");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("cs3", $con);
$result = mysql_query($sql);

$row = mysql_fetch_array($result);
	$name=$row['name'];
	$address=$row['address'];
	$class=$row['class'];
	$phone=$row['phone'];

echo "<html>";
echo "<body>";
echo "<table>";
echo "<tr><td colspan=2><img src=$imgs width=200 height=200></td><tr>";
echo "<tr><td><h3>Welcome</h3></td><td><h3>$userid</h3></td></tr>";
echo "<tr><td>Name</td><td>$name</td></tr>";
echo "<tr><td>Address</td><td>$address</td></tr>";
echo "<tr><td>Class</td><td>$class</td></tr>";
echo "<tr><td>Phone</td><td>$phone</td></tr>";
echo "</table>";
echo "</body>";
echo "</html>";


?>
</html>