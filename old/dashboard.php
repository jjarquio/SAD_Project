<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashbaord</title>
</head>
<body>
<?php
    include 'connect.php';

if(isset($_POST['btnLogin'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];

      $sql = "SELECT * FROM account WHERE username = '$user' && password = '$pass'";

       $result = $con->query($sql);

       //clsoe the connection -->  
        $con->close();


    //check kung naa ba sa sulod sa dtabase ang gi input nga user ug pass
    if($result->num_rows > 0) {
        //if naa sa sulod execute ang dashboard nga menu
?> 
        <form  action="searchResult.php" method="post"  >
            <input type="search" name="searchbar" id="search" placeholder="Enter text here" /> <br/>
            <input type="submit" name="btnsearch" id="sbtn" value="GO" />
    
        </form>

<?php
      
       
}else{
        // here dapat mag JScript nlng nga wala nag exist sa database ang user ug pass input
     echo "invalid";
    
}
    
}else{
    //kung wala gi input sa login nga mga user ug password nga mag prmpt cia sa login form
   header("location: login.php");
}
?>

</body>
</html>