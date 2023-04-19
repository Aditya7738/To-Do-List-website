<?php
	include('server.php');
	include('connection.php');
	if (isset($_POST['addUANTask'])) {
		if (empty($_POST['task'])) {
			$errors = "You must fill in the task";
		}else{
			$task = $_POST['UANtask'];
			$sql = "INSERT INTO studenttasks (UANTask) VALUES ('$task')";
			mysqli_query($con, $sql);
			header('location: U&NTask.php');
		}
	}
	if (isset($_POST['setUANTdtime'])) {
		$studatetime = $_POST['studatetime'];
		$sql = "INSERT INTO studenttasks (UANTdtime) VALUES ('$tstudatetime')";
		mysqli_query($con, $sql);
		header('location: email.php');
	}
	
?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
	<title>Student's To-Do list</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">To-Do List</span>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="http://localhost/To-Do%20List/otherpeople.php">Home</a>
                    </li>
                </ul>
            </div>
        </div>
        <form class="d-flex" align="right" method="get" action="login.php">
            <input class="btn btn-primary" type="submit" name="logout" value="Logout">
        </form>
	</nav>
	<div class="container">
		<br><br>
	<table class="table" border="1" >
		<tr>
			<th>
				Add URGENT and NECESSARY task
			</th>
		</tr>
		<tr>
			<td>
				<form action="server.php" method="POST">
				<input type="text" id="textfield" name="UANtask" size="50"><br><br>
				<button id="add" type="submit" name="addUANTask" class="btn btn-primary">Add</button> &nbsp&nbsp
				<button id="cancel" onclick="clearField()" class="btn btn-primary">Cancel</button>
				<script type="text/javascript">
					function clearField(){
						document.getElementById("textfield").value=""
					}
				</script>
				</form>
			</td>
		</tr>
	</table>
	<br>
	<br>
	<br>
	<form action="U&NTask.php" method="POST">
	<!--Would you like to set date and time?<br>-->
	<!--<input type="radio" id="myCheck" onclick="myFunction()"> Yes &nbsp&nbsp
	<input type="radio"> No, I have mention above<br><br><br>
	<form id ="text" style="display:none" action="email.php">-->
		<label>Set date and time</label>
  			<input type="datetime-local" id="setdatetime" name="studatetime">
  			<button type="submit" name="setUANTdtime" class="btn btn-primary">Set</button>
	<!--</form>
	<script>
		function myFunction() {
			var radiobtn = document.getElementById("myCheck");
 			var text = document.getElementById("text");
  			if (radiobtn.checked == true){
    			text.style.display = "block";
  			} else {
				text.style.display = "none";
  			}
  		}
  	</script>-->
  	</form>
</body>
</html>