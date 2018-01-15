<?php
	$sql = "SELECT * FROM pending_tasks";
	$result = mysqli_query($conn, $sql);
	
	while($row = mysqli_fetch_assoc($result)){
		?><div class="task" id="pendingTask_<?php echo $row['id'];?>">
			<h4 id="pendingTask_<?php echo $row['id'];?>"><?php echo $row['title'];?></h4>
			<h4 id="pendingTask_<?php echo $row['id'];?>"><?php echo $row['end_date'];?></h4>
		</div>
		
	<div id="view-task">
    	<?php include("displayPendingTask.php"); ?>
    </div>
	<?php 	
	}
?>

<script>
	
	function displayPendingTaskModal() {
		$.ajax({url: 'getTaskData.php',
				data: {status: 'pending', id: id}, 
				type: 'post',
				success: function(taskData) {
					taskData = JSON.parse(taskData);
					$('#displayId').val(taskData['id']);
					$('#displayTitle').val(taskData['title']);
					$('#status').val('Pending');
					$('#displayStartDate').val(taskData['start_date']);
					$('#displayEndDate').val(taskData['end_date']);
					$('#displayDescription').val(taskData['description']);
					$('#displayPendingTaskModal').modal('toggle');
				}
			});
	}
</script>

