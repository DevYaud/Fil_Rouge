<?php
// Démarrer la session pour pouvoir accéder aux variables de session
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/main_parent.css">
    <title></title>
</head>
<body>
    <nav class="sidebar">
        <div style="padding: 15px; font-size: 22px; text-align: center">📦</div>
        <a href="profil.php" class="nav-item">
            <span class="nav-icon">🏠</span>
            <span class="nav-text">Accueil</span>
        </a>
        <a href="./activite/inscription_activite.php" class="nav-item">
            <span class="nav-icon">🎯</span>
            <span class="nav-text">Activités</span>
        </a>
        <a href="./repas/inscription_repas.php" class="nav-item">
            <span class="nav-icon">🍔</span>
            <span class="nav-text">Repas</span>
        </a>
        <a href="./autre/facture.php" class="nav-item">
            <span class="nav-icon">📜</span>
            <span class="nav-text">Facture</span>
        </a>
        <a href="./autre/notation.php" class="nav-item">
            <span class="nav-icon">⚙️</span>
            <span class="nav-text">Satisfaction</span>
        </a>
        <a href="./logout.php" class="nav-item">
            <span class="nav-icon">🚪</span>
            <span class="nav-text">Se déconnecter</span>
        </a>
    </nav>
</body>
</html>
