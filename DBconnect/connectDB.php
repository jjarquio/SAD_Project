<?php

/**
* 
*/
class connectDB
{
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "rma_db";
	private $conn;
	
	function __construct()
	{
		$this->conn = $this->connectDB();
	}

	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}

	function run($query){
		$result = mysqli_query($this->conn,$query);
	}

}


?>