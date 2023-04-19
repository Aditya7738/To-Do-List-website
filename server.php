<?php
    include('connection.php');
//session_start available data from web pages - use to start or resume existing one.
    session_start(); //it used at line 46 for $_SESSION['fname'] = $fname; and so on

    $fname = "";
    $lname = "";
    $email = "";
    $acctype="";
    $errors = array();

	//if signup button is clicked
	//signup is value of attribute name of button tag  
    //$_POST is a PHP super global variable which is used to collect form data after submitting an HTML form with method="post".
    if(isset($_POST['signup'])) {
        //ensure that form fields are filled properly
        if (empty($_POST['fname'])) {
            array_push($errors, "First name is required");
        }
        if (empty($_POST['lname'])) {
            array_push($errors, "Last name is required");
        }
        if (empty($_POST['email'])) {
            array_push($errors, "Email is required");
        }
        if (empty($_POST['pass'])) {
            array_push($errors, "Password is required");
        }
        if (empty($_POST['cfmpass'])) {
            array_push($errors, "Confirm Password is required");
        }
        if ($_POST['pass'] != $_POST['cfmpass']) {
            array_push($errors, "Password doesn't match");
        }
        if ($_POST['accounts'] == "") {
             array_push($errors, "Please select type of account");
        }else{
            $fname = mysqli_real_escape_string($con, $_POST['fname']); 
            $lname = mysqli_real_escape_string($con, $_POST['lname']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $pass = mysqli_real_escape_string($con, $_POST['pass']);
            $cfmpass = mysqli_real_escape_string($con, $_POST['cfmpass']);
            $acctype = $_POST['accounts'];

        //if there are no errors, save user to database
            if(count($errors) == 0) {
                $password = md5($pass); //encrypt password before store into database (security)
                $sql = "INSERT INTO user_details(FIRST_NAME,LAST_NAME,EMAIL,PASSWORD,AccountType) VALUES ('$fname','$lname','$email','$password','$acctype')";
                $insert=mysqli_query($con,$sql); ////execute SQL statement 
                header('location: login.php'); //redirect to login page
        }
    }
}
?>