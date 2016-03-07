<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="project";
	
// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->mysqli_connect_error);
} 
echo "<h5>Connected successfully. oh yeah<h5>	";

$r_cat=$_POST["cat"];
$r_fname=$_POST["fname"];
$r_lname=$_POST["lname"];
$r_enroll=$_POST["enroll"];
$r_email=$_POST["email"];
$r_pass=$_POST["pass"];
$r_sex=$_POST["sex"];
$r_dep=$_POST["dep"];
echo $r_cat."  ".$r_fname."  ".$r_lname."  ".$r_enroll."  ".$r_email."  ".$r_pass."  ".$r_sex." <br> ".$r_dep;
$link_trial="http://localhost/project/trial.php";
$submit="submit";
$back="B A C K";

if(strcmp($r_cat,"teacher")==0)
{
$sql = "INSERT INTO project.teachers (enroll,fname,lname,emailid,pass,sex,dep) VALUES ('$r_enroll','$r_fname','$r_lname','$r_email','$r_pass','$r_sex','$r_dep');";
}
else
{
$sql = "INSERT INTO project.accounts (enroll,fname,lname,emailid,pass,sex) VALUES ('$r_enroll','$r_fname','$r_lname','$r_email','$r_pass','$r_sex');";
}

$result=$conn->query($sql);
echo $sql."<br>".$result;
if ($result=== TRUE) {

	
} else {
 echo "Error: " . $sql . "<br>" . $conn->error;

echo " <br><br><h2>same data found,<br>Dude, you have already registered.<h2>";

echo "just go <a href=$link_trial>B A C K </a> and login!";

//echo day("Y");
$d=strtotime("last year");
echo date("d-m-Y h:i:sa", $d) . "<br>";
}




$conn->close();


?>

<body>
<html>