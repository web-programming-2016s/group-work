<?php  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lendsy - Rental shop</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">
    
        <div>  <center><img style="max-width:250px; margin-top: 9px;"
             src="img/logo.png"></center></div>
    
   <nav class="navbar navbar-inverse">
 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">LENDSY</a>
       <a class="navbar-brand"href="index.php">Home</a>
       <a class="navbar-brand"href="about.php">About</a>
       <a class="navbar-brand"href="contact.php">Contact</a>
    </div>
</nav>
    
          </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


 <div class="container">


	

<!--This is the save button -->


<?php
require_once("../../config.php");
//**************....
//to field validation
//******************
	
	
	//connection with username and password
	//access username from config
	//echo $db_username;
	
	// 1 servername
	// 2 username
	// 3 password
	// 4 database
	
	
$everything_was_okay = true;
if(empty($_GET["title"])){
		//it is empty
		echo "Please enter the title!";
		
		}else{
			//its not empty
		echo "Title:".$_GET["title"]."<br>";
	}
if(empty($_GET["important"])){
		//it is empty
		echo "Please enter the important field!";
		
		}else{
			//its not empty
		echo "Important:".$_GET["important"]."<br>";
	}
if(isset($_GET["milestones"])){
	
	
	if(empty($_GET["milestones"])){
		//it is empty
		echo "Please enter milestones!";
		
		}else{
			//its not empty
		echo "Milestones:".$_GET["milestones"]."<br>";
	}
}
//check if there is variable in the URL
if(isset($_GET["date"])){
	
	//only if there is date in the URL
	//echo "there is a date";
	
	if(empty($_GET["date"])){
		//it is empty
		echo "Please enter the date!";
		
		}else{
			//its not empty
		echo "Date:".$_GET["date"]."<br>";
	}
	
	
}
 if ($everything_was_okay == true) {
	
	echo "Saving to database ...";
	
	
	//connection with username and password
	//access username from config
	//echo $db_username;
	
	// 1 servername
	// 2 username
	// 3 password
	// 4 database
	
	
	
	$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_groupwork-contact");
	
	$stmt = $mysql->prepare("INSERT INTO homework (title, important, milestones, date) VALUES (?, ?, ?, ?)" );
	
	echo $stmt->error;
	
	//we are replacing question marks with values
	//s - string, data or smth that is based on characters and
	//i - intiger, number
	// d - decimal, float
	$stmt->bind_param("ssss", $_GET["title"], $_GET["important"], $_GET["milestones"], $_GET["date"]);
	
	//save
	
	if($stmt->execute()){
		
	echo	"saved succesefully";
	}else{
		
		echo $stmt->error;
		
		
		}	
//Getting the message from address
//$my_message = $_GET["message"];
//$to = $_GET["to"];
//$from = $_GET["from"];
//echo "My message is ".$my_message." and is to ".$to." and is from ".$from;
}
?>



 <h1>Contact</h1>

<form>
<div class="row">
	<div class="col-md-3">
	<div class="form-group">
	<label for="title">First and Lastname:*</label>
	<input name="title" id="title" type="text" class="form-control">

	 </div>
	 </div>
 </div>


<div class="row">
	<div class="col-md-3">
	<div class="form-group">
	<label for="important">Email:*</label>
	<input name="important" id="important" type="text" class="form-control">


	 </div>
	 </div>
 </div>


<div class="row">
	<div class="col-md-3">
	<div class="form-group">
	<label for="milestones">ID Number:*</label>
	<input name="milestones" id="milestones" type="text" class="form-control">

	 </div>
	 </div>
 </div>


 <div class="row">
	<div class="col-md-3">
	<div class="form-group">
	<label for="date">Rental time:*</label>
	<input name="date" id="date" type="text" class="form-control">

	 </div>
	 </div>
 </div>


		<br><br>

<div class="row">
	<div class="col-md-3" "col-sm-6">
	<input class="btn btn-primary hidden-xs" type="submit" value="Save"></input>
	<input class="btn btn-primary btn-block visible-xs-block" type="submit" value="Save data 2"></input>
	 </div>
</div>	



</div>
</form>


</body>
</html>