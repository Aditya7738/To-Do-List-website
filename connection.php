<?php

//to connect database
$dbserver = "localhost:3307";
$dbuser = "root"; //localhost's default user is root
$dbpass = "sldi4e#@45"; 
$dbname = "todolist";

//checking it connected or not
if(!$con = mysqli_connect($dbserver,$dbuser,$dbpass,$dbname)) //mysqli_connect() function opens new connection to MySQL server
    {

	die("Failed to connect!"); //die() is inbuilt function, used to print message and exit from current php script
    }
?>