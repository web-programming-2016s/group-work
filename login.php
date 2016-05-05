<?php


	
	
//---------------------------------------------------------------------------------//
	
	//login=smth is in the URL
	//login button clocked
	if(isset($_POST["login"])){
		
		//login
		echo "logging in...";
		
			//the fields are not empty
			if( !empty($_POST["username"]) && !empty($_POST["password"]) ){
				
				//save to db
				
				login($_POST["username"], $_POST["password"]);
				
			}else{
				
				echo "both fields are rquired!";
				
			}
		
//---------------------------------------------------------------------------------//
		
		
	//signup button clocked
	}else if(isset($_POST["signup"])){
		
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
  
<style> 
body{
    font-family: "Abel", serif;
}

#text3 {
    background: #333;
    color: #ccc;
    width: 200px;
    padding: 6px 15px 6px 35px;
    border-radius: 20px;
    box-shadow: 0 1px 0 #ccc inset;
    transition: 500ms all ease;
    outline: 0;
}

#text3:hover {
    width: 270px;
}  







* {
    margin: 0;
    padding: 0;
}

body {
    font-size: 11px;
    font-family: 'Abel', ;
    color: #000000 ;
    text-align: center;
    
}

.wrap{
    background: #eee;
    margin: 20px auto;
    width: 300px;
    height: 400px;
    display: block;
    padding: 12px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    -webkit-box-shadow: inset 0 1px 1px 0 #c7c7c7;
    -moz-box-shadow: inset 0 1px 1px 0 #c7c7c7;
    box-shadow: inset 0 1px 1px 0 #c7c7c7;
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
    color: #eeeeee !important;
}

a:hover{
    text-decoration: underline;
    color: #eeeeee !important ;
}





#text2 {
    background: #333;
    color: #ccc;
    width: 200px;
    padding: 6px 15px 6px 35px;
    border-radius: 20px;
    box-shadow: 0 1px 0 #ccc inset;
    transition: 500ms all ease;
    outline: 0;
}

#text2:hover {
    width: 270px;
}  
</style>


<div class="wrap">
       <h1>Log in</h1>
<form method="POST">

	<input type="text" id="text3" placeholder="Username" name="username">
	<br><br>
	<input type="password" id="text3" placeholder="Password" name="password">
	<br><br>
	<input type="submit" name="login" value="Log in">
	


</form>
     
       
        <p>
         <h1>Create User Name</h1>
<form method="POST">
<!-- <form>-->

	<input type="text" id=text2 placeholder="Username" name="username">
	<input type="password" id=text2 placeholder="Password" name="password">
	<br><br>
	<input type="First_Name" id=text2 id=text2 placeholder="First Name" name="First_Name">
	<input type="Last_Name" id=text2 placeholder="Last Name" name="Last_Name">
	<br><br>
	<input type="submit" name="signup" value="Sign up">
	


</form>
       </p> 
       <br />
       
</div>









