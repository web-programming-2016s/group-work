<?php
	require_once("functions.php");
	require_once("header.php");
	
	//RESTRICTION -NOT LOGGED IN
	if(isset($_SESSION["user_id"])){
		//redirict user to restricted page
		header("location: delfiini_tabel.php");
	}
	
		//login button clicked
	if(isset($_POST["login"])){
	
		//login
	
	echo "logging in...";
	
	if(!empty($_POST["username"]) && !empty($_POST["password"])){
	
		//save to db
		
		login($_POST["username"], $_POST["password"]);
	
	}else{
	
		echo "both fields are required!";
		
		}	


	//signup button clicked
	}else if(isset($_POST["signup"])){
	
		//signup	
			
	echo "signing up...";
	
	//the fields are not empty
	if(!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["name"])){
	
		//save to db
		
		signup($_POST["username"], $_POST["password"], $_POST["name"], $_POST["name2"]);
	
	}else{
	
		echo "both fields are required!";
		
		}
	
	}
	
	
	
?>

<h1>Log in</h1>

<form method="POST" class="form-inline">
  <div class="form-group">
    <label for="Username">Username:</label>
    <input type="text" class="form-control" name="username">
  </div>
  <div class="form-group">
    <label for="Password">Password:</label>
    <input type="password" class="form-control" name="password">
  </div>
  <input type="submit" name="login" value="Log in" class="btn btn-info"></input>
</form>

	

<h1>Sign up</h1>
<div class="container">
<form  method="POST" class="form-horizontal">
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">First name: </label>
    <div class="col-sm-10">
      <input style="width:25%;" type="text" class="form-control" name="name">
    </div>
  </div>
  <div class="form-group">
    <label for="name2" class="col-sm-2 control-label">Last name: </label>
    <div class="col-sm-10">
      <input style="width:25%;" type="text" class="form-control" name="name2">
    </div>
  </div>
  <div class="form-group">
    <label for="username" class="col-sm-2 control-label">Username: </label>
    <div class="col-sm-10">
      <input style="width:25%;" type="text" class="form-control" name="username">
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password: </label>
    <div class="col-sm-10">
      <input style="width:25%;" type="password" class="form-control" name="password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button name="signup" type="submit" class="btn btn-info">Sign up</button>
    </div>
  </div>
</form>
</div>

<!--	<input type="name" placeholder="First name" name="name"><br>
	<input type="name" placeholder="Last name" name="name2"><br>
	
	<input type="text" placeholder="Username" name="username"><br>
	<input type="password" placeholder="Password" name="password"><br>
	
	<input type="submit" class="btn btn-info" name="signup" value="Sign up"> -->
	
	
	
</form>
</body>
</html>