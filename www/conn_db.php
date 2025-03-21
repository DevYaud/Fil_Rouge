<?php

global $con;
session_start();
// Database information
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'sc1zuna1689_DB';
$DATABASE_PASS = 'fil_rouge';
$DATABASE_NAME = 'sc1zuna1689_fil_rouge';
// Connection Test
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
    // If there is an error with the connection, stop the script and display the error.
    echo "Non connecté";
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
?>
