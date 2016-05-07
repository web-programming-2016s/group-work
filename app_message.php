<?php require_once("header.php");?>

<?php

	//require another php file
	// ../../../ means > 3 folders back
	require_once("../../config.php");
	
	$everything_was_okay = true;

	//********************
	//To field validation
	//********************
	
// -------------------------------------------------------------------

	if(isset($_GET["who"])){ 
		//only if there is message in the URL
		//echo "there is message";
		
		//if its empty
		if(empty ($_GET["who"])){
			//its empty
			$everything_was_okay = false;
			echo "<span style='color: red;'>Please enter the name to who you address </span><br>"; 
		}else{
			//its not empty
			echo "To: ".$_GET["who"]."<br>";
		}
	}else{
		//echo "there is no such thing as message";
		$everything_was_okay = false;
		
	}	
// -------------------------------------------------------------------
	
		if(isset($_GET["message"])){
		
		//if its empty
		if(empty ($_GET["message"])){
			//its empty
			$everything_was_okay = false;
			echo "<span style='color: red;'>Please enter the message </span><br>";	
		}else{
			//its not empty
			echo "The message: ".$_GET["message"]."<br>";
		}
	}else{
		//echo "there is no such thing as message";
		$everything_was_okay = false;
	}
	
// -------------------------------------------------------------------

		if(isset($_GET["from_who"])){
		//if its empty
		if(empty ($_GET["from_who"])){
			//its empty
		$everything_was_okay = false;
			echo "<span style='color: red;'>Please type your name </span><br>";
		}else{
			//its not empty
			echo "From: ".$_GET["from_who"]."<br>";
		}
	}else{
		//echo "there is no such thing as message";
		$everything_was_okay = false;
	}
	
// -------------------------------------------------------------------

	
	/****************************
	*********SAVE TO DB**********
	*****************************/

	// ? was everthing okay
	
	if($everything_was_okay == true){
		
		echo "<br>Sent to database ... ";
		
		
		/**	connection with the username and password
			access username from config
		
			echo $db_username;
		
		1 servername	2 username	3 password	4 database	**/
		
		$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_shikter");
		$stmt = $mysql->prepare("INSERT INTO messages_sample(recipient, message, sender) VALUES(?,?,?)");
		
		echo $mysql->error;
		
		// we are replacing question marks with values
		// s -string, date or smth that is based on characters and numbers.
		// i - integer, number
		// d - decimal, floatval
		
		// for each question mark its type with one letter
		$stmt->bind_param("sss", $_GET["who"], $_GET["message"], $_GET["from_who"]);
		
		//save
		if($stmt->execute()){
			echo "<span style='color: red;'>saved sucessfully</span>";
			//$_SESSION["msg"] = "<span style='color: red;'>saved sucessfully</span>";
			
			//header('Location: app_message.php?msg=Saved sucessfully');
			
		}else{
			echo $stmt->error;
		}
		
	}
?>


<?php
	$current_time_with_fix = time() + (10 * 60 + 58);
		echo "<p />Today is " .date('l, jS \of F Y - H:i:s', $current_time_with_fix);
					   //.date("d.m.Y H:i:s");

?>

<div class="container">
<section id="application_message">
	
	
		<h2>Form to send message:</h2>
		
<?php 	
//var_dump($_SESSION);
		
	//if(isset($_GET["msg"]) && $_GET["msg"] != ""){

		//echo "<span style='color: red;'>".$_GET["msg"]."</span>";
		
?>
		<br>
		
				<form method="get">
				<ul STYLE="list-style-image: url(http://www.tlu.ee/~shikter/ristmed2/images/bullet/tlu_bullet.png)">
				<!-- ../../../imgages/tlu_bullet.png -->

				
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="form-group">
								<li><label for="who">Name of recipient<span style="color: red;">*</span>: </label></li>
								<input name="who" id="who" type="text" class="form-control">
								
								
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-3 col-sm-6">
								<li><label for="message">Message<span style="color: red;">*</span>: </label></li>
								<textarea name="message" id="message" class="form-control" style="height: 75px; width: 100%;" valign="top"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-6">
								<div class="form-group">
									<li><label for="from_who">Your name<span style="color: red;">*</span>: </label></li>
									<input name="from_who" id="from_who" type="text" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-6">
						<!-- btn-lg   visible-xs-inline  hidden-xs-->
							<input class="btn btn-primary hidden-xs" type="submit" value="Submit">
							<input class="btn btn-primary btn-block visible-xs-inline" type="submit" value="Submit">
							
						</div>
					</div>
				</ul>
				</form>
	
			</div>
	

	
		<br>
		
	</section>
</div>

<hr />

	<div class="container">
		<section id="CopyRights">

			<br>
			<dl class="dl-horizontal">
				<dt>Beta Version 2.0</dt>
				<dd>© Vadim Kozlov and Dmitri Kabluchko</dd>
				<dt>Directory:</dt>
				<dd><div class="bkt"><a href="http://localhost:5555/~shikter/web/groupwork/" target="_blank">Web Folders</a></div>
			</dl>
			<br>

		</section>
	</div>

	</body>
</html>