<!DOCTYPE html>
<html>
	<head>
		<title>Add Tourist Spot</title>
		<link rel="stylesheet" href="css/upload.css">
		<script type="text/javascript">
			function validateForm() {
				var x = document.uploadform.sname.value;
				var y = document.uploadform.sarea.value;
				var r = document.uploadform.sregion.value;
				var w = document.uploadform.splacetype.value;
				var u = document.uploadform.sdescription.value;
				var t = document.uploadform.fileToUpload.value;
				var z=r.toLowerCase();


	document.getElementById("error1").innerHTML="";
	document.getElementById("error2").innerHTML="";
	document.getElementById("error3").innerHTML="";
	document.getElementById("error4").innerHTML="";
	document.getElementById("error5").innerHTML="";
	document.getElementById("error6").innerHTML="";

				if (x == "") {
        document.getElementById("error1").innerHTML="SpotName required";
        return false;
    }

    if (y == "") {
        document.getElementById("error2").innerHTML="SpotArea required";
        return false;
    }

     if (r == "") {
        document.getElementById("error3").innerHTML="SpotRegion required";
        return false;
    }
    else if((z!="dhaka")&&(z!="chittagong")&&(z!="barishal")&&(z!="khulna")&&(z!="mymensingh")&&(z!="rajshahi")&&(z!="sylhet")&&(z!="rangpur"))
    {
    	document.getElementById("error3").innerHTML="Wrong SpotRegion";
        return false;
    }
   
     if (w == "") {
        document.getElementById("error4").innerHTML="SpotAreaType required";
        return false;
    }

     if (u == "") {
        document.getElementById("error5").innerHTML="SpotDescription required";
        return false;
    }

     if (t == "") {
        document.getElementById("error6").innerHTML="SpotImage required";
        return false;
    }
}




</script>
	</head>
	<body bgcolor="#cccccc">
		<div class = "menu">
			
		<ul>
		
		<li><a href="profile.php">Profile</a></li>
		
		<li><a href="../Controllers/logout.php">Log Out</a></li>
		</ul>
	
		</div></br></br></br>

		<form class="frm" name="uploadform" onsubmit="return validateForm()" method="post" action="../Controllers/submitUpload.php" enctype="multipart/form-data">
			<div>
				<h2>Add a Tourist Spot</h2><hr>
			</div>
			<div class="required">
				<label>Spot Name</label>
				<input placeholder="Spot Name" type="text" name="sname">
				<p id=error1 style="padding-left: 100px;color: red"></p>
				</div>
			<div class="required">
				<label>Area</label>
				<input placeholder="Area" type="text" name="sarea">
				<p id=error2 style="padding-left: 100px;color: red"></p>
			</div>
			<div class="required">
				<label>Region</label>
				<input  placeholder="Region" type="text" name="sregion">
				<p id=error3 style="padding-left: 100px;color: red"></p>
			</div>
			<div class="required">
				<label>Place Type</label>
				<input placeholder="Ex: Beach, Hill, Forest...." type="text" name="splacetype">
				<p id=error4 style="padding-left: 100px;color: red"></p>
			</div>
			<div class="required">
				<label>Description</label>
				<input placeholder="Add some information about this spot" type="text" name="sdescription">
				<p id=error5 style="padding-left: 100px;color: red"></p>
			</div>
			<div class="required">
				<label>Spot Images</label>
				<input type="file" name="fileToUpload" id="fileToUpload">
				<p id=error6 style="padding-left: 100px;color: red"></p>
			</div>
			
			<div class="submit">
			<button type="reset" name="button">Reset</button><br>
				<button type="submit" name="submit">Submit</button>
			</div>
		</form>
	</body>
</html>