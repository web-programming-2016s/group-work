<?php require_once("header.php"); ?>
<?php
	//table.php
	
	//getting our config
	require_once("../../config.php");
 
 	//creat connection
 	$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_karoliinar");
 	
 	/*
		IF THERE IS ?DELETE=ROW_ID in the url
	*/

		
		// NOW() = current date-time
		{$stmt = $mysql->prepare("UPDATE homework SET deleted=NOW() WHERE id = ?");
		
		echo $mysql->error;
		
		//replace the ?
		$stmt->bind_param("i", $_GET["delete"]);
		
		if($stmt->execute()){
		//	echo "deleted successfully";
		}else{
			echo $stmt->error;
		}
		
		//closes the statement, so others can use connection
		$stmt->close();
		
	}
 	
 	
 	
 	
 	
 	
 	//SQL sentence
 	$stmt = $mysql->prepare("SELECT id, color, Fin, Tail, Dolphin, created FROM homework WHERE deleted IS NULL ORDER BY created DESC LIMIT 10");
 	
 	//if error is sentence
 	echo $mysql->error;
 	
 	//variables for data for each row we will get
 	$stmt->bind_result($id, $color, $Fin, $Tail, $Dolphin, $created);
 	
 	//query
 	$stmt->execute();
 	
 	$table_html = "";
 	
 	//add smth to string .=
 	$table_html .= "<table class='table table-striped'>";
 		$table_html .= "<tr>";
 			$table_html .= "<th>ID</th>";
 			$table_html .= "<th>Color</th>";
 			$table_html .= "<th>Fin</th>";
 			$table_html .= "<th>Tail</th>";
 			$table_html .= "<th>Dolphin</th>";
 			$table_html .= "<th>Created</th>";
 			$table_html .= "<th></th>";
 	 	$table_html .= "</tr>";
 	
 	//GET RESULT
 	//we have multiple rows
 	while($stmt->fetch()){
 	
		//DO SOMETHING FOR EACH ROW
		//echo $id." ".$message."<br>";
		$table_html .= "<tr>"; //start a new row
 			$table_html .= "<td>".$id."</td>"; //add columns
 			$table_html .= "<td>".$color."</td>";
 			$table_html .= "<td>".$Fin."</td>";
 			$table_html .= "<td>".$Tail."</td>";
 			$table_html .= "<td>".$Dolphin."</td>";
 			$table_html .= "<td>".$created."</td>";
 			$table_html .= "<td>
								<a class='btn btn-danger' href='?delete=".$id."'>X</a>
							</td>";
 	 	$table_html .= "</tr>"; //End row
			
	}
	$table_html .= "</table>";
	
		
?>
<?php
//SQL sentence
 	$stmt = $mysql->prepare("SELECT Dolphin, COUNT(*) FROM homework WHERE Dolphin != '' GROUP BY Dolphin");
 	
 	//if error is sentence
 	echo $mysql->error;
 	
 	//variables for data for each row we will get
 	$stmt->bind_result($Dolphin, $COUNT);
 	
 	//query
 	$stmt->execute();
 	
 	$table2_html = "";
 	
 	//add smth to string .=
 	$table2_html .= "<table class='table table-striped'>";
 		$table2_html .= "<tr>";
 			$table2_html .= "<th>Dolphin</th>";
 			$table2_html .= "<th>COUNT</th>";
 	 	$table2_html .= "</tr>";
 	
 	//GET RESULT
 	//we have multiple rows
 	while($stmt->fetch()){
 	
		//DO SOMETHING FOR EACH ROW
		//echo $id." ".$message."<br>";
		$table2_html .= "<tr>"; //start a new row
 			$table2_html .= "<td>".$Dolphin."</td>"; 
 			$table2_html .= "<td>".$COUNT."</td>";
 	 	$table2_html .= "</tr>"; //End row
			
	}
	$table2_html .= "</table>";
	
		
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

		<h1> Inserted dolphin features </h1>

		<?php echo $table_html; 
		
		if(isset($_GET["delete"])){
		
		echo "Deleting row with id:".$_GET["delete"];}
		?>
		
		<h2> Count table </h2>

		
  <?php  echo $table2_html; ?>

  
	</div>







  </body>
</html>
