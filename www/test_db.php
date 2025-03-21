<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'sc1zuna1689_DB';
$DATABASE_PASS = 'fil_rouge';
$DATABASE_NAME = 'sc1zuna1689_fil_rouge';

$mysqli = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

echo $mysqli->host_info . "\n";
