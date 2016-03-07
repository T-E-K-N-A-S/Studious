<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>STUDious</title>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="trailc.css">
</head>
<body>
<header>
<nav class="right">

<h1>Sign Up form </h1>
</nav>
</header>
<div class="side">
<div id="bord">
<form action="registration_form.php"  method="POST">
 <input type="radio" name="cat" value="student" checked>Student &nbsp &nbsp &nbsp &nbsp

<input type="radio" name="cat" value="teacher">Teacher
<br>
<input width="500px" type="text" style="font-size:auto;height:40px; width:100%" name="enroll" placeholder="Enroll" >
<br>
<br>
<input width="500px" type="text" style="font-size:auto;height:40px; width:100%" name="fname" placeholder="First Name" >
<br>
<br>
<input width="500px" type="text" style="font-size:auto;height:40px; width:100%" name="lname" placeholder="Last Name" >
<br>
<br>
  <input width="500px" type="text" style="font-size:auto;height:40px; width:100%" name="email" placeholder="Enter Email" >
  <br>

department <select name='dep'  onChange='myFunction()' placeholder="select department">
  	<option value='Biotechnology'>Biotechnology</option>
  	<option value='Computer Science and IT'>Computer Science and IT</option>
	<option value='Electronics and Communication'>Electronics and Communication</option>
	<option value='Mathematics'>Mathematics</option>
	<option value='Physics and Material Science'>Physics and Material Science</option>
	<option value='Humanities and Social Science'>Humanities and Social Science</option>
	
                 
               </select> 
<br>
  <input width="500px" type="password" style="font-size:auto;height:40px; width:100%" name="pass" placeholder="Enter Password"  >
  <br>
  <input type="radio" name="sex" value="male" checked>Male &nbsp &nbsp &nbsp

<input type="radio" name="sex" value="female">Female
<br>
<p>By clicking on submit
, You promise us to visit out site weekly and download the latest study material.</p>
  
<input type="submit" value="Submit" >
</form>
</div>
</div>
<div class="section">
<div id="cou">
<p style="text-align:left">
</p>

</div>
<div id="footer">
Copyright &copy; S T U D I O U S
</div>

</body>
</html>