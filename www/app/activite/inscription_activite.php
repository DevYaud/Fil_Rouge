<?php
session_start();
require_once '../../functions/session.php';
verifierSessionParents();

require_once '../../functions/db.php';
$con = getDatabase();

include '../navigation_parents.php';

// Calculer la date de J+7
$date_j_plus_7 = date('Y-m-d H:i:s', strtotime('+7 days'));

// Récupérer les événements disponibles entre aujourd'hui et J+7
$stmt = $con->prepare('
    SELECT E.Id_Event, E.commentaire, E.debut, E.fin, E.places_disponibles, A.nom AS nom_activite
    FROM EVENEMENT E
    JOIN ACTIVITE A ON E.Id_activite = A.Id_activite
    WHERE E.debut BETWEEN NOW() AND ?
');
$stmt->bind_param('s', $date_j_plus_7);
$stmt->execute();
$result = $stmt->get_result();
$evenements = [];
while ($row = $result->fetch_assoc()) {
    $evenements[] = $row;
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription aux Activités</title>
    <link rel="stylesheet" href="../../styles/main_parent.css">
</head>
<body>
<main class="content">
    <div class="container">
        <h1 class="text-center">Inscription aux Activités</h1>
        <div class="box">
            <?php if (empty($evenements)): ?>
                <p>Aucun événement disponible pour les 7 prochains jours.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($evenements as $evenement): ?>
                        <li>
                            <strong>Nom de l'activité :</strong> <?php echo htmlspecialchars($evenement['nom_activite']); ?><br>
                            <strong>Commentaire :</strong> <?php echo htmlspecialchars($evenement['commentaire']); ?><br>
                            <strong>Date de début :</strong> <?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($evenement['debut']))); ?><br>
                            <strong>Date de fin :</strong> <?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($evenement['fin']))); ?><br>
                            <strong>Places disponibles :</strong> <?php echo htmlspecialchars($evenement['places_disponibles']); ?>
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
