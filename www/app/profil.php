<?php
session_start();
include 'navigation_parents.php';
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['Id_connexion'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: login.php');
    exit();
}

// Informations de connexion à la base de données
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'sc1zuna1689';
$DATABASE_PASS = 'fil_rouge_projet';
$DATABASE_NAME = 'sc1zuna1689_fil_rouge';

// Connexion à la base de données
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Récupérer l'ID de connexion de la session
$Id_connexion = $_SESSION['Id_connexion'];

// Requête pour récupérer les données de l'utilisateur
$stmt = $con->prepare('SELECT email, nom, telephone, adresse FROM TUTEUR WHERE Id_tuteur = ?');
$stmt->bind_param('i', $Id_connexion);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Récupérer les données de l'utilisateur
    $user = $result->fetch_assoc();

    // Récupérer l'ID de l'enfant de la session
    $Id_enfant = $_SESSION['Id_enfant'];

    // Requête pour récupérer les données de l'enfant
    $stmt_enfant = $con->prepare('SELECT nom, date_naissance, type_regime FROM ENFANT WHERE Id_enfant = ?');
    $stmt_enfant->bind_param('i', $Id_enfant);
    $stmt_enfant->execute();
    $result_enfant = $stmt_enfant->get_result();

    if ($result_enfant->num_rows > 0) {
        // Récupérer les données de l'enfant
        $enfant = $result_enfant->fetch_assoc();
    }
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Profil Utilisateur</title>
    </head>
    <body>
    <h1>Profil Utilisateur</h1>
    <p><strong>Email :</strong> <?php echo htmlspecialchars($user['email']); ?></p>
    <p><strong>Nom :</strong> <?php echo htmlspecialchars($user['nom']); ?></p>
    <p><strong>Téléphone :</strong> <?php echo htmlspecialchars($user['telephone']); ?></p>
    <p><strong>Adresse :</strong> <?php echo htmlspecialchars($user['adresse']); ?></p>
    <?php if (isset($enfant)): ?>
        <h2>Informations de l'Enfant</h2>
        <p><strong>Nom :</strong> <?php echo htmlspecialchars($enfant['nom']); ?></p>
        <p><strong>Date de Naissance :</strong> <?php echo htmlspecialchars($enfant['date_naissance']); ?></p>
        <p><strong>Type de Régime :</strong> <?php echo htmlspecialchars($enfant['type_regime']); ?></p>
    <?php endif; ?>
    </body>
    </html>
    <?php
} else {
    // Si aucune donnée n'est trouvée, rediriger vers la page de connexion
    header('Location: login.php');
    exit();
}

$stmt->close();
$con->close();
?>
