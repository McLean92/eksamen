<?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="root"; // Mysql password 
$db_name="joejuice"; // Database name 



$conn = new mysqli($host, $username, $password, $db_name);
if ($conn->connect_error) { 
   die('Connect Error ('.$conn->connect_errno.') '.$conn->connect_error);
}
?>
