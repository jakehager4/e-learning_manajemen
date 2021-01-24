<?php

$hostname = 'localhost';
$user_db = 'root';
$pass_db = '';
$name_db = 'elearning';
$conn =  mysqli_connect ($hostname , $user_db , $pass_db , $name_db);

if ($conn -> connect_errno) {
	echo "Failed to connect to MySQL: " . $conn -> connect_error;
	exit();
}
?>