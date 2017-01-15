<?php
$qu=$_POST["hd"];
$ans=$_POST["ans"];

$con = mysql_connect("localhost","root","anu");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("cs3", $con);
$sql="insert into answer (q,a)values('$qu','$ans')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

mysql_close($con);

header("Location: qusans.php");

?>