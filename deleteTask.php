<?php 
session_start();
require_once("DbConfig.php");
$conn = $_SESSION['conn'];

if(isset($_POST['status']) && !empty($_POST['status'])) {
	$status = $_POST['status'];
	$id = $_POST['id'];
	
	if($status == 'pending') {
		$table = "pending_tasks";
	} else if ($status == 'started') {
		$table = "started_tasks";
	} else if ($status == 'completed') {
		$table = "completed_tasks";
	} else {
		$table = "late_tasks";
	}
	
	$sql = "DELETE FROM ".$table." WHERE id='".$id."'";
	if (mysqli_query($conn, $sql)) {
		echo '<meta http-equiv="REFRESH" content="0;url=index.php">';
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
?>