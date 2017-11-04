<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashbaord</title>
</head>
<body>
<?php
if(isset($_POST['btnLogin'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];

}else{
   header("location: login.php");
}
?>
<form  action="searchResult.php" method="post"  >
	    <input type="search" name="searchbar" id="search" placeholder="Enter text here" /> <br/>
        <input type="submit" name="btnsearch" id="sbtn" value="GO" />
    
</form>
</body>
</html>