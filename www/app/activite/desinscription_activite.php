<?php
session_start();
require_once '../../functions/session.php';
verifierSessionParents();

require_once '../../functions/db.php';
$con = getDatabase();

include '../navigation_parents.php';

// Récupérer l'ID de l'enfant à partir de la session
$id_enfant = $_SESSION['Id_enfant'];

// Récupérer les inscriptions de l'enfant
$stmt = $con->prepare('
    SELECT I.Id_inscription, A.nom, E.debut, E.fin
    FROM INSCRIPTION I
    JOIN EVENEMENT E ON I.Id_Event = E.Id_Event
    JOIN ACTIVITE A ON E.Id_activite = A.Id_activite
    WHERE I.Id_enfant = ?
');
$stmt->bind_param('i', $id_enfant);
$stmt->execute();
$result = $stmt->get_result();
$inscriptions = [];
while ($row = $result->fetch_assoc()) {
    $inscriptions[] = $row;
}
$stmt->close();

$success_message = "";
// Traitement du formulaire de suppression
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_inscription = $_POST['inscription'];

    // Requête de suppression de l'inscription
    $stmt = $con->prepare('DELETE FROM INSCRIPTION WHERE Id_inscription = ?');
    $stmt->bind_param('i', $id_inscription);
    if ($stmt->execute()) {
        $success_message = "Inscription supprimée avec succès !";
    } else {
        echo "Erreur lors de la suppression de l'inscription.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Désinscription d'Activité</title>
    <link rel="stylesheet" href="../../styles/main_parent.css">
    <link rel="stylesheet" href="../../styles/form.css">
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
        <h1 class="text-center">Désinscription d'Activité</h1>
        <div class="box">
            <?php if (empty($inscriptions)): ?>
                <p>Aucune inscription trouvée pour cet enfant.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($inscriptions as $inscription): ?>
                        <li style="cursor: pointer;" onclick="document.getElementById('form_<?php echo $inscription['Id_inscription']; ?>').submit();">
                            <form id="form_<?php echo $inscription['Id_inscription']; ?>" action="desinscription_activite.php" method="post">
                                <input type="hidden" name="inscription" value="<?php echo $inscription['Id_inscription']; ?>">
                                <strong>Nom de l'activité :</strong> <?php echo htmlspecialchars($inscription['nom']); ?><br>
                                <strong>Date de début :</strong> <?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($inscription['debut']))); ?><br>
                                <strong>Date de fin :</strong> <?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($inscription['fin']))); ?>
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
