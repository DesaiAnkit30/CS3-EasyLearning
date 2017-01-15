<html>
<body background="w2.jpg">
<link rel="stylesheet" type="text/css" href="note.css">
<form action="upseminar.php" method=post  id="form1" name="form1"  enctype="multipart/form-data">
<h2>UpLoad Seminar...............</h2><hr>
<table>
<tr><td>Select File</td><td><input type=file name="upsem"></td></tr>
<tr><td>Seminar Details</td><td><input type=text name="semdetails"></td></tr>
<tr><td>Subject</td><td><input type=text name="subject"></td></tr>
<tr><td>Topic</td><td><input type=text name="topic"></td></tr>
<tr><td></td><td><input type=submit value="Upload"></td></tr>
</table>
<hr>
</form>
<h2>Seminar's.....</h2><hr>

<?php
 session_start();
$userid = $_SESSION['uid'];

$sql="select semname,subject,topic,userid from seminars";

$con = mysql_connect("localhost","root","anu");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("cs3", $con);
$result = mysql_query($sql);
echo "<table border=2 cellpading=3 cellspacing=3><tr><th>Seminar Name</th><th>Subject</th><th>Topic</th><th>Download</th><th>Uploaded By</th></tr>";
while($row = mysql_fetch_array($result))
{
	$semname=$row['semname'];
	$subject=$row['subject'];
	$topic=$row['topic'];
  	$usr=$row['userid'];
	$lnk="seminar/".$semname;

echo "<tr><td>$semname</td><td>$subject</td><td>$topic</td><td><a href='$lnk' target=xyz>$semname</a></td><td>$usr</td></tr>";
}
echo "</table>";
 ?>
</body>
</html>