<?php

	session_start();
	
	if (isset ( $_COOKIE[ session_name() ] )) {
		setcookie( session_name(), '', time() - 86400, '/' );
	}
	
	session_unset();
	session_destroy();
	
	echo "You Have Been Loged Out";
	
	echo "<p> <a href='todo.php'> Click Here To Start Session Again !!! </a> </p>";
?>