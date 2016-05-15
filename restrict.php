
<?php

//we need functions for dealing with session

require_once("functions.php");



	//RESTRICTION - LOGGED IN
	if(!isset($_SESSION["user_id"])){
		//redirect not logged in user to login page
		header("Location: homepage.php");
		
	}
	
	
	//?logout is in the URL
	if(isset($_GET["logout"])){
		session_destroy();
		
		header("Location: homepage.php");
	}

	
	//someone clicked the button "add"
	if(isset($_POST["add_new_interest"])){
		
		if(!empty($_POST["new_interest"])){
			
			saveInterest($_POST["new_interest"]);
			
		}else{
			echo "You left the interest field empty";
		}
	}
	
	
		//someone clicked the button "Select"
	if(isset($_GET["select_interest"])){
		
		if(!empty($_GET["user_interest"])){
			
			saveUserInterest($_GET["user_interest"]);
			
		}else{
			echo "Error";
		}
	}

?>

<link rel="stylesheet" type="text/css" href="style.css">

<video autoplay id="bgvid" loop>
  <source src="https://dl.dropboxusercontent.com/u/3465596/loops/loop.mp4" type="video/mp4">
  <!-- 
  <source src="https://dl.dropboxusercontent.com/u/3465596/loops/loop.ogg" type="video/ogg">
  <source src="https://dl.dropboxusercontent.com/u/3465596/loops/loop.webm" type="video/webm">
  -->
</video>

<style>
.btn{
  margin:0px center;
  display: inline-block;
  padding: 3px 25px;
  font-size: 20px;
}
</style>

	<div class="container">
	
		<section id="Welcome">
			
			<table align="center" border="0">
				<form>
					<tr>
						<td width="225" align="center">
							<h2> <strong><?=$_SESSION["username"];?></strong> </h2>
						</td>
						
						<td width="225" align="center">
							<h2> <strong><?=$_SESSION["First_Name"];?> <?=$_SESSION["Last_Name"];?></strong> </h2>
						</td>
						
						<td width="185" align="center">
							<!-- <h3><a href="#" >Edit Profile</a></h3> -->
							<h3><a class='btn btn-info' href="#">Edit Profile</a></h3>
						</td>
					</tr>
					<tr>
						<td width="225" align="center">
							&nbsp;
						</td>
						
						<td width="225" align="center">
							<h3> User ID: (<?=$_SESSION["user_id"];?>) </h3>
						</td>
						
						<td width="185" align="center">
							<!-- <h2><a href="?logout=1" >Log Out</a></h2> -->
							<h2><a class='btn btn-danger' href="?logout=1">Log Out</a></h2>
						</td>
					</tr>
				</form>
				<br>
			</table>
				
		</section>

			
		<section id="Add_interests">
		
			<h2>Add new interest</h2>
				<form method="POST">
			
					<input type="text" name="new_interest">
					<input type="submit" name="add_new_interest" value="Add">
			
				</form>
			
			<h2>Select user interests</h2>
				<form>
					<?php createInterestDropdown(); ?>
					<input type="submit" name="select_interest" value="Select">
				</form>
		</section>
	
		<br>
	
		<section id="User_interests">
			<h1>Your Interests:</h1>
	
				<?php createUserInterestList(); ?>
	
		</section>
		
	</div>