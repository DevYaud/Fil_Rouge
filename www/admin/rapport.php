<?php
session_start();
//include 'navigation_admin.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page de Rapport</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        display: flex;
        height: 100vh;
        overflow-y: auto;
    }
    /* Sidebar */
    .sidebar {
        width: 64px;
        background-color: #314560e3;
        color: white;
        transition: width 0.3s ease-in-out;
        overflow: hidden;
    }

    .sidebar:hover {
        width: 250px;
    }

    .nav-item {
        display: flex;
        align-items: center;
        padding: 12px 15px;
        color: white;
        text-decoration: none;
        transition: background 0.3s;
    }

    .nav-item:hover {
        background-color: #4a5568;
    }

    .nav-icon {
        margin-right: 12px;
    }

    .nav-text {
        display: none;
    }

    .sidebar:hover .nav-text {
        display: inline;
    }

    /* Contenu */
    .body {
        flex: 1;
        padding: 30px;
        transition: margin-left 0.3s ease-in-out;
        overflow-y: auto;
    }
</style>
<body>
    <!-- Sidebar -->
    <nav class="sidebar">
        <div style="padding: 15px; font-size: 22px; text-align: center">📦</div>
        <a href="#" class="nav-item">
            <span class="nav-icon">🏠</span>
            <span class="nav-text">Accueil</span>
        </a>
        <a href="#" class="nav-item">
            <span class="nav-icon">💬</span>
            <span class="nav-text">Messages</span>
        </a>
        <a href="#" class="nav-item">
            <span class="nav-icon">🔔</span>
            <span class="nav-text">Notifications</span>
        </a>
        <a href="#" class="nav-item">
            <span class="nav-icon">🎯</span>
            <span class="nav-text">Activités</span>
        </a>
        <a href="#" class="nav-item">
            <span class="nav-icon">⚙️</span>
            <span class="nav-text">Paramètres</span>
        </a>
    </nav>

    <!-- Contenu principal -->
    <main class="body">
        <h1>Gestion des Rapports</h1>
        <div class="bouton">
            <a href="creation_rapport.php">Créer un Rapport</a>
            <a href="modification_rapport.php">Modifier un Rapport</a>
        </div>
    </main>
</body>
</html>

