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
							  	<input type="text" class="form-control" name="UBNIassigner" style="width: 50%;" value="<?php echo $row['UBNIassigner']; ?>" required>
						</div>
						<br><br>
							<label>Enter a task</label>&nbsp&nbsp&nbsp<br>
								  	<input type="text" class="form-control" name="UBNItask" style="width: 50%;" value="<?php echo $row['UBNItask']; ?>" placeholder="Assign yourself a new task" required>
						<br><br>
						<div class="form-row">
						    <div class="col-md-6 mb-3">
							    <label>Start date and time</label>
							    	  	<div class="input-group">
							        		<input type="datetime-local" class="form-control" name="UBNIsdtime" value="<?php echo $row['UBNIsdtime']; ?>" required>
							        	</div>
							</div>
							<div class="col-md-6 mb-3">
								<label>Due date & time</label>
									<div class="input-group">
										<input type="datetime-local" class="form-control" name="UBNIedtime" value="<?php echo $row['UBNIedtime']; ?>" required>
									</div>
							</div>
						</div><br>
						<div class="form-row">
							<!--<div class="col-md-3 mb-3">-->
							<div class="col-auto my-1">
							   	<label class="my-1 mr-2">Status</label>&nbsp&nbsp&nbsp
								<select name="UBNIstatus" value="<?php echo $row['UBNIstatus']; ?>">
									<option value="Not Started">Not Started</option>
									<option value="In Progress">In Progress</option>
									<option value="Completed">Completed</option>
									<option value="Waiting to get help from someone else">Waiting to get help from someone else</option>
								</select>
							</div>
						</div>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        		<button type="submit" name="updateUBNItdtls" class="btn btn-primary">Update</button>
	      		</div>
	      		</form>
	    	</div>
	 	</div>
</div>