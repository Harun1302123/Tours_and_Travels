<?php




function loadFromXML(){
	global $cred;
	$xml=simplexml_load_file("userdata.xml") or die("Error: Cannot create object");
	foreach($xml as $st){
		$dar=array();
		$dar["name"]=(string)$st->name;
		$dar["un"]=(string)$st->username;
		$dar["email"]=(string)$st->email;
		$dar["pass"]=(string)$st->password;
		$dar["type"]=(string)$st->type;
		
		
		
		$cred[]=$dar;
	}
	
}



function loadFromDatabase($sql)
{
global $cred;
	$conn = mysqli_connect("localhost", "root", "","database");
	
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	//$data=array();
	
	while($row = mysqli_fetch_assoc($result)) {
		//print_r($row);
		$ar=array();
		$ar["name"]=$row["name"];
		$ar["un"]=$row["username"];
		$ar["email"]=$row["email"];
		$ar["pass"]=$row["password"];
		$ar["type"]=$row["type"];
		
		$cred[]=$ar;
}
}

function loadFromText(){
		global $cred;
	$file=fopen("userdata.txt","r")or die("error");
	while($line=fgets($file)){
		$line=trim($line);
		$cr=explode("|",$line);
		$cred[]=array("name"=>$cr[0],"un"=>$cr[1],"email"=>$cr[2],"pass"=>$cr[3],"type"=>$cr[4]);
	}
	fclose($file);

}

function loadData($sql){
	$dataSource="mysql";
	global $sql;
	
	if($dataSource=="mysql"){
		loadFromDatabase($sql);
	}
	else if($dataSource=="xml"){
		loadFromXML();
	}
	else if($dataSource=="text"){
		loadFromText();
	}
	
}



?>