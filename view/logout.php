<?php

		session_start();
	  	setcookie(session_name(), "", time()-86400, "/");
		session_unset($_SESSION['USERNAME']);
		session_destroy();
		unset($_COOKIE['job']);
		unset($_SESSION['USERNAME']);
		header("location: ../index.php");

	  
?>