<?php
session_start();
require_once '../../functions/session.php';
verifierSessionAdmin();

require_once '../../functions/db.php';
$con = getDatabase();

include '../navigation_admin.php';

// Vérifier si une activité a été sélectionnée
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['activite'])) {
    $id_activite = $_POST['activite'];

    // Récupérer les détails de l'activité sélectionnée
    $stmt = $con->prepare('SELECT * FROM ACTIVITE WHERE Id_activite = ?');
    $stmt->bind_param('i', $id_activite);
    $stmt->execute();
    $result = $stmt->get_result();
    $activite = $result->fetch_assoc();
    $stmt->close();
} else {
    // Rediriger vers la page de sélection si aucune activité n'est sélectionnée
    header('Location: selection_activite.php');
    exit();
}

// Traitement du formulaire de modification
$success_message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $groupe = $_POST['groupe'];
    $nb_max = $_POST['nb_max'];
    $id_specialite = $_POST['specialite'];
    $id_thematique = $_POST['thematique'];

    // Requête de mise à jour de l'activité
    $stmt = $con->prepare('UPDATE ACTIVITE SET nom = ?, description = ?, groupe = ?, nb_max = ?, Id_Specialite = ?, Id_thematique = ? WHERE Id_activite = ?');
    $stmt->bind_param('sssiiii', $nom, $description, $groupe, $nb_max, $id_specialite, $id_thematique, $id_activite);
    if ($stmt->execute()) {
        $success_message = "Activité mise à jour avec succès !";
    } else {
        echo "Erreur lors de la mise à jour de l'activité.";
    }
    $stmt->close();
}

// Récupérer la liste des spécialités pour le formulaire
$stmt = $con->prepare('SELECT Id_Specialite, Nom FROM SPECIALITE');
$stmt->execute();
$result = $stmt->get_result();
$specialites = [];
while ($row = $result->fetch_assoc()) {
    $specialites[] = $row;
}
$stmt->close();

// Récupérer la liste des thématiques pour le formulaire
$stmt = $con->prepare('SELECT Id_thematique, Nom FROM THEMATIQUE');
$stmt->execute();
$result = $stmt->get_result();
$thematiques = [];
while ($row = $result->fetch_assoc()) {
    $thematiques[] = $row;
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modification d'Activité</title>
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
    <h1>Modifier une Activité</h1>
    <form action="modification_activite.php" method="post">
        <input type="hidden" name="activite" value="<?php echo $id_activite; ?>">
        <div class="form-group">
            <label for="nom">Nom de l'activité :</label><br>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($activite['nom']); ?>" required><br><br>

            <label for="description">Description :</label><br>
            <textarea id="description" name="description" rows="4" cols="50" required><?php echo htmlspecialchars($activite['description']); ?></textarea><br><br>

            <label for="groupe">Groupe :</label><br>
            <input type="text" id="groupe" name="groupe" value="<?php echo htmlspecialchars($activite['groupe']); ?>" required><br><br>

            <label for="nb_max">Nombre maximum de participants :</label><br>
            <input type="number" id="nb_max" name="nb_max" value="<?php echo $activite['nb_max']; ?>" required><br><br>

            <label for="specialite">Spécialité :</label><br>
            <select id="specialite" name="specialite" required>
                <?php foreach ($specialites as $specialite): ?>
                    <option value="<?php echo $specialite['Id_Specialite']; ?>" <?php if ($specialite['Id_Specialite'] == $activite['Id_Specialite']) echo 'selected'; ?>>
                        <?php echo htmlspecialchars($specialite['Nom']); ?>
                    </option>
                <?php endforeach; ?>
            </select><br><br>

            <label for="thematique">Thématique :</label><br>
            <select id="thematique" name="thematique" required>
                <?php foreach ($thematiques as $thematique): ?>
                    <option value="<?php echo $thematique['Id_thematique']; ?>" <?php if ($thematique['Id_thematique'] == $activite['Id_thematique']) echo 'selected'; ?>>
                        <?php echo htmlspecialchars($thematique['Nom']); ?>
                    </option>
                <?php endforeach; ?>
            </select><br><br>

            <input type="submit" name="update" class="btn" value="Mettre à jour">
        </div>
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
