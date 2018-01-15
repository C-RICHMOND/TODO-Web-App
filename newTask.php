<?php
require_once("taskClasses/class_pending.php");
require_once("taskClasses/class_started.php");

date_default_timezone_set('America/New_York');
$currentDate = date('Y-m-d', time());

if($_POST){
	$taskData = $_POST;
}

if(isset($_POST['btn_submit'])) {
		//check if task date is in the future or it has already started
		
		if (strtotime($currentDate) <= strtotime($_POST['startDate'])) {
			$obj_user = new pending_task();
			$obj_user->addTask($taskData);
		} else {
			$obj_user = new started_task();
			$obj_user->addTask($data);
		}
}
?>