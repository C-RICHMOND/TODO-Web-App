<?php
session_start();
require_once("DbConfig.php");

class started_task {
	
	public function addTask($data) {
		$title = $data['taskTitle'];
		$startDate = date("Y-m-d", strtotime(str_replace('-', '/', $data['startDate'])));
		$endDate = date("Y-m-d", strtotime(str_replace('-', '/', $data['endDate'])));
		$description = $data['description'];
		
		$sql = "INSERT INTO started_tasks (title, start_date, end_date, description) VALUES ('".$title."', '".$startDate."', '".$endDate."', '".$description."')";
		
		$conn = $_SESSION['conn'];
		
		if (mysqli_query($conn, $sql)) {
			echo '<meta http-equiv="REFRESH" content="0;url=index.php">';
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
	
	public function editTask($data) {
		$id = $data['id'];
		$title = $data['taskTitle'];
		$startDate = date("Y-m-d", strtotime(str_replace('-', '/', $data['startDate'])));
		$endDate = date("Y-m-d", strtotime(str_replace('-', '/', $data['endDate'])));
		$description = $data['description'];
		
		$sql = "UPDATE started_tasks SET title='".$title."', start_date='".$startDate."', end_date='".$endDate."', description='".$description."' WHERE id='".$id."'";
		
		$conn = $_SESSION['conn'];
		
		if (mysqli_query($conn, $sql)) {
			echo '<meta http-equiv="REFRESH" content="0;url=index.php">';
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
	
	public function deleteTask($data) {
		$sql = "DELETE FROM started_tasks WHERE id='".$id."'";
		
		if (mysqli_query($conn, $sql)) {
			echo '<meta http-equiv="REFRESH" content="0;url=index.php">';
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
		
}
?>