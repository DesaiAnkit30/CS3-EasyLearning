<html><body background="w2.jpg">
<link rel="stylesheet" type="text/css" href="note.css">
<form action="upqus.php" method=post  id="form1" name="form1"  enctype="multipart/form-data">
<h2>Upload Questions...............</h2><hr>
<table>
<tr><td>Question</td><td><input type=text name="qus"></td></tr>
<tr><td></td><td><input type=submit value="Upload"></td></tr>
</table>
<hr>
</form>
<h2>Question's.....</h2><hr>
<?php
session_start();
$userid = $_SESSION['uid'];
$sql="select q from qus";
$con = mysql_connect("localhost","root","anu");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("cs3", $con);
$result = mysql_query($sql);
$sz=mysql_num_rows($result);
//echo "<table border=2 cellpading=3 cellspacing=3><tr><th>Questions</th><th>Answer</th></tr>";
//echo "<tr><td colspan=2> <select size=$sz name=qu > </td><td></td></tr>";
echo "<form action=ans.php method=post>";
echo "<select size=$sz name=qu >";
while($row = mysql_fetch_array($result))
{
	$q=$row['q'];
	//echo "<tr><td> <option>$q</td><td><a href="ans.php">Ans</a></td></tr>";
	echo "<option>".$q;
}
//echo "</select></table>";
echo "</select><hr><input type=submit value=ans></form>";
//echo "</form>";
mysql_close($con);
?>
</body></html>