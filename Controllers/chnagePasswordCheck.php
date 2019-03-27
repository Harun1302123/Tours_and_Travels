<?php
session_start(); 
    if (!isset($_SESSION['username'])) {
        header('location: ../View/signIn.php');
        
    }
    if (isset($_GET['logout'])) {
        session_start();
        session_destroy();
        unset($_SESSION['username']);
        header("location: ../View/signIn.php");
        
    }
require("../Model/saveChangePassword.php");
require("../Model/loadUserData.php");
$cred=array();
$sql="select * from userdata where username='".$_POST["username"]."'";
loadData($sql);
$flag=0;
$adminflag=0;
$changePasswordFlag=1;
$username1= $_POST['username'];
$newpassword = $_POST['newpassword'];


if($_SESSION["username"]==$_POST["username"])
{foreach($cred as $a){
	if($_POST["username"]==$a["un"] && $_POST["currpassword"]==$a["pass"] && $a["type"]=="user")
	{
		$flag=1;
		
	}
	else if($_POST["username"]==$a["un"] && $_POST["currpassword"]==$a["pass"] && $a["type"]=="admin")
	{
		$flag=1;
		$adminflag=1;
	}
}
}
else
{
	echo"<p>Use your own username</p>";
}

if($flag==1)		    
 {       

if($_POST["newpassword"]=="")
{
	$changePasswordFlag=0;
	echo "No Password Inserted!<br/>";
}else if(strlen($_POST["newpassword"])<8)
{
	$changePasswordFlag=0;
	echo "Password too short<br/>";
}


if($_POST["newpassword"] != $_POST["repassword"])
{
	$changePasswordFlag=0;
	echo "Passwords do not match!";
}
if($_POST["currpassword"] == $_POST["newpassword"]){
	$changePasswordFlag=0;
	echo "Use a Different Password.";
}

}

else
{
	$changePasswordFlag=0;
	echo"<p>Username and password doesn't matched</p>";
}

if($changePasswordFlag==1)
{
	$sql4 = "UPDATE userdata SET password='$newpassword' WHERE username='$username1'";
	updateData($sql4);
	//updateToXML();
	if($adminflag==0 && $_SESSION["type"]=="user")
	{echo '<p>Password is changed!!! Back to <a href="../View/profile.php">profile</a></p>';

     }
     else
     {
     	echo '<p>Password is changed!!! Back to <a href="../View/adminhome.php">profile</a></p>';
     }

}
else
{
	echo"<p>change password operation failed</p>";
}

?>