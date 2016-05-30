 <?php require_once("header.php");?>

<?php
	//we need functions for dealing with session
	require_once("functions.php");
	
	//RESTRICTION - LOGGED IN
	if(!isset($_SESSION["user_id"])){
		//redirect not logged in user to login page
			header("Location: login.php");
	}
	
	
	//?logout is in the url
	if(isset($_GET["logout"])){
		//delete the session
		session_destroy();
		
		header("Location:login.php");
	}
	
	if(isset($_GET["code"])){
		//delete the session
		code($_GET["code"]);
	}
	
?>

<h2>Welcome, player <?=$_SESSION["username"];?> from group:<?=$_SESSION["player"];?></h2>

<form method ="get">
	<label for="code"> Insert code:</label>
	<input type="text" name="code" min="10" max="10"><br>
	<input type="submit" name="get clue" value="Get clue">
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<a href="?logout=1" > Logout</a>;