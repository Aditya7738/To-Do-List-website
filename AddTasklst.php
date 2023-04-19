<?php 
session_start();
include('connection.php');
$tasks2='';
$taskdtime='';
$id = 0;
$update = false;
$errors=array();

    if (isset($_POST['storedetails'])) {
    	if (empty($_POST['task'])) {
			array_push($errors, "You must fill in the task");
		}
		if (empty($_POST['optime'])) {
			array_push($errors,"You must set Start date and time");
		}
		if (empty($_POST['opetime'])) {
			array_push($errors, "You must set Due date and time");
		}
		if (empty($_POST['remainderDT'])) {
			array_push($errors, "You didn't set date and time for remainder");
		}
		if (($_POST['remainderDT'] > $_POST['optime']) == true) {
			array_push($errors,"You should set remainder of before Starting date and time of the task");
		}
		if (($_POST['optime'] > $_POST['opetime']) == true) {
			array_push($errors,"Start date & time must be less than Due date & time");
		}
		else{
			$task = $_POST['task'];
			$optime = $_POST['optime'];
			$opetime = $_POST['opetime'];
			$optproprity = $_POST['taskpriority'];
			$optstatus = $_POST['taskstatus'];
			$remainderDT = $_POST['remainderDT'];
			if (isset($_SESSION['FIRST_NAME2'])){
				$opfname = $_SESSION['FIRST_NAME2']; 
				$opemail = $_SESSION['EMAIL'];
				if(count($errors) == 0) {
					$sql = "INSERT INTO otherpeopletasks(opfname,optask,opdtime,opedtime,optstatus,optpriority,remainderDT,opemail) VALUES('$opfname','$task','$optime','$opetime','$optstatus','$optproprity','$remainderDT','$opemail')";
					$insert=mysqli_query($con,$sql);
					if ($insert) {
						$_SESSION['message'] = "Task have been saved!";
						$_SESSION['msg_type'] = "success";
						header('location: AddTasklst.php');
					}
				}
			}
		}
	}
		// delete task
		if (isset($_GET['delete'])) {
			$id = $_GET['delete'];
			$delete=mysqli_query($con, "DELETE FROM otherpeopletasks WHERE id=$id");
			if ($delete) {
				$_SESSION['message'] = "Task have been deleted!";
				$_SESSION['msg_type'] = "danger";
				header('location: AddTasklst.php');
			}
		}
		// edit task
		if (isset($_GET['edit'])) {
			$id = $_GET['edit'];
			$update = true;
			$result2 = mysqli_query($con,"SELECT * FROM otherpeopletasks WHERE id=$id");
            if (count(array($result2)) == 1) {
				$r = mysqli_fetch_array($result2);
				 	$tasks2 = $r['optask'];
					$taskdtime = $r['opdtime'];
					$taskedtime = $r['opedtime'];
					$taskstatus = $r['optstatus'];
					$taskpriority = $r['optpriority'];
					$tremainderDT = $r['remainderDT'];
			}
		}
		//update 
		if (isset($_POST['update'])) {
			$id = $_POST['id'];
			$tasks=$_POST['task'];
			$optime=$_POST['optime'];
			$opetime=$_POST['opetime'];
			$optproprity = $_POST['taskpriority'];
			$optstatus=$_POST['taskstatus'];
			$remainderDT = $_POST['remainderDT'];
			$update2 = mysqli_query($con,"UPDATE otherpeopletasks SET optask='$tasks', opdtime='$optime',opedtime='$opetime', optpriority='$optproprity', optstatus='$optstatus', remainderDT='$remainderDT' WHERE id=$id");
			if ($update2) {
	            $_SESSION['message'] = "Task has been updated!";
	            $_SESSION['msg_type'] = "warning";
	            header('location: AddTasklst.php');
	        }
		}
?>		
<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
	<title>Other People's To-Do list</title>
	<link rel="stylesheet" type="text/css" href="otherpeoplestyle.css">
	<style type="text/css">
	#myInput {
		font-size: 16px;
		border: 1px solid #ddd;
	}
	/*table td {
        border:1px;
        width: 10px;
        word-wrap: break-word;
      }*/
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
        	<img  title="Freepik" src="to-do-list.png">&nbsp
            <span class="navbar-brand mb-0 h1">To-Do List</span>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="homepage.html">Home</a>
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

	<!--#############################################################-->
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
	<?php unset($_SESSION['message2']); ?>
		<br>
		<center>
			<div style="color: blue;">
				<h2>To-Do List</h2>
				(You can add, edit, update, delete task from following list)
			</div>
		</center><br>
		<center>
			<form method="POST" action="AddTasklst.php">
				<?php if (count($errors) > 0): ?>
					<?php foreach ($errors as $error): ?> <!-- try-->
					<p style="color: red;margin: 0px;"><?php echo $error; ?></p>
					<?php endforeach ?>
				<?php endif ?>
				<div class="form-group">
					<input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- after click update, id should access by post to update it,input should hidden-->
					<!--<div class="mb-3">-->
						<input type="text" class="form-control" name="task" style="width: 50%;" value="<?php echo $tasks2; ?>" placeholder="Assign yourself a new task"><br><br>
					<!--</div>-->
					<!--<div class="mb-2" style="position: absolute;top: 50%;left: 200px;">-->
						<label>Start date and time</label>&nbsp&nbsp&nbsp
						<input type="datetime-local" id="setdatetime" name="optime" value="<?php echo $taskdtime; ?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					<!--</div>-->
					<!--<div class="mb-2" style="position: absolute;top: 50%;right: 200px;">-->
						<label>Due date and time</label>&nbsp&nbsp&nbsp
						<input type="datetime-local" id="setedatetime" name="opetime" value="<?php echo $taskedtime; ?>"><br><br><br>
					<!--</div>-->
						<label>Priority</label>&nbsp&nbsp&nbsp
						<select name="taskpriority" value="<?php echo $taskpriority; ?>">
							<option value="Normal">Normal</option>
							<option value="Low">Low</option>
							<option value="High">High</option>
						</select>
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<label>Status</label>&nbsp&nbsp&nbsp
						<select name="taskstatus" value="<?php echo $taskstatus; ?>">
							<option value="Not Started">Not Started</option>
							<option value="In Progress">In Progress</option>
							<option value="Completed">Completed</option>
							<option value="Waiting to get help from someone else">Waiting to get help from someone else</option>
						</select><br><br><br>
							<label style="position: relative;right: 250px;">Remainder</label>
							&nbsp&nbsp&nbsp&nbsp
							<input type="datetime-local" id="rdtinput" name="remainderDT" style="position: relative;right: 250px;" value="<?php echo $tremainderDT; ?>">
						<br><br>
						
						<?php if($update == true): ?>
						<button type="submit" name="update" class="btn btn-info" style="width:150px;">Update</button>
					<?php else: ?>
						<button type="submit" name="storedetails" class="btn btn-primary" style="width:100px;">Save</button>
					<?php endif; ?>
				</div>
			</form>
		</center>
		<br><br>
		<input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search for task.." title="Type in a name" style="width: 50%">
<table class="table" id="myTable" cellpadding="10">
  	<thead>
    <tr>
      	<th style="width: 5.02265%; color: blue;">Sr. No.</th>
		<th style="width: 27.3943%; color: blue;"><center>Tasks</center></th>
		<th style="width: 7.9891%; color: blue;">Date & Time of remainder</th>
		<th style="width: 7.9891%; color: blue;">Start Date & Time</th>
		<th style="width: 7.9891%; color: blue;">Due Date & Time</th>
		<th style="width: 9.48406%; color: blue;">Priority</th>
		<th style="width: 11.7805%; color: blue;"><center>Status</center></th>
		<th colspan="2" style="color: blue;"><center>Actions</center></th>
    </tr>
  	</thead>
  	<tbody>
  		<?php 
  		if (isset($_SESSION['FIRST_NAME2'])){
  			// select all tasks added by name of other people
  			$query = "SELECT * FROM otherpeopletasks WHERE opfname='{$_SESSION['FIRST_NAME2']}'";
			$tasks = mysqli_query($con, $query);

			$i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
			<tr>
      			<th scope="row" style="width: 5.02265%; color: blue;"><?php echo $i; ?></th>
      			<td style="width: 27.3943%; word-wrap: break-word;"><?php echo $row['optask']; ?></td>
      			<td style="width: 7.9891%; word-wrap: break-word;"><?php echo $row['remainderDT']; ?></td>
				<td style="width: 7.9891%; word-wrap: break-word;"><?php echo $row['opdtime']; ?></td>
				<td style="width: 7.9891%; word-wrap: break-word;"><?php echo $row['opedtime']; ?></td>
				<td style="width: 9.48406%;"><?php echo $row['optpriority']; ?></td>
				<td style="width: 11.7805%; word-wrap: break-word;"><center><?php echo $row['optstatus']; ?></center></td>
				<td>
					<!--<button class="btn btn-sm btn-success editbtn" data-toggle="modal" data-target="#editModal">Edit</button>-->
					<center><a href="AddTasklst.php?edit=<?php echo $row['id']; ?>" class="btn btn-sm btn-success">Edit</a></center>
				</td>
				<td>
					<center><a href="AddTasklst.php?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Delete</a></center>
				</td>
    		</tr>
    		<?php $i++; 
    	}
    }?>
    </tbody>
</table>
</div>
<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>
    <script type="text/javascript">//Script for search of task
    	function myFunction() {
    		var input, filter, table, tr, td, i, txtValue;
		  	input = document.getElementById("myInput");
		  	filter = input.value.toUpperCase();
		  	table = document.getElementById("myTable");
		  	tr = table.getElementsByTagName("tr");
		  	for (i = 0; i < tr.length; i++) {
		    	td = tr[i].getElementsByTagName("td")[0];
		    	if (td) {
		      		txtValue = td.textContent || td.innerText;
		      		if (txtValue.toUpperCase().indexOf(filter) > -1) {
		        		tr[i].style.display = "";
		        	} else {
		        		tr[i].style.display = "none";
		        	}
		        }       
		  	}
		}
</script>
</body>
</html>