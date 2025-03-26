<?php
session_start();
require_once '../../functions/session.php';
verifierSessionAdmin();

require_once '../../functions/db.php';
$con = getDatabase();

include '../navigation_admin.php';

// Récupérer la liste des spécialités
$stmt = $con->prepare('SELECT Id_Specialite, Nom FROM SPECIALITE');
$stmt->execute();
$result = $stmt->get_result();
$specialites = [];
while ($row = $result->fetch_assoc()) {
    $specialites[] = $row;
}
$stmt->close();

// Récupérer la liste des thématiques
$stmt = $con->prepare('SELECT Id_thematique, Nom FROM THEMATIQUE');
$stmt->execute();
$result = $stmt->get_result();
$thematiques = [];
while ($row = $result->fetch_assoc()) {
    $thematiques[] = $row;
}
$stmt->close();

// Traitement du formulaire
$success_message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $groupe = $_POST['groupe'];
    $nb_max = $_POST['nb_max'];
    $id_specialite = $_POST['specialite'];
    $id_thematique = $_POST['thematique'];

    // Requête d'ajout de données
    $stmt = $con->prepare('INSERT INTO ACTIVITE (nom, description, groupe, nb_max, Id_Specialite, Id_thematique) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('sssiii', $nom, $description, $groupe, $nb_max, $id_specialite, $id_thematique);
    if ($stmt->execute()) {
        $success_message = "Activité créée avec succès !";
    } else {
        echo "Erreur lors de la création de l'activité : " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Création d'Activité</title>
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
    <h1>Créer une Activité</h1>
    <form action="creation_activite.php" method="post">
        <div class="form-group">
            <label for="nom">Nom de l'activité :</label><br>
            <input type="text" id="nom" name="nom" required><br><br>

            <label for="description">Description :</label><br>
            <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>

            <label for="groupe">Groupe :</label><br>
            <input type="text" id="groupe" name="groupe" required><br><br>

            <label for="nb_max">Nombre maximum de participants :</label><br>
            <input type="number" id="nb_max" name="nb_max" required><br><br>

            <label for="specialite">Spécialité :</label><br>
            <select id="specialite" name="specialite" required>
                <?php foreach ($specialites as $specialite): ?>
                    <option value="<?php echo $specialite['Id_Specialite']; ?>">
                        <?php echo htmlspecialchars($specialite['Nom']); ?>
                    </option>
                <?php endforeach; ?>
            </select><br><br>

            <label for="thematique">Thématique :</label><br>
            <select id="thematique" name="thematique" required>
                <?php foreach ($thematiques as $thematique): ?>
                    <option value="<?php echo $thematique['Id_thematique']; ?>">
                        <?php echo htmlspecialchars($thematique['Nom']); ?>
                    </option>
                <?php endforeach; ?>
            </select><br><br>

            <input type="submit" class="btn" value="Valider">
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
