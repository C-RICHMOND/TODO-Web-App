<?php 
require_once("DbConfig.php");
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
		<button type="button" class="btn btn-primary">Create New Task</button>
	</div>
	<div class="row" style="position: relative;">
		<div class="col-md-3" id="pending">
			<div class="pad">
				<h2 class="col-header">Pending</h2>
			</div>
		</div>
		<div class="col-md-3 col-border" id="started">
			<h2 class="col-header">Started</h2>
		</div>
		<div class="col-md-3 col-border" id="completed">
			<h2 class="col-header">Completed</h2>
		</div>
		<div class="col-md-3 col-border" id="late">
			<h2 class="col-header">Late</h2>
		</div>
	</div>	
</div>
</body>
</html>


<?php ?>