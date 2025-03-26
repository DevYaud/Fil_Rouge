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
    SELECT E.Id_Event, E.commentaire, E.debut, E.fin, A.nb_max, A.nom, E.places_disponibles
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

// Traitement de l'inscription
$success_message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['inscription'])) {
    $id_event = $_POST['inscription'];
    $id_enfant = $_SESSION['Id_enfant'];
    $date_inscription = date('Y-m-d H:i:s');
    $presence = 0;

    // Requête d'ajout de l'inscription
    $stmt = $con->prepare('INSERT INTO INSCRIPTION (date_inscription, presence, Id_enfant, Id_Event) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('siiii', $date_inscription, $presence, $id_enfant, $id_event);
    if ($stmt->execute()) {
        $success_message = "Inscription réussie !";
    } else {
        echo "Erreur lors de l'inscription : " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription aux Activités</title>
    <link rel="stylesheet" href="../../styles/main_parent.css">
    <script>
        function showPopup(message) {
            alert(message);
            window.location.href = '../dashboard.php';
        }
    </script>
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
                        <li style="cursor: pointer;" onclick="document.getElementById('form_<?php echo $evenement['Id_Event']; ?>').submit();">
                            <form id="form_<?php echo $evenement['Id_Event']; ?>" action="./inscription_activite.php" method="post">
                                <input type="hidden" name="inscription" value="<?php echo $evenement['Id_Event']; ?>">
                                <strong>Nom de l'activité :</strong> <?php echo htmlspecialchars($evenement['nom']); ?><br>
                                <strong>Commentaire :</strong> <?php echo htmlspecialchars($evenement['commentaire']); ?><br>
                                <strong>Date de début :</strong> <?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($evenement['debut']))); ?><br>
                                <strong>Date de fin :</strong> <?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($evenement['fin']))); ?><br>
                                <strong>Places disponibles :</strong> <?php echo htmlspecialchars($evenement['places_disponibles']); ?>
                            </form>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php
if ($success_message) {
    echo "<script>showPopup('$success_message');</script>";
}
?>

</body>
</html>

<?php
$con->close();
?>
