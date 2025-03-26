<?php
session_start();
require_once '../../functions/session.php';
verifierSessionParents();

require_once '../../functions/db.php';
$con = getDatabase();

include '../navigation_parents.php';

// Récupérer l'ID du tuteur à partir de la session
$id_connexion = $_SESSION['Id_connexion'];

// Récupérer les factures non payées
$stmt = $con->prepare('SELECT montant FROM FACTURE WHERE Id_tuteur = ? AND est_paye = 0');
$stmt->bind_param('i', $id_connexion);
$stmt->execute();
$result = $stmt->get_result();
$total_non_paye = 0;
while ($row = $result->fetch_assoc()) {
    $total_non_paye += $row['montant'];
}
$stmt->close();

// Récupérer les factures payées
$stmt = $con->prepare('SELECT Id_facture, date, montant, echeance FROM FACTURE WHERE Id_tuteur = ? AND est_paye = 1');
$stmt->bind_param('i', $id_connexion);
$stmt->execute();
$result = $stmt->get_result();
$factures_payees = [];
while ($row = $result->fetch_assoc()) {
    $factures_payees[] = $row;
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturation</title>
    <link rel="stylesheet" href="../../styles/main.css">
</head>
<body>
<main class="content">
    <div class="container">
        <h1 class="text-center">Facturation</h1>
        <div class="box">
            <h2>Total des factures non payées :</h2>
            <p><?php echo htmlspecialchars(number_format($total_non_paye, 2, ',', ' ')); ?> €</p>
            <a href="https://www.paypal.com/paypalme/Newoobs" class="btn">Payer</a>
        </div>

        <div class="box">
            <h2>Liste des factures payées :</h2>
            <?php if (empty($factures_payees)): ?>
                <p>Aucune facture payée.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($factures_payees as $facture): ?>
                        <li>
                            <strong>Date :</strong> <?php echo htmlspecialchars($facture['date']); ?><br>
                            <strong>Montant :</strong> <?php echo htmlspecialchars(number_format($facture['montant'], 2, ',', ' ')); ?> €<br>
                            <strong>Échéance :</strong> <?php echo htmlspecialchars($facture['echeance']); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</main>
</body>
</html>

<?php
$con->close();
?>

