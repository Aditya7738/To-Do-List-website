<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
	<title>Student's To-Do list</title>
	<style type="text/css">
	select {
        width: 140px;
        height: 35px;
        padding: 4px;
        border-radius: 4px;
        box-shadow: 2px 2px 8px #999;
        background: #eee;
        border: none;
        outline: none;
        display: inline-block;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        cursor: pointer;
        content: '<>';
    }
    label {
        position: relative;
    }
    </style>
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
	<br>
	Would you like to receive email as remainder?
	<br>
	<input type="radio" id="myCheck" onclick="myFunction()"> Yes &nbsp&nbsp
	<input type="radio"> No<br><br><br> 
	<form id ="text" style="display:none">
		<label>Enter Email Address</label><br>
		<input id="email" name="email" type="email" size="50"><br>
		<br>
		<label>Select how long before you like to receive email?</label><br>
		<!--name attribute used to give a name to the control which is sent to the server to be recognized and get the value.-->
		<select>
            <option value="0">5 mins</option>
            <option value="1">30 mins</option>
            <option value="2">1 hour</option>
            <option value="3">1 day</option>
        </select>
        <br><br>
        <button name="Save" class="btn btn-primary">Done</button>&nbsp&nbsp
        <button name="cancel" class="btn btn-primary">Cancel</button>
	</form>
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
  	</script>
  	</div>
</body>
</html>