<?php require_once("header.php"); ?>
<?php
	//SELECT `Dolphin`, COUNT(*) FROM `homework` WHERE `Dolphin` != '' GROUP BY `Dolphin` 	
	//getting our config
	require_once("../../config.php");
	
	
 
 	//creat connection
 	$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_karoliinar");
 	
		
		
 	
 	
 	
 	//SQL sentence
 	$stmt = $mysql->prepare("SELECT Dolphin, COUNT(*) FROM homework WHERE Dolphin != '' GROUP BY Dolphin");
 	
 	//if error is sentence
 	echo $mysql->error;
 	
 	//variables for data for each row we will get
 	$stmt->bind_result($Dolphin, $COUNT);
 	
 	//query
 	$stmt->execute();
 	
 	$table_html = "";
 	
 	//add smth to string .=
 	$table_html .= "<table class='table table-striped'>";
 		$table_html .= "<tr>";
 			$table_html .= "<th>Dolphin</th>";
 			$table_html .= "<th>COUNT</th>";
 	 	$table_html .= "</tr>";
 	
 	//GET RESULT
 	//we have multiple rows
 	while($stmt->fetch()){
 	
		//DO SOMETHING FOR EACH ROW
		//echo $id." ".$message."<br>";
		$table_html .= "<tr>"; //start a new row
 			$table_html .= "<td>".$Dolphin."</td>"; 
 			$table_html .= "<td>".$COUNT."</td>";
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

		<h1> Inserted dolphin features </h1>

		<?php echo $table_html; 
		
		?>
  
	</div>







  </body>
</html>
