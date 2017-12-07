<?php

	
	  	setcookie(session_name(), "", time()-10, "/");
		session_unset($_SESSION['USERNAME']);
		session_destroy();
		unset($_COOKIE['job']);
		header("location: ../index.php");

	  
?>