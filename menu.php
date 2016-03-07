

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
//echo "<a href='logout.php' target='_top'>LOGOUT</a> ";
$servername = "localhost";
$username = "root";
$password = "";
$db="project";
$cat=$_GET["cat"];
// Create connection
$conn = new mysqli($servername, $username, $password,$db);
// GREETINGS
$sesenroll=$_SESSION['enroll'];
//echo " --------".$sesenroll;
if($cat=='s')
{$randomfuck = "SELECT * FROM accounts WHERE enroll =$sesenroll ";
}
if ($cat=='t')
{
$randomfuck = "SELECT * FROM teachers WHERE enroll =$sesenroll ";
}
$res=$conn->query($randomfuck);
if($res->num_rows >0)
{ 
while($row=$res->fetch_assoc())
{
echo "<br><br>WELCOME >>>  <b>".$row["fname"]."-".$row["lname"]."</b>";
}}

echo "<a href='home.php' target='_top'><button>logout</button></a><br><br>";

if ($cat=='s')
{echo "<a href='frame2.php?semester=3' target='frm'><button>study material</button></a><br><br>";
echo "<a href='ebook.php?ser=''' target='frm'><button>ebooks</button></a><br><br>";

}
if ($cat=='t')
{
echo "<a href='frame2.php?semester=3' target='frm'><button>study material</button></a><br><br>";
echo "<a href='ebook.php?ser=''' target='frm'><button>ebooks</button></a><br><br>";
echo "<a href='uploadform.php' target='frm'><button>upload </button></a><br><br>";
echo "<a href='notice.php' target='frm'><button>post notice</button></a><br><br>";
}
//echo "<iframe name='frm' src='db.php?semester=1' height='400' width='400'></iframe>";
?>

</body>
</html>