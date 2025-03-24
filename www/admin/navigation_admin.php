<?php
// Démarrer la session pour pouvoir accéder aux variables de session
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Navigation</title>
    <link rel="stylesheet" href="menu-lateral.css">
    <style>
        .nav-link {
            display: block;
            margin: 10px 0;
        }
    </style>
</head>
<body>
<nav>
    <ul  class="menu-latéral">
        <li class="nav-link"><a href="profil.php">Profil Admin</a></li>
        <li class="nav-link"><a href="comptes.php">Gestion Comptes</a></li>
        <li class="nav-link"><a href="activite.php">Gestion Activité</a></li>
        <li class="nav-link"><a href="repas.php">Gestion Repas</a></li>
        <li class="nav-link"><a href="logout.php">Déconnexion</a></li>
    </ul>
</nav>
</body>
</html>
