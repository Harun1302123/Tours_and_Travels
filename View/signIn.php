<!DOCTYPE html>
<html>
	<head>
		<title>Account Login</title>
		<link rel="stylesheet" href="css/signInStyle.css">
		<script type="text/javascript">
		function validateForm(){
			var x = document.signinform.username.value;
			var y = document.signinform.password.value;
	document.getElementById("error1").innerHTML="";
	document.getElementById("error2").innerHTML="";

	    if (x == "") {
        document.getElementById("error1").innerHTML="UserName required";
        return false;
    }

    	    if (y == "") {
        document.getElementById("error2").innerHTML="Password required";
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

		
		<form class="frm" name="signinform" onsubmit="return validateForm()" method="post" action="signInCheck.php">
			<div>
				<h2>Sign In</h2>
			</div>
			<div>
				<p class="para">Don't Have an Account? Sign Up at <a class="link" href="signUp.php">signup page</a></p>
			</div>
			<div class="required">
				<label>UserName</label>
				<input  placeholder="UserName" type="text" name="username" value="<?php if(isset($_COOKIE["username"])){ echo $_COOKIE["username"]; } ?>"><p id=error1 style="padding-left: 48px;color: red"></p>
			</div>
			
			<div class="required">
				<label>Password</label>
				<input placeholder="Password" type="password" name="password" value="<?php if(isset($_COOKIE["password"])){ echo $_COOKIE["password"]; } ?>"><p id=error2 style="padding-left: 48px;color: red"></p><br/>
				
			</div>
			<input type="checkbox" name="remember"/>Remember me
			
			<div class="login">
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<button type="submit" name="signIn">Login</button>
			</div>
			<p class="para">Forget your password? <a class="link" href="forgetPassword.php">Click</a> Here</p>
		</form>
	</body>
</html>