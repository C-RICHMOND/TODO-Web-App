<?php 
class db
{
	//Open connection to MySQL Database
	public function open_connection() 
	{
		$servername = "localhost";
		$username = "username";
		$password = "password";
		
		$conn = mysqli_connect($servername, $username, $password);
		
		if(mysqli_connect_error())
		{
			echo "Unable to connect to MySQL: " . mysqli_connect_error();
		}
	}
	
	//Close connection to MySQL Database
	public function close_connection()
	{
		mysqli_close();
	}
	
	//LOOK INTO GENERATING DB SCRIPT WITH PHPADMIN
	public function create_Database()
	{
		$sql = "CREATE DATABASE ToDo";
		mysqli_query($conn, $sql);

	}
}

$obj_db = new db();
$obj_db->open_connection();


?>