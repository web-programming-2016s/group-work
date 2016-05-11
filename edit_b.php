
<?php require_once ("header.php"); ?>


<?php
	// require another php file
	// ../../ => 2 folders back - navigating to where the config file it
	require_once ("../../config.php");
	
	//the variable doesn't exist in the URL
	if(!isset($_GET["edit"])){
			$notice="";
		//redirect user
		echo "redirect";
		header("Location: table_b.php");
		exit (); //don't execute further
		
	}else{
		
		$notice = "User wants to edit row:".$_GET["edit"];
		
		//ask for latest data for single row
		$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_islam");
		
		//may be user wantes to update data after clicking the button 
		
		if(isset($_GET["challengee"]) && isset ($_GET["motion"])){
			
			echo "User modified data, trying to save";
			
			// should be validation?
			
			$stmt = $mysql->prepare("UPDATE debattle_request SET challengee=?, motion=?, position=?, visibility=?, start_date=?, end_date=?, favcolor=?, characters=? WHERE id=?");
			
			echo $mysql->error;
			
			$stmt->bind_param("sssssssii", $_GET["challengee"], $_GET["motion"], $_GET["position"], $_GET["visibility"], $_GET["start_date"], $_GET["end_date"], $_GET["favcolor"], $_GET["characters"], $_GET["edit"]);
			
			if($stmt->execute()){
				
				
				echo "Saved successfully";
				
				//option one
				
				//header ("Location: table.php");
				//exit ();
				
				//option two - update variables
				
				$challengee = $_GET["challengee"];
				$motion = $_GET["motion"];
				$position = $_GET["position"];
				$visibility = $_GET["visibility"];
				$start_date = $_GET["start_date"];
				$end_date = $_GET["end_date"];
				$favcolor = $_GET["favcolor"];
				$characters = $_GET["characters"];
				$id = $_GET["edit"];
				
				header("Location: table_b.php");
				
			}else{
				
				echo $stmt->error;
			}
			
		}else{
			
			//user did not click any buttons yet,
			//give user latest data from database
			
		$stmt = $mysql->prepare("SELECT id, challengee, motion, position, visibility, start_date, end_date, favcolor, characters FROM debattle_request WHERE id=?");
		
		echo $mysql->error;
		
		//replace the ? mark   id = integer
		$stmt->bind_param("i", $_GET["edit"]);
		
		//bind result data
		$stmt->bind_result($id, $challengee, $motion, $position, $visibility, $start_date, $end_date, $favcolor, $characters);
		
		$stmt->execute();
		
		//we have only 1 row of data
		
		if($stmt->fetch()){
			$data="";
			//we had data
			$data= $challengee." ".$motion." ".$position." ".$visibility." ".$start_date." ".$end_date." ".$favcolor." ".$characters;
			
		}else{
			
			//something went wrong
			echo $stmt->error;
			
		}
		
		}
		
	}
	
?>

<?php
	
	//we need functions file for dealing with session
	require_once("functions.php");
	
		//Restriction -  logged in
	if(!isset($_SESSION["user_id"])){
		//redirect not logged in user to login page
		header("Location: login.php");
	}
	
	//?logout is in the URL
	if(isset($_GET["logout"])){
		
		//delete the session
		session_destroy();
		
		header("Location: login.php");
	}
	
?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Debattle</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="Debattle_b.php">Request</a></li>
		<li class="active"><a href="table_b.php"> Sent</a></li>
		<li><a href="received_b.php"> Received</a></li>
		<li> <a href="users.php"> Users</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
        <li><a >Welcome <?=$_SESSION["first_name"];?></a></li>
		<li> <a href="?logout=1"> Log Out</a></li>
          </ul>
    
	
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

	<div class="container">
	
		<h1> Edit your Debattle </h1>
		<h3> Everything is Challengeable </h3>
		<br>
		<?=$notice;?> <?=$data;?>
		<form>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
					<label for="challengee">User to Challenge</label>
					<input name="edit" type="hidden" value="<?=$_GET["edit"];?>">
					<input name="challengee" id="challengee" placeholder="@" type="text" value="<?=$challengee;?>" class="form-control">
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
					<label for="motion">Motion</label>
					<input name="motion" id="motion" type="text" value="<?=$motion;?>" class="form-control">
					</div>
				</div>		
			</div>
			
			<div class="row">
				<div class="col-md-3">
				<label for="position">Position</label>
				
					<?php if($position == "Pro"): ?>
					
						<div class="radio">
						<label><input type="radio" id="position" value="Pro" name="position" checked> Pro </label>
						</div>
						
						<div class="radio">
						<label><input type="radio" id="position" value="Against" name="position"> Against  </label>
						</div>
						
					<?php else: ?>
					
						<div class="radio">
						<label><input type="radio" id="position" value="Pro" name="position"> Pro </label>
						</div>
						
						<div class="radio">
						<label><input type="radio" id="position" value="Against" name="position" checked> Against  </label>
						</div>

					<?php endif; ?>
				
				</div>			
			</div>
			<br>
			<div class="row">
				<div class="col-md-3">
				<label for="visibility">Visibility</label>
				
					<?php if($visibility == "Open"): ?>
					
						<div class="radio">
						<label><input type="radio" id="visibility" value="Open" name="visibility" checked> Open </label>
						</div>
						
						<div class="radio">
						<label><input type="radio" id="visibility" value="Closed" name="visibility"> Closed  </label>
						</div>
						
					<?php else: ?>
					
						<div class="radio">
						<label><input type="radio" id="visibility" value="Open" name="visibility"> Open </label>
						</div>
						
						<div class="radio">
						<label><input type="radio" id="visibility" value="Closed" name="visibility" checked> Closed  </label>
						</div>

					<?php endif; ?>
				</div>			
			</div>
			<br>
			<div class="row">
				<div class="col-md-3">
				<label for="bday">Start Date</label>
				
					<div class="date">
					<input type="date" class="form-control" name="start_date" id="start_date" value="<?= $start_date;?>"> 
					</div>
				</div>	
			</div>
			<br>
			<div class="row">
			<div class="col-md-3">
			<label for="bday2">End Date</label>
				
					<div class="date">
					<input type="date" class="form-control" name="end_date" id="end_date" value="<?= $end_date;?>"> 
					</div>
			</div>			
			</div>
			<br>
			<div class="row">
			<div class="col-md-3">
			<label for="colour">Choose your favourite colour</label>
				
					<div class="color">
					<input type="color" class="form-control" name="favcolor" id="favcolor" value="<?= $favcolor;?>"> 
					</div>	
				</div>		
			</div>
			<br>
				
			<div class="row">
			<div class="col-md-3">
					<div class="form-group">
					<label for="characters">Set the number of characters</label>
					<input type="number" class="form-control" name="characters" value="<?= $characters;?>" min="1" max="300" class="form-control">
					</div>
				</div>			
			</div>

			<div class="row">
				<div class="col-md-3 col-sm-6">
					<input class="btn btn-success hidden-xs" type="submit" value="Save your Challenge">
					<input class="btn btn-success btn-block visible-xs-block" type="submit" value="Save your Challenge Now">
				</div>
			</div>
<br>
			<div class="row">
		
			</div>
			
		</form>




  </body>
</html>