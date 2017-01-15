<html>
<body background="w2.jpg">
<link rel="stylesheet" type="text/css" href="note.css">
<form action="upnotes.php" method=post  id="form1" name="form1"  enctype="multipart/form-data">
<h2>UpLoad Notes...............</h2><hr>
<table>
<tr><td>Select Document</td><td><input type=file name="upnote"></td></tr>
<tr><td>Document Details</td><td><input type=text name="details"></td></tr>
<tr><td>Subject</td><td><input type=text name="subject"></td></tr>
<tr><td>Topic</td><td><input type=text name="topic"></td></tr>
<tr><td></td><td><input type=submit value="Upload"></td></tr>
</table>
<hr>
</form>
<h2>Notes Available.....</h2><hr>

<?php
session_start();
$userid = $_SESSION['uid'];

$sql="select docname,subject,topic,doctype,userid from notes";

$con = mysql_connect("localhost","root","anu");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("cs3", $con);
$result = mysql_query($sql);
echo "<table border=2 cellpading=3 cellspacing=3><tr><th>Document Name</th><th>Subject</th><th>Topic</th><th>Doc.Type</th><th>Download</th><th>Uploaded By</th></tr>";
while($row = mysql_fetch_array($result))
{
	$docname=$row['docname'];
	$subject=$row['subject'];
	$topic=$row['topic'];
	$doctype=$row['doctype'];
	$usr=$row['userid'];
	$lnk="notes/".$docname;
        
echo "<tr><td>$docname</td><td>$subject</td><td>$topic</td><td>$doctype</td><td><a href='$lnk' target=xyz>$docname</a></td><td>$usr</td></tr>";
}
echo "</table>";
?>
</body>
</html>