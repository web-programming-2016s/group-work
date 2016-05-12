<?php

require_once("../../config.php");

session_start();

function login($user, $pass){

//hash the password
    $pass = hash("sha512", $pass);

    $mysql = new mysqli("localhost", $GLOBALS["db_username"],$GLOBALS["db_password"],"webpr2016_carmet");

$stmt= $mysql->prepare("SELECT id FROM users WHERE username=? and password=?");

echo $mysql->error;
$stmt->bind_param("ss", $user, $pass);
$stmt->bind_result($id);

$stmt->execute();

//get the data
if($stmt->fetch()){
  echo "user with id ".$id." - logged in!";

  //create session variables
  //redirect user
  $_SESSION["user_id"] = $id;
  $_SESSION["username"] = $user;


 header("Location: restrict.php");
}else{
  //username was wrong or password was wrong or both
  echo $stmt->error;
  echo "wrong credentials";

}
}

function signup($user, $pass){
  //hash the password
  $pass = hash("sha512", $pass);

  //GLOBALS - access outside variablein function
$mysql = new mysqli("localhost", $GLOBALS["db_username"],$GLOBALS["db_password"],"webpr2016_carmet");


 $stmt = $mysql->prepare("INSERT INTO users (username,password) VALUES (?, ?) ");
 echo $mysql->error;
 $stmt->bind_param("ss", $user, $pass);

 if($stmt->execute()){
   echo "user saved successfully!";
 }else{
   echo $stmt->error;
 }
}

/* $name = "Carol";

hello ($name, "thursday", 7);
hello ("Toomas", "esmaspäev", 1);

function hello($recieved_name, $day_of_the_week, $day){
  echo "hello ".$recieved_name. "!";
  echo "<br>";
  echo"Today is ".$day_of_the_week." ".$day;
  echo "<br>";


} */

function createInterestDropdown(){

		//query all interests

		$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_carmet");

		$stmt = $mysql->prepare("SELECT id, name FROM interests ORDER BY name ASC");

		echo $mysql->error;

		$stmt->bind_result($id, $name);

		$stmt->execute();


		//dropdown html
		$html = "<select name='user_interest'>";

		//for each interest
		while($stmt->fetch()){
			$html .= "<option value='".$id."'>".$name."</option>";
		}

		$html .= "</select>";

		echo $html;
	}


	function saveUserInterest($interest_id){

		$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_carmet");


		//if user already has the interest
		$stmt = $mysql->prepare("SELECT id FROM users_interests WHERE user_id = ? and interests_id = ?");
		echo $mysql->error;
		$stmt->bind_param("ii", $_SESSION["user_id"], $interest_id);
		$stmt->execute();

		if($stmt->fetch()){
			// it existed
			echo "you already have this interest";
			return; //stop it there
		}
		$stmt->close();




		$stmt = $mysql->prepare("INSERT INTO users_interests (user_id, interests_id) VALUES (?, ?)");

		echo $mysql->error;

		//$_SESSION["user_id"] logged in user ID
		$stmt->bind_param("ii", $_SESSION["user_id"], $interest_id);

		if($stmt->execute()){
			echo "save successfully";
		}else{
			echo $stmt->error;
		}

	}


	function createUserInterestList(){


		$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_carmet");

		$stmt = $mysql->prepare("
			SELECT interests.name FROM users_interests
			INNER JOIN interests ON
			users_interests.interests_id = interests.id
			WHERE users_interests.user_id = ?
		");

		$stmt->bind_param("i", $_SESSION["user_id"]);
		$stmt->bind_result($interest);

		$stmt->execute();

		$html = "<ul>";

		//for each interest
		while($stmt->fetch()){
			$html .= "<li>".$interest."</li>";
		}

		$html .= "</ul>";

		echo $html;

	}


	/*$name = "Romil";

	hello($name, "thursday", 7);
	hello("Toomas", "esmaspäev", 1);

	function hello($recieved_name, $day_of_the_week, $day){
		echo "hello ".$recieved_name."!";
		echo "<br>";
		echo "Today is ".$day_of_the_week." ".$day;
		echo "<br>";
	}*/

?>
