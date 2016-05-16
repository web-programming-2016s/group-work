<?php require_once("header.php");?>

<?php
	$current_time_with_fix = time() + (10 * 60 + 58);
		echo "<p />Today is " .date('l, jS \of F Y - H:i:s', $current_time_with_fix);
					   //.date("d.m.Y H:i:s");

?>

<?php

if(isset($_GET["watch_more_tb1"])){
	$_SESSION["watch_more_tb1"] = true;
}

if(isset($_GET["watch_less_tb1"])){
	$_SESSION["watch_more_tb1"] = false;
}

?>

<?php

if(isset($_GET["watch_more_tb2"])){
	$_SESSION["watch_more_tb2"] = true;
}

if(isset($_GET["watch_less_tb2"])){
	$_SESSION["watch_more_tb2"] = false;
}

?>


<link rel="stylesheet" type="text/css" href="tablestyle.css">


	<div class="container">
			<section id="Tables">
			
				<h1>This is the Tables page</h1>
					<p><i>(You can see only last 10 rows)</i></p>
						<br>
			
<?php

	//table.php

	//getting our config
	require_once("../../config.php");
	
	//create connection
	$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_shikter");
	
	
	// IF THERE IS ?DELITE=ROW_ID in the url
	if(isset($_GET["delete"]) && isset($_SESSION["user_id"])){
		
		$error_delete1 = "Deleting \"TB1\" row with id:".$_GET["delete"]."<br>";
		
		// NOW() = current date-time
		$stmt = $mysql->prepare("UPDATE messages_sample SET deleted=NOW() WHERE id = ?");
		
		echo $mysql->error;
		
		//replace the ?
		$stmt->bind_param("i", $_GET["delete"]);
		
		if($stmt->execute()){
			$error_delete1.= "<span style='color: red;'>deleted successfully</span><br>";
		}else{
			$error_delete1.=$stmt->error;
		}
		
		//closes the statement, so others can use connection
		$stmt->close();
		
	}
	
		if(isset($_GET["delete_o"]) && isset($_SESSION["user_id"])){
		
		$error_delete2 = "Deleting \"TB2\" row with id:".$_GET["delete_o"]."<br>";
		
		// NOW() = current date-time
		$stmt = $mysql->prepare("UPDATE Reservation SET deleted=NOW() WHERE id = ?");
		
		echo $mysql->error;
		
		//replace the ?
		$stmt->bind_param("i", $_GET["delete_o"]);
		
		if($stmt->execute()){
			$error_delete2.= "<span style='color: red;'>deleted successfully</span><br>";
		}else{
			$error_delete2.=$stmt->error;
		}
		//closes the statement, so others can use connection
		$stmt->close();
		
	}
	
	//SQL sentens
	$stmt = $mysql->prepare("SELECT id, recipient, message, sender, created FROM messages_sample WHERE deleted IS NULL ORDER BY created DESC");
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
				$table_html .="<th><center>Delete</center></th>";
			}
			
		
		$table_html .="</tr>"; //end row
	
	// GET RESULT
	// we have multiple rows
	
	// ---------------------------------------------------------------------
	
	$rows_count = 0;
	$max_count = 10;
	
	if(isset($_SESSION["watch_more_tb1"]) && $_SESSION["watch_more_tb1"] == true){
		$max_count = 1000000;
	}
	
	
	while($stmt->fetch()){
		
		$rows_count++;
		
		if($rows_count >= $max_count){
			break;
		}
		
		// Don't forget about - $stmt->close(); - to see other tables...
	// ----------------------------------------------------------------------
			
			
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
				$table_html .="<td><a class='btn btn-danger' onclick='confirmDelete(event)' href='?delete=".$id."'>X</a></td>";
				
			}
			
		$table_html .="</tr>"; //end row
	}
	
	$stmt->close();
	
	$table_html .="</table>";
	//echo $table_html;
?>

	<!-- -------------------------------------------------------------------------------------- -->

		<?php if(isset($error_delete1)){
		echo $error_delete1;
		}?>
		
		<h3 id="tb1">Table of "Message APP"</h3>
		
			<?php if(isset($_SESSION["watch_more_tb1"]) && $_SESSION["watch_more_tb1"] == true){ ?>
				<a href="?watch_less_tb1#tb1">Watch last 10 senders</a>
			<?php }else{ ?>
				<a href="?watch_more_tb1#tb1">Watch all Message</a>
			<?php } ?>
			
			<br><br>
			
			<?php echo $table_html; ?>
			
	<!-- -------------------------------------------------------------------------------------- -->
			
			<br>
			
			<?php if(isset($_SESSION["watch_more_tb1"]) && $_SESSION["watch_more_tb1"] == true){ ?>
				<div align="center"> <a href="?watch_less_tb1#tb1">Watch last 10 senders</a> </div>
			<?php }else{ ?>
				<div align="center"> <a href="?watch_more_tb1#tb1">Watch full list - "Table of Message APP" </a> </div>
			<?php } ?>
			
					<hr />
				<br>			

<?php	
//---------------------------------------------------------------------------------------------



//SQL sentens
	$stmt2 = $mysql->prepare("SELECT id, Name, Last_Name, reserv_date, label_genre, description, time_created FROM Reservation WHERE deleted IS NULL ORDER BY time_created DESC");
	
		// IF THERE IS ?DELITE=ROW_ID in the url
	
	
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
			$table2_html .="<th><center>Delete</center></th>";
			}
		
		$table2_html .="</tr>"; //end row
	
	// GET RESULT
	// we have multiple rows
	
	// ---------------------------------------------------------------------
		
		$rows_count = 0;
		$max_count = 10;
		
		if(isset($_SESSION["watch_more_tb2"]) && $_SESSION["watch_more_tb2"] == true){
			$max_count = 1000000;
		}
		
		
		while($stmt2->fetch()){
			
			$rows_count++;
			
			if($rows_count >= $max_count){
				break;
			}
			
		// Don't forget about - $stmt->close(); - to see other tables...
	// ----------------------------------------------------------------------
			
			
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
			$table2_html .="<td><a class='btn btn-danger' onclick='confirmDelete(event)' href='?delete_o=".$id."'>X</a></td>";
			}
			
		$table2_html .="</tr>"; //end row
	}
	
	
	$stmt2->close();
	
	$table2_html .="</table>";
	//echo $table2_html;

?>
	<!-- -------------------------------------------------------------------------------------- -->
		<?php if(isset($error_delete2)){
			echo $error_delete2;
		}?>
	
	<h3 id="tb2">Table of "Order APP"</h3>
	
		<?php if(isset($_SESSION["watch_more_tb2"]) && $_SESSION["watch_more_tb2"] == true){ ?>
			<a href="?watch_less_tb2#tb2">Watch last 10 orders</a>
		<?php }else{ ?>
			<a href="?watch_more_tb2#tb2">Watch all Orders</a>
		<?php } ?>
			
	<br><br>
	<!-- -------------------------------------------------------------------------------------- -->
	
			<?php echo $table2_html;?>
		
	<!-- -------------------------------------------------------------------------------------- -->
			
	<br>
			
		<?php if(isset($_SESSION["watch_more_tb2"]) && $_SESSION["watch_more_tb2"] == true){ ?>
			<div align="center"> <a href="?watch_less_tb2#tb2">Watch last 10 orders</a> </div>
		<?php }else{ ?>
			<div align="center"> <a href="?watch_more_tb2#tb2">Watch full list - "Table of Order APP" </a> </div>
		<?php } ?>
			
	<!-- -------------------------------------------------------------------------------------- -->
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