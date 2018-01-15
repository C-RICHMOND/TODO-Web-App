<?php
session_start();
require_once("DbConfig.php");
$conn = $_SESSION['conn'];

if(isset($_POST['status']) && !empty($_POST['status'])) {
	$status = $_POST['status'];
	$id = $_POST['id'];
	
	if($status == 'pending') {
		$table = "pending_tasks";
	} else if ($status == 'started_tasks') {
		$table = "started_tasks";
	} else if ($status == 'completed_tasks') {
		$table = "completed_tasks";
	} else {
		$table = "late_tasks";
	}

	$sql = "SELECT * FROM ".$table." WHERE id='".$id."'";
	if($result = mysqli_query($conn, $sql)) {
		$taskData = mysqli_fetch_assoc($result);
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	echo json_encode($taskData);
}
?>