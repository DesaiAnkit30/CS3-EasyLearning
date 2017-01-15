<?php
$qus = $_POST["qus"]; 
$con=mysql_connect("localhost","root","anu");
mysql_select_db("cs3", $con);
$sql="INSERT INTO qus (q) VALUES ('$qus')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

mysql_close($con);

header("Location: qusans.php");
?>