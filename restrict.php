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

$c = new Calendar(date("Y"), date("n"));


 ?>
<h2> Welcome <?php echo $_SESSION["username"];?> (<?=$_SESSION["user_id"];?>) </h2>
<a href="?logout=1" >Log out</a>
