<?php
$data1=array();
require("../Model/loadSpotData.php");
if(isset($_REQUEST["flag"]) && $_REQUEST["flag"]=="loadDistrict"){
	$sql4="select DISTINCT sname from spotdata where sregion='".$_REQUEST["region"]."'";	
	//echo $sql;
	//loadFromText();
	ajaxcomboloaddd($sql4);
	echo json_encode($data1);
	//print_r($data);
}
?>