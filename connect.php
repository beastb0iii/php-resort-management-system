<?php

$hostName = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "hotel_reservation";

$conn = mysqli_connect($hostName, $dbUser, $dbPass, $dbName);

if (!$conn) {
    die("Something went wrong");
}

?>