<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentdb";

// create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// echo "Connected successfully"; // (optional for testing)

?>