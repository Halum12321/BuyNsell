<?php
$host = "localhost";
$database_name = "centralized_db";
$username = "root";
$password = "";

$con = mysqli_connect($host, $username, $password, $database_name);
if (mysqli_connect_errno()) {
    die("Failed to connect to database");
}else{
//echo "Successfully connected";
}  
?>
 