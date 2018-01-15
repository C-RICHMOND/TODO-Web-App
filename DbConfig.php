<?php 
class db
{
	//Open connection to MySQL Database
	public function open_connection() 
	{
		$servername = "localhost";
		$username = "";   //input mysql username here
		$password = ""; //input mysql password here
		$database = "todo_app";
		
		//REMOVE port # upon upload
		$conn = mysqli_connect($servername, $username, $password, $database);
		
		if(mysqli_connect_error())
		{
			echo "Unable to connect to MySQL: " . mysqli_connect_error();
		}
		
		$_SESSION['conn'] = $conn;
	}
	
	//Close connection to MySQL Database
	public function close_connection()
	{
		mysqli_close();
	}
}

$obj_db = new db();
$obj_db->open_connection();


?>