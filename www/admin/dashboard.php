<?php
//session_start();
include 'navigation_admin.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Personnel</title>
    <style>
    /*---Contenu BODY et Container */
    .content {
        margin-left: 64px;
        padding: 20px;
        flex: 1;
        transition: margin-left 0.3s ease-in-out;
    }
    .container {
        max-width: 1200px;
        margin: auto;
        padding: 20px;
        background: white;
        border-radius: 10px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }
    /* Grid and box */
    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }
    .box {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }
    .box h2 {
        margin-top: 0;
    }
    .btn {
        display: block;
        margin-top: 10px;
        padding: 10px;
        background: #007bff;
        color: white;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
    }
    .btn:hover {
        background: #0056b3;
    }
    </style>
</head>

<body>
<main class="content">
    <div class="container">
        <h1 class="text-center">Tableau de bord - Personnel</h1>

        <div class="grid">

            <div class="box">
                <h2>Emploi du temps</h2>

            </div>

            <div class="box">
                <h2>Présence</h2>
                <a href=" " class="btn">Gérer les enfants</a>
            </div>

            <div class="box">
                <h2>Activités en cours</h2>
                <a href="#" class="btn">Gérer les activités</a>
            </div>

            <div class="box">
                <h2>Rapports</h2>
                <a href="#" class="btn">Envoi rapport journalier</a>
                <a href="#" class="btn">Voir tous les rapports</a>
            </div>

            <div class="box">
                <h2>Messages et notifications</h2>
                <a href="#" class="btn">Voir les messages</a>
            </div>

            <div class="box">
                <h2>Gestion des menus</h2>
                <a href="Menu-manager.html" class="btn">Gestionnaire des menus</a>
                <a href="#" class="btn">Planificateur de repas</a>
            </div>
        </div>
    </div>
</main>
</body>
</html>


