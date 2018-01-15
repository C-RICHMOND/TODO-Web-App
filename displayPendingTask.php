<?php

 ?>
 <style>
	input {
		float: right;
	}
	
	div {
		padding-bottom: 15px;
	}
	
	.modal-header {
		text-align: center;
	}
	
</style>
<div id="displayPendingTaskModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h2 class="modal-title" style="float: left;">Pending Task</h2>
        		<span style="float: right;"><button type="button" class="btn btn-default" style="padding: 10px 10px 10px 10px;" onclick="deletePendingTask();">Delete</button></span>
      		</div>
      	<div class="modal-body">
      	<p><b>If you change an items status, make sure to delete the old to-do item with the previous status!</b></p>
      	<form method="post" id="editTaskForm" action="updateTask.php">
      		<input type="hidden" name="id" id="displayId">
      		<input type="hidden" name="preEditStatus" value="Pending"> <!-- This input will be used to determine if the status has changed -->
      		<div>
      			<span>Title:<input type="text" class="textbox" id="displayTitle" name="taskTitle" ></span>
      		</div>
      		<div>
      			<span>Status:
      				<select style="float: right;" id="status" name="status">
      					<option>Pending</option>
      					<option>Started</option>
      					<option>Completed</option>
      					<option>Late</option>
      				</select>
      			</span>
      		</div>
      		<div>			
      			<span>Start Date (yyyy-mm-dd):<input type="text" class="textbox" id ="displayStartDate" name="startDate"></span>
      		</div>
			<div>
				<span>End Date (yyyy-mm-dd):<input type="text" class="textbox" id ="displayEndDate" name="endDate" ></span>
			</div>
			<div>
				<span>Description (250 char limit): <span style="float: right; padding-bottom: 10px;"><textarea cols="30" rows="3" id= "displayDescription" name="description"></textarea></span></span>
			</div>
			<div style="padding-top: 40px; text-align: center;">
				<input type="submit" name="btn_submit" id="btn_submit" value="Update">
			</div>
		</form>	
      	</div>
    </div>
  </div>
</div>
<script>
function deletePendingTask() {
	var id = $('#displayId').val();
	$.ajax({url: 'deleteTask.php',
		data: {status: 'pending', id: id}, 
		type: 'post',
		success: function() {
			location.reload();
		}
	});
}
</script>
 