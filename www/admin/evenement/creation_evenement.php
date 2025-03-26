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

// Récupérer la liste du personnel
$stmt = $con->prepare('SELECT Id_personnel, nom FROM PERSONNEL');
$stmt->execute();
$result = $stmt->get_result();
$personnels = [];
while ($row = $result->fetch_assoc()) {
    $personnel[] = $row;
}
$stmt->close();

// Traitement du formulaire
$success_message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $commentaire = $_POST['commentaire'];
    $debut = $_POST['debut'];
    $fin = $_POST['fin'];
    $id_activite = $_POST['activite'];
    $id_personnel = $_POST['personnel'];

    // Requête d'ajout de données
    $stmt = $con->prepare('INSERT INTO EVENEMENT (commentaire, debut, fin, Id_activite, Id_personnel) VALUES (?, ?, ?, ?, ?)');
    $stmt->bind_param('sssii', $commentaire, $debut, $fin, $id_activite, $id_personnel);
    if ($stmt->execute()) {
        $success_message = "Événement créé avec succès !";
    } else {
        echo "Erreur lors de la création de l'événement : " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Création d'Événement</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/form.css">
    <script>
        function showPopup(message) {
            alert(message);
            window.location.href = '../dashboard.php';
        }
    </script>
</head>
<body>
<main class="content">
    <h1>Créer un Événement</h1>
    <form action="creation_evenement.php" method="post">
        <div class="form-group">
            <label for="commentaire">Commentaire :</label><br>
            <textarea id="commentaire" name="commentaire" rows="4" cols="50" required></textarea><br><br>

            <label for="debut">Date de début :</label><br>
            <input type="datetime-local" id="debut" name="debut" required><br><br>

            <label for="fin">Date de fin :</label><br>
            <input type="datetime-local" id="fin" name="fin" required><br><br>

            <label for="activite">Activité :</label><br>
            <select id="activite" name="activite" required>
                <?php foreach ($activites as $activite): ?>
                    <option value="<?php echo $activite['Id_activite']; ?>">
                        <?php echo htmlspecialchars($activite['nom']); ?>
                    </option>
                <?php endforeach; ?>
            </select><br><br>
            <select id="personnel" name="personnel" required>
                <?php foreach ($personnels as $personnel): ?>
                    <option value="<?php echo $personnel['Id_personnel']; ?>">
                        <?php echo htmlspecialchars($personnel['nom']); ?>
                    </option>
                <?php endforeach; ?>
            </select><br><br>

            <label for="places_disponibles">Places disponibles :</label><br>
            <input type="number" id="places_disponibles" name="places_disponibles" required><br><br>

            <input type="submit" class="btn" value="Créer">
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
