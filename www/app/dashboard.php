<?php
session_start();
require_once '../functions/session.php';
verifierSessionParents();

require_once '../functions/db.php';
$con = getDatabase();

include 'navigation_parents.php';

// Récupérer le nom du tuteur
$id_connexion = $_SESSION['Id_connexion'];
$stmt = $con->prepare('SELECT nom FROM TUTEUR WHERE Id_tuteur = ?');
$stmt->bind_param('i', $id_connexion);
$stmt->execute();
$result = $stmt->get_result();
$tuteur = $result->fetch_assoc();
$stmt->close();

// Récupérer l'ID de l'enfant
$stmt = $con->prepare('SELECT Id_enfant FROM PARENTE WHERE Id_tuteur = ? LIMIT 1');
$stmt->bind_param('i', $id_connexion);
$stmt->execute();
$result = $stmt->get_result();
$enfant_id = $result->fetch_assoc();
$stmt->close();

// Récupérer les informations de l'enfant
$stmt = $con->prepare('SELECT nom, date_naissance FROM ENFANT WHERE Id_enfant = ?');
$stmt->bind_param('i', $enfant_id['Id_enfant']);
$stmt->execute();
$result = $stmt->get_result();
$enfant = $result->fetch_assoc();
$stmt->close();

// Calculer l'âge de l'enfant
$date_naissance = new DateTime($enfant['date_naissance']);
$aujourdhui = new DateTime();
$age = $aujourdhui->diff($date_naissance)->y;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Parent</title>
    <link rel="stylesheet" href="../styles/main_parent.css">
</head>
<body>
<main class="content">
    <div class="container">
        <h1 class="text-center">Tableau de bord - Parent</h1>
        <div class="grid">
            <div class="box">
                <h2>Emploi du temps</h2>
            </div>

            <div class="box">
                <h2>Informations de connexion :</h2>
                <a class="btn"><strong>Mail :</strong> <?php echo htmlspecialchars($_SESSION['mail']); ?></a>
                <a class="btn"><strong>Nom du tuteur :</strong> <?php echo htmlspecialchars($tuteur['nom']); ?></a>
                <a class="btn"><strong>Nom de l'enfant :</strong> <?php echo htmlspecialchars($enfant['nom']); ?></a>
                <a class="btn"><strong>Âge de l'enfant :</strong> <?php echo $age; ?> ans</a>
            </div>

            <div class="box">
                <h2>Gestion des activités</h2>
                <a href="./activite/selection_activite.php" class="btn">Inscription</a>
                <a href="./activite/desinscription_activite.php" class="btn">Désinscription</a>
            </div>

            <div class="box">
                <h2>Rapports</h2>
                <a href="./rapport/liste_rapport.php" class="btn">Accéder aux rapports</a>
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

<?php
$con->close();
?>
