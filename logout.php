

<!DOCTYPE html>
<html>
<body>
	</br> </br>
	<?php
	session_start();
if(isset($_SESSION['enroll']))
{// remove all session variables
	session_unset(); 

	// destroy the session 
	session_destroy(); 

header("location:home.php");
}

else 
{echo "this is not done";
}
?>
	
	
	
</body>
</html>