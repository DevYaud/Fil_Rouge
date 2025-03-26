<?php
session_start();
require_once '../../functions/session.php';
verifierSessionAdmin();

require_once '../../functions/db.php';
$con = getDatabase();

include '../navigation_admin.php';

// Vérifier si un événement a été sélectionné
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['evenement'])) {
    $id_evenement = $_POST['evenement'];

    // Récupérer les détails de l'événement sélectionné
    $stmt = $con->prepare('SELECT Id_Event, commentaire, debut, fin, Id_activite, Id_personnel FROM EVENEMENT WHERE Id_Event = ?');
    $stmt->bind_param('i', $id_evenement);
    $stmt->execute();
    $result = $stmt->get_result();
    $evenement = $result->fetch_assoc();
    $stmt->close();
} else {
    // Rediriger vers la page de sélection si aucun événement n'est sélectionné
    header('Location: selection_evenement.php');
    exit();
}

// Récupérer la liste des activités
$stmt = $con->prepare('SELECT Id_activite, nom FROM ACTIVITE');
$stmt->execute();
$result = $stmt->get_result();
$activites = [];
while ($row = $result->fetch_assoc()) {
    $activites[] = $row;
}
$stmt->close();

// Récupérer la liste du personnel
$stmt = $con->prepare('SELECT Id_personnel, nom FROM PERSONNEL');
$stmt->execute();
$result = $stmt->get_result();
$personnels = [];
while ($row = $result->fetch_assoc()) {
    $personnels[] = $row;
}
$stmt->close();

// Traitement du formulaire de modification
$success_message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $commentaire = $_POST['commentaire'];
    $debut = $_POST['debut'];
    $fin = $_POST['fin'];
    $id_activite = $_POST['activite'];
    $id_personnel = $_POST['personnel'];

    // Requête de mise à jour de l'événement
    $stmt = $con->prepare('UPDATE EVENEMENT SET commentaire = ?, debut = ?, fin = ?, Id_activite = ?, Id_personnel = ? WHERE Id_Event = ?');
    $stmt->bind_param('sssiii', $commentaire, $debut, $fin, $id_activite, $id_personnel, $id_evenement);
    if ($stmt->execute()) {
        $success_message = "Événement mis à jour avec succès !";
    } else {
        echo "Erreur lors de la mise à jour de l'événement : " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modification d'Événement</title>
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
    <h1>Modifier un Événement</h1>
    <form action="modification_evenement.php" method="post">
        <input type="hidden" name="evenement" value="<?php echo $id_evenement; ?>">
        <div class="form-group">
            <label for="commentaire">Commentaire :</label><br>
            <textarea id="commentaire" name="commentaire" rows="4" cols="50" required><?php echo htmlspecialchars($evenement['commentaire']); ?></textarea><br><br>

            <label for="debut">Date de début :</label><br>
            <input type="datetime-local" id="debut" name="debut" value="<?php echo date('Y-m-d\TH:i', strtotime($evenement['debut'])); ?>" required><br><br>

            <label for="fin">Date de fin :</label><br>
            <input type="datetime-local" id="fin" name="fin" value="<?php echo date('Y-m-d\TH:i', strtotime($evenement['fin'])); ?>" required><br><br>

            <label for="activite">Activité :</label><br>
            <select id="activite" name="activite" required>
                <?php foreach ($activites as $activite): ?>
                    <option value="<?php echo $activite['Id_activite']; ?>" <?php if ($activite['Id_activite'] == $evenement['Id_activite']) echo 'selected'; ?>>
                        <?php echo htmlspecialchars($activite['nom']); ?>
                    </option>
                <?php endforeach; ?>
            </select><br><br>

            <label for="personnel">Personnel :</label><br>
            <select id="personnel" name="personnel" required>
                <?php foreach ($personnels as $personnel): ?>
                    <option value="<?php echo $personnel['Id_personnel']; ?>" <?php if ($personnel['Id_personnel'] == $evenement['Id_personnel']) echo 'selected'; ?>>
                        <?php echo htmlspecialchars($personnel['nom']); ?>
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
