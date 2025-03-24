<?php
// Démarrer la session pour pouvoir accéder aux variables de session
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Navigation</title>
    <style>
        .nav-link {
            display: block;
            margin: 10px 0;
        }
    </style>
</head>
<body>
<nav>
    <ul>
        <li class="nav-link"><a href="profil.php">Profil</a></li>
        <li class="nav-link"><a href="activite.php">Activité</a></li>
        <li class="nav-link"><a href="repas.php">Repas</a></li>
        <li class="nav-link"><a href="logout.php">Se déconnecter</a></li>
    </ul>
</nav>
</body>
</html>
