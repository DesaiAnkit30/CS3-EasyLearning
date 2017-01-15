<?php
 session_start();
 $userid = $_SESSION['uid'];
  $projdetails = $_POST["projdetails"]; 
  $topic = $_POST["topic"]; 
  $upproj=$_FILES["upproj"]["name"];
  
  $pos=strrpos($upnote,".");
	
 $ext=substr($upnote,$pos+1);

//echo $_FILES["upnote"]["name"];

 if (file_exists("projects/" . $_FILES["upproj"]["name"]))
      {
      echo $_FILES["upproj"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["upproj"]["tmp_name"],"projects/" . $_FILES["upproj"]["name"]);
   //   move_uploaded_file($_FILES["photo"]["tmp_name"],"users/".$userid."/images/photo.jpg");
	//  echo "File uploaded.....";
     }

$con=mysql_connect("localhost","root","anu");
mysql_select_db("cs3", $con);
$sql="INSERT INTO project (projname,projdetails,topic,userid) VALUES ('$upproj','$projdetails','$topic','$userid')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

//echo "<br><hr>".$_FILES["photo"]["name"]."<br>";
//echo "record inserted.......";
mysql_close($con);

header("Location: projects.php");
?>