<?php
session_start();
require_once '../../functions/session.php';
verifierSessionAdmin();

require_once '../../functions/db.php';
$con = getDatabase();

include '../navigation_admin.php';

// Récupérer la liste des repas
$stmt = $con->prepare('SELECT Id_repas, nom FROM REPAS');
$stmt->execute();
$result = $stmt->get_result();
$repas = [];
while ($row = $result->fetch_assoc()) {
    $repas[] = $row;
}
$stmt->close();

$success_message = "";
// Traitement du formulaire de suppression
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_repas = $_POST['repas'];

    // Requête de suppression du repas
    $stmt = $con->prepare('DELETE FROM REPAS WHERE Id_repas = ?');
    $stmt->bind_param('i', $id_repas);
    if ($stmt->execute()) {
        $success_message = "Repas supprimé avec succès !";
    } else {
        echo "Erreur lors de la suppression du repas.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Suppression de Repas</title>
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
    <h1>Supprimer un Repas</h1>
    <form action="suppression_repas.php" method="post">
        <div class="form-group">
            <label for="repas">Sélectionnez un repas à supprimer :</label><br>
            <select id="repas" name="repas" required>
                <?php foreach ($repas as $repas_item): ?>
                    <option value="<?php echo $repas_item['Id_repas']; ?>">
                        <?php echo htmlspecialchars("Repas #{$repas_item['Id_repas']}: {$repas_item['nom']}"); ?>
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
