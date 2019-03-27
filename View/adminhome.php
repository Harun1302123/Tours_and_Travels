<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
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
	echo"<p>Hello, <b style='color:rgb(51, 102, 255)'>$hellouser</b><br/>Welcome to <b>Tours & Travels Admin Panel</b>.</p>";
?>
	<h1 style="text-align: center;">Tours & Travels</h1>

	<div class = "menu">			
	<ul>
	<li><a href="adminhome.php">Admin Panel</a></li>
	
	<li><a href="adminGallery.php">Gallery</a></li>
	<li><a href="adminUserInformation.php">User Information</a></li>
	<li><a href="adminchangePassword.php">Change Password</a></li>
	<li><a href="../Controllers/logout.php">Log Out</a></li>
	</ul>
</div>

<th>  <a href = "ghi.jpg" target = "new"> <img src = "ghi.jpg" width = "100%" height = "500px"/> </a> </th>


</body>
</html>
