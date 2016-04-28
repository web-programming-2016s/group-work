<?php
	require_once("functions.php");
	
	//RESTRICTION -NOT LOGGED IN
	if(isset($_SESSION["user_id"])){
		//redirict user to restricted page
		header("location: restrict.php");
	}
	
		//login button clicked
	if(isset($_POST["login"])){
	
		//login
	
	echo "logging in...";
	
	if(!empty($_POST["username"]) && !empty($_POST["password"])){
	
		//save to db
		
		login($_POST["username"], $_POST["password"]);
	
	}else{
	
		echo "both fields are required!";
		
		}	


	//signup button clicked
	}else if(isset($_POST["signup"])){
	
		//signup	
			
	echo "signing up...";
	
	//the fields are not empty
	if(!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["name"])){
	
		//save to db
		
		signup($_POST["username"], $_POST["password"], $_POST["name"], $_POST["name2"]);
	
	}else{
	
		echo "both fields are required!";
		
		}
	
	}
	
	
	
?>




<h1>Log in</h1>
<form method="POST">

	<input type="text" placeholder="Username" name="username">
	<input type="password" placeholder="Password" name="password">
	
	<input type="submit" name="login" value="Log in">
	
</form>


<h1>Sign up</h1>
<form method="POST">

	<input type="name" placeholder="First name" name="name"><br>
	<input type="name" placeholder="Last name" name="name2"><br>
	
	<input type="text" placeholder="Username" name="username"><br>
	<input type="password" placeholder="Password" name="password"><br>
	
	<input type="submit" name="signup" value="Sign up">
	
	
	
</form>