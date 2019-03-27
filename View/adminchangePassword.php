<!DOCTYPE html>
<html>
	<head>
		<title>Change Password</title>
		<link rel="stylesheet" href="css/signInStyle.css">
		<script type="text/javascript">

			xmlhttp = new XMLHttpRequest();
function showHint() {
	str=document.changePasswordform.newpassword.value;
	
	
	xmlhttp.onreadystatechange = function() {		
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {	
			m=document.getElementById("error3");
			m.innerHTML=xmlhttp.responseText;
			
		}
	};
	var url="../Model/fetch2.php";
	
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("password="+str);
	
	
}


			function validateForm() {
    var x = document.changePasswordform.username.value;
	var y=document.changePasswordform.currpassword.value;
	var z=document.changePasswordform.newpassword.value;
	var w=document.changePasswordform.repassword.value;
	
	
	document.getElementById("error1").innerHTML="";
	document.getElementById("error2").innerHTML="";
	document.getElementById("error3").innerHTML="";
	document.getElementById("error4").innerHTML="";


	if (x == "") {
        document.getElementById("error1").innerHTML="UserName required";
        return false;
    }

    if (y == "") {
        document.getElementById("error2").innerHTML="Password required";
        return false;
    }

    if (z == "") {
        document.getElementById("error3").innerHTML="NewPassword required";
        return false;
    }
    else if(z.length<8)
    {
    	document.getElementById("error3").innerHTML="NewPassword is too short";
        return false;
    }

    if (w == "") {
        document.getElementById("error4").innerHTML="RePassword required";
        return false;
    }
    else if(z!=w)
    {
    	document.getElementById("error4").innerHTML="Password doesn't matched";
    	return false;
    }
	
}
			

		</script>
	</head>
	<body bgcolor="cccccc">
	<h1 style="text-align: center;">Tours & Travels</h1>
		<div class="menu">
		<ul>
		  	
			<li><a href="adminhome.php">Admin Panel</a></li>
			
			<li><a href="../Controllers/logout.php">Log Out</a></li>
		</ul>
		</div><br><br><br><br><br>

		
		<form class="frm" name="changePasswordform" onsubmit="return validateForm()" method="post" action="../Controllers/chnagePasswordCheck.php">
			<div>
				<h2>Chnage Password</h2>
			</div>
			
			<div class="required">
				<label>User Name</label>
				<input placeholder="User Name" type="username" name="username"> <p id=error1 style="padding-left: 50px;color: red"></p>
			</div>
			
			<div class="required">
				<label>Current Pass</label>
				<input placeholder="Current Password" type="password" name="currpassword"><p id=error2 style="padding-left: 50px;color: red"></p>
			</div>
			
			<div class="required">
				<label>New Pass</label>
				<input placeholder="New Password" type="password" onkeyup="showHint()" name="newpassword"><p id=error3 style="padding-left: 70px;color: red"></p>
			</div>
			
			<div class="required">
				<label>Retype Pass</label>
				<input placeholder="Retype Password" type="password" name="repassword"><p id=error4 style="padding-left: 70px;color: red"></p>
			</div>
			
			<div class="confirm">
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<button type="submit" name="changepass">Change Pass</button>
			</div>
		</form>
	</body>
</html>