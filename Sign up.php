<?php
//session_start();
//session_start available data from web pages - use to start or resume existing one.
	//include() function use to put data from another php file
    include('connection.php');
    include('server.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>To-Do List Sign up</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <img  title="Freepik" src="to-do-list.png">&nbsp
            <span class="navbar-brand mb-0 h1">To-Do List</span>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="http://localhost/To-Do%20List/homepage.html#About">About</a><!-- add about-->
                    </li>
                </ul>
            </div>
        </div>
	</nav>
	<div class="container">
		<div class="row m-5 no-gutters shadow-lg">
			<div class="col-md-6 d-none d-md-block">
    			<img src="images/todolisttemplate.jpg" alt="sing up image" class="img-fluid" style="height:83%;width:94%;" /><br><br>
    			<center><a href="login.php" class="signup-image-link">Already have account</a></center>
    		</div>
    		<div class="col-md-6 bg-white p-5">
				<div class="row">
					<form action="Sign up.php" method ="post"> <!--action - Specifies where to send the form-data when a form is submitted-->
					<h2>Sign up</h2><br>
					<p>Please fill in this form to create an account.</p>
					<!--display validation errors here-->
					<?php 
						include('errors.php');
					?>
					<div class="form-group">
						<label>First Name</label>
							<input type="text" name="fname" class="form-control" style="width: 70%;" autofocus><br>

						<label>Last Name</label>
							<input type="text" name="lname" class="form-control" style="width: 70%;"><br>

						<label>Email Address</label>
							<input id="email" name="email" type="email" class="form-control"  style="width: 70%;"><br>

						<!-- Password field -->
						<label>Enter Password</label> <br>
							<input type="password" name="pass" id="myInput" class="form-control" style="width: 70%;">

						<!-- An element to toggle between password visibility -->
							<input type="checkbox" onclick="myFunction()"> &nbsp Show Password<br>
							<br>

						<label>Confirm Password</label> <br>
							<input type="password" name="cfmpass" id="myInput2" class="form-control" style="width: 70%;">

							<input type="checkbox" onclick="myFunction2()"> &nbsp Show Password<br>
							<br>

						<!--<label>Are you student?</label><br>
							<input type="radio" name="student" value="Yes"> &nbsp Yes &nbsp&nbsp&nbsp&nbsp&nbsp 
							<input type="radio" name="student" value="No"> &nbsp No<br>
							<br> -->
						<label>Select account type</label><br>
						<select name = "accounts" class="form-select" style="width: 50%;">
							<option value="Student">Student</option>
							<option value="Other people">Other people</option>
						</select>
						<br><br>

						<button type="submit" name="signup" style="width: 50%;" class="btn btn-primary btn-block">
						Sign up
						</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="pass.js"></script>	
</body>
</html>