<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cities";

$coni = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($coni->connect_error) {
    die("Connection failed: " . $coni->connect_error);
}
?>