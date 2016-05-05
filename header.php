<?php	require_once("functions.php");
	
	
	//RESTRICTION - LOGGED IN
	if(isset($_SESSION["user_id"])){
		//redirect user to restricted page
		header("Location: restrict.php");
		
	}
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
		
		
		  <script>
		  $(function() {
			$( ".datepicker" ).datepicker({
				//dateFormat: "yy-mm-dd",
				dateFormat: "dd.mm.yy",
			
				showAnim: "blind",
			});
				
			});
		  </script>
		  
		  
		  <!-- 
				$ function() { 
								$( ".datepicker" ).datepicker({ 
																[Дополнительные ФУНКЦИИ ПИСАТЬ СЮДА] 
																									}) 
							}); 
			-->
		  
		  
		  
		  
				
		 <script type="text/javascript">
		
		    function validate(){
				
			    var Name = document.getElementById('Name').value;
				var Last_Name = document.getElementById('Last_Name').value;
				var date = document.getElementById('datepicker').value;
				var genre = document.getElementById('genre').value;
				var error = '';
				var formIsValid = true;
				
				if(!Name){
					error += "<br>Login field is required";
					formIsValid = false;
				}
				
				if(!Last_Name){
					error += "<br>Name field is required";
					formIsValid = false;
				}
				
				
				if(!date){
					error += "<br>Please select date";
					formIsValid = false;
				}
				
				
				if(!genre){
					error += "<br>Please select the type of shooting";
					formIsValid = false;
				}
				
				console.log(date);
				
				document.getElementById('errors').innerHTML = error;
				if(formIsValid){
					var day1 = $("#datepicker").datepicker('getDate').getDate();                 
					var month1 = $("#datepicker").datepicker('getDate').getMonth() + 1;             
					var year1 = $("#datepicker").datepicker('getDate').getFullYear();
					
					document.getElementById('datepicker').value = year1+"-"+month1+"-"+day1;
					
				}
				
				
				return formIsValid;
				
				
			}
			
		</script>		
		
		<!--		
			<script type="text/javascript" src="jquery.js"></script>
					<script type="text/javascript">
					function checker() 
					{ 
					if($('input[name^=toDel]:checked').length > 0) return confirm('Do you really want to delete?'); 
					else return false; 
					} 
					
			</script>
		-->

			<!--
			<FORM action="" method="post" > 
			<input name="toDel" type="checkbox" value="1"> 
			<input name="toDel" type="checkbox" value="2"> 
			<input name="" type="submit" onClick="return checker();"> 
			</FORM>
			-->
		
	
  </head>
  
 
  <body>
	
	<figure id="tlu_logo"><img border=none src="http://www.tlu.ee/~shikter/ristmed2/images/TLU_logo.jpg" alt="TLU" width="200"></figure>
<br>
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
      <a class="navbar-brand" href="#">Little Estonia</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	
      <ul class="nav navbar-nav">
	  
		<?php 
			
			$pages = array
			  (
			  array("homepage.php","Homepage"),
			  array("app_message.php","Message APP"),
			  array("app_reservation.php","Order APP"),
			  array("tables.php","Tables"),
			  );
			  
			  foreach($pages as $page){
				  //var_dump($page[]);
				  
				  $active = "";
				  
				  if("/home/shikter/public_html/web/groupwork/".$page[0] == $_SERVER['SCRIPT_FILENAME']){
					  $active = "class='active'";
				  }
				  
				  echo "<li ".$active." ><a href='".$page[0]."'>".$page[1]."</a></li>";
			  }
			  
			  // logout
			 
		
		?>
		
      </ul>
	  
	  <?php
	  
		 echo "
				<ul class='nav navbar-nav navbar-right pull-right'>
					<li><a>User Name</a></li>
					<li><a href='#'>Log Link</a></li>
				  </ul>
			  ";
	  
	  ?>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
