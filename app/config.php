<?php

// Database credentials, domani le facciamo caricare da env
$host = "localhost";  // Change to your database server host
$username = "your_username";  // Change to your database username
$password = "your_password";  // Change to your database password
$database = "your_database";  // Change to your database name

$connection = new mysqli($host, $username, $password, $database);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

?>
