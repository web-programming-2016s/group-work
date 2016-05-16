<?php
$mysqli = new mysqli("localhost", "webpr2016", "webpr16", "webpr2016_groupwork");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}
?>
