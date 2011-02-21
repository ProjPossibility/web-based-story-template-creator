<?php

// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['username'])) {
	
	$page = sprintf("Location: %s", mysql_real_escape_string($_SESSION['page']));
	header($page);
}

?>
<html>

<head>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<title>Login - iNarrate</title>
<script src="scripts/jquery-1.5.js" type="text/javascript"></script>
<script src="scripts/jquery-validate/jquery.validate.pack.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	$("#loginForm").validate();
  });
</script>
</head>

<body>
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		
		<form id="loginForm" name="loginForm" method="POST" action="loginproc.php">
		
		<div class="form_description">
			<h2>Login - iNarrate</h2>
			<p></p>
		</div>						
			<ul >
				<li id="li_1" >
				<center>
					<table border="0">
					<tr>
						<td><label class="description" for="Name">Username</label></td>
						<td><span><input type="text" name="username" size="20" class="required"></span></td>
					</tr>
					<tr>
						<td><label class="description" for="Name">Password</label></td>
						<td><span><input type="password" name="password" size="20" class="required"></span></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input type="submit" value="Login"></td>
					</tr>
					<tr>
						<td><a href="register.php">Register</a></td>
					</tr>
					<tr>
						<td><a href="forgotpassword.php">Forgot Password?</a></td>
					</tr>
					</table>
				</center>
				</li>
			</ul>
		</form>
	</div>
</body>

</html>