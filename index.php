
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
	<div class="row" style="position: relative;">
		<div class="col-md-3" id="pending" onclick="displayTasks();>
			<h2 class="col-header">Pending Tasks:<span style="padding-left: 20px;"><?php echo $numPending[0]; ?></span></h2>
			<div id="pending-tasks">
				<?php include("generatePendingTasks.php"); ?>
			</div>
		</div>
		<div class="col-md-3 col-border" id="started">
			<h2 class="col-header">Started Tasks:<span style="padding-left: 20px; color=red;"><?php echo $numStarted[0]; ?></span></h2>
		</div>
		<div class="col-md-3 col-border" id="completed">
			<h2 class="col-header">Completed Tasks:<span style="padding-left: 20px; color=red;"><?php echo $numCompleted[0]; ?></span></h2>
		</div>
		<div class="col-md-3 col-border" id="late">
			<h2 class="col-header">Late Tasks:<span style="padding-left: 20px; color=red;"><?php echo $numLate[0]; ?></span></h2>
		</div>
	</div>	
	<div id="modal">
    	<?php include("newTaskModal.php"); ?>
    </div>
</div>
</body>
</html>
<script>
function displayTasks() {

	
}
</script>

<?php 

?>