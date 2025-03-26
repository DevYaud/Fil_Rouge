<?php
// Démarrer la session pour pouvoir accéder aux variables de session
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../styles/main.css">

</head>
<body>
<!-- Sidebar -->
<nav class="sidebar">
    <div style="padding: 15px; font-size: 22px; text-align: center">📦</div>
    <a href="http://creche.zaud.org/admin/dashboard.php" class="nav-item">
        <span class="nav-icon">🏠</span>
        <span class="nav-text">Dashboard</span>
    </a>
    <a href="http://creche.zaud.org/admin/rapport/creation_rapport.php" class="nav-item">
        <span class="nav-icon">📜</span>
        <span class="nav-text">Création Rapport</span>
    </a>
    <a href="http://creche.zaud.org/admin/menu/creation_menu.php" class="nav-item">
        <span class="nav-icon">🍔</span>
        <span class="nav-text">Création Menu</span>
    </a>
    <a href="http://creche.zaud.org/admin/activite/creation_activite.php" class="nav-item">
        <span class="nav-icon">🎯</span>
        <span class="nav-text">Création Activité</span>
    </a>
    <a href="http://reche.zaud.org/admin/compte/creation_compte.php" class="nav-item">
        <span class="nav-icon">⚙️</span>
        <span class="nav-text">Création Comptes</span>
    </a>
</nav>
</body>
</html>
