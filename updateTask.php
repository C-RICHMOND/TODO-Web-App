<?php
session_start();
require_once ("DbConfig.php");
require_once("taskClasses/class_pending.php");
require_once("taskClasses/class_started.php");
require_once("taskClasses/class_completed.php");
require_once("taskClasses/class_late.php");

date_default_timezone_set('America/New_York');
$currentDate = date('Y-m-d', time());

if($_POST){
	$taskData = $_POST;
}

if(isset($_POST['btn_submit'])) {
	$status = $_POST['status'];
	if ($status == "Pending"){
		if($status == $_POST['preEditStatus']){
			$obj_user = new pending_task();
			$obj_user->editTask($taskData);
		} else {
			$obj_user = new pending_task();
			$obj_user->addTask($taskData);
		} 
	} else if($status == "Completed"){
		if($status == $_POST['preEditStatus']){
			$obj_user = new completed_task();
			$obj_user->editTask($taskData);
		} else {
			$obj_user = new completed_task();
			$obj_user->addTask($taskData);
		} 
	} else if($status == "Started") {
		if($status == $_POST['preEditStatus']){
			$obj_user = new started_task();
			$obj_user->editTask($taskData);
		} else {
			$obj_user = new started_task();
			$obj_user->addTask($taskData);
		} 
	} else {
		if($status == $_POST['preEditStatus']){
			$obj_user = new late_task();
			$obj_user->editTask($taskData);
		} else {
			$obj_user = new late_task();
			$obj_user->addTask($taskData);
		} 
	}
}
?>