<?php

$hostname = 'ss12.db.5637669.hostedresource.com';        // Your MySQL hostname. Usualy named as 'localhost', so you're NOT necessary to change this even this script has already online on the internet.
$dbname   = 'ss12'; // Your database name.
$username = 'ss12';             // Your database username.
$password = 'Possibility@11';                 // Your database password. If your database has no password, leave it empty.

// Let's connect to host
mysql_connect($hostname, $username, $password) or DIE(mysql_error());
// Select the database
mysql_select_db($dbname) or DIE(mysql_error());

?>