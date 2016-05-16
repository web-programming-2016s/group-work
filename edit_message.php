﻿<?php

	//require another php file
	// ../../../ means > 3 folders back
	require_once("../../config.php");
	
	//the variable does not exists in the URL
	if(!isset($_GET["edit"])){
		
		//redirect user
		echo "redirect";
		
		header("Location: tables.php");
		exit(); //don't execute further
		
	}else{
		echo "<h4>"."> <strong>You want to edit row: "."<span style='color: red;'>".$_GET["edit"]."</span></strong>"."</h4>" ;
		
		//ask for latest data for single row
		$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_shikter");
		
		// maybe user wants to update data after clicking the button
		//echo $_GET["who"];
		if(isset($_GET["who"]) && isset($_GET["message"]) && isset($_GET["from_who"])){
			
			echo "<br>User modified data...";
			
			//should be validation
			
			$stmt = $mysql->prepare("UPDATE messages_sample SET recipient=?, message=?, sender=? WHERE id=?");
			
			echo $mysql->error;
			
			$stmt->bind_param("sssi", $_GET["who"], $_GET["message"], $_GET["from_who"], $_GET["edit"]);
			
			if($stmt->execute()){
				
				echo "<br><h4><strong><span style='color:red'>Saved successfully</span></strong></h4>";
				
				// option one - redirect:
				
				//header("Location: tables.php");
				//exit();
				
				// option two - update variables:
				
				echo "<br><strong><span style='color:green'>Changed to:</span></strong><br>";
				
				
				echo "<br><strong>Name of recipient: </strong>".$recipient = $_GET["who"];
				echo "<br><strong>Message: </strong>".$message = $_GET["message"];
				echo "<br><strong>Sender name: </strong>".$sender = $_GET["from_who"];
				$id = $_GET["edit"];
				
				echo "<br>"."-------------------------------------";
				echo "<br> Go back to <a href='tables.php'>Tables Page</a>";
				
				
				/*
				echo 
			
				'<div>
				
				<br><strong>Name of recipient: </strong> <span style="color: red;">.$recipient = $_GET["who"].</span>
				<br><strong>Message: </strong> <span style="color: red;">.$message = $_GET["message"].</span>
				<br><strong>Sender name: </strong> <span style="color: red;">.$sender = $_GET["from_who"].</span>
				<br>USER ID: $id = $_GET["edit"].
				
				</div>
				<br>
				';
				*/
				
			}else{
				
				echo $stmt->error;
			}
			
			
		}else{
			
					//user did not click any buttons yet,
					//give user latest data from db
					
					$stmt = $mysql->prepare("SELECT id, recipient, message, sender, created FROM messages_sample WHERE id=?");
				
				echo $mysql->error;
				
				//replace the ? mark
				$stmt->bind_param("i", $_GET["edit"]);
				
				//bind result data
				$stmt->bind_result($id, $recipient, $message, $sender, $created);
				
				$stmt->execute();
				//we have only 1 row of data
				if($stmt->fetch()){
					
					//we had data
					echo "<h4>"."> <i>Filled field:</i> | "."<strong>".$recipient." ; ".$message." ; ".$sender."</strong>"." | <i>which was created:</i> "."<strong>".$created."</strong>"."</h4>";
					
				}else{
					
					//smth went wrong
					echo $stmt->error;
				}
		
			}
		
		
	}
?>

<?php require_once("header.php");?>


<?php
	$current_time_with_fix = time() + (10 * 60 + 58);
		echo "<p />Today is " .date('l, jS \of F Y - H:i:s', $current_time_with_fix);
					   //.date("d.m.Y H:i:s");

?>

<div class="container">
<section id="application_message">
	
	
		<h2>Form to send message:</h2>
		<br>
		
				<form method="get">
				<ul STYLE="list-style-image: url(http://www.tlu.ee/~shikter/ristmed2/images/bullet/tlu_bullet.png)">
				<!-- ../../../imgages/tlu_bullet.png -->

				
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="form-group">
								<input hidden name="edit" value="<?=$id;?>"><br><br> 
								
								<li><label for="who">Name of recipient<span style="color: red;">*</span>: </label></li>
								<input name="who" id="who" type="text" class="form-control" value="<?=$recipient;?>">
								
								
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-3 col-sm-6">
								<li><label for="message">Message<span style="color: red;">*</span>: </label></li>
								<input name="message" id="message" type="text" class="form-control" style="height: 75px;" valign="top" value="<?=$message;?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-6">
								<div class="form-group">
									<li><label for="from_who">Your name<span style="color: red;">*</span>: </label></li>
									<input name="from_who" id="from_who" type="text" class="form-control" value="<?=$sender;?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-6">
						<!-- btn-lg   visible-xs-inline  hidden-xs-->
							<input class="btn btn-primary hidden-xs" type="submit" value="E d i t">
							<input class="btn btn-primary btn-block visible-xs-inline" type="submit" value="E d i t">
							
						</div>
					</div>
				</ul>
				</form>
	
			</div>
	
	<br>
	
			<hr />
		
	</section>
</div>


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