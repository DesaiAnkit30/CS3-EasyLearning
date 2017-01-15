<html>
<body background="w2.jpg">
<link rel="stylesheet" type="text/css" href="note.css">
<form action="upprojects.php" method=post  id="form1" name="form1"  enctype="multipart/form-data">
<h2>UpLoad Projects...............</h2><hr>
<table>
<tr><td>Project Document</td><td><input type=file name="upproj"></td></tr>
<tr><td>Project Details</td><td><input type=text name="projdetails"></td></tr>
<tr><td>Topic</td><td><input type=text name="topic"></td></tr>
<tr><td></td><td><input type=submit value="Upload"></td></tr>
</table>
<hr>
</form>
<h2>Projects.....</h2><hr>

<?php
session_start();
$userid = $_SESSION['uid'];

$sql="select projname,projdetails,topic ,userid from project";

$con = mysql_connect("localhost","root","anu");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("cs3", $con);
$result = mysql_query($sql);
echo "<table border=2 cellpading=3 cellspacing=3><tr><th>Project Name</th><th>Project Details</th><th>Topic</th><th>Download</th><th>Uploaded By</th></tr>";
while($row = mysql_fetch_array($result))
{
	$projname=$row['projname'];
	$projdetails=$row['projdetails'];
	$topic=$row['topic'];
	//$doctype=$row['doctype'];
	$usr=$row['userid'];
	$lnk="projects/".$projname;

echo "<tr><td>$projname</td><td>$projdetails</td><td>$topic</td><td><a href='$lnk' target=xyz>$projname</a></td><td>$usr</td></tr>";
}
echo "</table>";
?>
</body>
</html>