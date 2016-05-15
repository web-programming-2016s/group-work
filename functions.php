<?php

	require_once("../../config.php");

	//start server session to store data
	//in every file you want to access session
	//you should require function
	session_start();

	function login($user, $pass){
	
		//hash the password
			$pass = hash("sha512", $pass);
	
		$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_karoliinar");
	
		$stmt = $mysql->prepare("SELECT id, name, name2 FROM users where username=? and password=?");
	
		echo $mysql->error; 
	
		$stmt->bind_param("ss", $user, $pass);
	
		$stmt->bind_result($id, $name, $name2);
	
		$stmt->execute();
	
		//get the data
		if($stmt->fetch()){
			echo "user with id ".$id." logged in!";
		
			//create session variables
	
			$_SESSION["user_id"] = $id;
			$_SESSION["name"] = $name;
			$_SESSION["name2"] = $name2;
			$_SESSION["username"] = $user;
		
			header("Location: delfiini_tabel.php");
		
		}else{
			echo $stmt->error; 
			echo "wrong credentials";
		
			}
		}

	function signup($user, $pass, $name, $name2){
		
		//hash the password
		$pass = hash("sha512", $pass);
		
		
		//GLOBALS - access outside variable in function
		$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_karoliinar");
		
		$stmt = $mysql->prepare("INSERT INTO users (username, password, name, name2) VALUES (?,?,?,?)");
		
		echo $mysql->error;
	
		$stmt->bind_param("ssss", $user, $pass, $name, $name2);	
		
		if($stmt->execute()){
			echo "user saved successfully!";
		}else{
			echo $stmt->error;
		}
		
	}

	
		
?>