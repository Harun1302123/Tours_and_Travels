<?php
	session_start();
		require("../Model/loadUserData.php");
	$cred=array();
	$sql="select * from userdata where username='".$_POST["username"]."'";
	loadData($sql);
	$flag=0;
	$ok=0;
	
	
	$username = "";
	$password = "";
	
 if(!empty($_POST["remember"])) {
	setcookie ("username",$_POST["username"],time()+ 3600);
	setcookie ("password",$_POST["password"],time()+ 3600);
	
} else {
	setcookie("username","");
	setcookie("password","");
	
}


	if (isset($_POST['signIn'])) {
		if(!empty($_POST['username'])){
			$username = $_POST['username'];
			$ok=1;
		}
		else{
			echo "<p>Username required</p>";
			$ok=0;
		}

		if(!empty($_POST['password'])){
			$password = $_POST['password'];
			$ok=1;
		}
		else{
			echo "<p>Password required</p>";
			$ok=0;
		}
	}
	else
	{
		echo "<p>Error</p>";
	}


if($ok==1)
{
foreach($cred as $a){
	if($_POST["username"]==$a["un"] && $_POST["password"]==$a["pass"] && $a["type"]=="admin")
	{
		$flag=1;
		
	}
	else if($_POST["username"]==$a["un"] && $_POST["password"]==$a["pass"] && $a["type"]=="user")
	{
		$flag=2;
	}
	
}

if($flag==1)
{
	
	$_SESSION['username']=$username;
	$_SESSION['type']="admin";
	header("location:adminhome.php");
	
}
elseif ($flag==2) {
	$_SESSION['username']=$username;
	$_SESSION['type']="user";
	header("location:profile.php");
}
else
{
	echo"<p>User Name & Password doesn't Matched</p>";
	
	
}
}
else
{
	echo "<p>Error</p>";
}	

	
	
?>