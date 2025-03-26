<?php

// Redirige l'utilisateur vers admin/login.php si non connecté
/**
 * @return void
 */
function verifierSessionAdmin(): void
{
    session_start();
    if (!isset($_SESSION['Id_connexion'])) {
        // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
        header('Location: http://www.creche.zaud.org/admin/login.php');
        exit();
    }
}

// Redirige l'utilisateur vers app/login.php si non connecté
/**
 * @return void
 */
function  verifierSessionParents(): void
{
    session_start();
    if (!isset($_SESSION['Id_connexion'])) {
        // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
        header('Location: http://www.creche.zaud.org/app/login.php');
        exit();
    }
}