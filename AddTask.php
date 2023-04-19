<?php
session_start();
$errors=array();
$id = 0;
	include('connection.php');
/******************************************for Urgent and Important task*******************************/


	if (isset($_POST['UANtdetails'])){
		/*if (($_POST['optime'] > $_POST['opetime']) == true) {
			$name_error ="Start date & time must be less than Due date & time";
		}else{*/
			$UANassigner=$_POST['UANassigner'];
			$UANtask=$_POST['UANtask'];
			$UANsdtime=$_POST['UANsdtime'];
			$UANedtime=$_POST['UANedtime'];
			$UANstatus=$_POST['UANstatus'];
			
			if (isset($_SESSION['FIRST_NAME'])) {
				$studfname = $_SESSION['FIRST_NAME'];

				$query="INSERT INTO studentuantask (studfname,UANassigner,UANTask,UANsdtime,UANedtime,UANstatus) VALUES ('$studfname','$UANassigner','$UANtask','$UANsdtime','$UANedtime','$UANstatus')";
				$insert = mysqli_query($con,$query);
				if ($insert) {
					$_SESSION['message'] = "Task details have been saved!";
					$_SESSION['msg_type'] = "success";
					//$addtask = true;
					header('location: AddTask.php');
				}
		}
	}
	//update task
	if (isset($_POST['updateUANtdtls'])) {
		$id = $_POST['update_id'];
		$UANassigner=$_POST['UANassigner'];
		$UANtask=$_POST['UANtask'];
		$UANsdtime=$_POST['UANsdtime'];
		$UANedtime=$_POST['UANedtime'];
		$UANstatus=$_POST['UANstatus'];
		$upgrade = mysqli_query($con,"UPDATE studentuantask SET UANassigner='$UANassigner', UANTask='$UANtask',
		UANsdtime='$UANsdtime', UANedtime='$UANedtime', UANstatus='$UANstatus' WHERE id=$id");
		if ($upgrade) {
	        $_SESSION['message'] = "Task details has been updated!";
	        $_SESSION['msg_type'] = "warning";
	        header('location: AddTask.php');
	    }
	}
/************************************for Important but not Urgent task*******************************/

		if (isset($_POST['NBNUtdetails'])) {
		$NBNUassigner=$_POST['NBNUassigner'];
		$NBNUtask=$_POST['NBNUtask'];
		$NBNUsdtime=$_POST['NBNUsdtime'];
		$NBNUedtime=$_POST['NBNUedtime'];
		$NBNUstatus=$_POST['NBNUstatus'];
		//$_SESSION['UANtask1'] = $_POST['UANtask'];
		if (isset($_SESSION['FIRST_NAME'])){
			$studfname = $_SESSION['FIRST_NAME']; 

			$query="INSERT INTO studentnbnutask (studfname,NBNUassigner,NBNUTask,NBNUsdtime,NBNUedtime,NBNUstatus) VALUES ('$studfname','$NBNUassigner','$NBNUtask','$NBNUsdtime','$NBNUedtime','$NBNUstatus')";
			$insert = mysqli_query($con,$query);
			if ($insert) {
				$_SESSION['message'] = "Task details have been saved!";
				$_SESSION['msg_type'] = "success";
				header('location: AddTask.php');
			}
		}
		/*if ($insert) {
			$last_id=mysqli_insert_id($con);
			$_SESSION['id2'] = $last_id;
		}*/
	}
	//update task
	if (isset($_POST['updateNBNUtdtls'])) {
		$id = $_POST['update_id'];
		$NBNUassigner=$_POST['NBNUassigner'];
		$NBNUtask=$_POST['NBNUtask'];
		$NBNUsdtime=$_POST['NBNUsdtime'];
		$NBNUedtime=$_POST['NBNUedtime'];
		$NBNUstatus=$_POST['NBNUstatus'];
		$upgrade = mysqli_query($con,"UPDATE studentnbnutask SET NBNUassigner='$NBNUassigner', NBNUTask='$NBNUtask',
		NBNUsdtime='$NBNUsdtime', NBNUedtime='$NBNUedtime', NBNUstatus='$NBNUstatus' WHERE id=$id");
		if ($upgrade) {
	        $_SESSION['message'] = "Task details has been updated!";
	        $_SESSION['msg_type'] = "warning";
	        header('location: AddTask.php');
	    }
	}
/**************************************for Urgent but not Important task*******************************/
if (isset($_POST['UBNItdetails'])) {
		$UBNIassigner=$_POST['UBNIassigner'];
		$UBNItask=$_POST['UBNItask'];
		$UBNIsdtime=$_POST['UBNIsdtime'];
		$UBNIedtime=$_POST['UBNIedtime'];
		$UBNIstatus=$_POST['UBNIstatus'];
		if (isset($_SESSION['FIRST_NAME'])){
			$studfname = $_SESSION['FIRST_NAME']; 

			$query="INSERT INTO studentubnitask (studfname,UBNIassigner,UBNItask,UBNIsdtime,UBNIedtime,UBNIstatus) VALUES ('$studfname','$UBNIassigner','$UBNItask','$UBNIsdtime','$UBNIedtime','$UBNIstatus')";
			$insert = mysqli_query($con,$query);
			if ($insert) {
				$_SESSION['message'] = "Task details have been saved!";
				$_SESSION['msg_type'] = "success";
				header('location: AddTask.php');
			}
		}
		/*if ($insert) {
			$last_id=mysqli_insert_id($con);
			$_SESSION['id3'] = $last_id;
		}*/
	}
	//update task
	if (isset($_POST['updateUBNItdtls'])) {
		$id = $_POST['update_id'];
		$UBNIassigner=$_POST['UBNIassigner'];
		$UBNItask=$_POST['UBNItask'];
		$UBNIsdtime=$_POST['UBNIsdtime'];
		$UBNIedtime=$_POST['UBNIedtime'];
		$UBNIstatus=$_POST['UBNIstatus'];
		$upgrade = mysqli_query($con,"UPDATE studentubnitask SET UBNIassigner='$UBNIassigner', UBNItask='$UBNItask', UBNIsdtime='$UBNIsdtime', UBNIedtime='$UBNIedtime', UBNIstatus='$UBNIstatus' WHERE id=$id");
		if ($upgrade) {
	        $_SESSION['message'] = "Task details has been updated!";
	        $_SESSION['msg_type'] = "warning";
	        header('location: AddTask.php');
	    }
	}
/********************************************for Not Important and Not Urgent task*******************************/
if (isset($_POST['NINUtdetails'])) {
		$NINUassigner=$_POST['NINUassigner'];
		$NINUtask=$_POST['NINUtask'];
		$NINUsdtime=$_POST['NINUsdtime'];
		$NINUedtime=$_POST['NINUedtime'];
		$NINUstatus=$_POST['NINUstatus'];
		if (isset($_SESSION['FIRST_NAME'])){
			$studfname = $_SESSION['FIRST_NAME']; 

			$query="INSERT INTO studentninutask (studfname,NINUassigner,NINUtask,NINUsdtime,NINUedtime,NINUstatus) VALUES ('$studfname','$NINUassigner','$NINUtask','$NINUsdtime','$NINUedtime','$NINUstatus')";
			$insert = mysqli_query($con,$query);
			if ($insert) {
				$_SESSION['message'] = "Task details have been saved!";
				$_SESSION['msg_type'] = "success";
				header('location: AddTask.php');
			}
		}
		/*if ($insert) {
			$last_id=mysqli_insert_id($con);
			$_SESSION['id4'] = $last_id;
		}*/
	}
	//update task
	if (isset($_POST['updateNINUtdtls'])) {
		$id = $_POST['update_id'];
		$NINUassigner=$_POST['NINUassigner'];
		$NINUtask=$_POST['NINUtask'];
		$NINUsdtime=$_POST['NINUsdtime'];
		$NINUedtime=$_POST['NINUedtime'];
		$NINUstatus=$_POST['NINUstatus'];
		$upgrade = mysqli_query($con,"UPDATE studentninutask SET NINUassigner='$NINUassigner', NINUtask='$NINUtask', NINUsdtime='$NINUsdtime', NINUedtime='$NINUedtime', NINUstatus='$NINUstatus' WHERE id=$id");
		if ($upgrade) {
	        $_SESSION['message'] = "Task details has been updated!";
	        $_SESSION['msg_type'] = "warning";
	        header('location: AddTask.php');
	    }
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--<script type="text/javascript">
		$(document).ready(function () {
			$('#addtbtn').on('click',function(){
				//$('#addtask1Modal').modal(options); //Call a modal with id myModal with a single line of JavaScript using options
				//$(this).off('click');
				$(this).disabled();
			});
		});
	</script>-->
	<!--<script type="text/javascript">
		$(document).ready(function () {
			//$('#addtbtn').on('click',function(){
				//$(this).prop('disabled',true);
			$('#UAIupdatebtn').click(() =>
				$('#addtbtn').prop('disabled',true)
					);
			});
		//});
	</script>-->
	<!--<script>
		$(function(){
		var addtask1 = $('#addbtn');
		var savetask1 = $('#addUANTask');

		savetask1.on('click',function(){
			addtask1.attr('disabled','disabled');
		})
	});
	</script>-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
	<title>Student's To-Do list</title>
</head>
<body class="body" style="background-color: white;">
<!-- ######################################Add Urgent and Important task################################## -->
	<!-- addtask1Modal -->
	<div class="modal fade" id="addtask1Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLabel">Add your task details</h5>
	        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          				<span aria-hidden="true">&times;</span>
	        			</button>
	      		</div>
	      		<form action="AddTask.php" method="POST">
	      			<div class="modal-body">
	      				<div class="form-row">
	      					<label for="validationServer01">Enter the name of Task Assigner(i.e Teacher/Person)
							  	</label>
							  	<input type="text" class="form-control" id="validationServer01" name="UANassigner" style="width: 50%;" required>
						</div>
						<br><br>
							<label for="validationServer02">Enter a task</label>&nbsp&nbsp&nbsp<br>
								  	<input type="text" class="form-control" id="validationServer02" name="UANtask" style="width: 50%;" value="" placeholder="Assign yourself a new task" required>
						<br><br>
						<div class="form-row">
						    <div class="col-md-6 mb-3">
							    <label for="start date & time">Start date and time</label>
							    	  	<!--<div class="form-validation">-->
							    	<div class="input-group">
							        	<input type="datetime-local" class="form-control" name="UANsdtime" id="UANstime" required>
							        	<div style="color:red;" id="UANmessage"></div>
							        </div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="due date & time">Due date & time</label>
									<div class="input-group">
										<input type="datetime-local" class="form-control" name="UANedtime" id="UANdtime" required>
									</div>
							</div>
						</div><br>
						<div class="form-row">
							<!--<div class="col-md-3 mb-3">-->
							<div class="col-auto my-1">
							   	<label class="my-1 mr-2" for="tasktatus">Status</label>&nbsp&nbsp&nbsp
								<select name="UANstatus" value="" required>
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
				
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        		<button type="submit" id = "addUANTask" name="UANtdetails" class="btn btn-primary">Save</button>
	      		</div>
	      		</form>
	    	</div>
	 	</div>
	</div>
<!-- ######################################Add Important but not Urgent task################################## -->
	<!-- addtask2Modal -->
	<div class="modal fade" id="addtask2Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLabel">Add your task details</h5>
	        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          				<span aria-hidden="true">&times;</span>
	        			</button>
	      		</div>
	      		<form action="AddTask.php" method="POST">
	      			<div class="modal-body">
	      				<div class="form-row">
	      					<label for="validationServer01">Enter the name of Task Assigner(i.e Teacher/Person)
							  	</label>
							  	<input type="text" class="form-control" name="NBNUassigner" style="width: 50%;" required>
						</div>
						<br><br>
							<label for="validationServer02">Enter a task</label>&nbsp&nbsp&nbsp<br>
								  	<input type="text" class="form-control" name="NBNUtask" style="width: 50%;" value="" placeholder="Assign yourself a new task" required>
						<br><br>
						<div class="form-row">
						    <div class="col-md-6 mb-3">
							    <label for="start date & time">Start date and time</label>
							    	  	<div class="input-group">
							        		<input type="datetime-local" class="form-control" name="NBNUsdtime" id="IBNUstime" required>
							        		<div style="color:red;" id="IBNUmessage"></div>
							        	</div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="due date & time">Due date & time</label>
									<div class="input-group">
										<input type="datetime-local" class="form-control" name="NBNUedtime" id="IBNUetime" required>
									</div>
							</div>
						</div><br>
						<div class="form-row">
							<!--<div class="col-md-3 mb-3">-->
							<div class="col-auto my-1">
							   	<label class="my-1 mr-2" for="tasktatus">Status</label>&nbsp&nbsp&nbsp
								<select name="NBNUstatus" value="">
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
	        		<button type="submit" id = "addIBNUTask" name="NBNUtdetails" class="btn btn-primary">Save</button>
	      		</div>
	      		</form>
	    	</div>
	 	</div>
	</div>
<!-- ##################################Add Urgent but not Important task ################################## -->
	<!-- addtask3Modal -->
	<div class="modal fade" id="addtask3Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLabel">Add your task details</h5>
	        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          				<span aria-hidden="true">&times;</span>
	        			</button>
	      		</div>
	      		<form action="AddTask.php" method="POST">
	      			<div class="modal-body">
	      				<div class="form-row">
	      					<label>Enter the name of Task Assigner(i.e Teacher/Person)
							  	</label>
							  	<input type="text" class="form-control" name="UBNIassigner" style="width: 50%;" required>
						</div>
						<br><br>
							<label>Enter a task</label>&nbsp&nbsp&nbsp<br>
								  	<input type="text" class="form-control" name="UBNItask" style="width: 50%;" value="" placeholder="Assign yourself a new task" required>
						<br><br>
						<div class="form-row">
						    <div class="col-md-6 mb-3">
							    <label for="start date & time">Start date and time</label>
							    	  	<div class="input-group">
							        		<input type="datetime-local" class="form-control" name="UBNIsdtime" id="UBNIstime" required>
							        		<div style="color:red;" id="UBNImessage"></div>
							        	</div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="due date & time">Due date & time</label>
									<div class="input-group">
										<input type="datetime-local" class="form-control" name="UBNIedtime" id="UBNIetime" required>
									</div>
							</div>
						</div><br>
						<div class="form-row">
							<!--<div class="col-md-3 mb-3">-->
							<div class="col-auto my-1">
							   	<label class="my-1 mr-2" for="tasktatus">Status</label>&nbsp&nbsp&nbsp
								<select name="UBNIstatus" value="">
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
	        		<button type="submit" id = "addUBNITask" name="UBNItdetails" class="btn btn-primary">Save</button>
	      		</div>
	      		</form>
	    	</div>
	 	</div>
	</div>
<!-- ################################# Add Not important and not urgent task################################## -->
	<!-- addtask4Modal -->
	<div class="modal fade" id="addtask4Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLabel">Add your task details</h5>
	        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          				<span aria-hidden="true">&times;</span>
	        			</button>
	      		</div>
	      		<form action="AddTask.php" method="POST">
	      			<div class="modal-body">
	      				<div class="form-row">
	      					<label>Enter the name of Task Assigner(i.e Teacher/Person)
							  	</label>
							  	<input type="text" class="form-control" name="NINUassigner" style="width: 50%;" required>
						</div>
						<br><br>
							<label>Enter a task</label>&nbsp&nbsp&nbsp<br>
								  	<input type="text" class="form-control" name="NINUtask" style="width: 50%;" value="" placeholder="Assign yourself a new task" required>
						<br><br>
						<div class="form-row">
						    <div class="col-md-6 mb-3">
							    <label>Start date and time</label>
							    	  	<div class="input-group">
							        		<input type="datetime-local" class="form-control" name="NINUsdtime" id="NINUstime" required>
							        		<div style="color:red;" id="NINUmessage"></div>
							        	</div>
							</div>
							<div class="col-md-6 mb-3">
								<label>Due date & time</label>
									<div class="input-group">
										<input type="datetime-local" class="form-control" name="NINUedtime" id="NINUetime" required>
									</div>
							</div>
						</div><br>
						<div class="form-row">
							<!--<div class="col-md-3 mb-3">-->
							<div class="col-auto my-1">
							   	<label class="my-1 mr-2">Status</label>&nbsp&nbsp&nbsp
								<select name="NINUstatus" value="">
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
	        		<button type="submit" id = "addNINUTask" name="NINUtdetails" class="btn btn-primary">Save</button>
	      		</div>
	      		</form>
	    	</div>
	 	</div>
	</div>		
<!--##################################################################################################-->	
	<nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
        	<img  title="Freepik" src="to-do-list.png">&nbsp
            <span class="navbar-brand mb-0 h1">To-Do List</span>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="homepage.html">Home</a>
                    </li>
                    <li class="nav-item">
          				<a class="nav-link" aria-current="page" href="studentguidlines.html">Guidlines</a>
        			</li>
                </ul>
            </div>
            <div style="float: right;">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
	</nav>
	<?php
	if (isset($_SESSION['message'])): ?>
	<div class="alert alert-<?=$_SESSION['msg_type']?>">
		<?php 
			echo $_SESSION['message'];
			//unset($_SESSION['message']);
		?>
	</div> 
	<?php endif ?>
	<div class="container">
		<?php unset($_SESSION['message1']); ?>
	<br>
	<center >
		<div style="color: blue;">
			<h4>Fill below special Task-Table</h4>
			We provide this special task table to make you understood which task should have to do right now.<br>In this table, each type of task could contain only one task. So, you could focus on only that task.
		</div>
	</center><br>
	<table class="table" border="1">
		<tr style="background-color: indianred;">
			<th>Add Urgent and Important task</th>
			<th>Add Important but NOT Urgent task</th>
		</tr>
<!--#######################################UANT buttons############################################ -->
		
		<tr style="background-color: orangered;">
			<td>
				<!--<?php if($addtask == true): ?>						
				<form action="AddTask.php" method="POST">
					<button type="submit" name = "addtask" class="btn btn-primary">
					  	Add task2
					</button>
	  			</form>
	  			<?php else: ?>-->
					<button type="button" id ="addtbtn" class="btn btn-primary" data-toggle="modal" data-target="#addtask1Modal" data-backdrop="static" data-keyboard="false">
					  	Add task
					</button>
				<!--<?php endif; ?>-->	
			</td>
<!--##################################### NBNUT buttons ############################################ -->	
			<td>
				<button type="button" id ="" class="btn btn-primary" data-toggle="modal" data-target="#addtask2Modal" data-backdrop="static" data-keyboard="false">
					  	Add task
				</button>
			</td>
		</tr>
<!--################################################################################################ -->
		<tr style="background-color: indianred;">
			<th>Add Urgent but NOT Important task</th>
			<th>Add NOT Important and NOT Urgent</th>
		</tr>
<!--############################################### UBNIT buttons ############################################ -->			<tr style="background-color: orangered;">
			<td>
				<button type="button" id ="" class="btn btn-primary" data-toggle="modal" data-target="#addtask3Modal" data-backdrop="static" data-keyboard="false">
				  	Add task
				</button>
			</td>
<!--#################################### NINUT buttons ############################################ -->
			<td>
				<button type="button" id ="" class="btn btn-primary" data-toggle="modal" data-target="#addtask4Modal"  data-backdrop="static" data-keyboard="false">
				  	Add task
				</button>
			</td>
		</tr>
	</table>
	<br><br><br><br>
<!-- ###############################Add Urgent and Important table################################## -->
	<table class="table">
		<thead class="thead-dark">
		    <tr>
			      <th scope="col" colspan="6"><center>Urgent and Important Task</center></th>
		    </tr>
		</thead>
		<thead class="thead-light">
		    <tr>
		    	<th scope="col" style="width: 16.2422%;">Assigner(Teacher/Person)</th>
		      	<th scope="col" style="width: 37.7453%;"><center>Task</center></th>
		      	<th scope="col" style="width: 16.451%;">Start date & time</th>
		      	<th scope="col" style="width: 16.451%;">End date & time</th>
		      	<th scope="col" style="width: 12.0668%;">Status</th>
		      	<th scope="col">Action</th>
		    </tr>
		</thead>
		<?php 
  		if (isset($_SESSION['FIRST_NAME'])){
			$query = "SELECT * FROM studentuantask WHERE studfname ='{$_SESSION['FIRST_NAME']}'";
			$query_run = mysqli_query($con,$query);
			while ($row = mysqli_fetch_array($query_run)) { ?>
		<tbody>
		    <tr>
		      	<td style="word-wrap: break-word;"><?php echo $row['UANassigner']; ?></td>
		      	<td style="word-wrap: break-word;"><?php echo $row['UANTask']; ?></td>
		      	<td><?php echo $row['UANsdtime']; ?></td>
		      	<td><?php echo $row['UANedtime']; ?></td>
		      	<td><?php echo $row['UANstatus']; ?></td>
		      	<td>
					<center><button type="button" id="UAIupdatebtn" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#update_modal<?php echo $row['id']; ?>" data-backdrop="static" data-keyboard="false">Update</button></center>
				</td>
		    </tr>
		</tbody>
		<?php
		include('updateUANTmodal.php');
	}
}else{
		echo "no record found";
		}	
	//}
?>
</table><br><br><br><br>
<!-- ######################################Add Important but not Urgent table################################# -->
<table class="table">
		<thead class="thead-dark">
		    <tr>
			      <th scope="col" colspan="6"><center>Important but NOT Urgent Task</center></th>
		    </tr>
		</thead>
		<thead class="thead-light">
		    <tr>
		    	<th scope="col" style="width: 16.2422%;">Assigner(Teacher/Person)</th>
		      	<th scope="col" style="width: 37.7453%;"><center>Task</center></th>
		      	<th scope="col" style="width: 16.451%;">Start date & time</th>
		      	<th scope="col" style="width: 16.451%;">End date & time</th>
		      	<th scope="col" style="width: 12.0668%;">Status</th>
		      	<th scope="col">Action</th>
		    </tr>
		</thead>
		<?php
		if (isset($_SESSION['FIRST_NAME'])){
			$query = "SELECT * FROM studentnbnutask WHERE studfname ='{$_SESSION['FIRST_NAME']}'";
			$query_run = mysqli_query($con,$query);
			if ($query_run) {
				foreach ($query_run as $row) {
			?>
		<tbody>
		    <tr>
		      	<td style="width: 16.2422%; word-wrap: break-word;"><?php echo $row['NBNUassigner']; ?></td>
		      	<td style="width: 37.7453%; word-wrap: break-word;"><?php echo $row['NBNUTask']; ?></td>
		      	<td style="width: 16.451%;"><?php echo $row['NBNUsdtime']; ?></td>
		      	<td style="width: 16.451%;"><?php echo $row['NBNUedtime']; ?></td>
		      	<td style="width: 12.0668%;"><?php echo $row['NBNUstatus']; ?></td>
		      	<td>
					<center><button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#update_modal<?php echo $row['id']; ?>" data-backdrop="static" data-keyboard="false">Update</button></center>
				</td>
		    </tr>
		</tbody>
		<?php
		include('updateNBNUTmodal.php');
	}
}else{
	echo "no record found";
}
}?>
</table><br><br><br><br>
<!-- ######################################Add Urgent but not Important table################################# -->
<table class="table">
		<thead class="thead-dark">
		    <tr>
			      <th scope="col" colspan="6"><center>Urgent but NOT Important Task</center></th>
		    </tr>
		</thead>
		<thead class="thead-light">
		    <tr>
		    	<th scope="col" style="width: 16.2422%;">Assigner(Teacher/Person)</th>
		      	<th scope="col" style="width: 37.7453%;"><center>Task</center></th>
		      	<th scope="col" style="width: 16.451%;">Start date & time</th>
		      	<th scope="col" style="width: 16.451%;">End date & time</th>
		      	<th scope="col" style="width: 12.0668%;">Status</th>
		      	<th scope="col">Action</th>
		    </tr>
		</thead>
		<?php
		if (isset($_SESSION['FIRST_NAME'])){
			$query = "SELECT * FROM studentubnitask WHERE studfname ='{$_SESSION['FIRST_NAME']}'";
			$query_run = mysqli_query($con,$query);
			if ($query_run) {
				foreach ($query_run as $row) {
			?>
		<tbody>
		    <tr>
		      	<td style="word-wrap: break-word;"><?php echo $row['UBNIassigner']; ?></td>
		      	<td style="word-wrap: break-word;"><?php echo $row['UBNItask']; ?></td>
		      	<td><?php echo $row['UBNIsdtime']; ?></td>
		      	<td><?php echo $row['UBNIedtime']; ?></td>
		      	<td><?php echo $row['UBNIstatus']; ?></td>
		      	<td>
					<center><button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#update_modal<?php echo $row['id']; ?>" data-backdrop="static" data-keyboard="false">Update</button></center>
				</td>
		    </tr>
		</tbody>
		<?php
		include('updateUBNITmodal.php');
	}
}else{
	echo "no record found";
}
}?>
</table><br><br><br><br>
<!-- ##################################Add Not Important and Not Urgent table################################# -->
<table class="table">
		<thead class="thead-dark">
		    <tr>
			      <th scope="col" colspan="6"><center>Not Important and Not Urgent Task</center></th>
		    </tr>
		</thead>
		<thead class="thead-light">
		    <tr>
		     data-backdrop="static" data-keyboard="false"	<th scope="col" style="width: 16.2422%;">Assigner(Teacher/Person)</th>
		      	<th scope="col" style="width: 37.7453%;"><center>Task</center></th>
		      	<th scope="col" style="width: 16.451%;">Start date & time</th>
		      	<th scope="col" style="width: 16.451%;">End date & time</th>
		      	<th scope="col" style="width: 12.0668%;">Status</th>
		      	<th scope="col">Action</th>
		    </tr>
		</thead>
		<?php
		if (isset($_SESSION['FIRST_NAME'])){
			$query = "SELECT * FROM studentninutask WHERE studfname ='{$_SESSION['FIRST_NAME']}'";
			$query_run = mysqli_query($con,$query);
			if ($query_run) {
				foreach ($query_run as $row) {
			?>
		<tbody>
		    <tr>
		      	<td style="word-wrap: break-word;"><?php echo $row['NINUassigner']; ?></td>
		      	<td style="word-wrap: break-word;"><?php echo $row['NINUtask']; ?></td>
		      	<td><?php echo $row['NINUsdtime']; ?></td>
		      	<td><?php echo $row['NINUedtime']; ?></td>
		      	<td><?php echo $row['NINUstatus']; ?></td>
		      	<td>
					<center><button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#update_modal<?php echo $row['id']; ?>" data-backdrop="static" data-keyboard="false">Update</button></center>
				</td>
		    </tr>
		</tbody>
		<?php
		include('updateNINUTmodal.php');
	}
}else{
	echo "no record found";
}
}?>
</table><br><br><br><br>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>
</body>
<script type="text/javascript">
  let startInput = document.getElementById('UANstime');
  let endInput = document.getElementById('UANdtime');
  let messageDiv = document.getElementById('UANmessage');
  let submitButton = document.getElementById('addUANTask');

  let startInput2 = document.getElementById('IBNUstime');
  let endInput2 = document.getElementById('IBNUetime');
  let messageDiv2 = document.getElementById('IBNUmessage');
  let submitButton2 = document.getElementById('addIBNUTask');

  let startInput3 = document.getElementById('UBNIstime');
  let endInput3 = document.getElementById('UBNIetime');
  let messageDiv3 = document.getElementById('UBNImessage');
  let submitButton3 = document.getElementById('addUBNITask');

  let startInput4 = document.getElementById('NINUstime');
  let endInput4 = document.getElementById('NINUetime');
  let messageDiv4 = document.getElementById('NINUmessage');
  let submitButton4 = document.getElementById('addNINUTask');

  let compare = () => {
    let startValue = (new Date(startInput.value)).getTime();
    let endValue = (new Date(endInput.value)).getTime();

    if (endValue < startValue) {
      messageDiv.innerHTML = 'Start date & time must be less than Due date & time!';
      submitButton.disabled = true;
    } else {
      messageDiv.innerHTML = '';
      submitButton.disabled = false;
    }
  };

  let compare2 = () => {
    let startValue2 = (new Date(startInput2.value)).getTime();
    let endValue2 = (new Date(endInput2.value)).getTime();

    if (endValue2 < startValue2) {
      messageDiv2.innerHTML = 'Start date & time must be less than Due date & time!';
      submitButton2.disabled = true;
    } else {
      messageDiv2.innerHTML = '';
      submitButton2.disabled = false;
    }
  };

  let compare3 = () => {
    let startValue3 = (new Date(startInput3.value)).getTime();
    let endValue3 = (new Date(endInput3.value)).getTime();

    if (endValue3 < startValue3) {
      messageDiv3.innerHTML = 'Start date & time must be less than Due date & time!';
      submitButton3.disabled = true;
    } else {
      messageDiv3.innerHTML = '';
      submitButton3.disabled = false;
    }
  };

  let compare4 = () => {
    let startValue4 = (new Date(startInput4.value)).getTime();
    let endValue4 = (new Date(endInput4.value)).getTime();

    if (endValue4 < startValue4) {
      messageDiv4.innerHTML = 'Start date & time must be less than Due date & time!';
      submitButton4.disabled = true;
    } else {
      messageDiv4.innerHTML = '';
      submitButton4.disabled = false;
    }
  };

  startInput.addEventListener('change', compare);
  endInput.addEventListener('change', compare);

  startInput2.addEventListener('change', compare2);
  endInput2.addEventListener('change', compare2);

  startInput3.addEventListener('change', compare3);
  endInput3.addEventListener('change', compare3);

  startInput4.addEventListener('change', compare4);
  endInput4.addEventListener('change', compare4);
</script>
</html>