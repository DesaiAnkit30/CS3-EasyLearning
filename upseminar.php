<?php
 session_start();
  $userid = $_SESSION['uid'];
  $semdetails = $_POST["semdetails"]; 
  $subject = $_POST["subject"]; 
  $topic = $_POST["topic"]; 
  $upsem=$_FILES["upsem"]["name"];

//echo $userid."<br>".$semdetails."<br>".$subject."<br>".$topic." ".$upsem;

  $pos=strrpos($upsem,".");
	
 $ext=substr($upsem,$pos+1);

//echo $_FILES["upnote"]["name"];

 if (file_exists("notes/" . $_FILES["upsem"]["name"]))
      {
      echo $_FILES["upsem"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["upsem"]["tmp_name"],"seminars/" . $_FILES["upsem"]["name"]);
   //   move_uploaded_file($_FILES["photo"]["tmp_name"],"users/".$userid."/images/photo.jpg");
//	  echo "File uploaded.....";
     }

$con=mysql_connect("localhost","root","anu");
mysql_select_db("cs3", $con);
$sql="INSERT INTO seminars(semname,sendetails,subject,topic,userid) VALUES ('$upsem','$semdetails','$subject','$topic','$userid')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

//echo "<br><hr>".$_FILES["photo"]["name"]."<br>";
//echo "record inserted.......";
mysql_close($con);

header("Location: seminar.php");
?>