<?php

function updateToXML()
{
	$xml1=simplexml_load_file("userdata.xml");
	$username1= $_POST['username'];
$newpassword = $_POST['newpassword'];
	foreach($xml1->children() as $user)
	{
		
		$username=$user->username;
		if($username==$username1)
		{
			$user->password=$newpassword;
		}
		file_put_contents("userdata.xml",$xml1->saveXML());

		
	}
}

function updateToDatabase($sql4)
{


// Create connection
$conn = mysqli_connect("localhost", "root", "","database");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



if (mysqli_query($conn, $sql4)) {
    


} else {
    echo "Error updating record: " . mysqli_error($conn);
}


mysqli_close($conn);
}

function updateToText(){

}

function updateData($sql4){
		$dataSource="mysql";
	global $sql4;
	
	if($dataSource=="mysql"){
		updateToDatabase($sql4);
	}
	else if($dataSource=="xml"){
		updateToXML();
	}
	else if($dataSource=="text"){
		updateToText();
	}
}

?>