<?php
	$sql = "SELECT * FROM pending_tasks";
	$result = mysqli_query($conn, $sql);
	
	while($row = mysqli_fetch_assoc($result)){
		?><div class="task" id="pendingTask_<?php echo $row['id'];?>">
			<h4 id="pendingTask_<?php echo $row['id'];?>"><?php echo $row['title'];?></h4>
			<h4 id="pendingTask_<?php echo $row['id'];?>"><?php echo $row['end_date'];?></h4>
		</div>
		
	<div id="view-task">
    	<?php include("displayTask.php"); ?>
    </div>
	<?php 	
	}
?>

<Script>
	var id;

	//function used to determine if a pending task has been clicked
	$(document).click(function(e){
		id = e.target.id; 
		idTemp = id.split('_')[0];

		if(idTemp == "pendingTask") {
			id = id.split('_')[1]; //get actual pending task id
			displayTaskModal();
		} 
	});
	function displayTaskModal() {
		
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
					$('#displayTaskModal').modal('toggle');
				}
			});

		
		//CREATE AJAX FUNCTION TO GET CORRESPONDING PHP DATA FROM MYSQL
		//USE DATA IN DISPLAY MODAL; ADD STATUS INPUT
		//TWO BUTTONS AT TOP: EDIT AND DELETE
			//EDIT: ENABLE TEXTBOXES AND MAKE SAVE BUTTON AT BOTTOM VISIBLE
			//		CREATE NEW FILE updateTask.php WHICH WILL CALL CLASS FUNCTION TO UPDATE INFO
			//DELETE: CALL APPROPRIATE DELETE FUNCTION AND REROUTE TO INDEX.PHPs
	}
</Script>

