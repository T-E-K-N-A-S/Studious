<?php
$target_dir = "server/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

//$sub=$_POST["sub"];
$sem=$_POST["semester"];
$batch=$_POST["bat"];
$topic=basename($_FILES["fileToUpload"]["name"]);
$description=$_POST["description"];
$tutor="prof snape";
$subcode=$_POST["subcode"];
//echo  $sem ."--".$batch."--". $topic."--".$description."--",$subcode."--<br>";

$servername = "localhost";
$username = "root";
$password = "";
$db="project";

echo "<h1>Upload Study Material</h1>";
// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->mysqli_connect_error);
} 
//echo "<h5>Connected successfully. oh yeah<h5>	";



// Check if image file is a actual image or fake image
/*if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
*/
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.<br><br>";
    $uploadOk = 0;
}
// Allow certain file formats
/*if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}*/

//query
if ($uploadOk!=0)
{$sql = "INSERT INTO `project`.`main` (`TOPIC`, `SEMESTER`,`SUBCODE`, `TUTOR`, `description`, `uploaded_date`) VALUES ('$topic', '$sem',  '$subcode','$tutor',  '$description', CURRENT_TIMESTAMP);";
    $result=$conn->query($sql);
//echo $sql."<br>".$result;
if ($result=== TRUE) {
$final=1;
	
} else {
 echo "Error: " . $sql . "<br>" . $conn->error."<br><br>";
//header("location:uploadErr.html");
$final=0;
}
}

// Check if $uploadOk is set to 0 by an error
if ($final == 0) {
    echo "Sorry, your file was not uploaded.<br><br>";
	//header("location:uploadErr.html");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

echo"<h3>click to upload <a href='uploadform.php'>next</a> file.</h3>";
	} else {
        echo "Sorry, there was an error uploading your file.";
    //header("location:uploadErr.html");
	}
}
?>