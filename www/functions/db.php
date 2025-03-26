<?php

// Informations de connexion à la base de données
/**
 * @return false|mysqli|void
 */
function getDatabase()
{
    session_start();
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'sc1zuna1689';
    $DATABASE_PASS = getenv("PASSWORD");
    $DATABASE_NAME = 'sc1zuna1689_fil_rouge';

// Connexion à la base de données
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if (mysqli_connect_errno()) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    return $con;
}

