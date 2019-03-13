<?php

$server = "127.0.0.1";
$username = "root";
$password = "goldtree9";
$db = "Aryan";

$conn = mysqli_connect($server, $username, $password, $db);

if (!$conn) {
	die("Connection Faild: " .mysqli_connect_error());
}

?>