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
  
<link rel="stylesheet" type="text/css" href="style.css">

<video autoplay id="bgvid" loop>
  <source src="https://dl.dropboxusercontent.com/u/3465596/loops/loop.mp4" type="video/mp4">
  <!-- 
  <source src="https://dl.dropboxusercontent.com/u/3465596/loops/loop.ogg" type="video/ogg">
  <source src="https://dl.dropboxusercontent.com/u/3465596/loops/loop.webm" type="video/webm">
  -->
</video>

<div class="wrap rounded">
       <h1 style="color:#eeeeee">Log in</h1>
<form method="POST">

	<!-- <input type="text" id="text3" placeholder="Username" name="username"> -->
	
<span class="input input--isao">
					<input class="input__field input__field--isao" type="usernmae" id="input-38" name="username" />
					<label class="input__label input__label--isao" for="input-38" data-content="username">
						<span class="input__label-content input__label-content--isao">username</span>
					</label>
				</span>
	<span class="input input--isao">
					<input class="input__field input__field--isao" type="password" id="input-38" name="password" />
					<label class="input__label input__label--isao" for="input-38" data-content="password">
						<span class="input__label-content input__label-content--isao">password</span>
					</label>
				</span>			
<br><br>

</span>
	<!-- <input type="password" id="text3" placeholder="Password" name="password"> -->
	<input type="submit" id="login" name="login" value="Log in">
	<br><br>
</form>
   </div>




     
       
         <h1 style="color:#eeeeee">Create User Name</h1>
<form method="POST">
<!-- <form>-->

			<span class="input input--isao">
					<input class="input__field input__field--isao" type="usernmae" id="input-38" name="username" />
					<label class="input__label input__label--isao" for="input-38" data-content="Username">
						<span class="input__label-content input__label-content--isao">Username</span>
					</label>
				</span>
	<span class="input input--isao">
					<input class="input__field input__field--isao" type="password" id="input-38" name="password" />
					<label class="input__label input__label--isao" for="input-38" data-content="Password">
						<span class="input__label-content input__label-content--isao">Password</span>
					</label>
				</span>		
	
<span class="input input--isao">
					<input class="input__field input__field--isao" type="First_Name" id="input-38" name="First_Name" />
					<label class="input__label input__label--isao" for="input-38" data-content="First Name">
						<span class="input__label-content input__label-content--isao">First Name</span>
					</label>
				</span>
	<span class="input input--isao">
					<input class="input__field input__field--isao" type="Last_Name" id="input-38" name="Last_Name" />
					<label class="input__label input__label--isao" for="input-38" data-content="Last Name">
						<span class="input__label-content input__label-content--isao">Last Name
						</span>
					</label>
				</span>	
				<br>
	<input type="submit" id="submit" name="signup" value="Sign up">
</form>


<!--
				<span class="input input--kuro">
					<input class="input__field input__field--kuro" type="text" id="input-7" />
					
					<label class="input__label input__label--kuro" for="input-7">
						<span class="input__label-content input__label-content--kuro">Username</span>
					</label>
-->






