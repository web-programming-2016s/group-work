<?php

	require_once("../../config.php");
	
	//start server session to store data
	//in every file you want to taccess session
	//you should reewquire functions
	session_start();
	
	
	function login($user, $pass){
		//hash the pass
		$pass = hash("sha512", $pass);
		
		//GLOBALS - access outsde variable in function
		$mysql = new mysqli("localhost",$GLOBALS["db_username"], $GLOBALS["db_password"],"webpr2016_marvin");
		
		
		
		$stmt = $mysql->prepare("SELECT id, player FROM users WHERE username=? and password=?");
		
		echo $mysql->error;
		
		$stmt->bind_param("ss", $user, $pass);
		
		$stmt->bind_result($id, $player);
		
		$stmt->execute();
		
		//get the data
		if($stmt->fetch()){
				echo "new player".$player." has joined the quest.";
				
			//create session variables
			//redirect user
			$_SESSION["user_id"] = $id;
			$_SESSION["username"] = $user;
			$_SESSION["player"] = $player;
			
			header("Location: restrict.php");
			
			
				
		}else{
			echo "wrong credentials";
		}
		
		
		
	}
	
	function signup($user, $pass){
		
		//hash the password
		$pass = hash("sha512", $pass);
		
		//GLOBALS - access outsde variable in function
		$mysql = new mysqli("localhost",$GLOBALS["db_username"], $GLOBALS["db_password"],"webpr2016_marvin");
	
		$stmt = $mysql->prepare("INSERT INTO users (username, password, player) VALUES (?, ?, ?)");
		
			echo $mysql->error;
			
			
		$stmt->bind_param("ssi", $user, $pass, $player);
		
		if($stmt->execute()){
			echo "player created successfully!";
	}else{
		echo $stmt->error;
		}
		
		
		
}

	function code ($code) {
		$mysql = new mysqli("localhost",$GLOBALS["db_username"], $GLOBALS["db_password"],"webpr2016_marvin");
	
		$stmt = $mysql->prepare("SELECT clue, player, fake FROM Correct_clues where code=?");
		
			echo $mysql->error;
			
			
		$stmt->bind_param("i", $code);
		
		$stmt->bind_result($clue, $player, $fake);
		$stmt->execute();
		
		if($stmt->fetch()){
			
			if($player == $_SESSION["player"]){
				echo "Here's your clue: ".$clue;
			}else{
				//echo "fake clue";
				echo "Here's your clue: ".$fake." ps it is fake;";
			}
			
			
		}else{
			echo "wrong code";
			}
		
	}
	
	
	
	
	//example of simple function
	/*$name = "Marika";



	hello($name);


	function hello($received_name){
		echo "hello"." ".$received_name."!";
	}*/

?>


















