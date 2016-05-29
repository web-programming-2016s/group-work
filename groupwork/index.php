<?php
	require_once("functions.php");
	

	if(isset($_SESSION["user_id"])){

		header("Location: restrict.php");
	}

	
 if(isset($_POST["signup"])){
		

		
		echo "signing up ...";
		

		if(!empty($_POST["username"]) && !empty($_POST["password"])){
			

			
			signup($_POST["username"], $_POST["password"]);
			
		}else{
			
			echo "both fields are rquired!";
			
		}
		
		
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Register Below</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>

</head>
<body>
<div class="index">
	<h1>Register<h1>

	<form method="POST">

		<input type="text" placeholder="Enter your username" name="username">
		<input type="password" placeholder="and password" name="password">
		

		<input type="submit" name="signup" value="Sign up">

	</form>

	<h2> or <a href="login.php">login here</a></h2>
</div>

</body>
</html>