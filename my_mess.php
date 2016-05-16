<!DOCTYPE html>
<head>
<style>
#content{
float:left;
width:75%;
margin-left: 15%;
}
</style>
</head>
<?php 
require_once ("header.php"); 
require_once ("../../config.php");

		$everything_was_okay = true;

	
//*********************
	// TO field validation
	//*********************
$name = "";
$text = "";
	if(isset($_GET["name"])){ //if there is ?to= in the URL
		if(empty($_GET["name"])){ //if it is empty
			$everything_was_okay = false; //empty
			echo "Please type your name! <br>"; // yes it is empty
		}else{
			$name = $_GET["name"];
			$text = $name.", here are your messages"; //no it is not empty
		}
	}else{
		$everything_was_okay = false; // do not exist
	}
	
 

$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_marpat");





//SQL sentence // to show all results, remove ORDER 
	$stmt = $mysql->prepare("SELECT `Color`, `From`, `Message` FROM `Color_Messages` WHERE (`To` = '$name' && `deleted` IS NULL)");
	

	
	//if error in sentence
	echo $mysql->error;
	
	//variable for data for each row we will get
	$stmt->bind_result($Color, $From, $Message);
	//query
	$stmt->execute ();
	
	//Create a table
	
	$table_html = "";
	
	//add somthing to string .=
	$table_html .= "<table class='table table-bordered table-hover table-striped'>";
	$table_html .= "<tr>"; //table row
		$table_html .= "<th>From</th>"; //table header
		$table_html .= "<th> Message </th>"; //table header
	$table_html .= "</tr>"; //table row closing
	
	// GET RESULTS
	// we have multiple rows, the while loop
	while ($stmt->fetch()) {
		
	
		$table_html .= "<tr>"; //start a new row
		$table_html .= "<td>" .$From. "</td>"; //add coloumns
		$table_html .= "<td bgcolor='$Color'><b>".$Message. "</b></td>"; 
		//$table_html .= "<td>" .$Color. "</td>";
				$table_html .= "</tr>"; //end row
		
	}
	$table_html .= "</table>";
	


?>

 <body>
	
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
         <a class="navbar-brand" href="index.php"><strong>Color Messages</strong></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="applic.php">Send</a></li>
      <li><a href="table.php">Table</a></li>
   <li class="active"><a href="my_mess.php">My messages<span class="sr-only">(current)</span></a></li>
     
          </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div id="content">
<form  method="get">
<label for="name">Your name is: </label>
                        <input type="text" name="name">
						 <input class="btn btn-success hidden-xs" type="submit" value="Go">
            </form>
<?php
echo $text;
echo $table_html;
?>
	
			</div>
 </body>

 </html>
