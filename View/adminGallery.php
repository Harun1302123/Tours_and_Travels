<!DOCTYPE html>
<html>
	<head>
		<title>Welcome to Admin Gallery</title>
		<link rel="stylesheet" href="css/gallery.css">
	</head>
	<body bgcolor="#cccccc">
		
		<div class = "menu">			
		<ul>
		
		    <li><a href="adminhome.php">Admin Panel</a></li>
	
	        <li><a href="../Controllers/logout.php">Log Out</a></li>
		
		</ul>
	</div>
		<h1 style="text-align: center;">Welcome to Tours & Travels Gallery</h1><br/>

		
	
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

	require("../Model/loadSpotData.php");
	$cred=array();
	$sql3="select * from spotdata";
	loadData($sql3);
	

	
foreach($cred as $b)
{
$pic=$b["picture"];
$Uploader=$b["uploader"];
$spotname=$b["name"];
$spotarea=$b["area"];
$spotregion=$b["region"];
$spotplacetype=$b["type"];
$spotdescription=$b["desciption"];
echo"<table>";

echo "<tr><td><br/><img src='../Model/Uploads/$pic ' alt='error' width='800' height='400'></td><td><p>Spot Name: $spotname</p><br/><p>Spot Area: $spotarea</p><br/><p>Spot region: $spotregion</p><br/><p>Spot type: $spotplacetype</p><br/><p>Spot description: $spotdescription</p><br/></td></tr>";
echo"<tr><td><p>uploader: $Uploader</p></td><td><a style='color: red' href='../Model/removeSpotData.php?photo=$pic'>Delete</a></td><br/><hr/></tr>";
echo"</table>";
}
	?>
</body>
</html>



