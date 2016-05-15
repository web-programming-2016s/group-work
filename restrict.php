<?php
	//we need function for dealing with session
	require_once("functions.php");

		//RESTRICTION -LOGGED In
	if(!isset($_SESSION["user_id"])){
		//redirict not logged in user to login page
		header("location: login.php");
	}

	
	if(isset($_GET["logout"])){
	//delete the session
		session_destroy();
		
		header("Location: login.php"); 
	}


	

	

?>

<h2> Welcome <?php echo $_SESSION["name"]." ".$_SESSION["name2"];?> (<?=$_SESSION["user_id"];?>) </h2>

<a href="?logout=1" >Log out</a>





<h1></h1>
<form>

	<?php createUserInterestList(); ?>
	<input type="submit" name="select_interest" value="Select">
	
</form>