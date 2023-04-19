<?php
//session_start available data from web pages - use to start or resume existing one.
	//include() function use to put data from another php file
session_start();
	include('connection.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student's To-Do List</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

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
	
	<div style="background-image: url('Studenthomepage.jpg');height:100vh;position: relative;background-size: cover;background-position: center;background-repeat: no-repeat;">
		<?php
	if (isset($_SESSION['message1'])): ?>
	<div class="alert alert-<?=$_SESSION['msg_type']?>">
		<?php 
			echo $_SESSION['message1'];
		?>
	</div> 
	<?php endif ?>
				<h1 style="position: absolute;top: 80px;left: 36%;color: white;">Greeting for the day..!</h1><br>
					<h1 style="position: absolute;top: 120px;left: 40%;color: white;">
						Welcome <?php if (isset($_SESSION['FIRST_NAME'])){ echo $_SESSION['FIRST_NAME']; }?>
					</h1>
				<div>
					<center><a href="AddTask.php" class="btn btn-primary btn-block" style="width:200px;position: absolute;bottom: 70px;left: 45%;">Add task...</a></center>
				</div>
			</form>
		</div>
</body>
</html>