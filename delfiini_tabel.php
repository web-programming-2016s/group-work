<?php require_once("header.php"); ?>
<?php 

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
 
	// require another php file
	// ../../../ => 3 folders back
	require_once("../../config.php");

	$everything_was_okay = true;

 
	
	
	
		
		
	//SAVE TO DB
	// ? was everything okay
	if($everything_was_okay == true){
		

	
		
		
		//connection with username and password
		//access username from config
		//echo $db_username;
		
		// 1 servername
		// 2 username
		// 3 password
		// 4 database
		$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_karoliinar");
		
		$stmt = $mysql->prepare("INSERT INTO delfiini_tabel (Dolphin, User ) VALUES (?,?)");
			
		//echo error
		echo $mysql->error;
		
		// we are replacing question marks with values
		// s - string, date or smth that is based on characters and numbers
		// i - integer, number
		// d - decimal, float
		
		//for each question mark its type with one letter
		$stmt->bind_param("si", $_GET["Dolphin"], $_SESSION["user_id"]);
		
		//save
		if($stmt->execute()){
			
		}else{
			//echo $stmt->error;
		}
		
		
	}
	

	//delfiini_tabel.php
	
	//getting our config
	
 
 	//creat connection
 	$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_karoliinar");
 	
 	/*
		IF THERE IS ?DELETE=ROW_ID in the url
	*/
	if(isset($_GET["delete"])){
		
		
		
		// NOW() = current date-time
		$stmt = $mysql->prepare("UPDATE delfiini_tabel SET deleted=NOW() WHERE id = ?");
		
		echo $mysql->error;
		
		//replace the ?
		$stmt->bind_param("i", $_GET["delete"]);
		
		if($stmt->execute()){
		
		}else{
			echo $stmt->error;
		}
		
		//closes the statement, so others can use connection
		$stmt->close();
		
	}
 	
 	
 	
 	
 	
 	
 	//SQL sentence
 	$stmt = $mysql->prepare("SELECT ID, Dolphin, Date, User FROM delfiini_tabel WHERE deleted IS NULL ");
 	
 	//if error is sentence
 	echo $mysql->error;
 	
 	//variables for data for each row we will get
 	$stmt->bind_result($ID, $Dolphin, $Date, $User);
 	
 	//query
 	$stmt->execute();
 	
 	$table_html = "";
 	
 	//add smth to string .=
 	$table_html .= "<table class='table table-striped'>";
 		$table_html .= "<tr>";
 			$table_html .= "<th>ID</th>";
 			$table_html .= "<th>Dolphin</th>";
 			$table_html .= "<th>Date</th>";
 			$table_html .= "<th>User</th>";
 			$table_html .= "<th></th>";
 	 	$table_html .= "</tr>";
 	
 	//GET RESULT
 	//we have multiple rows
 	while($stmt->fetch()){
 	
		//DO SOMETHING FOR EACH ROW
		//echo $id." ".$message."<br>";
		$table_html .= "<tr>"; //start a new row
 			$table_html .= "<td>".$ID."</td>"; //add columns
 			$table_html .= "<td>".$Dolphin."</td>";
 			$table_html .= "<td>".$Date."</td>";
 			$table_html .= "<td>".$User."</td>";
 			$table_html .= "<td><a class='btn btn-danger' href='?delete=".$ID."'>X</a></td>";
 	 	$table_html .= "</tr>"; //End row
			
	}
	$table_html .= "</table>";
	
		
?>


<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="#">Brand</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		
		  <ul class="nav navbar-nav">
			
			<li>
				<a href="app.php">
					App page
				</a>
			</li>
			
			
			<li class="active" >
				<a href="mytable.php">
					Table
				</a>
			</li>
			
		  </ul> 
		  
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">
	
		<h2> Welcome <?php echo $_SESSION["name"];?> </h2>
	<?php	
	
		//we need function for dealing with session
	require_once("functions.php");

	if(isset($_GET["delete"])){
	echo "Deleting row with id: ".$_GET["delete"];
	}

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


		<h1> Add your dolphin</h1>
		
		<form>
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="form-group">
					
						<label for="Dolphin">Dolphins name: </label>
						<select name="Dolphin" id="color">
					<option value="Jax"> Jax </option>
					<option value="Luna"> Luna </option>
					<option value="Summer"> Summer </option>
					</select>
					</div>
				</div>
			</div>
			
			
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<input class="btn btn-primary hidden-xs"  type="submit" value="Save">
				</div>
			</div>
		
		</form>
		

		<h1> History </h1>

		<?php echo $table_html; ?>
			<a href="?logout=1" >Log out</a><br>
			
			
  
	</div>







  </body>
</html>

