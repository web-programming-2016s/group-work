<?php
		
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
	
//---------------------------------------------------------------------------------//
?>
  
  <head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>





<div class="wrap rounded">
       <h1>Log in</h1>
<form method="POST">

	<input type="text" id="text3" placeholder="Username" name="username">
	<br><br>
	<input type="password" id="text3" placeholder="Password" name="password">
	<br><br>
	<input type="submit" id="login" name="login" value="Log in">
	


</form>
     
       
        <p>
         <h1>Create User Name</h1>
<form method="POST">
<!-- <form>-->

	<input type="text" id=text3 placeholder="Username" name="username">
	<input type="password" id=text3 placeholder="Password" name="password">
	<br><br>
	<input type="First_Name" id=text3 placeholder="First Name" name="First_Name">
	<input type="Last_Name" id=text3 placeholder="Last Name" name="Last_Name">
	<br><br>
	<input type="submit" id= submit name="signup" value="Sign up">
	3

</form>
       </p> 
       <br/>
       
</div>









