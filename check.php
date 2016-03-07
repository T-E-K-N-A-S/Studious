<?php
session_start();
$host="localhost";
$username="root";
$password="";
$db_name="project";
$tbl_name="accounts";
$tbl_nametwo="teachers";
$myenroll=$_POST["myenroll"]; 
	
$mypass=$_POST["mypass"]; 


$myemail=$_POST["myemail"];
$mycat=$_POST["mycat"];

echo $myenroll."/".$mypass."/".$myemail." / ".$mycat."<br>";

$connection = new mysqli($host,$username,$password,$db_name);
	
if ($connection->connect_error) {
    die("Connection failed: ". $connection->mysqli_connect_error);
} 
//echo "Connected successfully. oh yeah";
if(strcmp($mycat,"teach")==0)
{$cat='t';

$sql="SELECT * FROM $tbl_nametwo WHERE enroll='$myenroll' and pass='$mypass' and emailid='$myemail'";

	
}
else 
{$cat='s';
$sql="SELECT * FROM $tbl_name WHERE enroll='$myenroll' and pass='$mypass' and emailid='$myemail'";

	

}

$result=mysqli_query($connection, $sql);

	// Mysql_num_row is counting table row
	
$count=mysqli_num_rows($result);

	


if($count==1)
{ $_SESSION["enroll"]= $myenroll; 
	//>>>>>>>>>>>30	
$_SESSION["password"]= $mypass; 
	
$_SESSION["email"]= $myemail; 

header("location:frames.php?cat=$cat");

}
else{
echo"You Did Something Wrong. I can feel it";
}



?>

