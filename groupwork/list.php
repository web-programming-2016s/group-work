<html>
<head>
	<title>Your ideas</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>

</head>
<body>
<div class="list">
<form action="list.php" method="post">
Your ideas <input type="text2" placeholder="Enter your idea here" name="idea"><br>
<input type="submit">
</form>

- <?php echo $_POST["idea"]; ?><br>

</div>
</body>
</html>

