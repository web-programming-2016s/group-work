<?php

	require_once ("../../config.php");
	
	//start server session to store data
	//in every file you want to access session
	//you should require functions file
	
	//session is stored on the server, cookies is on your computer
	session_start();
	
	function login($user, $pass){
		
		//hash the password
		$pass = hash ("sha512", $pass);	

		//GLOBALS - access outside variable in function, this is to access the configuration file
		$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_islam");	

		$stmt = $mysql->prepare("SELECT id, first_name, last_name FROM debattle_users WHERE username=? and password=?");
		
		echo $mysql->error;
		
		$stmt->bind_param("ss", $user, $pass);
		
		$stmt->bind_result($id,$first_name, $last_name);
		
		$stmt->execute();
		
		//Get the data
		if ($stmt->fetch()){
			echo "User with id ".$id." logged in!";
			
			//create sessions variables
			//redirect user
			$_SESSION["user_id"] = $id;
			$_SESSION["username"] = $user;
			$_SESSION["first_name"] = $first_name;
			$_SESSION["last_name"] = $last_name;
			
			//redirection part
			header ("Location: Debattle_b.php");
			
		}else{
			//username was wrong, password was wrong, or both
			echo $stmt->error;
			echo "Worng login credentials.";
		}
		
	}
	
	function signup($first_name, $last_name, $user, $pass){
		
		//hash the password
		$pass = hash ("sha512", $pass);
		
		//GLOBALS - access outside variable in function, this is to access the configuration file
		$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_islam");
		
		$stmt = $mysql->prepare("INSERT INTO debattle_users (first_name, last_name, username, password) VALUES (?,?,?,?)");
		
		echo $mysql->error;
		
		$stmt->bind_param("ssss", $first_name, $last_name, $user, $pass);
		
		if($stmt->execute()){
			return "User has been created successfully!";

		}else{
			//this is to show if there is a SQL error
			return $stmt->error;
		}
	}
	





	
	/*$name = "Islam";

	hello($name, "thursday", 7);
	hello("Toomas", "thursday", 1);

	function hello ($received_name, $day_of_the_week, $day){
		echo "Hello " .$received_name."!";
		echo "<br>";
		echo "Today is ".$day_of_the_week." ".$day;
		echo "<br>";
	}*/


?>