<?php
	$sql = "SELECT * FROM completed_tasks";
	$result = mysqli_query($conn, $sql);
	
	while($row = mysqli_fetch_assoc($result)){
		?><div class="task" id="completedTask_<?php echo $row['id'];?>">
			<h4 id="completedTask_<?php echo $row['id'];?>"><?php echo $row['title'];?></h4>
			<h4 id="completedTask_<?php echo $row['id'];?>"><?php echo $row['end_date'];?></h4>
		</div>
		
	<div id="view-task">
    	<?php include("displayCompletedTask.php"); ?>
    </div>
	<?php 	
	}
?>

<Script>
	
	function displayCompletedTaskModal() {
		$.ajax({url: 'getTaskData.php',
				data: {status: 'completed', id: id}, 
				type: 'post',
				success: function(taskData) {
					taskData = JSON.parse(taskData);
					$('#displayCompletedId').val(taskData['id']);
					$('#displayCompletedTitle').val(taskData['title']);
					$('#displayCompletedStatus').val('Completed');
					$('#displayCompletedStartDate').val(taskData['start_date']);
					$('#displayCompletedEndDate').val(taskData['end_date']);
					$('#displayCompletedDescription').val(taskData['description']);
					$('#displayCompletedTaskModal').modal('toggle');
				}
			});
	}
</Script>

