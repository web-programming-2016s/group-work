<?php

	require_once("functions.php");


//Restriction- not logged in
	if(isset($_SESSION["user_id"])){
		//redirect user to restricted page
		header("Location: restrict.php");

	}


//---------------------------------------------------------------------------------//

	//login=smth is in the URL
	//login button clocked
	if(isset($_POST["login"])){

		//login
		echo "logging in...";

			//the fields are not empty
			if( !empty($_POST["username"]) && !empty($_POST["password"]) ){

				//save to db

				login($_POST["username"], $_POST["password"]);

			}else{

				echo "both fields are rquired!";

			}

//---------------------------------------------------------------------------------//


	//signup button clocked
	}else if(isset($_POST["signup"])){

		//signup
		echo "signing up...";

			//the fields are not empty
			if( !empty($_POST["username"]) && !empty($_POST["password"]) ){

				//save to db

				signup($_POST["username"], $_POST["password"]);

			}else{

				echo "both fields are rquired!";

		}


	}

//---------------------------------------------------------------------------------//


?>



<h1>Log in</h1>
<form method="POST">

	<input type="text" placeholder="username" name="username">
	<input type="password" placeholder="password" name="password">

	<input type="submit" name="login" value="Log in">



</form>



<h1>Sign up</h1>
<form method="POST">
<!-- <form>-->

	<input type="text" placeholder="username" name="username">
	<input type="password" placeholder="password" name="password">

	<input type="submit" name="signup" value="Sign up">



</form>
