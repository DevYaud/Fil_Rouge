<?php
session_start();
include '../navigation_admin.php';
require_once '../../functions/db.php';
require_once '../../functions/session.php';

verifierSessionAdmin();
$con = getDatabase();

// Récupérer la liste des rapports
$stmt = $con->prepare('SELECT Id_rapport, Commentaire FROM RAPPORT');
$stmt->execute();
$result = $stmt->get_result();
$rapports = [];
while ($row = $result->fetch_assoc()) {
    $rapports[] = $row;
}
$stmt->close();

$success_message = "";
// Traitement du formulaire de suppression
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_rapport = $_POST['rapport'];

    // Requête de suppression du rapport
    $stmt = $con->prepare('DELETE FROM RAPPORT WHERE Id_rapport = ?');
    $stmt->bind_param('i', $id_rapport);
    if ($stmt->execute()) {
        $success_message = "Rapport supprimé avec succès !";
        exit();
    } else {
        echo "Erreur lors de la suppression du rapport.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Suppression de Rapport</title>
    <link rel="stylesheet" href="../../styles/main.css">
    <script>
        function showPopup(message) {
            alert(message);
            window.location.href = '../dashboard.php';
        }
    </script>
</head>
<body>
<main class="content">
<h1>Supprimer un Rapport</h1>
<form action="suppression_rapport.php" method="post">
    <label for="rapport">Sélectionnez un rapport à supprimer :</label><br>
    <select id="rapport" name="rapport" required>
        <?php foreach ($rapports as $rapport): ?>
            <option value="<?php echo $rapport['Id_rapport']; ?>">
                <?php echo htmlspecialchars("Rapport #{$rapport['Id_rapport']}: {$rapport['Commentaire']}"); ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>
    <input type="submit" value="Supprimer">
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
