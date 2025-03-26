<?php
session_start();
require_once '../functions/session.php';
verifierSessionAdmin();

require_once '../functions/db.php';
$con = getDatabase();

include 'navigation_admin.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Personnel</title>
    <link rel="stylesheet" href="../styles/main.css">
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
                <a href="./rapport/creation_rapport.php" class="btn">Envoi rapport journalier</a>
                <a href="./rapport/selection_rapport.php" class="btn">Modifier rapport journalier</a>
                <a href="rapport/suppression_rapport.php" class="btn">Supprimer rapport journalier</a>
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


