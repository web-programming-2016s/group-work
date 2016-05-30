<head>
	<title>Table</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>

</head>
<body>

	<center>

<?php

	require_once("db.php");
	
	
	$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_laugai");
	

	$stmt = $mysql->prepare("SELECT id, username FROM gv");
	

	echo $mysql->error;
	

	$stmt->bind_result($id, $username);
	

	$stmt->execute();
	
	$table_html = "";
	

	$table_html .= "<table>";
		$table_html .= "<tr>";
			$table_html .= "<th>ID</th>";
			$table_html .= "<th>Username</th>";
		$table_html .= "</tr>";
	

	while($stmt->fetch()){
		
		$table_html .= "<tr>"; 
			$table_html .= "<td>".$id."</td>";
			$table_html .= "<td>".$username."</td>";
		$table_html .= "</tr>"; 
	}
	$table_html .= "</table>";
	echo $table_html;
	
	
	
?>
</center>
<a href="restrict.php">back</a>
</body>