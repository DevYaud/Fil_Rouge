<?php
session_start();
require_once '../../functions/session.php';
verifierSessionAdmin();

require_once '../../functions/db.php';
$con = getDatabase();

include '../navigation_admin.php';

// Récupérer la liste des événements
$stmt = $con->prepare('SELECT Id_Event, commentaire, debut, fin, A.nom AS nom_activite, P.nom AS nom_personnel FROM EVENEMENT E JOIN ACTIVITE A ON E.Id_activite = A.Id_activite JOIN PERSONNEL P ON E.Id_personnel = P.Id_personnel');
$stmt->execute();
$result = $stmt->get_result();
$evenements = [];
while ($row = $result->fetch_assoc()) {
    $evenements[] = $row;
}
$stmt->close();

$success_message = "";
// Traitement du formulaire de suppression
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_evenement = $_POST['evenement'];

    // Requête de suppression de l'événement
    $stmt = $con->prepare('DELETE FROM EVENEMENT WHERE Id_Event = ?');
    $stmt->bind_param('i', $id_evenement);
    if ($stmt->execute()) {
        $success_message = "Événement supprimé avec succès !";
    } else {
        echo "Erreur lors de la suppression de l'événement.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Suppression d'Événement</title>
    <link rel="stylesheet" href="../../styles/main.css">
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
    <h1>Supprimer un Événement</h1>
    <form action="suppression_evenement.php" method="post">
        <div class="form-group">
            <label for="evenement">Sélectionnez un événement à supprimer :</label><br>
            <select id="evenement" name="evenement" required>
                <?php foreach ($evenements as $evenement): ?>
                    <option value="<?php echo $evenement['Id_Event']; ?>">
                        <?php echo htmlspecialchars("Événement #{$evenement['Id_Event']}: {$evenement['commentaire']} ({$evenement['nom_activite']})"); ?>
                    </option>
                <?php endforeach; ?>
            </select><br><br>
        </div>
        <input type="submit" class="btn" value="Supprimer">
    </form>

    <?php
    if ($success_message) {
        echo "<script>showPopup('$success_message');</script>";
    }
    ?>
</main>
</body>
</html>

<?php
$con->close();
?>
