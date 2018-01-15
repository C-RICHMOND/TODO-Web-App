<?php
	$sql = "SELECT * FROM late_tasks";
	$result = mysqli_query($conn, $sql);
	
	while($row = mysqli_fetch_assoc($result)){
		?><div class="task" id="lateTask_<?php echo $row['id'];?>">
			<h4 id="lateTask_<?php echo $row['id'];?>"><?php echo $row['title'];?></h4>
			<h4 id="lateTask_<?php echo $row['id'];?>"><?php echo $row['end_date'];?></h4>
		</div>
		
	<div id="view-task">
    	<?php include("displayLateTask.php"); ?>
    </div>
	<?php 	
	}
?>

<script>
	
	function displayLateTaskModal() {
		$.ajax({url: 'getTaskData.php',
				data: {status: 'late', id: id}, 
				type: 'post',
				success: function(taskData) {
					taskData = JSON.parse(taskData);
					$('#displayLateId').val(taskData['id']);
					$('#displayLateTitle').val(taskData['title']);
					$('#displayLateStatus').val('Late');
					$('#displayLateStartDate').val(taskData['start_date']);
					$('#displayLateEndDate').val(taskData['end_date']);
					$('#displayLateDescription').val(taskData['description']);
					$('#displayLateTaskModal').modal('toggle');
				}
			});
	}
</script>

