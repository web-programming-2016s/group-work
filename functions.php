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
			$_SESSION["username"] = $user;
		
			header("Location: restrict.php");
		
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
		
		$stmt = $mysql->prepare("INSERT INTO users (username, password, name, name2) VALUES (?,?,?,?) ");
		
		echo $mysql->error;
	
		$stmt->bind_param("ssss", $user, $pass, $name, $name2);	
		
		if($stmt->execute()){
			echo "user saved successfully!";
		}else{
			echo $stmt->error;
		}
		
	}

	function saveInterest($interest){
	
		$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_karoliinar");
		
		$stmt = $mysql->prepare("INSERT INTO interests (name) VALUE (?)");
		
		echo $mysql->error;
		
		$stmt->bind_param("s", $interest);
		
		if($stmt->execute()){
			echo"interest saved successfully";
		}else{
			echo $stmt->error;
			
		}
	}
	
	function createInterestDropdown(){
	
		//query all interests
		
		$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_karoliinar");
		
		$stmt = $mysql->prepare("SELECT id, name FROM interests ORDER BY name ASC");	
		
		echo $mysql->error; 
		
		$stmt->bind_result($id, $name);
		
		$stmt->execute();
		
		
		//dropdown html
		$html ="<select name='user_interest'>";
		
		//for each interest
		while ($stmt->fetch()){
			$html .= "<option value='".$id."'>".$name."</option>";
		}
		
		$html .= "</select>";		
		
		echo $html;
	}
	
	function saveuserInterest($interest_id){
	
		$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_karoliinar");
	
		//if user already has the interest
		$stmt = $mysql->prepare("SELECT id FROM users_interests WHERE user_id = ? and interests_id = ?");
		echo $mysql->error;
		$stmt->bind_param("ii", $_SESSION["user_id"], $interest_id);
		$stmt->execute();
	
		if($stmt->fetch()){
			//if existed
			echo "you already have this interest";
			return; //stop it there
		
		}
		$stmt->close();
		
			
		$stmt = $mysql->prepare("INSERT INTO users_interests (user_id, interests_id) VALUES (?,?)");
	
		echo $stmt->error;
	
		$stmt->bind_param("ii", $_SESSION["user_id"], $interest_id);
	
		if($stmt->execute()){
			echo "save successful";
		}else{
			echo $stmt->error;
	
	
			}
		}

	function createUserInterestList(){
	
		$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_karoliinar");
	
		$stmt = $mysql->prepare("SELECT interests.name FROM users_interests INNER JOIN interests ON users_interests_id = interests.id WHERE users_interests.user_id = ?");

		$stmt->bind_param("i", $_SESSION["user_id"]);
	
		$stmt->execute();
	
		$html = "<ul>";
	
		//for each interest
		while($stmt->fetch()){
			$html .="<li>".$interest."</li>";
		}
	
	$html .= "</ul>";
	
	echo $html;
	
	}
		
?>