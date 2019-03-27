<!DOCTYPE html>
<html>
	<head>
		<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;

}

</style>
		<title>Welcome to User Database</title>
		<link rel="stylesheet" href="css/gallery.css">
	</head>
	<body bgcolor="#cccccc">
		
		<div class = "menu">			
		<ul>
		
		    <li><a href="adminhome.php">Admin Panel</a></li>
	
	        <li><a href="../Controllers/logout.php">Log Out</a></li>
		
		</ul>
	</div>
		<h1 style="text-align: center;">Welcome to User Database</h1>

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
	require("../Model/loadUserData.php");
	$cred=array();
	$sql="select * from userdata where type='user'";
	loadFromDatabase($sql);
echo"<table align='center'>";
echo"<tr><th>Name</th><th>UserName</th><th>Email</th><th>Password</th><th>Action</th></tr>";
	
	foreach($cred as $c){

$name2=$c["name"];
$username2=$c["un"];
$email2=$c["email"];
$password2=$c["pass"];




echo"<tr><td>$name2</td><td>$username2</td><td>$email2</td><td>$password2</td><td><a style='color: red' href='../Model/removeUserData.php?uname=$username2'>Delete</a></td></tr>";

}
echo"</table>";

		?>





		</body>
</html>