<?php
session_start();
require_once '../../functions/session.php';
verifierSessionAdmin();

require_once '../../functions/db.php';
$con = getDatabase();

include '../navigation_admin.php';

// Récupérer la liste des activités
$stmt = $con->prepare('SELECT Id_activite, nom FROM ACTIVITE');
$stmt->execute();
$result = $stmt->get_result();
$activites = [];
while ($row = $result->fetch_assoc()) {
    $activites[] = $row;
}
$stmt->close();

$success_message = "";
// Traitement du formulaire de suppression
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_activite = $_POST['activite'];

    // Requête de suppression de l'activité
    $stmt = $con->prepare('DELETE FROM ACTIVITE WHERE Id_activite = ?');
    $stmt->bind_param('i', $id_activite);
    if ($stmt->execute()) {
        $success_message = "Activité supprimée avec succès !";
    } else {
        echo "Erreur lors de la suppression de l'activité.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Suppression d'Activité</title>
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
    <h1>Supprimer une Activité</h1>
    <form action="suppression_activite.php" method="post">
        <div class="form-group">
            <label for="activite">Sélectionnez une activité à supprimer :</label><br>
            <select id="activite" name="activite" required>
                <?php foreach ($activites as $activite): ?>
                    <option value="<?php echo $activite['Id_activite']; ?>">
                        <?php echo htmlspecialchars("Activité #{$activite['Id_activite']}: {$activite['nom']}"); ?>
                    </option>
                <?php endforeach; ?>
            </select><br><br>
        </div>
        <input type="submit" class="btn" value="Supprimer">
    </form>
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
