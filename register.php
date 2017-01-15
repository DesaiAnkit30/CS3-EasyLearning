<html>
<?php 
 $name = $_POST["name"]; 
 $address = $_POST["address"]; 
 $class = $_POST["class"]; 
 $phone = $_POST["phone"]; 
 $userid = $_POST["uid"]; 
 $password = $_POST["pwd"];
$photo=$_FILES["photo"]["name"];
//echo $photo."\n"; 


$an=str_split($phone);
for($i=0;$i<strlen($phone);$i++)
{
	if(!($an[$i]=='0'||$an[$i]=='1'||$an[$i]=='2'||$an[$i]=='3'||$an[$i]=='4'||$an[$i]=='5'||$an[$i]=='6'||$an[$i]=='7'||$an[$i]=='8'||$an[$i]=='9'))
		{
			echo "Phone must be numeric";
			return;
		}


}
if($name=="" || $address=="" || $class=="" || $phone=="" || $userid=="" || $password=="" || $photo=="")
{
echo "Field must not left blank";
return ;
}



if(file_exists("users/".$userid))
{
	echo "Select another user id....";
	return;
}

mkdir("users/".$userid);
mkdir("users/".$userid."/images/");
  
  if (file_exists($userid."/images/" . $_FILES["photo"]["name"]))
      {
      echo $_FILES["photo"]["name"] . " already exists. ";
      }
    else
      {
         move_uploaded_file($_FILES["photo"]["tmp_name"],"users/".$userid."/images/photo.jpg");

     
      }


$con=mysql_connect("localhost","root","anu");
mysql_select_db("cs3", $con);
$sql="INSERT INTO users (name,address,class,phone,photo,userid,password) VALUES ('$name','$address','$class','$phone','$photo','$userid','$password')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }


mysql_close($con);
header("Location: sample.html");

?>
</html>
