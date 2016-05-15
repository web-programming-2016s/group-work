<?php
header('Content-Type: text/html; charset=utf-8');
if(!$noAccessCheck){
    include('checkAccess.php');
}

$con = mysqli_connect('localhost', 'webpr2016', 'webpr16', 'webpr2016_askaks');
mysqli_set_charset($con, 'UTF-8');

$userTable = 'user';
$eventTable = 'event';
$attendingTable = 'user_event';

?>