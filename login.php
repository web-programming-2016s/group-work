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
<div class="wrap rounded">

       <h1 align="center" style="color:#EAEAEA;" text-align="center;">Log in</h1>
	<br>
	<form align="center" method="POST">

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








