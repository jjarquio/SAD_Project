<html>
<head>
</head>

<title>
CREATING JOB ORDER
</title>

<body>
<?php

include "DBconnect/connection.php";


$result = mysql_query("SELECT * FROM table1", $link);
$num_rows = mysql_num_rows($result);

echo "$num_rows Rows\n";

?>



</html>