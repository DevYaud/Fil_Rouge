<?php

// Redirige l'utilisateur vers admin/login.php si non connecté
/**
 * @return void
 */
function verifierSessionAdmin(): void
{
    if (!isset($_SESSION['Id_connexion'])) {
        // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
        header('Location: http://creche.zaud.org/admin/login.php');
        exit();
    }
}

// Redirige l'utilisateur vers app/login.php si non connecté
/**
 * @return void
 */
function  verifierSessionParents(): void
{
    if (!isset($_SESSION['Id_connexion'])) {
        // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
        header('Location: http://creche.zaud.org/app/login.php');
        exit();
    }
}