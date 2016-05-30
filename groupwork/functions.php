<?php
	
	require_once("db.php");
	
	session_start();
	
	function login($user, $pass){
		

		$pass = hash("sha512", $pass);
		
		$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_laugai");
		
		$stmt = $mysql->prepare("SELECT id FROM gv WHERE username=? and password=?");
		
		echo $mysql->error;
		
		$stmt->bind_param("ss", $user, $pass);
		
		$stmt->bind_result($id);
		
		$stmt->execute();
		

		if($stmt->fetch()){
			echo "user with id ".$id." logged in!";
			

		
			$_SESSION["user_id"] = $id;
			$_SESSION["username"] = $user;
			
			header("Location: restrict.php");
			
			
		}else{
		
			echo $stmt->error;
			echo "wrong credentials";
		}
		
	}
	function signup($user, $pass){
		

		$pass = hash("sha512", $pass);
		
		
		$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_laugai");
		
		$stmt = $mysql->prepare("INSERT INTO gv (username, password) VALUES (?, ?) ");
		
		echo $mysql->error;
		
		$stmt->bind_param("ss", $user, $pass);
		
		if($stmt->execute()){
			echo "user saved successfully!";
		}else{
			echo $stmt->error;
		}
		
	}
?>