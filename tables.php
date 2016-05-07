<?php require_once("header.php");?>

<?php
	$current_time_with_fix = time() + (10 * 60 + 58);
		echo "<p />Today is " .date('l, jS \of F Y - H:i:s', $current_time_with_fix);
					   //.date("d.m.Y H:i:s");

?>
	  

	<style>
		
   table {
	border:1px solid;
    width: 1000px; 		
	border-collapse: collapse;
    margin: auto;		 
   }
   th { 
    text-align: left; 		 /* Выравнивание по левому краю */
    background: #ccc; 		 /* Цвет фона ячеек */
    padding: 5px; 			 /* Поля вокруг содержимого ячеек */
    border: 1px solid black; /* Граница вокруг ячеек */
   }
   td { 
    padding: 5px; 			 /* Поля вокруг содержимого ячеек */
    border: 1px solid black; /* Граница вокруг ячеек */
	text-align: center; 
 
	</style>


	<div class="container">
			<section id="Tables">
			
				<h1>This is the Table page...</h1>
					<p>(You can see only last 10 senders)</p>
						<br>
			
<?php

	//table.php

	//getting our config
	require_once("../../config.php");
	
	//create connection
	$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_shikter");
	
	
	// IF THERE IS ?DELITE=ROW_ID in the url
	
	if(isset($_GET["delete_o"]) && isset($_SESSION["user_id"])){
		
		echo "Deleting row with id:".$_GET["delete_o"];
		echo "<br>";
		
		// NOW() = current date-time
		$stmt = $mysql->prepare("UPDATE messages_sample SET deleted=NOW() WHERE id = ?");
		
		echo $mysql->error;
		
		//replace the ?
		$stmt->bind_param("i", $_GET["delete_o"]);
		
		if($stmt->execute()){
			echo "<span style='color: red;'>deleted successfully</span>";
			echo "<br>";
		}else{
			echo $stmt->error;
		}
		
		//closes the statement, so others can use connection
		$stmt->close();
		
	}
	
	
	//SQL sentens
	$stmt = $mysql->prepare("SELECT id, recipient, message, sender, created FROM messages_sample WHERE deleted IS NULL ORDER BY created DESC LIMIT 10");
	//WHERE deleted is NULL show only those that are not deleted
	
	
	//if error in sentence
	echo $mysql->error;
	
	//variables for data for each row we will get
	$stmt->bind_result($id, $recipient, $message, $sender, $created);

	//query
	$stmt->execute();
	
	$table_html = "";
	
	//add smth to string .=
	$table_html .="<table class='table table-striped'>";
		$table_html .="<tr>";//start new row
		
			$table_html .="<th><center>ID / Row</center></th>";
			$table_html .="<th><center>Recipient</center></th>";
			$table_html .="<th><center>Message</center></th>";
			$table_html .="<th><center>Sender</center></th>";
			$table_html .="<th><center>Created</center></th>";
			if(isset($_SESSION["user_id"])){
				$table_html .="<th><center>Edit</center></th>";
				$table_html .="<th><center>Delete?</center></th>";
			}
			
		
		$table_html .="</tr>"; //end row
	
	// GET RESULT
	// we have multiple rows
	while($stmt->fetch()){
			
			
		// DO SOMETHING FOR EACH ROW
		//echo $id." ".$message."<br>";
		$table_html .="<tr>";//start new row
		
			$table_html .="<td>".$id."</td>";	//add colums
			$table_html .="<td>".$recipient."</td>";
			$table_html .="<td>".$message."</td>";
			$table_html .="<td>".$sender."</td>";
			
			$table_html .="<td>";
			$table_html .=date_format( date_create($created) , "d/m/Y - H:i:s");
			$table_html .="</td>";
			if(isset($_SESSION["user_id"])){
				$table_html .="<td><a class='btn btn-warning' href='edit_message.php?edit=".$id."'>Edit</a></td>";
				$table_html .="<td><a class='btn btn-danger' href='?delete=".$id."'>X</a></td>";
				
			}
			
		$table_html .="</tr>"; //end row
	}
	
	$table_html .="</table>";
	//echo $table_html;
?>
					
		<h3>Table of "Message APP"</h3>
			<?php echo $table_html; ?>
				<br>
					<hr />
				<br>	
					
<?php
					
//---------------------------------------------------------------------------------------------



//SQL sentens
	$stmt2 = $mysql->prepare("SELECT id, Name, Last_Name, reserv_date, label_genre, description, time_created FROM Reservation WHERE deleted IS NULL ORDER BY time_created DESC LIMIT 10");
	
		// IF THERE IS ?DELITE=ROW_ID in the url
	
	if(isset($_GET["delete"])){
		
		echo "Deleting row with id:".$_GET["delete"];
		echo "<br>";
		
		// NOW() = current date-time
		$stmt = $mysql->prepare("UPDATE Reservation SET deleted=NOW() WHERE id = ?");
		
		echo $mysql->error;
		
		//replace the ?
		$stmt->bind_param("i", $_GET["delete"]);
		
		if($stmt->execute()){
			echo "<span style='color: red;'>deleted successfully</span>";
			echo "<br>";
		}else{
			echo $stmt->error;
		}
		
		//closes the statement, so others can use connection
		$stmt->close();
		
	}
	
	
	//if error in sentence
	echo $mysql->error;
	
	//variables for data for each row we will get
	$stmt2->bind_result($id, $Name, $Last_Name, $reserv_date, $label_genre, $description, $time_created);

	//query
	$stmt2->execute();
	
	$table2_html = "";
	
	//add smth to string .=
	$table2_html .="<table class='table table-striped'>";
	
		$table2_html .="<tr>";//start new row
		
			$table2_html .="<th><center>ID</center></th>";
			$table2_html .="<th><center>First Name</center></th>";
			$table2_html .="<th><center>Last Name</center></th>";
			$table2_html .="<th><center>Project date beginning</center></th>";
			$table2_html .="<th><center>Type</center></th>";
			$table2_html .="<th><center>Description</center></th>";
			$table2_html .="<th><center>Created</center></th>";
			if(isset($_SESSION["user_id"])){
			$table2_html .="<th><center>Edit</center></th>";
			$table2_html .="<th><center>Delete?</center></th>";
			}
		
		$table2_html .="</tr>"; //end row
	
	// GET RESULT
	// we have multiple rows
	while($stmt2->fetch()){
			
			
		// DO SOMETHING FOR EACH ROW
		//echo $id." ".$message."<br>";
		$table2_html .="<tr>";//start new row
		
		
			$table2_html .="<td>".$id."</td>";	//add colums
			$table2_html .="<td>".$Name."</td>";
			$table2_html .="<td>".$Last_Name."</td>";
			
			$table2_html .="<td>";
			//echo strtotime($reserv_date);
			//echo date("d m Y", strtotime($reserv_date));
			$table2_html .=date_format( date_create($reserv_date) , "d.m.Y");
			$table2_html .="</td>";
			
			$table2_html .="<td>".$label_genre."</td>";
			$table2_html .="<td>".$description."</td>";
			
			$table2_html .="<td>";
			$table2_html .=date_format( date_create($time_created) , "d/m/Y - H:i:s");
			$table2_html .="</td>";
			
			if(isset($_SESSION["user_id"])){
			$table2_html .="<td><a class='btn btn-warning' href='edit_reservation.php?edit=".$id."'>Edit</a></td>";
			$table2_html .="<td><a class='btn btn-danger' href='?delete_o=".$id."'>X</a></td>";
			}
			
		$table2_html .="</tr>"; //end row
	}
	
	$table2_html .="</table>";
	//echo $table2_html;

?>
					
	<h3>Table of "Order APP"</h3>
		<?php echo $table2_html;?>
		
			
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