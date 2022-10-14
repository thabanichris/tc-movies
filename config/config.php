<?php
ob_start(); //Turns on output buffering 
session_start(); //start session

$timezone = date_default_timezone_set("Africa/Johannesburg"); //SA Timezone
$date = date('Y-m-d H:i:s'); // Set current time

$con = mysqli_connect("localhost", "root", "", "aglet-tc"); //Connection variable

if(mysqli_connect_errno()) {
	echo "Failed to connect: " . mysqli_connect_errno();
}

(!empty($_SESSION['username'])) ? $username = $_SESSION['username'] : $username = 'visitor';
?>