<div class="modal fade" id="update_modal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLabel">Edit your task details</h5>
	        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          				<span aria-hidden="true">&times;</span>
	        			</button>
	      		</div>
	      		<form action="AddTask.php" method="POST">
	      			<div class="modal-body">
	      			<input type="hidden" name="update_id" value="<?php echo $row['id']; ?>" >
	      				<div class="form-row">
	      					<label>Enter the name of Task Assigner(i.e Teacher/Person)
							  	</label>
							  	<input type="text" class="form-control" id="UANassignerid" name="NBNUassigner" style="width: 50%;" value="<?php echo $row['NBNUassigner']; ?>" required>
						</div>
						<br><br>
							<label>Enter a task</label>&nbsp&nbsp&nbsp<br>
								  	<input type="text" class="form-control" id="UANtaskid" name="NBNUtask" style="width: 50%;" value="<?php echo $row['NBNUTask']; ?>" placeholder="Assign yourself a new task" required>
						<br><br>
						<div class="form-row">
						    <div class="col-md-6 mb-3">
							    <label>Start date and time</label>
							    	  	<div class="input-group">
							        		<input type="datetime-local" class="form-control" name="NBNUsdtime" id="NBNUsdtimeid" value="<?php echo $row['NBNUsdtime']; ?>" required>
							        		<div style="color:red;" id="NBNUmessage"></div>
							        	</div>
							</div>
							<div class="col-md-6 mb-3">
								<label>Due date & time</label>
									<div class="input-group">
										<input type="datetime-local" class="form-control" name="NBNUedtime" id="NBNUedtimeid" value="<?php echo $row['NBNUedtime']; ?>" required>
									</div>
							</div>
						</div><br>
						<div class="form-row">
							<!--<div class="col-md-3 mb-3">-->
							<div class="col-auto my-1">
							   	<label class="my-1 mr-2">Status</label>&nbsp&nbsp&nbsp
								<select name="NBNUstatus" id="UANstatusid" value="<?php echo $row['NBNUstatus']; ?>">
									<option value="Not Started">Not Started</option>
									<option value="In Progress">In Progress</option>
									<option value="Completed">Completed</option>
									<option value="Waiting to get help from someone else">Waiting to get help from someone else</option>
								</select>
							    <!--<div class="invalid-feedback">
							        Please select what is your status of your task right now. 
							    </div>-->
							</div>
						</div>
						<!--<button class="btn btn-primary" type="submit">Submit form</button>-->
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        		<button type="submit" name="updateNBNUtdtls" id = "NBNUupdate" class="btn btn-primary">Update</button>
	      		</div>
	      		</form>
	    	</div>
	 	</div>
</div>

<script type="text/javascript">
	let startdtime = document.getElementById('NBNUsdtimeid');
	let enddtime = document.getElementById('NBNUedtimeid');
	let nbnuerrormsg = document.getElementById('NBNUmessage');
	let nbnupdatebtn = document.getElementById('NBNUupdate');

	let compare = () => {
    let startValue = (new Date(startdtime.value)).getTime();
    let endValue = (new Date(enddtime.value)).getTime();

    if (endValue < startValue) {
      nbnuerrormsg.innerHTML = 'Start date & time must be less than Due date & time!';
      nbnupdatebtn.disabled = true;
    } else {
      nbnuerrormsg.innerHTML = '';
      nbnupdatebtn.disabled = false;
    }
  };
</script>