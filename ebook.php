<html>
    <body>
        
<?php 
session_start();
	if(!isset($_SESSION['enroll'])) {
	header("location:home.php");
	}
    
$servername = "localhost";
$username = "root";
$password = "";
$db="project";
$ser=$_GET["ser"];
$conn = new mysqli($servername, $username, $password,$db);
?>

<form action="ebook.php" method="get">
    <input type="search"  name="ser" autofocus =  "autofocus"></input>
  </form>
  <?php 
  $cunt="select * from ebooks where topic like '%$ser%' ";
 // echo $ser;
  $res=$conn->query($cunt);
  //echo $cunt;
 // echo var_dump($res);
  
  if($res->num_rows>0)
  {
      while($row=$res->fetch_assoc())
{$topic=$row["topic"];
$desc=$row["description"];
echo $topic." -- ".$desc."<br>";
  }
  }
  ?>
  </body>
  </html>  

