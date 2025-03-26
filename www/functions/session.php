<?php

function verifierSession(): void
{if (!isset($_SESSION['Id_connexion'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: ../login.php');
    exit();
}}
