<?php

	require_once("functions.php");
	
	
	if(!isset($_SESSION["user_id"])){

		header("Location: login.php");
	}
	
	
	if(isset($_GET["logout"])){

		session_destroy();
		
		header("Location: login.php");
	}
?>
<head>
	<title>Hello</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>

</head>
<body>
<h2> Welcome <?php echo $_SESSION["username"];?>  </h2>

<a href="?logout=1" >Log out</a> <br> <br><br> <br><br> <br>
<br>
<a href="table.php">logs</a>


<form action="restrict.php" method="post">
Your ideas <input type="text2" placeholder="Enter your idea here" name="idea"><br>
<input type="submit">
</form>

- <?php echo $_POST["idea"]; ?><br>

</body>