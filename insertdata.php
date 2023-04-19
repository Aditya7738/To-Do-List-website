<?php
//session_start();
	//include('server.php');
	include('connection.php');

	if (isset($_POST['UANtdetails'])) {
		$UANassigner=$_POST['UANassigner'];
		$UANtask=$_POST['UANtask'];
		$UANsdtime=$_POST['UANsdtime'];
		$UANedtime=$_POST['UANedtime'];
		$UANstatus=$_POST['UANstatus'];

		$query="INSERT INTO studenttasks (UANassigner,UANTask,UANsdtime,UANedtime,UANstatus) VALUES ('$UANassigner','$UANtask','$UANsdtime','$UANedtime','$UANstatus')";
		$insert = mysqli_query($con,$query);
		if ($insert) {
			$_SESSION['message'] = "Task details have been saved!";
			$_SESSION['msg_type'] = "success";
			header('location: AddTask.php');
		}
	}
?>