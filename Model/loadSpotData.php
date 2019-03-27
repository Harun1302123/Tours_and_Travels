<?php
function loadFromText(){
	global $cred;
	$file=fopen("spotdata.txt","r")or die("error");
	while($line=fgets($file)){
		$line=trim($line);
		$cr=explode("|",$line);
		$cred[]=array("uploader"=>$cr[0],"name"=>$cr[1],"area"=>$cr[2],"region"=>$cr[3],"type"=>$cr[4],"desciption"=>$cr[5],"picture"=>$cr[6]);
	}
	fclose($file);
}


function loadFromDatabase($sql3)
{
global $cred;
	$conn = mysqli_connect("localhost", "root", "","database");
	
	$result = mysqli_query($conn, $sql3)or die(mysqli_error($conn));
	//$data=array();
	
	while($row = mysqli_fetch_assoc($result)) {
		//print_r($row);
		$ar=array();
		$ar["uploader"]=$row["username"];
		$ar["name"]=$row["sname"];
		$ar["area"]=$row["sarea"];
		$ar["region"]=$row["sregion"];
		$ar["type"]=$row["splacetype"];
		$ar["desciption"]=$row["sdescription"];
		$ar["picture"]=$row["spotimage"];
		
		$cred[]=$ar;
}
}
function loadFromXML(){

	global $cred;
	$xml=simplexml_load_file("spotdata.xml") or die("Error: Cannot create object");
	foreach($xml as $st){
		$dar=array();
		$dar["uploader"]=(string)$st->username;
		$dar["name"]=(string)$st->sname;
		$dar["area"]=(string)$st->sarea;
		$dar["region"]=(string)$st->sregion;
		$dar["type"]=(string)$st->splacetype;
		$dar["desciption"]=(string)$st->sdescription;
		$dar["picture"]=(string)$st->spotimage;
		
		
		
		$cred[]=$dar;
	}
}


function loadData($sql3){
	$dataSource="mysql";
	global $sql3;
	
	if($dataSource=="mysql"){
		loadFromDatabase($sql3);
	}
	else if($dataSource=="xml"){
		loadFromXML();
	}
	else if($dataSource=="text"){
		loadFromText();
	}
	
}

function ajaxcomboload($sql){
global $data;
	$conn = mysqli_connect("localhost", "root", "","database");
	
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	//$data=array();
	
	while($row = mysqli_fetch_assoc($result)) {
		//print_r($row);
		$ar=array();
		
		$ar["region"]=$row["sregion"];
		
		
		$data[]=$ar;
}

}

function ajaxcomboloaddd($sql4)
{
global $data1;
	$conn = mysqli_connect("localhost", "root", "","database");
	
	$result = mysqli_query($conn, $sql4)or die(mysqli_error($conn));
	//$data=array();
	
	while($row = mysqli_fetch_assoc($result)) {
		//print_r($row);
		$ar=array();
		
		$ar["name"]=$row["sname"];
		
		
		
		
		
		
		$data1[]=$ar;
}
}


?>