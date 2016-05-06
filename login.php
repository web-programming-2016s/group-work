<?php
	/*	
	//signup button clocked
	 if(isset($_POST["signup"])){
		
		//signup
		echo "signing up...";
		
			//the fields are not empty
			if( !empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["First_Name"]) && !empty($_POST["Last_Name"]) ){
				
				//save to db
				
				signup($_POST["username"], $_POST["password"], $_POST["First_Name"], $_POST["Last_Name"]);
				
			}else{
				
				echo " All fields are rquired!";
				
		}
		
		
	}
	*/
//---------------------------------------------------------------------------------//
?>

<!DOCTYPE html>
<meta charset="UTF-8">
<base target="_self"">
<html lang="en">

  <head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Little Estonia</title>
	
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" >
		<!-- jQuery google -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>
		
		 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		
		<meta charset="UTF-8"> <!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
		<base target="_self"">
		<!--<link rel="stylesheet" type="text/css" href="app.css">-->
		
		<style>
			.navbar-inverse .navbar-nav>.active>a,
			.navbar-inverse .navbar-nav>.open>a,
			.navbar-inverse .navbar-nav>.active>a, 
			.navbar-inverse .navbar-nav>.active>a:focus,
			.navbar-inverse .navbar-nav>.active>a:hover	{
				color: #000;
				background-color: white;
				background-image: none;
			}
		</style>

<?php

require_once("functions.php");
	

/*---------------------------------------------------------------------------------*/

	//login=smth is in the URL
	//login button clocked
	if(isset($_POST["login"])){
		//login
		echo "<br><br><strong> Logging in... </strong><br>";
			//the fields are not empty
			if( !empty($_POST["username"]) && !empty($_POST["password"]) ){
				//save to db
				login($_POST["username"], $_POST["password"]);
			}else{
				echo "<h4><span style='color: red;'><strong>Both fields are rquired!</strong></span></h4>";
			}
		
	//signup button clocked
	}else if(isset($_POST["signup"])){
		//signup
		echo "<br><br><strong> Signing up... </strong><br>";
			//the fields are not empty
			if( !empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["First_Name"]) && !empty($_POST["Last_Name"]) ){
				//save to db
				signup($_POST["username"], $_POST["password"], $_POST["First_Name"], $_POST["Last_Name"]);
			}else{
				echo "<h4><strong> All fields are rquired! </strong></h4>";
		}
}

 ?>

<style> 

<!--
body{
	font-family: "AbelRegular";
			src: url("http://../fonts/AbelRegular_BACKUP.ttf") format("truetype");
-->
			
    background-image: url(http://subtlepatterns.com/patterns/natural_paper.png) ; 
   <!--  font-size: 11px; -->
   <!--  font-size: 11px; -->
   <!-- font-family: 'Open Sans', sans-serif; -->
   <!-- text-align: center; -->
   <!-- color: #EAEAEA; -->
}


<!--
img {
    vertical-align: left;
	text-align: left;
}
-->


#text3 {
    background: #333;
    color: #ccc;
    width: 200px;
    padding: 6px 15px 6px 35px;
    border-radius: 20px;
    box-shadow: 0 1px 0 #ccc inset;
    transition: 500ms all ease;
    outline: 0;
	text-align: center;
}

#text3:hover {
    width: 270px;
}  

.wrap{
		font-size: 11px;
		font-size: 11px;
   position:relative;
   width:310px;
   height:550px;
   padding:1em 1em;
   margin:20px auto;
   background:#666666;
   overflow:hidden;
}

.wrap:before {
   content:"";
   position:absolute;
   top:0;
   right:0;
   border-width:0 16px 16px 0;
   border-style:solid;
   border-color:#fff #fff #658E15 #658E15;
   background:#4E4E4E;
   -webkit-box-shadow:0 1px 1px rgba(0,0,0,0.3), -1px 1px 1px rgba(0,0,0,0.2);
   -moz-box-shadow:0 1px 1px rgba(0,0,0,0.3), -1px 1px 1px rgba(0,0,0,0.2);
   box-shadow:0 1px 1px rgba(0,0,0,0.3), -1px 1px 1px rgba(0,0,0,0.2);
   display:block; width:0; /* Firefox 3.0 damage limitation */
}

.wrap.rounded {
   -webkit-border-radius:5px 0 5px 5px;
   -moz-border-radius:5px 0 5px 5px;
   border-radius:5px 0 5px 5px;
}

.wrap.rounded:before {
   border-width:8px;
   border-color: #EBEAE6 #EBEAE6  transparent transparent;
   -webkit-border-bottom-left-radius:5px;
   -moz-border-radius:0 0 0 5px;
   border-radius:0 0 0 5px;
}


.wrap img {
    width: 100%;
    margin-top: 15px;
}

 
p{ 
    margin-top: 15px;
    text-align: justify;
}


h1{
    font-size: 20px;
    font-weight: bold;
    margin-top: 5px; 
    text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
}

 
a{
    text-decoration: none;
    color: #EAEAEA !important;
}


a:hover{
    text-decoration: underline;
    color: #fff !important ;
}


.btn{
  margin:0px center;
  display: inline-block;
  padding: 6px 45px;
}


</style>



<!-- here field for input -->
<div align="center" class="wrap rounded">

       <h1 align="center" style="color:#EAEAEA;" text-align="center;">Log in</h1>
	<br>
	<form method="POST">

		<input type="text" id="text3" placeholder="Username" name="username">
		<br><br>
		<input type="password" id="text3" placeholder="Password" name="password">
		<br><br>
		<input class="btn btn-primary" type="submit" name="login" value="Log in">		
		<br><br>
		
		<hr />
	
	</form>
     
         <h1 align="center" style="color:#EAEAEA;">Create User Name</h1>
	<br>
	<form align="center" method="POST">
	
		<input type="text" id=text3 placeholder="Username" name="username">
		<br><br>
		<input type="password" id=text3 placeholder="Password" name="password">
		<br><br><br>
		<input type="First_Name" id=text3 placeholder="First Name" name="First_Name">
		<br><br>
		<input type="Last_Name" id=text3 placeholder="Last Name" name="Last_Name">
		<br><br>
		<input class="btn btn-warning" type="submit" name="signup" value="Sign up">
		<br><br>
	
	</form>

       
</div>

<!-- filed ends -->








