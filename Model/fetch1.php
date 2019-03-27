<?php
require("loadUserData.php");
$cred=array();

$sql="select * from userdata where email='".$_GET["email"]."'";

loadData($sql);
foreach($cred as $v){
	echo "<p>";
	echo "<b>".$v["email"]."</b> is Already Exist.";
	echo "</p>";
}

?>