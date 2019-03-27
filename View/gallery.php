<!DOCTYPE html>
<?php session_start(); ?>
<html>
	<head>
		<script type="text/javascript">
xmlhttp = new XMLHttpRequest();
flag="";
function clearCombo(id){
	var list=document.getElementById(id);
	while (list.firstChild) {
		list.removeChild(list.firstChild);
	}
}
function loadJSONToCombo(id,jsn){
	var resp=JSON.parse(jsn);
	var combo = document.getElementById(id);
	for(i=0;i<resp.length;i++){
		var option = document.createElement("option");
		option.text = resp[i].name;
		option.value = resp[i].name;
		combo.add(option); 
	}
}
function loadDistrict(v) {
	str=v.value;
	flag="loadDistrict";
	clearCombo("districtList");
	
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {	
			
			loadJSONToCombo("districtList",xmlhttp.responseText);
			
		}
	};
	var url="../Model/fetch3.php";
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("flag="+flag+"&region="+str);
}

		</script>
		<title>Welcome to Gallery</title>
		<link rel="stylesheet" href="css/gallery.css">
	</head>
	<body bgcolor="#cccccc">
		
		<div class = "menu">			
		<ul>
		
		    <li><a href="home.php">Home</a></li>
			
		  	<li><a href="signIn.php">Sign In</a></li>
		  	<li><a href="signUp.php">Sign Up</a></li>
		  	<li><a href="gallery.php">Gallery</a></li>
		
		</ul>
	</div>
		<h1 style="text-align: center;">Welcome to Tours & Travels Gallery</h1></br>

		<form name="galleryForm" method="post" action="../Model/filter.php">
		Select Division :
<select id="divisionList" onchange="loadDistrict(this)"><option>All</option><?php

require("../Model/loadSpotData.php");
	$data=array();
	$sql="select DISTINCT sregion from spotdata";
	ajaxcomboload($sql);

foreach($data as $r){?>
	
	<option value="<?php echo $r['region'];?>">
	<?php echo $r["region"];?>
	</option>	<?php
}?>

</select>
 
<select id="districtList" name="districtList">
</select><button type="submit" name="filter">Filter</button><br/><br/><br/>
</form>
		
<table id="table1">	
		<?php
		
$cred=array();
	//require("loadSpotData.php");
	if(isset($_SESSION['value'])){
		$cred=$_SESSION['value'];
		session_unset();
	session_destroy();
	}
	else{
	if(isset($cred)){
	$sql3="select * from spotdata";
	loadData($sql3);}
	}

	
foreach($cred as $b)
{
$pic=$b["picture"];
$Uploader=$b["uploader"];
$spotname=$b["name"];
$spotarea=$b["area"];
$spotregion=$b["region"];
$spotplacetype=$b["type"];
$spotdescription=$b["desciption"];


echo "<tr><td><hr/><img src='../Model/Uploads/$pic ' alt='error' width='800' height='400'><hr/></td><td><p>Spot Name: $spotname</p><br/><p>Spot Area: $spotarea</p><br/><p>Spot region: $spotregion</p><br/><p>Spot type: $spotplacetype</p><br/><p>Spot description: $spotdescription</p><br/></td></tr>";
echo"<tr><td><p>uploader: $Uploader</p><br/><br/></td></tr>";


}




		?>
	</table>
		
	
</body>
</html>



