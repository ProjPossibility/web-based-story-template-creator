<?php

// Inialize session
session_start();

// Include database connection settings
include('config.inc');

// Retrieve username and password from database according to user's input
$query = sprintf("SELECT * FROM user WHERE user_name = '%s' AND user_pwd = '%s'", mysql_real_escape_string($_POST['username']), mysql_real_escape_string($_POST['password']));
$login = mysql_query($query);

// Check username and password match
if (mysql_num_rows($login) == 1) {

$result = mysql_fetch_array($login);

//if($result['user_auth'] == 'YES')
//{
	// Set username session variable
	$_SESSION['username'] = $_POST['username'];
	//Check if the user has forgot password earlier
	if($result['forgot_pwd'] == 'YES')
	{
		// Jump to reset password page
		header('Location: resetpassword.php');
	}
	else
	{
		if($result['teacher'] == 'YES')
		{
			// Jump to manager secure page
			header('Location: teacherHome.php');
		}
		else
		{
			// Jump to student secure page
			header('Location: userHome.php');
		}
	}
//}
/*else
{
	echo "user not authenticated";
	// Jump to login page
	//header('Location: index.php');
}*/
}
else 
{
	// Jump to login page
	header('Location: index.php');
}

?>