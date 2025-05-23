<?php
session_start();
require_once '../../functions/session.php';
verifierSessionAdmin();

require_once '../../functions/db.php';
$con = getDatabase();

include '../navigation_admin.php';

// Vérifier si un rapport a été sélectionné
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['rapport'])) {
    $id_rapport = $_POST['rapport'];

    // Récupérer les détails du rapport sélectionné
    $stmt = $con->prepare('SELECT * FROM RAPPORT WHERE Id_rapport = ?');
    $stmt->bind_param('i', $id_rapport);
    $stmt->execute();
    $result = $stmt->get_result();
    $rapport = $result->fetch_assoc();
    $stmt->close();
} else {
    // Rediriger vers la page de sélection si aucun rapport n'est sélectionné
    header('Location: selection_rapport.php');
    exit();
}

$success_message = "";
// Traitement du formulaire de modification
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $commentaire = $_POST['Commentaire'];
    $info_comportement = $_POST['info_Comportement'];
    $date = $_POST['date'];
    $id_enfant = $_POST['enfant'];

    // Requête de mise à jour du rapport
    $stmt = $con->prepare('UPDATE RAPPORT SET Commentaire = ?, info_Comportement = ?, date = ?, Id_enfant = ? WHERE Id_rapport = ?');
    $stmt->bind_param('sssii', $commentaire, $info_comportement, $date, $id_enfant, $id_rapport);
    if ($stmt->execute()) {
        $success_message = "Rapport modifié avec succès !";
    } else {
        echo "Erreur lors de la mise à jour du rapport.";
    }
    $stmt->close();
}

// Récupérer la liste des enfants pour le formulaire
$stmt = $con->prepare('SELECT Id_enfant, nom FROM ENFANT');
$stmt->execute();
$result = $stmt->get_result();
$enfants = [];
while ($row = $result->fetch_assoc()) {
    $enfants[] = $row;
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modification de Rapport</title>
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
<h1>Modifier un Rapport</h1>
<form action="modification_rapport.php" method="post">
    <div class="form-group">
    <input type="hidden" name="rapport" value="<?php echo $id_rapport; ?>">
    <label for="Commentaire">Commentaire :</label><br>
    <textarea id="Commentaire" name="Commentaire" rows="4" cols="50" required><?php echo htmlspecialchars($rapport['Commentaire']); ?></textarea><br><br>

    <label for="info_Comportement">Information Comportement :</label><br>
    <textarea id="info_Comportement" name="info_Comportement" rows="4" cols="50" required><?php echo htmlspecialchars($rapport['info_Comportement']); ?></textarea><br><br>

    <label for="date">Date du Rapport :</label><br>
    <input type="date" id="date" name="date" value="<?php echo $rapport['date']; ?>" required><br><br>

    <label for="enfant">Enfant :</label><br>
    <select id="enfant" name="enfant" required>
        <?php foreach ($enfants as $enfant): ?>
            <option value="<?php echo $enfant['Id_enfant']; ?>" <?php if ($enfant['Id_enfant'] == $rapport['Id_enfant']) echo 'selected'; ?>>
                <?php echo htmlspecialchars($enfant['nom']); ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>
    <input type="submit" class="btn" name="update" value="Mettre à jour">
    </div>
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
