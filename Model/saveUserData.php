<?php
function writetoXML(){
	$xml=new DomDocument("1.0","UTF-8");
	$xml->formatOutput=true;
	$xml->preserveWhiteSpace=false;
	$xml->load("userdata.xml");

	if(!$xml)
	{
		$data=$xml->creteElement("data");
		$xml->appendChild("$data");
	}
	else
	{
		$data=$xml->firstChild;
	}
	
		$uname=$_POST['name'];
		$uuname=$_POST['username'];
		$uemail=$_POST['email'];
		$upassword=$_POST['password'];
		$type="user";

		$user=$xml->createElement("user");
		$data->appendChild($user);
		$name1=$xml->createElement("name",$uname);
		$user->appendChild($name1);
		$username1=$xml->createElement("username",$uuname);
		$user->appendChild($username1);
		$email1=$xml->createElement("email",$uemail);
		$user->appendChild($email1);
		$password1=$xml->createElement("password",$upassword);
		$user->appendChild($password1);
		$type=$xml->createElement("type",$type);
		$user->appendChild($type);
		$xml->save("userdata.xml");
		$writedata=0;
	
	
	
	}

	function writetoDatabase($sql1)
	{

$conn = mysqli_connect("localhost", "root", "","database");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (mysqli_query($conn, $sql1)) {
    
} else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
$writedata=0;

	}

	function writetoTEXT(){

		$uname=$_POST['name'];
		$uuname=$_POST['username'];
		$uemail=$_POST['email'];
		$upassword=$_POST['password'];
		$type="user";
	
	$myfile=fopen('userdata.txt', 'a');
        fwrite($myfile,$uname."|".$uuname."|".$uemail."|".$upassword."|".$type."\n");
        

        
	
	
	}

	function saveUserData($sql1){
	$dataSource="mysql";
	global $sql1;
	
	if($dataSource=="mysql"){
		writetoDatabase($sql1);
	}
	else if($dataSource=="xml"){
		writetoXML();
	}
	else if($dataSource=="text"){
		writetoTEXT();
	}
	
}
?>