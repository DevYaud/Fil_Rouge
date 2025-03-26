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
                <h2>Informations de connexion :</h2>
                <p class="btn"><strong>Email :</strong> <?php echo htmlspecialchars($_SESSION['mail']); ?></p>
                <p class="btn"><strong>ID Connexion :</strong> <?php echo htmlspecialchars($_SESSION['Id_connexion']); ?></p>
            </div>

            <div class="box">
                <h2>Activités en cours</h2>
                <a href="#" class="btn">Gérer les activités</a>
            </div>

            <div class="box">
                <h2>Gestion des Rapports</h2>
                <a href="./rapport/creation_rapport.php" class="btn">Créer un rapport</a>
                <a href="./rapport/selection_rapport.php" class="btn">Modifier un rapport existant</a>
                <a href="rapport/suppression_rapport.php" class="btn">Supprimer un rapport existant</a>
            </div>

            <div class="box">
                <h2>Gestion des comptes</h2>
                <a href="./compte/creation_compte.php" class="btn">Créer un compte</a>
                <a href="./menu/selection_menu.php" class="btn">Modifier un compte existant</a>
                <a href="./menu/suppression_menu.php" class="btn">Supprimer un compte existant</a>
            </div>

            <div class="box">
                <h2>Gestion des menus</h2>
                <a href="./menu/creation_menu.php" class="btn">Créer un menu</a>
                <a href="./menu/selection_menu.php" class="btn">Modifier un menu existant</a>
                <a href="./menu/suppression_menu.php" class="btn">Supprimer un menu existant</a>
            </div>
        </div>
    </div>
</main>
</body>
</html>


