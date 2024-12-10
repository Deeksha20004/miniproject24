<?php
$host = 'localhost';  // Database host (usually 'localhost' for local servers)
$username = 'root';   // Your database username (default in XAMPP is 'root')
$password = '';       // Your database password (default in XAMPP is an empty string)
$database = 'medicine';  // Your database name

// Create a connection
$con = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
