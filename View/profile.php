<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" href="css/profile.css">
</head>
<body bgcolor="#cccccc">
<?php 
	session_start(); 
	if (!isset($_SESSION['username'])) {
		header('location: signIn.php');
	}
	if (isset($_GET['logout'])) {
		session_start();
		session_destroy();
		unset($_SESSION['username']);
		header("location: signIn.php");
	}
	$hellouser=$_SESSION['username'];
	echo"<p>Hello, <b style='color:rgb(51, 102, 255)'>$hellouser</b><br/>Welcome to <b>Tours & Travels</b>.</p>";
?>
	<h1 style="text-align: center;">Tours & Travels</h1>

	<div class = "menu">			
	<ul>
	<li><a href="profile.php">Profile</a></li>
	
	<li><a href="upload.php">Upload</a></li>
	<li><a href="userGallery.php">Gallery</a></li>
	<li><a href="changePassword.php">Change Password</a></li>
	<li><a href="../Controllers/logout.php">Log Out</a></li>

	</ul>
</div>

<th>  <a href = "def.jpg" target = "new"> <img src = "def.jpg" width = "100%" height = "500px"/> </a> </th>


</body>
</html>
