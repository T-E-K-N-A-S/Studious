<html>
<body>
<?php


	// Check if session is not registered, redirect back to main page. 
	session_start();
	if(!isset($_SESSION['enroll'])) {
	header("location:home.php");
	}
$servername = "localhost";
$username = "root";
$password = "";
$db="project";
// Create connection
$conn = new mysqli($servername, $username, $password,$db);
// GREETINGS
$sesenroll=$_SESSION['enroll'];

$subcode=$_GET['subcode'];
if ($conn->connect_error) {
    die("Connection failed: ". $conn->mysqli_connect_error);
} 

//echo $subject;
//query
$randomfuck = "SELECT * FROM main WHERE SUBCODE LIKE '$subcode' ";
//echo $randomfuck ;
$res=$conn->query($randomfuck);
echo var_dump($res);
if($res->num_rows >0)
{ echo"<table style='width:100%'><tr><td width='30%'><b>TOPIC</b></td>
<!-- <td><b>SEMESTER</b></td> -->
<td width='30%'><b>TUTOR</b></td>
<td width='30%'><b>DESCRIPTION</b></td>
<td width='10%'></td>
</tr>
</table>";
while($row=$res->fetch_assoc())
{$title=$row["TOPIC"];
$top=$row["TOPIC"];
//$sem=$row["SEMESTER"];
//$subcode=$row["SUBCODE"];
$tutor=$row["TUTOR"];
$description=$row["description"];
$dat=$row["uploaded_date"];
//$lt=$row["LT"];
$style2="width:100%";


echo " <table style='width:100%' border='0'>
<tr>
 <td width='30%'>$top</td>
<td width='30%'>$tutor</td>
<td width='30%'>$description</td>
<!-- <td>$dat</td> -->
<td width='10%'><a href='download.php?filename=$title'><img src='images.png'   alt='images.png'   style='width:30px;height:30px'></a></td>
</tr>
</table> ";

}

}
else{
echo "No data";
}
//<p><a href="https://www.google.com">TOPIC</a></p>
$conn->close();


?>

</body>
</html>