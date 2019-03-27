<?php
require("loadUserData.php");
$cred=array();

$sql="select * from userdata where username='".$_GET["username"]."'";

loadData($sql);
foreach($cred as $v){
	echo "<p>";
	echo "Username <b>".$v["un"]."</b> is Already Exist.";
	echo "</p>";
}

?>