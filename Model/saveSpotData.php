<?php
function writetoTEXT(){
		$uploader=$_SESSION['username'];
		$spotname = $_POST['sname'];
		$spotarea = $_POST['sarea'];
		$spotregion = $GLOBALS['spotregion'];
        $placetype = $_POST['splacetype'];
        $description = $_POST['sdescription'];
        $spotimage = $_FILES['fileToUpload']['name'];
	
	$myfile=fopen('spotdata.txt', 'a');
        fwrite($myfile,$uploader."|".$spotname."|".$spotarea."|".$spotregion."|".$placetype."|".$description."|".$spotimage."\n");
        $ok=0;


	
	
	}

	function writetoXML(){
	$xml=new DomDocument("1.0","UTF-8");
	$xml->formatOutput=true;
	$xml->preserveWhiteSpace=false;
	$xml->load("spotdata.xml");

	if(!$xml)
	{
		$data=$xml->creteElement("data");
		$xml->appendChild("$data");
	}
	else
	{
		$data=$xml->firstChild;
	}
	
		
        $uploader=$_SESSION['username'];
		$spotname = $_POST['sname'];
		$spotarea = $_POST['sarea'];
		$spotregion = $GLOBALS['spotregion'];
        $placetype = $_POST['splacetype'];
        $description = $_POST['sdescription'];
        $spotimage = $_FILES['fileToUpload']['name'];



		$spot=$xml->createElement("spot");
		$data->appendChild($spot);
		$username1=$xml->createElement("username",$uploader);
		$spot->appendChild($username1);
		$sname1=$xml->createElement("sname",$spotname);
		$spot->appendChild($sname1);
		$sarea1=$xml->createElement("sarea",$spotarea);
		$spot->appendChild($sarea1);
		$sregion1=$xml->createElement("sregion",$spotregion);
		$spot->appendChild($sregion1);
		$splacetype1=$xml->createElement("splacetype",$placetype);
		$spot->appendChild($splacetype1);
		$sdescription1=$xml->createElement("sdescription",$description);
		$spot->appendChild($sdescription1);
		$spotimage1=$xml->createElement("spotimage",$spotimage);
		$spot->appendChild($spotimage1);
		$xml->save("spotdata.xml");
		$ok=0;
	
	
	
	}

	function writetoDatabase($sql2)
	{ global $ok1;

$conn = mysqli_connect("localhost", "root", "","database");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (mysqli_query($conn, $sql2)) {

$ok1=1;
   

} else {
    
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);

    $ok1=0;
    
}

mysqli_close($conn);

	$ok=0;




	}

function saveSpotData($sql2){
	$dataSource="mysql";
	global $sql2;
	
	if($dataSource=="mysql"){
		writetoDatabase($sql2);
	}
	else if($dataSource=="xml"){
		writetoXML();
	}
	else if($dataSource=="text"){
		writetoTEXT();
	}
	
}

?>