<html>
<body>
<?php


	// Check if session is not registered, redirect back to main page. 
	session_start();
	if(!isset($_SESSION['enroll'])) {
	header("location:home.php");
	}

//echo "WELCOME".$_SESSION['enroll'];
//echo "<br>WELCOME".$_SESSION['password'];
//echo "<br>WELCOME".$_SESSION['email'];
//echo "<a href='logout.php'>LOGOUT</a> ";
$servername = "localhost";
$username = "root";
$password = "";
$db="project";
// Create connection
$conn = new mysqli($servername, $username, $password,$db);
// GREETINGS
$sesenroll=$_SESSION['enroll'];

echo"<h1>Study Material</h1>";
// feed back var
$semin=$_GET['semester'];
$lt=$_GET['lt'];
$bra=$_GET['bra'];
$bat=$_GET['bat'];
$subject=$_GET['subject'];

// feed back loop for semester
echo " <br><br>SEM: ".$semin;

echo "<form action='db.php' id='sem'>
 cse <input type='radio' name='bra'>
 ece <input type='radio' name='bra'>
	<br>
	<select name='semester' form='sem' onChange='myFunction()'>
  	<option value='1'>1</option>
  	<option value='2'>2</option>
	<option value='3'>3</option>
	<option value='4'>4</option>
	<option value='5'>5</option>
	<option value='6'>6</option>
	<option value='7'>7</option>
	<option value='8'>8</option>
                 
               </select>
<br>
<br>
<select name='bat' form='sem' onChange='myFunction()'>
  	<option value='1'>f1</option>
  	<option value='2'>f2</option>
	<option value='3'>f3</option>
	<option value='4'>f4</option>
	<option value='5'>f5</option>
	<option value='6'>f6</option>
	<option value='7'>f7</option>
	<option value='8'>f8</option>
     <option value='8'>e1</option>
	 <option value='8'>e2</option>
	 <option value='8'>e3</option>            
	 <option value='8'>e4</option>
	 <option value='8'>e5</option>
	 <option value='8'>e6</option>
	 <option value='8'>e7</option>
	 <option value='8'>e8</option>
               </select>
<!--  
LAB	<input type='radio' name='lt' value='L'>
THEORY <input type='radio' name='lt' value='T'>
-->
<input type='submit' value='GO'>
</form>";
//echo" <select name= 'sub' id='subb' form='sem'>

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->mysqli_connect_error);
} 
//echo "Connected successfully. oh yeah	";

//query
$query1="SELECT sub FROM subjects WHERE sem = $semin ";
$res1=$conn->query($query1);
if($res1->num_rows > 0)
{
	while($row1=$res1->fetch_assoc())
	{$sub1=$row1["sub"];
		echo "<a href='db.php?subject='$sub1' target='frame2''><button>$sub1</button></a>";
	}
}

echo "<br><br>";


//$randomfuck = "SELECT * FROM main WHERE SEMESTER =$semin ";
//$randomfuck="SELECT * FROM `main` WHERE `SEMESTER` = '$semin' AND `LT` LIKE '$lt'";
$randomfuck = "SELECT * FROM main WHERE SUBJECT LIKE $subject ";
$res=$conn->query($randomfuck);
if($res->num_rows >0)
{ echo"<table style='width:100%'><tr><td><b>TOPIC</b></td>
<td><b>SEMESTER</b></td>
<td><b>SUBJECT</b></td>
<td><b>TUTOR</b></td>
<td><b>L/T</b></td>
</tr>
</table>";
while($row=$res->fetch_assoc())
{$title=$row["TOPIC"];
$top=$row["TOPIC"];
$sem=$row["SEMESTER"];
$sub=$row["SUBJECT"];
$tut=$row["TUTOR"];
$lt=$row["LT"];
$style2="width:100%";


echo " <table style='width:100%' border='7'>
<tr>
 <td>$top</td>
<td>$sem</td>
<td>$sub</td>
<td>$tut</td>
<td>$lt</td>
<td><a href='download.php?filename=$title'><img src='images.png'   alt='images.png'   style='width:30px;height:30px'></a></td>
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