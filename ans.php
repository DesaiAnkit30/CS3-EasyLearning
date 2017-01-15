<?php
$qu=$_POST["qu"];
echo "<html><form action=uploadans.php method=post>";
echo "<h2>Post Answer...........</h2><hr>";
echo $qu." :- <br>";
echo "<textarea name=ans rows=5 cols=25 ></textarea>";
echo "<input type=submit value=Post_Answer>";
echo "<input type=hidden name=hd value='$qu'>";
echo "</form></html><hr>";


$sql="select a from answer where q like '%$qu%' ";
//echo "<br>".$sql;

$con = mysql_connect("localhost","root","anu");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("cs3", $con);
$result = mysql_query($sql);
echo "<h2>Answers..............</h2><hr color=orange>";
while($row = mysql_fetch_array($result))
{
	$q=$row['a'];
	echo $q."<hr>";
	//echo "<option>".$q;
}


?>