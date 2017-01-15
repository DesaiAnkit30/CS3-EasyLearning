<?php
 session_start();
$userid = $_SESSION['uid'];
  $details = $_POST["details"]; 
  $subject = $_POST["subject"]; 
  $topic = $_POST["topic"]; 
  $upnote=$_FILES["upnote"]["name"];
  
  $pos=strrpos($upnote,".");
	
 $ext=substr($upnote,$pos+1);

//echo $_FILES["upnote"]["name"];

 if (file_exists("notes/" . $_FILES["upnote"]["name"]))
      {
      echo $_FILES["upnote"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["upnote"]["tmp_name"],"notes/" . $_FILES["upnote"]["name"]);
   //   move_uploaded_file($_FILES["photo"]["tmp_name"],"users/".$userid."/images/photo.jpg");
	  echo "File uploaded.....";
     }

$con=mysql_connect("localhost","root","anu");
mysql_select_db("cs3", $con);
$sql="INSERT INTO notes (docname,details,subject,topic,doctype,userid) VALUES ('$upnote','$details','$subject','$topic','$ext','$userid')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

//echo "<br><hr>".$_FILES["photo"]["name"]."<br>";
echo "record inserted.......";
mysql_close($con);

header("Location: notes.php");
?>