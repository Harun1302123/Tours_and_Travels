<?php
$selectedOption = $_POST["districtList"];

if(isset($selectedOption)){
require("loadSpotData.php");
$cred=array();
$sql3="select * from spotdata where sname='$selectedOption'";
loadData($sql3);
session_start();
$_SESSION['value']=$cred;
$_SESSION['option']=$cred["region"];
header("location:../View/gallery.php");
}
else{
	header("location:../View/gallery.php");
}
?>