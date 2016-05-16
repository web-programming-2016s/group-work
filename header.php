<?php	

require_once("functions.php");


/*---------------------------------------------------------------------------------*/
	//login=smth is in the URL
	//login button clocked
	
	if(isset($_POST["login"])){
		
		//login
		//echo "logging in...";
		
			//the fields are not empty
			if( !empty($_POST["username"]) && !empty($_POST["password"]) ){
				
				//save to db
				
				login($_POST["username"], $_POST["password"]);
				
			}else{
				
				echo "<span style='color: red;'>Both fields are rquired!</span>";
				
			}
	}
/*---------------------------------------------------------------------------------*/
	
		//?logout is in the URL
	if(isset($_GET["logout"])){
		session_destroy();
		
		header("Location: ".$_SERVER['PHP_SELF']);
	}
	
	$pages = array
	  (
	  array("homepage.php","Homepage","not restricted"),
	  array("app_message.php","Message APP","restricted"),
	  array("app_reservation.php","Order APP","not restricted"),
	  array("tables.php","Tables","not restricted"),
	  );
	  
	
	  foreach($pages as $page){
		  //var_dump($page[]);
		  
		  $active = "";
		  
		  if("/home/shikter/public_html/web/groupwork/".$page[0] == $_SERVER['SCRIPT_FILENAME']){
			  if(!isset($_SESSION["user_id"]) && $page[2] == "restricted"){
					// 1 restricets
				header("Location: homepage.php");
				exit();
			  }
		  }
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

		@font-face 
		{ 
		font-family: Abel; 
		src: url("./fonts/AbelRegular_BACKUP.ttf") format("truetype");
		}

		body {

			font-family: Abel !important;
		}
		
		</style>
		
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
		  
		 <script>
			function confirmDelete(event){
				
				var c = confirm("Do you want to delete?");
				
				if(!c){
					event.preventDefault();
				}
			}
		  
		 </script>
				
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

		<script>
			( function( window ) {

				'use strict';

				// class helper functions from bonzo https://github.com/ded/bonzo

				function classReg( className ) {
				  return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
				}

				// classList support for class management
				// altho to be fair, the api sucks because it won't accept multiple classes at once
				var hasClass, addClass, removeClass;

				if ( 'classList' in document.documentElement ) {
				  hasClass = function( elem, c ) {
				    return elem.classList.contains( c );
				  };
				  addClass = function( elem, c ) {
				    elem.classList.add( c );
				  };
				  removeClass = function( elem, c ) {
				    elem.classList.remove( c );
				  };
				}
				else {
				  hasClass = function( elem, c ) {
				    return classReg( c ).test( elem.className );
				  };
				  addClass = function( elem, c ) {
				    if ( !hasClass( elem, c ) ) {
				      elem.className = elem.className + ' ' + c;
				    }
				  };
				  removeClass = function( elem, c ) {
				    elem.className = elem.className.replace( classReg( c ), ' ' );
				  };
				}

				function toggleClass( elem, c ) {
				  var fn = hasClass( elem, c ) ? removeClass : addClass;
				  fn( elem, c );
				}

				var classie = {
				  // full names
				  hasClass: hasClass,
				  addClass: addClass,
				  removeClass: removeClass,
				  toggleClass: toggleClass,
				  // short names
				  has: hasClass,
				  add: addClass,
				  remove: removeClass,
				  toggle: toggleClass
				};

				// transport
				if ( typeof define === 'function' && define.amd ) {
				  // AMD
				  define( classie );
				} else {
				  // browser global
				  window.classie = classie;
				}

				})( window );
		</script>
		<script>
			window.onload = function(){
				// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
				if (!String.prototype.trim) {
					(function() {
						// Make sure we trim BOM and NBSP
						var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
						String.prototype.trim = function() {
							return this.replace(rtrim, '');
						};
					})();
				}
				[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
					// in case the input is already filled..
					if( inputEl.value.trim() !== '' ) {
						classie.add( inputEl.parentNode, 'input--filled' );
					}
					// events:
					inputEl.addEventListener( 'focus', onInputFocus );
					inputEl.addEventListener( 'blur', onInputBlur );
				} );
				function onInputFocus( ev ) {
					classie.add( ev.target.parentNode, 'input--filled' );
				}
				function onInputBlur( ev ) {
					if( ev.target.value.trim() === '' ) {
						classie.remove( ev.target.parentNode, 'input--filled' );
					}
				}
			};
		</script>

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
			
			  
			  foreach($pages as $page){
				  //var_dump($page[]);
				  
				  $active = "";
				  
				  if("/home/shikter/public_html/web/groupwork/".$page[0] == $_SERVER['SCRIPT_FILENAME']){
					  $active = "class='active'";
				  }
				  
				  if($page[2] != "restricted"){
					  echo "<li ".$active." ><a href='".$page[0]."'>".$page[1]."</a></li>";
				  }elseif(isset($_SESSION["user_id"])){
					echo "<li ".$active." ><a href='".$page[0]."'>".$page[1]."</a></li>";
					 
				  }
				  
			  }
			  
			  // logout
			 
		
		?>
		
      </ul>
	  
  <?php
		
		if(isset($_SESSION["user_id"])){
		 echo "
				<ul class='nav navbar-nav navbar-right pull-right'>
					<li><a>".$_SESSION["First_Name"]." ".$_SESSION["Last_Name"]."</a></li>
					<li><a href='?logout'>Log out</a></li>
				  </ul>
			  ";
		}else{
			echo "
				<ul class='nav navbar-nav navbar-right pull-right'>
					<li><a href='homepage.php'>Login</a></li>
				  </ul>
			  ";
		}
	  
	?>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
