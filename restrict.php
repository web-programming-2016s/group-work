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

	if(isset($_GET["add_new_interest"])){
	
		if(!empty($_GET["new_interest"])){
		
			saveInterest($_GET["new_interest"]);
		
		}else{
			echo "You left the interest field empty";
		}
		
	}
	
	if(isset($_GET["select_interest"])){
	
		if(!empty($_GET["user_interest"])){
		
			saveUserInterest($_GET["user_interest"]);
		
		}else{
			echo "You left the interest field empty";
		}
		
	}
	
	

?>

<h2> Welcome <?php echo $_SESSION["name"];?> (<?=$_SESSION["user_id"];?>) </h2>

<a href="?logout=1" >Log out</a>


<h2>Add interest<h2/>
<form>

	<input type="text" name="new_interest">
	<input type="submit" name="add_new_interest" value="Add">
	
</form>


<h2>Select user interest<h2/>
<form>

	<?php createInterestDropdown(); ?>
	<input type="submit" name="select_interest" value="Select">
	
</form>


<h1></h1>
<form>

	<?php createUserInterestList(); ?>
	<input type="submit" name="select_interest" value="Select">
	
</form>