<?php
require("loadUserData.php");
$cred=array();
$flag=0;
session_start();

$sql="select * from userdata where username='".$_SESSION["username"]."'";

loadData($sql);
foreach($cred as $v){
	if($v["pass"]==$_POST["password"]){
		$flag=1;
	}
	
}
if($flag==1){
	echo "<p>";
	echo "Use a different <b>Password</b>";
	echo "</p>";
}

?>