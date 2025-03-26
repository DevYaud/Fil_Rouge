<?php
session_start();
require_once '../functions/session.php';
verifierSessionParents();

require_once '../functions/db.php';
$con = getDatabase();

include 'navigation_parents.php';
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
                <h2>Informations de connexion :</h2>
                <p class="btn"><strong>Email :</strong> <?php echo htmlspecialchars($_SESSION['mail']); ?></p>
                <p class="btn"><strong>ID Connexion :</strong> <?php echo htmlspecialchars($_SESSION['Id_connexion']); ?></p>
            </div>

            <div class="box">
                <h2>Gestion des activités</h2>
                <a href="./activite/inscription_activite.php" class="btn">Inscription</a>
                <a href="./activite/desinscription_activite.php" class="btn">Désinscription</a>
            </div>

            <div class="box">
                <h2>Rapports</h2>
                <a href="./rapport/liste_rapport.php.php" class="btn">Accéder aux rapports</a>
            </div>

            <div class="box">
                <h2>Gestion des repas</h2>
                <a href="./repas/inscription_repas.php" class="btn">Inscription</a>
                <a href="./repas/desinscription_repas.php" class="btn">Désinscription</a>
            </div>

            <div class="box">
                <h2>Autres</h2>
                <a href="./autre/contact.php" class="btn">Contactez l'établissement</a>
                <a href="./autre/facture.php" class="btn">Factures</a>
                <a href="./autre/notation.php" class="btn">Enquête satisfaction</a>
            </div>
        </div>
    </div>
</main>
</body>
</html>