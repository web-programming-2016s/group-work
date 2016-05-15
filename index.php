<?php require_once ("header.php"); 
	//getting our config
	require_once ("../../config.php");
	?>
	
<?php
	
//signup button clicked
$everything_was_okay = true;

	
//*********************
	// TO field validation
	//*********************
$text = "";
	if(isset($_GET["username"])){ //if there is ?to= in the URL
		if(empty($_GET["username"])){ //if it is empty
			$everything_was_okay = false; //empty
			echo "Please choose a username! <br>"; // yes it is empty
		}else{
			$text = "Thank you, ".$_GET["username"]."<br>"; //no it is not empty
		}
	}else{
		$everything_was_okay = false; // do not exist
	}
	
	// ? was everything okay
	if($everything_was_okay == true){

	


	/***********************
	**** SAVE TO DB ********
	***********************/
	
		//connection with username and password
		//access username from config
		//echo $db_username;
		
		//1 servername: localhost or greeny server
		//2 username
		//3 password
		//4 database
		$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_marpat");
		
		$stmt = $mysql->prepare ("INSERT INTO `Users`( `username`) VALUES (?)");
		
		//echo error
		echo $mysql->error;
		
		//we are repalcing question marks with values
		//s - string, date, smth that is based on characters and numbers
		// i - integer, number
		// d - decimanl, float
		
		//for each question mark its type with one letter
		$stmt->bind_param ("s", $_GET["username"]);
		
		//save
		if ($stmt->execute ()){
			//echo "Thank you!" . "<br>";
		}else{
			echo $stmt->error;
		}
	
	}

?>
<style>

form{
float:left;
width:75%;
margin-left: 15%;
}

</style>

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
      <a class="navbar-brand" href="index.php"><strong>Color Messages</strong></a><span class="sr-only">(current)</span></a></li>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
	  
        <li> <a href="applic.php">Send</a></li>
		<li><a href="table.php"> Table</a>
		  <li><a href="my_mess.php">My messages</a></li> 
			
          </ul>
    
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<form method="GET" >
        <h1>Sign up</h1>
		<p>
	Welcome to Color Messages!<br>
	You can send I read messages in different colors <br>
	Please fill in your name here so that other users can address you and send you messages<br>
	</p>
        <div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="form-group">
                        <label for="from">Username: </label>
                        <input type="text" name="username"
                            class="form-control">
                    </div>
				</div>
			</div>
	
	 <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <input class="btn btn-success hidden-xs" type="submit" value="Save">
      
                    </div>
                </div>
				<?php
echo $text;
?>
            </form>

   

</body>
