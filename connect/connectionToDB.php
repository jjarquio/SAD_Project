<?php

	class DBconnect{

		protected $con;

		function __construct(){
			$dbhost = "localhost:3306";
			$dbuser = "root";
			$dbpass = "";
			$dbname = "rma_db";

			$this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
		
			if(!$this->con) {	//if the connection is not established
				die("Could not connect: ".mysql_error());   //exit the execution and display the errors
			} 
		}
	}

?>