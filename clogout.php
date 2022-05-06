<?php 
    //Include constants.php for SITEURL
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

    //1. Destory the Session
    session_destroy(); //Unsets $_SESSION['user']

    //2. REdirect to Login Page
    header('location:'.SITEURL.'clogin.php');

?>