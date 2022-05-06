<?php 

//Start Session
session_start();

// Create constant to store Non Repeating values      [constants are always in capital letters]
define('SITEURL',"http://localhost/food-order/");
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'food-order');

$conn=mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); // DATABASE CONNECTION syntax is (host,database username,databsae password)
$db_select=mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); // selecting Database

?>