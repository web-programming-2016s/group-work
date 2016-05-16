﻿
<?php

			require_once("../../config.php");


				$dataExists = false;
				if ($_SERVER["REQUEST_METHOD"] == "POST"){
					$Name = $_POST["Name"];
					$Last_Name = $_POST["Last_Name"];
					$date = $_POST["date"];
					$genre = $_POST["genre"];
					$description = $_POST["description"];
						
					if($Name && $Last_Name && $date && $genre){
						$dataExists = true;
						$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_shikter");
						
						$stmt = $mysql->prepare("INSERT INTO Reservation(Name, Last_Name, reserv_date, label_genre, description) VALUES(?,?,?,?,?)");
						
						//echo error
						echo $mysql->error;
						
						// for each question mark its type with one letter
						$stmt->bind_param("sssss", $_POST["Name"], $_POST["Last_Name"], $_POST["date"], $_POST["genre"], $_POST["description"]);
						
						//save
						if($stmt->execute()){

							echo "saved sucessfully";
							//header('Location: app_reservation.php?ord=Saved sucessfully');
							
						}else{
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
		<section id="application_reservation">
		
	<?php
		if($dataExists){
			
			$date = date_format( date_create($date) , "d.m.Y");
			echo 
			

			"<div class='alert alert-success' role='alert'>
				<br>First Name: $Name
				<br>Last Name: $Last_Name
				<br>Date: $date
				<br>Type of shooting: $genre
				<br>Description: $description
				
				<br>saved sucessfully
			</div>";

		}
	
	?>

	<h2>Reservation form:</h2>
	
	
<?php 			
	/*if(isset($_GET["ord"]) && $_GET["ord"] != ""){

		echo "<span style='color: red;'>".$_GET["ord"]."</span>";
	}*/
?>
	
	
		<div id="errors" style="color: red;"></div>
			<div class="row">
				<form class="col-md-3 col-sm-6" id="dataForm" method="post" onsubmit="return validate();" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			</div>
				<br>
				
		<table border="0">
			<tr>
				<td>
					<p />Firt Name<span style="color: red;">*</span>:
				</td>
				
				<td>
					<div class="row">
						<div class="form-group">
							<!--<div class="col-md-1 col-sm-4">-->
								<input type="text" name="Name" id="Name" class="form-control" style="width: 300px;" placeholder="First Name">
							<!--</div>-->
						</div>
					</div>
				</td>
			</tr>
			
			<tr>
				<td>
					<!-- <div class="form-group"> -->
						<p />Last Name<span style="color: red;">*</span>: 
					<!-- </div> -->
				</td>
				
				<td>
					<div class="row">
						<div class="form-group">
							<!-- <div class="col-md-1 col-sm-4"> -->
								<input type="text"  name="Last_Name" id="Last_Name" class="form-control" style="width: 300px;" placeholder="Last Name">
							<!-- </div> -->
						</div>
					</div>
				</td>
			</tr>
			
			<tr>
				<td>
					<!-- <div class="form-group"> -->
						<p /><span title="Issue date">Issue date<span style="color: red;">*</span>: </span>
					<!-- </div> -->
				</td>
				
				<td>
					<div class="row">
						<div class="form-group">
							<!-- <div class="col-md-1 col-sm-4"> -->
								<input type="text" name="date" id="datepicker" size="30" class="form-control datepicker" style="width: 300px;" placeholder="31.12.2016">
							<!-- </div> -->
						</div>
					</div>
				</td>
			</tr>
			
			<tr>
				<td>
					<!-- <div class="form-group"> -->
						<p />What kind of movie<span style="color: red;">*</span>: 			
					<!-- </div> -->
				</td>
				
				<td>
					<div class="row">
						<div class="list-group">
							<!-- <div class="col-md-1 col-sm-4"> -->
								<select id="genre" name="genre" class="list-group-item" style="width: 300px;" placeholder="Genre">
									<!-- <option value="notselected">Pick a category:</option>  NOT WORKING > without IF and ELSE. -->
									<option></option>
									<option>Clip movie</option>
									<option>Advertisement</option>
									<option>TV production (procedural, broadcasting...)</option>
									<option>Home movie (travel, wedding...)</option>
									<option>Documentary</option>
									<option>Short movie</option>
									<option>Feature film</option>
									<option>Silent film</option>
									<option>Blue movie (+18)</option>
									<option>Animation</option>
									<option>Other</option>
								</select>
							</div>
						</div>
					</div>		
				</td>
			</tr>
		
			<tr>
				<td>
					<!-- <div class="form-group"> -->
						<p />Description:
					<!-- </div> -->
				</td>

				<td>
					<div class="row">
						<div class="form-group">
							<!-- <div class="col-md-1 col-sm-4"> -->
								<textarea name="description" type="text" class="form-control" style="width: 300px; height: 120px;"></textarea>
							<!-- </div> -->
						</div>
					</div>
				</td>
			</tr>
			
			<tr>
				<td width="185">
				&nbsp;
				</td>
				
				<td>	
					<br>	
						<div class="row">
							<div class="form-group">
								<!-- <div class="col-md-1 col-sm-4"> -->
									<!-- btn-lg   visible-xs-inline  hidden-xs-->
									<input class="btn btn-primary hidden-xs" type="submit" value="Make a reservation">
									<input class="btn btn-primary btn-block visible-xs-inline" type="submit" value="Make a reservation">
								<!-- </div> -->
							</div>
						</div>
				</td>
			</tr>
			
			
			
			
		</table>	
	</form>


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