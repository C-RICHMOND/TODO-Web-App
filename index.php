
<?php 
session_start();
require_once("DbConfig.php");

$conn = $_SESSION['conn'];
$resultPending = mysqli_query($conn, "SELECT COUNT(*) FROM pending_tasks");
$numPending = mysqli_fetch_row($resultPending);

$resultStarted = mysqli_query($conn, "SELECT COUNT(*) FROM started_tasks");
$numStarted = mysqli_fetch_row($resultStarted);

$resultCompleted = mysqli_query($conn, "SELECT COUNT(*) FROM completed_tasks");
$numCompleted = mysqli_fetch_row($resultCompleted);

$resultLate = mysqli_query($conn, "SELECT COUNT(*) FROM late_tasks");
$numLate = mysqli_fetch_row($resultLate);

$total = $numPending[0] + $numStarted[0] + $numCompleted[0] + $numLate[0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ToDo</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
	body {
		background-color: #E9E9E9;
	}
	
	.navbar {
		background-color: #CDCDCD;
	}
	
	.navbar .header {
		text-align: center;
	}
	
	.col-header {
		text-align: center;
	}
	
	.task {
		text-align: center;
		border-radius: 25px;
		border: 2px solid;
		padding: 15px 15px 15px 15px;
	}
	
	#pending-tasks, #started-tasks, #completed-tasks, #late-tasks {
		display: none;
	}
	
@media (min-width: 768px)
{
	.col-border {
		padding-left: 0px;
		position: static;
	}
	.col-border:before {
		content: "";
		position: absolute;
		top: 0;
		bottom: 0;
		border-left: 2px solid black;
	}
	
	.pad {
		padding-left: 15px;
	}
	
}

</style>
<body>
<nav class="navbar navbar-default">
	<div class="navbar header">
		<h1>To Do Application</h1>
	</div>
</nav>
<div class="container-fluid">
	<div style="text-align: center; padding-bottom: 15px;">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newTaskModal">Create New Task</button>
	</div>
	<div style="text-align: center">
		<h2>Total Tasks:  <?php echo $total;?></h2>
	</div>
	<div class="row" style="position: relative;">
		<div class="col-md-3">
			<h2 class="col-header" onclick="displayPendingTasks();">Pending Tasks:<span style="padding-left: 20px; color=red;"><?php echo $numPending[0]; ?></span></h2>
			<div id="pending-tasks">
				<?php include("generatePendingTasks.php"); ?>
			</div>
		</div>
		<div class="col-md-3 col-border" id="started">
			<h2 class="col-header" onclick="displayStartedTasks();">Started Tasks:<span style="padding-left: 20px; color=red;"><?php echo $numStarted[0]; ?></span></h2>
			<div id="started-tasks">
				<?php include("generateStartedTasks.php"); ?>
			</div>
		</div>
		<div class="col-md-3 col-border" id="completed">
			<h2 class="col-header" onclick="displayCompletedTasks();">Completed Tasks:<span style="padding-left: 20px; color=red;"><?php echo $numCompleted[0]; ?></span></h2>
			<div id="completed-tasks">
				<?php include("generateCompletedTasks.php"); ?>
			</div>
		</div>
		<div class="col-md-3 col-border" id="late">
			<h2 class="col-header" onclick="displayLateTasks();">Late Tasks:<span style="padding-left: 20px; color=red;"><?php echo $numLate[0]; ?></span></h2>
			<div id="late-tasks">
				<?php include("generateLateTasks.php"); ?>
			</div>
		</div>
	</div>	
	<div id="new-task">
    	<?php include("newTaskModal.php"); ?>
    </div>
</div>
<script>
function displayPendingTasks() {
	var display = $('#pending-tasks').css('display');
	if(display == "none") {
		$('#pending-tasks').show();
	} else {
		$('#pending-tasks').hide();
	}
}

function displayStartedTasks() {
	var display = $('#started-tasks').css('display');
	if(display == "none") {
		$('#started-tasks').show();
	} else {
		$('#started-tasks').hide();
	}
}

function displayCompletedTasks() {
	var display = $('#completed-tasks').css('display');
	if(display == "none") {
		$('#completed-tasks').show();
	} else {
		$('#completed-tasks').hide();
	}
}

function displayLateTasks() {
	var display = $('#late-tasks').css('display');
	if(display == "none") {
		$('#late-tasks').show();
	} else {
		$('#late-tasks').hide();
	}
}

var id;
var status;
//function used to determine if a pending task has been clicked
$(document).click(function(e){
	id = e.target.id; 
	idTemp = id.split('_')[0];

	if(idTemp == "pendingTask") {
		id = id.split('_')[1]; //get actual pending task id
		displayPendingTaskModal();
	} else if(idTemp == "startedTask") {
		id = id.split('_')[1]; //get actual pending task id
		displayStartedTaskModal();
	} else if(idTemp =="completedTask") {
		id = id.split('_')[1]; //get actual pending task id
		displayCompletedTaskModal();
	} else {
		id = id.split('_')[1]; //get actual pending task id
		displayLateTaskModal();
	}
});

</script>
</body>
</html>


<?php 

?>