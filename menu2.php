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

$semin=$_GET['semester'];
$bra=$_GET['bra'];
echo "<form action='menu2.php' id='sem' >
<select name='bra' >
<option value='0' selected disabled>BRANCH</option>
<option value='cse'>cse</option>
<option value='ece'>ece</option>
</select>
 
	
	<select name='semester' form='sem' onChange='myFunction()'>
	<option value='0' selected disabled>SEMESTER</option>
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


<input type='submit' value='GO'>
</form>";

$query1="SELECT sub,subcode FROM subjects WHERE sem = '$semin' AND bra LIKE '$bra' ";
$query1="SELECT * FROM `subjects` WHERE `branch` LIKE '$bra' AND `sem` =$semin";
$res1=$conn->query($query1);

if($res1->num_rows > 0)
{
	while($row1=$res1->fetch_assoc())
	{$sub1=$row1["sub"];
	$subcode1=$row1["subcode"];
		echo "<a href='stud.php?subcode=$subcode1&bra=$bra' target='frame2'><button>$sub1</button></a>";
		//echo "<button>$sub1</button>";
	}
}
$conn->close();

?>

</body>
</html>