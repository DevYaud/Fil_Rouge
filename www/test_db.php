<?php
$servername = "localhost";
$username = "sc1zuna1689_DB";
$password = "fil_rouge";
$name = "sc1zuna1689_fil_rouge";

// Create connection
$conn = new mysqli($servername, $username, $password, $name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?> 