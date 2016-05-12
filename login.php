<?php
	require_once("functions.php");
	
	//login button clicked
	if(isset($_POST["login"])){
		
		//login
		
		echo "logging in ...";
	
	//signup button clicked
	}else if(isset($_POST["signup"])){
		
		//signup
		
		echo "signing up ...";
		
		//the username and password are not empty
		if(!empty($_POST["username"]) && !empty($_POST["password"])){
			
			//save to db
			
			signup($_POST["username"], $_POST["password"]);
			
		}else{
			
			echo "both fields are rquired!";
			
		}
		
		
	}


?>



<h1>Log in</h1>
<form method="POST">
	
	<input type="text" placeholder="username" name="username">
	<input type="password" placeholder="password" name="password">
	
	<input type="submit" name="login" value="Log in">
	
</form> 


<h1>Sign up</h1>
<form method="POST">
	
	<input type="text" placeholder="username" name="username">
	<input type="password" placeholder="password" name="password">
	
	<input type="submit" name="signup" value="Sign up">
	
</form> 
