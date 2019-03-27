<!DOCTYPE html>
<html>
	<head>
		<title>Forget Password</title>
		<link rel="stylesheet" href="css/signInStyle.css">
		<script type="text/javascript">
			function validateForm() {
    var x = document.forgetPasswordform.username.value;
	var y=document.forgetPasswordform.email.value;
	
	
	
	document.getElementById("error1").innerHTML="";
	document.getElementById("error2").innerHTML="";
	


	if (x == "") {
        document.getElementById("error1").innerHTML="UserName required";
        return false;
    }

    if (y == "") {
        document.getElementById("error2").innerHTML="Email required";
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
		</div><br><br><br><br><br>

		
		<form class="frm" name="forgetPasswordform" onsubmit="return validateForm()" method="post" action="../Controllers/mail.php">
			<div>
				<h2>Forget Password</h2>
			</div>
			<div>
				<p class="para">Return to SignIn? <a class="link" href="signIn.php">Click</a> here</p>
			</div>
			<div class="required">
				<label>UserName</label>
				<input  placeholder="UserName" type="text" name="username"><p id=error1 style="padding-left: 50px;color: red"></p>
			</div>
			
			<div class="required">
				<label>Email</label>
				<input placeholder="email" type="text" name="email"><p id=error2 style="padding-left: 50px;color: red"></p>
			</div>
			
			<div class="login">
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<button type="submit" name="Submit">Submit</button>
			</div>
		</form>
	</body>
</html>