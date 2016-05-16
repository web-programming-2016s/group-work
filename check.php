
<?php
	if(!(isset($_SESSION['userid']) and strlen($_SESSION['userid']) > 2)){
		echo "Please <a href=login.php>login</a> to use this page ";
		exit;
	}else{
		echo "Welcome $_SESSION[userid] | <a href='logout.php'>Logout</a>|<a href='change.php'>Change Password</a>";
	}
?>