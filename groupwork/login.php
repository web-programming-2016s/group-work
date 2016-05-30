<?php
	require_once("functions.php");
	
	//RESTRICTION - NOT LOGGED IN
	if(isset($_SESSION["user_id"])){
		//redirect user to restricted page
		header("Location: restrict.php");
	}
	
	//login button clicked
	if(isset($_POST["login"])){
		
		//login
		
		echo "logging in ...";
		
		//the username and password are not empty
		if(!empty($_POST["username"]) && !empty($_POST["password"])){
			
			//save to db
			
			login($_POST["username"], $_POST["password"]);
			
		}else{
			
			echo "both fields are required!";
			
		}
	}
?>




<head>
	<title>Log In</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>

</head>
<body>
<div class="index">
	<h1>Log in</h1>

	<form method="POST">

		<input type="text" placeholder="Enter your username" name="username">
		<input type="password" placeholder="and password" name="password">
		

		<input type="submit" name="login" value="Log in">

	</form>

	<h2> or <a href="index.php">register here</a></h2>
</div>

</body>
