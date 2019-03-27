<?php

require("../Model/loadUserData.php");
require("../Model/saveUserData.php");
$cred=array();

$sql="select * from userdata";

loadData($sql);

$name=$_POST["username"];
$writedata=1;
$flag=0;
$usernameerror=0;

foreach($cred as $a){
	if($_POST["username"]==$a["un"])
	{
		$flag=1;
		$usernameerror=1;
		
	}
	else if($_POST["email"]==$a["email"])
	{
		$flag=1;
	}
	
}
if($flag==0)
{

//name
if($_POST["name"]=="")
{
	$writedata=0;
	echo '<p style="color:red">Name missing!<br/></p>';
}else if(strlen($_POST["name"])<3)
{
	$writedata=0;
	echo "Name too short<br/></p>";
}

//username
if($_POST["username"]=="")
{
	$writedata=0;
	echo "No userName Inserted!<br/>";
}else if(strlen($_POST["username"])<3)
{
	$writedata=0;
	echo "userName too short<br/>";
}



//Email
if($_POST["email"]=="")
{
	$writedata=0;
	echo "No Email Inserted!<br/>";
}else if (strpos($_POST["email"],".")<10 || strpos($_POST["email"],"@")<3 || strrpos($_POST["email"],".")<strpos($_POST["email"],"@"))
{ 
	$writedata=0;
	echo "Invalid Email Address Inserted<br/>";
}

//Password
if($_POST["password"]=="")
{
	$writedata=0;
	echo "No Password Inserted!<br/>";
}else if(strlen($_POST["password"])<8)
{
	$writedata=0;
	echo "Password too short<br/>";
}

//Confirm Password
if($_POST["cpassword"] != $_POST["password"])
{
	$writedata=0;
	echo "Passwords do not match!";
}
}
else
{
	$writedata=0;
	if($usernameerror==1)
	{
		echo"<p> Username already exist. Please use different name.</p>";
	}
	else
	{
		echo"<p> Email already exist. Please use different Email.</p>";

	}
}



//write

if($writedata==1)
{

$sql1 = "INSERT INTO userdata (name, username, email, password, type)
VALUES ('".$_POST["name"]."', '".$_POST["username"]."', '".$_POST["email"]."', '".$_POST["password"]."', 'user')";

saveUserData($sql1);
echo"<p>Sign Up Successful.<a href='../View/signIn.php'> Log In</a> To Your existing account.</p>";

}
else
{
	echo"<p>Sign Up failed</p>";
}
?>