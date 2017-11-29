<?php

	session_start();

	if (isset($_SESSION['username'])) {
		header("location: dashboard.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

</body>
</html>