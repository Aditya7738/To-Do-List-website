<?php
session_start();
	//include('server.php');
	include('connection.php');
	$errors = array();
	//$_SESSION['id'] = "";
	if (isset($_POST['login'])) {
        $email1 = mysqli_real_escape_string($con, $_POST['email1']);
        $pass1 = mysqli_real_escape_string($con, $_POST['password']);
        $acctype = $_POST['accounts'];

        //ensure that form fields are filled properly
        if (empty($email1)) {
            array_push($errors, "Email is required");
        }
        if (empty($pass1)) {
            array_push($errors, "Password is required");
        }
        if(count($errors) == 0){
            $password1 = md5($pass1); //encrypt password before store into database (security)
            $sql_stmt = "SELECT * FROM user_details WHERE EMAIL ='$email1' AND PASSWORD ='$password1' AND AccountType ='$acctype' "; 
     
            $result = mysqli_query($con,$sql_stmt); ////execute SQL statement 
            if (mysqli_num_rows($result) == 1) {
            	//imp dont erase it
                /*$last_id=mysqli_insert_id($con);
                $sql2 = "SELECT FIRST_NAME FROM user_details WHERE id=$last_id";
                $FIRST_NAME = mysqli_query($con,$sql2);*/
            	while($row = mysqli_fetch_array($result)){
            		
					
                    //$_SESSION['LAST_NAME'] = $row['LAST_NAME'];
                    if($row['AccountType'] == "Student"){
                    	$_SESSION['FIRST_NAME'] = $row['FIRST_NAME'];
                    	$_SESSION['message1'] = "You have logged in as ".$row['AccountType'];
						$_SESSION['msg_type'] = "success";
                    	header('location: student.php');
                    }elseif ($row['AccountType'] == "Other people") {
                    	$_SESSION['FIRST_NAME2'] = $row['FIRST_NAME'];
                    	$_SESSION['EMAIL'] = $row['EMAIL'];
                    	$_SESSION['message2'] = "You have logged in as ".$row['AccountType'];
						$_SESSION['msg_type'] = "success";
                    	header('location: otherpeople.php');
                    }

            	}
            }else{
        	array_push($errors, "wrong email or password or account combination");
        }
   	}   
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>To-Do List Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
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
    			<img src="images/todolisttemplate.jpg" alt="login image" class="img-fluid" style="height:79%;width:90%;" /><br><br>
    			<center><a href="Sign up.php" class="signup-image-link">Create an account</a></center>
    		</div>
    		<div class="col-md-6 bg-white p-5">
				<div class="row">
					<form action="login.php" method ="post">
						<h2>Log In</h2><br>
						<!--display validation errors here-->
						<?php if (count($errors) > 0): ?>
							<div class="error">
								<?php foreach ($errors as $error): ?>
									<p style="color: red;"><?php echo $error; ?></p>
								<?php endforeach ?>
							</div>
						<?php endif ?>
						<div class="form-group">
							<label>Email Address</label>
								<input id="email" type="email" class="form-control" name="email1" style="width: 70%;" autofocus><br>

							<label>Password</label>
								<input type="password" id="myInput" class="form-control" name="password" style="width: 70%;">

							<!-- An element to toggle between password visibility -->
								<input type="checkbox" onclick="myFunction()"> &nbsp Show Password<br><br>
							<label>Select your account type</label><br>
							<select name = "accounts" class="form-select" style="width: 50%;">
								<option value="Student">Student</option>
								<option value="Other people">Other people</option>
							</select>
							<br><br>
							<button type="submit" name="login" style="width: 50%;" class="btn btn-primary">
							Login
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