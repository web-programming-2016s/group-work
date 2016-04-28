<?php

//We need functions for dealing with session
require_once("functions.php");

//Restriction-  logged in
	if(!isset($_SESSION["user_id"])){
		//redirect not logged in user to login page
		header("Location: login.php");

	}
//?Logout is in the url
if(isset($_GET["logout"])){
  //delete the session
  session_destroy();

header("Location: login.php");

}

if(isset($_GET["day"])){
  //delete the session
  echo $_GET["day"];

}

class Calendar {

    public function __construct($year = '', $month = '') {

        $date = time();

        if (empty($year) OR empty($month)) {
            $year = date('Y', $date);
            $month = date('m', $date);
            $day = date('d', $date);
        }

        $first_day = mktime(0, 0, 0, $month, 1, $year);
        $title = date('F', $first_day);
        $day_of_week = date('D', $first_day);

         switch ($day_of_week) {
            case "Mon": $blank = 0;
                break;
            case "Tue": $blank = 1;
                break;
            case "Wed": $blank = 2;
                break;
            case "Thu": $blank = 3;
                break;
            case "Fri": $blank = 4;
                break;
            case "Sat": $blank = 5;
                break;
            case "Sun": $blank = 6;
                break;
        }

        $days_in_month = cal_days_in_month(0, $month, $year);

        echo '<table border=1 width=600>';

        echo '<tr>';
        echo '<th colspan=60>' . $title . ' ' . $year . '</th>';
        echo '</tr>';

        echo '<tr>';
        echo '<td width=62>Mon</td>';
        echo '<td width=62>Tue</td>';
        echo '<td width=62>Wed</td>';
        echo '<td width=62>Thu</td>';
        echo '<td width=62>Fri</td>';
        echo '<td width=62>Sat</td>';
        echo '<td width=62>Sun</td>';
        echo '</tr>';

        $day_count = 1;

        while ($blank > 0) {
            echo '<td></td>';
            $blank = $blank - 1;
            $day_count++;
        }

        $day_num = 1;

        while ($day_num <= $days_in_month) {

            echo '<td><a href="?day='.$day_num.'&month='.date("n").'&year='.date("Y").'">' . $day_num . '</a></td>';
            $day_num++;
            $day_count++;

            if ($day_count > 7) {
                echo '</tr><tr>';
                $day_count = 1;
            }
        }

        while ($day_count > 1 && $day_count <= 7) {
            echo '<td> </td>';
            $day_count++;
        }

        echo '</tr>';

        echo '</table>';
    }

}




 ?>
<h2> Welcome <?php echo $_SESSION["username"];?> (<?=$_SESSION["user_id"];?>) </h2>
<a href="?logout=1" >Log out</a>

<?php

 require_once("header.php"); ?>
	<?php
	 // require another php file
	 // ../../../ => 3 folders back
	 require_once("../../config.php");
	 $everything_was_okay = true;
	 //*********************
	 // TO field validation
	 //*********************
	 if(isset($_GET["Category"])){ //if there is ?to= in the URL
	   if(empty($_GET["Category"])){ //if it is empty
	     $everything_was_okay = false; //empty
	     echo "Please enter the category <br>"; // yes it is empty
	   }else{
	     echo "Category: ".$_GET["category"]."<br>"; //no it is not empty
	   }
	 }else{
	   $everything_was_okay = false; // do not exist
	 }
	 //check if there is variable in the URL
	 if(isset($_GET["amount"])){

	   //only if there is message in the URL
	   //echo "there is amount";

	   //if its empty
	   if(empty($_GET["amount"])){
	     //it is empty
	     $everything_was_okay = false;
	     echo "Please enter the amount! <br>";
	   }else{
	     //its not empty
	     echo "Amount: ".$_GET["amount"]."<br>";
	   }

	 }else{
	   //echo "there is no such thing as amount";
	   $everything_was_okay = false;
	 }



	 /***********************
	 **** SAVE TO DB ********
	 ***********************/

	 // ? was everything okay
	 if($everything_was_okay == true){

	   echo "Saving to database ... ";


	   //connection with username and password
	   //access username from config
	   //echo $db_username;

	   // 1 servername
	   // 2 username
	   // 3 password
	   // 4 database
	   $mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_carmet");

	   $stmt = $mysql->prepare("INSERT INTO Homework2 (name, amount) VALUES (?,?)");

	   //echo error
	   echo $mysql->error;

	   // we are replacing question marks with values
	   // s - string, date or smth that is based on characters and numbers
	   // i - integer, number
	   // d - decimal, float

	   //for each question mark its type with one letter
	   $stmt->bind_param("sd", $_GET["name"], $_GET["amount"]);

	   //save
	   if($stmt->execute()){
	     echo "saved sucessfully";
	   }else{
	     echo $stmt->error;
	   }


	 }


	?>

	 <nav class="navbar navbar-default">
	   <div class="container-fluid">
	   <!-- Brand and toggle get grouped for better mobile display -->
	   <div class="navbar-header">
	     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	     <span class="sr-only">Toggle navigation</span>
	     <span class="icon-bar"></span>
	     <span class="icon-bar"></span>
	     <span class="icon-bar"></span>
	     </button>


	 <div class="container">

		 <h2 style="color:black;">Manage your money</h2>

		 <?php  $c = new Calendar(date("Y"), date("n")); ?>

		 <?php if(isset($_GET["day"])){ ?>





		   <form>
				 <div class="row">
		       <div class="col-md-3 col-sm-6">
		         <div class="form-group">
		           <label for="Day">Category: </label>
		           <input name="date" id="Day" type="text" value="<?php echo $_GET["day"]."." ?>" class="form-control">
		         </div>
		       </div>
		     </div>
		     <div class="row">
		       <div class="col-md-3 col-sm-6">
		         <div class="form-group">
		           <label for="Category">Category: </label>
		           <input name="Category" id="category" type="text" class="form-control">
		         </div>
		       </div>
		     </div>
		     <div class="row">
		       <div class="col-md-3 col-sm-6">
		         <div class="form-group">
		           <label for="amount">Amount: </label>
		           <input name="amount" id="amount" type="text" class="form-control">

		         </div>
		       </div>
		     </div>
		     <div class="row">
		       <div class="col-md-3 col-sm-6">
		         <input class="btn btn-success hidden-xs" type="submit" value="Save data ">
		         <input class="btn btn-success btn-block visible-xs-block" type="submit" value="Save data 2">
		       </div>
		     </div>
		   </form>

	<?php } ?>

	 </div>

	  </body>
	</html>
