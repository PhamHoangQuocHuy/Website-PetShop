<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="csdl_petshop";
// Create connection
$mysqli = new mysqli($servername, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}
?>