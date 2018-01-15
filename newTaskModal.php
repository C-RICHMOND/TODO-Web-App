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
<div id="newTaskModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h2 class="modal-title">Create New Task</h2>
      		</div>
      	<div class="modal-body">
      	<form method="post" id="createTaskForm" action="newTask.php">
      		<div>
      			<span>Title:<input type="text" class="textbox" name="taskTitle" ></span>
      		</div>
      		<div>			
      			<span>Start Date (yyyy-mm-dd):<input type="text" class="textbox" id ="startDate" name="startDate"></span>
      		</div>
			<div>
				<span>End Date (yyyy-mm-dd):<input type="text" class="textbox" id ="endDate" name="endDate" ></span>
			</div>
			<div>
				<span>Description (250 char limit): <span style="float: right; padding-bottom: 10px;"><textarea cols="30" rows="3" name="description"></textarea></span></span>
			</div>
			<div style="padding-top: 40px; text-align: center;">
				<input type="submit" name="btn_submit" id="btn_submit" value="Create">
			</div>
		</form>	
      	</div>
    </div>
  </div>
</div>

