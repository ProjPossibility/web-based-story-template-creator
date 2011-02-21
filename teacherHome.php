
<html>

<head>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<title>Template Wizard - iNarrate</title>
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
	
		
		<form id="templatewizardForm" name="templatewizardForm" method="POST" action="loginproc.php">
		
		<div class="form_description">
			<h2>Template Wizard - iNarrate</h2>
			<p></p>
		</div>						
			<ul >
				<li id="li_1" >
				<center>
					<table border="0">
					<tr>
					<td>
					<a href="http://ss12.vairavanlaxman.com/Prasanna/jquery.php"><button style="width:150;height:65" onClick=""><b>Create a New Story</b></button></a>
					</td>
					</tr>
					<tr>
					<td>
<a href="../searchStory.php" ><button style="width:150;height:65" onClick="listproc.php"><b>Search for Story</b></button></a>
</td>
					</tr>
					<tr>
					<td>
<a href="../studentProfile.php" ><button style="width:150;height:65"><b>Student Profile</b></button></a>
</td>
					</tr>
					<tr>
					<td>
<a href="logout.php" ><button style="width:150;height:65"><b>Logout</b></button></a>
</td>
					</tr>
					
					
					
						
					</table>
				</center>
				</li>
			</ul>
		</form>
	</div>
</body>

</html>