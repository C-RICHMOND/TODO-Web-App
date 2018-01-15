<?php
	$sql = "SELECT * FROM started_tasks";
	$result = mysqli_query($conn, $sql);
	
	while($row = mysqli_fetch_assoc($result)){
		?><div class="task" id="startedTask_<?php echo $row['id'];?>">
			<h4 id="startedTask_<?php echo $row['id'];?>"><?php echo $row['title'];?></h4>
			<h4 id="startedTask_<?php echo $row['id'];?>"><?php echo $row['end_date'];?></h4>
		</div>
		
	<div id="view-task">
    	<?php include("displayStartedTask.php"); ?>
    </div>
	<?php 	
	}
?>

<Script>
	function displayStartedTaskModal() {
		$.ajax({url: 'getTaskData.php',
				data: {status: 'started', id: id}, 
				type: 'post',
				success: function(taskData) {
					taskData = JSON.parse(taskData);
					$('#displayStartId').val(taskData['id']);
					$('#displayStartTitle').val(taskData['title']);
					$('#displayStartStatus').val('Started');
					$('#displayStartStartDate').val(taskData['start_date']);
					$('#displayStartEndDate').val(taskData['end_date']);
					$('#displayStartDescription').val(taskData['description']);
					$('#displayStartedTaskModal').modal('toggle');
				}
			});
	}
</Script>

