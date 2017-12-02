<?php

	
	  	setcookie(session_name(), "", time()-10, "/");
		session_unset($_SESSION['username']);
		session_destroy();
		header("location: loginSES.php");
	  
?>