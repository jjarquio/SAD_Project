<?php

include "../Function/function.php";

?>

<html>
<body>

<form action="<?php $_PHP_SELF ?>" method="POST">



	<div>
	<label>Username</label>
	<input type="text" name="username" placeholder="Enter username" required>
	</div>

	<div>
	<label>Password</label>
	<input type="text" name="password" placeholder="Enter password" required>
	</div>

	<div>
	<label>Enter password again</label>
	<input type="text" name="password" placeholder="Confirm password" required>
	</div>

	<div>
	<input type="submit" name="createADMIN" value="Submit">
	</div>

</form>

</body>
</html>