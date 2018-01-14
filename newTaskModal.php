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
      		<form method="post" id="createTaskForm">
      		<div>
      			<span>Title:<input type="text" class="textbox" name="taskTitle" ></span>
      		</div>
      		<div>			
      			<span>Start Date (yyyy-mm-dd):<input type="text" class="textbox" id ="startDate" name="startDate"></span>
      		</div>
      		<div>
	      		<span>Start Time (xx:xx):
					<span>
						<input type="text" class="textbox" id ="startTime" name="startTime">
						<select id="startAMPM" style="float:right;">
							<option value="AM"> AM </option>
							<option value="PM"> PM </option>
						</select>
					</span>
				</span>
      		</div>
			<div>
				<span>End Date (yyyy-mm-dd):<input type="text" class="textbox" id ="endDate" name="endDate" ></span>
			</div>
			<div>
				<span>End Time (xx:xx):
					<span>
						<input type="text" class="textbox" name="endTime">
						<select id="endAMPM" style="float:right;">
							<option value="AM"> AM </option>
							<option value="PM"> PM </option>
						</select>
					</span>
				</span>
			</div>
			<div>
				<span>Description (250 char limit): <span style="float: right; padding-bottom: 10px;"><textarea cols="30" rows="3" id="desc"></textarea></span></span>
			</div>
			<input type="hidden" name="description" id="description">
			<div style="padding-top: 40px; text-align: center;">
				<button type="button" class="btn btn-default" onclick="formValidation();">Create</button>
			</div>
		</form>	
      	</div>
    </div>
  </div>
</div>
<script>
	function formValidation() {
		var ampm = $('#startAMPM').val();
		var start = $('#startTime').val();
		
		if(ampm == "PM") {
			start = formatTime(start);
		} else {
			var str = start.split(':');
			start = str[0] + ':' + str[1] + ':' + '00';
		}
		
		ampm = $('#endAMPM').val();
		var end = $('#endTime').val();
		
		if(ampm == "PM") {
			end = formatTime(end);
		} else {
			var str = end.split(':');
			end = str[0] + ':' + str[1] + ':' + '00';
		}

		var description = $('#desc').val();
		$('#description').val(description);
		var startDate = $('#startDate').val() + ' ' + start;
		var endDate = $('#endDate').val() + ' ' + end;
		$('#createTaskForm').submit();
	}

	function formatTime(time) {
		var str = time.split(':');
		var hour = str[0];
		hour = Number(hour);
		hour += 12; 
		hour = hour.toString();
		time = hour + ':' + str[1] + ':' + '00';
		return time;
	}
</script>
