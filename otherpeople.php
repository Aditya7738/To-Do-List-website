<?php
//session_start available data from web pages - use to start or resume existing one.
session_start();
	include('connection.php');
	
 ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        
    </style>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

    <title>Other People's To-Do List</title>
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
        <!--<form class="d-flex" align="right" method="get" action="login.php">
            <input class="btn btn-primary" type="submit" name="logout" value="Logout">
        </form>-->
</nav>
<div style="background-image: url('Ophomepage.jpg');height:100vh;position: relative;background-size: cover;background-position: center;background-repeat: no-repeat;">
    <?php
    if (isset($_SESSION['message2'])): ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php 
            echo $_SESSION['message2'];
        ?>
    </div> 
    <?php endif ?>
        <h1 style="position: absolute;top: 80px;left: 36%;color: white;">Greeting for the day..!</h1><br>
                    <h1 style="position: absolute;top: 120px;left: 40%;color: white;">
                        Welcome <?php if (isset($_SESSION['FIRST_NAME2'])){ echo $_SESSION['FIRST_NAME2']; }?>
                    </h1>
        <div>
            <center>
                <a href="AddTasklst.php" class="btn btn-primary btn-block" style="width:200px;position: absolute;bottom: 70px;left: 45%;">Add task...</a>
            </center>
        </div>
    </form>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>
</body>
</html>