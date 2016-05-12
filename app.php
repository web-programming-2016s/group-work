<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>web programming course</title>
<link rel="stylesheet" type="text/css" href="puppies.css">

<?php require_once("config.php"); ?>
<?php



	/***********************
	**** SAVE TO DB ********
	***********************/
	
	// ? was everything okay
	 $everything_was_okay = true;
	

	//check if there is variable in the URL
	if (isset ($_GET ["image1"])) {
		
		//only if there is message in the URL
		//echo "there is message";
		
		//if its empty
		if (empty($_GET ["image1"])){
			//it is empty
			echo " Please insert number of puppies seen on image 1! ";
			$everything_was_okay = false;
		}else{
			//its not empty
			echo "image1: ".$_GET["image1"]."<br>";
		}
		
	}else{
		//echo "there is no such thing as message";
		$everything_was_okay = false;
	}
	
	//check if there is variable in the URL
	if (isset ($_GET ["image2"])) {
		
		//only if there is message in the URL
		//echo "there is message";
		
		//if its empty
		if (empty($_GET ["image2"])){
			//it is empty
			echo " Please insert number of puppies seen on image 2! ";
			$everything_was_okay = false;
		}else{
			//its not empty
			echo "image2: ".$_GET["image2"]."<br>";
		}
		
	}else{
		//echo "there is no such thing as message";
		$everything_was_okay = false;
	}
		//check if there is variable in the URL
	if (isset ($_GET ["image3"])) {
		
		//only if there is message in the URL
		//echo "there is message";
		
		//if its empty
		if (empty($_GET ["image3"])){
			//it is empty
			echo " Please insert number of puppies seen on image 3 ";
			$everything_was_okay = false;
		}else{
			//its not empty
			echo "image3: ".$_GET["image3"]."<br>";
		}
		
	}else{

	//echo "there is no such thing as message";
	$everything_was_okay = false;
	}
		//check if there is variable in the URL
	if (isset ($_GET ["image4"])) {
		
		//only if there is message in the URL
		//echo "there is message";
		
		//if its empty
		if (empty($_GET ["image4"])){
			//it is empty
			echo " Please insert number of puppies seen on image 4 ";
			$everything_was_okay = false;
		}else{
			//its not empty
			echo "image4: ".$_GET["image4"]."<br>";
		}
		
	}else{
		//echo "there is no such thing as message";
		$everything_was_okay = false;
	}
	
	//Getting the message from the address
	// if there is ?name= .. then $_GET ["name"]
	//$my_message = $_GET["message"];
	//$to = $_GET ["to"];
	//$from = $_GET ["from"];
	
	//echo "My message is ".$my_message." and is to ".$to. " and is from " .$from;
	
	if($everything_was_okay == true){
		
		echo "Saving to database ... ";
		
		
		//connection with username and password
		//access username from config
		//echo $db_username;
		
		// 1 servername
		// 2 username
		// 3 password
		// 4 database
		$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_tonyhaav");
		
		$stmt = $mysql->prepare("INSERT INTO puppy_table (image1, image2, image3, image4) VALUES (?,?,?,?)");
			
		//echo error
		echo $mysql->error;
		
		// we are replacing question marks with values
		// s - string, date or smth that is based on characters and numbers
		// i - integer, number
		// d - decimal, float
		
		//for each question mark its type with one letter
		$stmt->bind_param("ssss", $_GET["image1"], $_GET["image2"], $_GET["image3"], $_GET["image4"]);
		
		//save
		if($stmt->execute()){
			echo "saved sucessfully";
		}else{
			echo $stmt->error;
		}
		
		
	}
	
	$sum = $_GET["image1"]+$_GET["image2"]+$_GET["image3"]+$_GET["image4"];
	

	
	
?>
<a href="table.php">table</a>
<h2> PUPPY CALCULATOR </h2>

		<IMG SRC="https://uberfacts.files.wordpress.com/2012/12/puppies-9.jpg" ALT="image one" WIDTH=250 HEIGHT=250" STYLE="position:relative; TOP:40px; LEFT:360px;">
			<IMG 
			<br>
			<IMG SRC="http://creative.colorado.edu/~jupi6624/dm1/puppies.jpg" ALT="image two" WIDTH=250 HEIGHT=250" STYLE="position:relative; TOP:40px; LEFT:370px;">
			<IMG 
			<br>
			<IMG SRC="http://pethealthsupplements.com.au/wp-content/uploads/2015/06/tumblr_static_mom-dog-with-puppies.jpg" ALT="image three" WIDTH=250 HEIGHT=250" STYLE="position:relative; TOP:40px; LEFT:380px;">
			<IMG 
			<br>
			<IMG SRC="http://www.liveanimals.tv/wp-content/uploads/2014/03/golden-retriever-puppy-webcam.jpg" ALT="image four" WIDTH=250 HEIGHT=250" STYLE="position:relative; TOP:40px; LEFT:390px;">
			<IMG 250
			<br>
	
	
 

<form><br>

<form method="get">

	<label for="image1">IMAGE 1:* <label>
	<input type="text" name="image1"><br>

	<label for="image2">IMAGE 2:* <label>
	<input type="text" name="image2"><br>

	
	<label for="image3">IMAGE 3:* <label>
	<input type="text" name="image3"><br>

	<label for="image4">IMAGE 4:* <label>
	<input type="text" name="image4"><br>
	
		
	<!-- This is the save buttn-->
	<input type="Submit" value="START THE PUPPY CALCULATOR">
	
	
<form>
<h2> Number of Puppies </h2>

<?php
echo "<h4>$sum </h4> ";
echo "<br>";
	echo "<br>";
	
	echo "<br>";
?>
<h3> Congratulations </h3> 
<p> my idea is a puppy calculator

i am going to have pictures in a row. 
i am going to force the viewer to put the number of the puppies he/she sees in the pictures
then once the number of puppies is visible we can calculate is using simple numbers.