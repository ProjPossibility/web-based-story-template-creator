<?php

// Inialize session
session_start();

?>
<html>

<head>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<title>Search Story</title>
<script src="scripts/jquery-1.5.js" type="text/javascript"></script>
<script src="scripts/jquery-validate/jquery.validate.pack.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	$("#loginForm").validate();
  });
</script>
<style type="text/css" title="currentStyle">
			@import "scripts/DataTables-1.7.5/media/css/demo_page.css";
			@import "scripts/DataTables-1.7.5/media/css/demo_table.css";
</style>
<style>
#flip-tabs{
	width:609px;
	margin:20px auto; position:relative;
}
#flip-navigation{
	margin:0 0 10px; padding:0;
	list-style:none;
}
#flip-navigation li{
	display:inline;
}
#flip-navigation li a{
	text-decoration:none; padding:10px;
	margin-right:0px;
	background:#f9f9f9;
	color:#333; outline:none;
	font-family:Arial; font-size:12px; text-transform:uppercase;
}
#flip-navigation li a:hover{
	background:#999;
	color:#f0f0f0;
}
#flip-navigation li.selected a{
	background:#999;
	color:#f0f0f0;
}
#flip-container{
	width:609px;
	font-family:Arial; font-size:13px;
}
#flip-container div{
	background:#fff;
}
</style>
<script type="text/javascript" src="view.js"></script>
<script src="scripts/jquery-1.5.js" type="text/javascript"></script>
<script src="scripts/jquery-validate/jquery.validate.pack.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript" src="scripts/DataTables-1.7.5/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
       oTable = $('#completedForms').dataTable({
         "bJQueryUI": true,
         "sPaginationType": "full_numbers"
       });
	} );
</script>

</head>

<body>
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<!--<h1><a>Travel Grant Application</a></h1>-->

		<form id="loginForm" name="loginForm" method="POST" action="loginproc.php">
		
		<div class="form_description">
			<h2>Search Story</h2>
			<p></p>
		</div>						
				<center>
	<table id="completedForms" name="completedForms" width="588" border="0" class="display">
	<thead>
    <tr>
    	<th>Story ID</th>
        <th>Story Name</th>
        <th>Created Date</th>
        <th>Created By</th>
        <th>Tags</th>
	</tr>
    </thead>
	<tbody>
    	<tr>
        	<td>S01</td>
        	<td>Restaurant</td>
        	<td>02/20/2011</td>
        	<td>Allan</td>
        	<td>Hotel</td>
        </tr>
    	<tr>
        	<td>S02</td>
        	<td>I'm Hungry</td>
        	<td>02/20/2011</td>
        	<td>Prasanna</td>
        	<td>Food</td>
        </tr>
    	<tr>
        	<td>S03</td>
        	<td>Lets go out</td>
        	<td>02/20/2011</td>
        	<td>Allan</td>
        	<td>Travel</td>
        </tr>
    </tbody>
	</table>
				</center>
		</form>
	</div>
</body>

</html>