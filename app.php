<?php require_once("header.php"); ?>
<?php 
 
	// require another php file
	// ../../../ => 3 folders back
	require_once("../../config.php");

	$everything_was_okay = true;
	$saved = false;
	$msg = "";
 	
		
	//SAVE TO DB
	// ? was everything okay
	if(isset($_GET["color"])){
		
	
		$dolphin="";
				
				$a="Not a dolphin from pool 7";
				$b="Luna";
				$c="Jax";				
				$d="Summer";
				
				$color=$_GET["color"];
				$dorsal=$_GET["dorsal_fin"];
				$tail=$_GET["tail"];
				
				if($color=="grey"){
					if($dorsal=="flabby"){
						if($tail=="broken"){
							$dolphin=$a;
						}elseif($tail=="not broken"){
							$dolphin=$b;
						}	
					
					}elseif($dorsal=="straight"){
						if($tail=="broken"){
							$dolphin=$a;
						}elseif($tail=="not broken"){
							$dolphin=$c;
						}	
					}	
				}elseif($color=="dark grey"){
					if($dorsal=="flabby"){
						
						$dolphin=$a;
							
					}elseif($dorsal=="straight"){
						if($tail=="broken"){
							$dolphin=$d;
						}elseif($tail=="not broken"){
							$dolphin=$a;
						}	
					}	
				}			
		
		
		//connection with username and password
		//access username from config
		//echo $db_username;
		
		// 1 servername
		// 2 username
		// 3 password
		// 4 database
		$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_karoliinar");
		
		$stmt = $mysql->prepare("INSERT INTO homework (color, Fin, Tail, Dolphin) VALUES (?,?,?,?)");
			
		//echo error
		echo $mysql->error;
		
		// we are replacing question marks with values
		// s - string, date or smth that is based on characters and numbers
		// i - integer, number
		// d - decimal, float
		
		//for each question mark its type with one letter
		$stmt->bind_param("ssss", $_GET["color"], $_GET["dorsal_fin"], $_GET["tail"], $dolphin);
		
		//save
		if($stmt->execute()){
			$msg = "saved sucessfully";
			$saved = true;
		}else{
			//echo $stmt->error;
		}
		
		
	}
	
	

?>

<style>

{ margin: 0; padding: 0; }

html { 
        background: url('3.jpg') no-repeat fixed; 
         background-position: left top;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
}


</style>
	
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
				<a href="login.php">
					Log in / Sign up
				</a>
			</li>
			
			<li class="active">
				<a href="app.php">
					App page
				</a>
			</li>
			
			
			<li>
				<a href="mytable.php">
					Table
				</a>
			</li>
			
			
		  </ul> 
		  
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">

		<h1> Identifying dolphins from pool 7 </h1>
		<h2> Dolphin features: </h2>
		
		
		<?php
	//echo "Saving to database ... ";	
	
			//var_dump($saved);
			if($saved == true){
			
				$dolphin="";
				
				$a="Not a dolphin from pool 7";
				$b="Luna";
				$c="Jax";				
				$d="Summer";
				
				$color=$_GET["color"];
				$dorsal=$_GET["dorsal_fin"];
				$tail=$_GET["tail"];
				
				if($color=="grey"){
					if($dorsal=="flabby"){
						if($tail=="broken"){
							$dolphin=$a;
						}elseif($tail=="not broken"){
							$dolphin=$b;
						}	
					
					}elseif($dorsal=="straight"){
						if($tail=="broken"){
							$dolphin=$a;
						}elseif($tail=="not broken"){
							$dolphin=$c;
						}	
					}	
				}elseif($color=="dark grey"){
					if($dorsal=="flabby"){
						
						$dolphin=$a;
							
					}elseif($dorsal=="straight"){
						if($tail=="broken"){
							$dolphin=$d;
						}elseif($tail=="not broken"){
							$dolphin=$a;
						}	
					}	
				}			
				
				echo "<h2>".$dolphin."</h2>";
			
			
			}
		
		
		
		?>
		
		<form>
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="form-group">
					
						<label for="color">Color: </label>
						<select name="color" id="color">
					<option value="grey"> Grey </option>
					<option value="dark grey"> Dark grey </option>
					</select>
					</div>
				</div>
			</div>
			
		<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="form-group">
						<label for="dorsal_fin">Dorsal fin: </label>
						<select name="dorsal_fin" id="dorsal_fin">
					  <option value="flabby"> Flabby </option>
					  <option value="straight"> Straight </option>
					</select>
					</div>
				</div>
		</div>
		
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="form-group">
						<label for="tail">Tail: </label>
						<select name="tail" id="tail">
					  <option value="broken"> Broken </option>
					  <option value="not broken"> Not broken </option>
					  </select>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<input class="btn btn-primary" type="submit" value="Save">
				</div>
			</div>
			
		</form>
		


  
	</div>
  
  </body>
</html>
