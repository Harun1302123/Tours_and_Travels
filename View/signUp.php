<!DOCTYPE html>
<html>
	<head>
		<title>Create Account</title>
		<link rel="stylesheet" href="css/signUpStyle.css">
		<script type="text/javascript">
			xmlhttp = new XMLHttpRequest();
function showHint() {
	str=document.signupform.username.value;
	
	xmlhttp.onreadystatechange = function() {		
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {	
			m=document.getElementById("error2");
			m.innerHTML="";
			m.innerHTML=xmlhttp.responseText;

			
		}
	};
	var url="../Model/fetch.php?username="+str;
	
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
}

function showHint1() {
	str1=document.signupform.email.value;
	
	xmlhttp.onreadystatechange = function() {		
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {	
			n=document.getElementById("error3");
			n.innerHTML="";
			n.innerHTML=xmlhttp.responseText;
		}
	};
	var url="../Model/fetch1.php?email="+str1;
	
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
}


			function validateForm() {
    var x = document.signupform.name.value;
	var y=document.signupform.email.value;
	var z=document.signupform.username.value;
	var w=document.signupform.password.value;
	var u=document.signupform.cpassword.value;
	document.getElementById("error1").innerHTML="";
	document.getElementById("error2").innerHTML="";
	document.getElementById("error3").innerHTML="";
	document.getElementById("error4").innerHTML="";
	document.getElementById("error5").innerHTML="";
    if (x == "") {
        document.getElementById("error1").innerHTML="Name required";
        return false;
    }
    else if(x.length<3)
    {
    	document.getElementById("error1").innerHTML="Name is too short";
        return false;
    }

    if (z == "") {
        document.getElementById("error2").innerHTML="UserName required";
        return false;
    }
    else if(z.length<3)
    {
    	document.getElementById("error2").innerHTML="UserName is too short";
        return false;
    }

	if (y == "") {
        document.getElementById("error3").innerHTML="Email required";
        return false;
    }
	else if(y.indexOf(".")<10 || y.indexOf("@")<3 || y.indexOf(".")<y.indexOf("@"))
	{
	
        document.getElementById("error3").innerHTML="Invalid Email";
        return false;
	}

	if (w == "") {
        document.getElementById("error4").innerHTML="Password required";
        return false;
    }
    else if(w.length<8)
    {
    	document.getElementById("error4").innerHTML="Paswword is too short";
        return false;
    }

    

    if (u == "") {
        document.getElementById("error5").innerHTML="ConfirmPassword required";
        return false;
    }
    else if(w!=u)
    {
    	document.getElementById("error5").innerHTML="Paswword doesn't matched";
    	return false;
    }
	
}
		</script>
	</head>
	<body bgcolor="#cccccc">
	<h1 style="text-align: center;">Tours & Travels</h1>
		<div class="menu">
		<ul>
		  	<li><a href="home.php">Home</a></li>
			
		  	<li><a href="signIn.php">Sign In</a></li>
		  	<li><a href="signUp.php">Sign Up</a></li>
		  	<li><a href="gallery.php">Gallery</a></li>
		</ul>
		</div></br></br>

		<form class="frm" name="signupform" onsubmit="return validateForm()" method="post" action="../Controllers/signUpCheck.php">
			<div>
				<h2>Create New Account</h2><hr>
			</div>
			<div>
				<p class="para">Already have an account? Login at <a class="link" href="signIn.php">login page</a></p>
			</div>
			
			<div class="required">
				<label>Name</label>
				<input placeholder="Name" type="text" name="name"> <p id=error1 style="padding-left: 153px;color: red"></p>
				</div>
			
			<div class="required">
				<label>UserName</label>
				<input  placeholder="Username" type="username" onkeyup="showHint()" name="username"><p id=error2 style="padding-left: 153px;color: red"></p>
			</div>
			
			<div class="required">
				<label>E-Mail</label>
				<input  placeholder="E-Mail" type="email" onkeyup="showHint1()" name="email"><p id=error3 style="padding-left: 153px;color: red"></p>
			</div>
		
			<div class="required">
				<label>Password</label>
				<input placeholder="Password" type="password" name="password"><p id=error4 style="padding-left: 153px;color: red"></p>
			</div>
			<div class="required">
				<label>Re-Password</label>
				<input placeholder="Re-Password" type="password" name="cpassword"><p id=error5 style="padding-left: 153px;color: red"></p>
			</div>
		
			<div class="signup">
				
				<button type="submit" name="signUp">Sign Up</button>
			</div>
		</form>
	</body>
</html>