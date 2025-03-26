<?php
session_start();
require_once '../../functions/session.php';
verifierSessionAdmin();

require_once '../../functions/db.php';
$con = getDatabase();

include '../navigation_parents.php';

// Traitement du formulaire
$success_message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sujet = $_POST['sujet'];
    $note = $_POST['note'];
    $siret = '12345678901234'; // SIRET par défaut

    // Requête d'ajout de données
    $stmt = $con->prepare('INSERT INTO SATISFACTION (sujet, note, SIRET) VALUES (?, ?, ?)');
    $stmt->bind_param('sii', $sujet, $note, $siret);
    if ($stmt->execute()) {
        $success_message = "Note ajoutée avec succès !";
    } else {
        echo "Erreur lors de l'ajout de la note : " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Notation de l'Établissement</title>
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
    <h1>Noter l'Établissement</h1>
    <form action="notation.php" method="post">
        <div class="form-group">
            <label for="sujet">Sujet :</label><br>
            <input type="text" id="sujet" name="sujet" required><br><br>

            <label for="note">Note (1 à 5) :</label><br>
            <select id="note" name="note" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select><br><br>

            <input type="submit" class="btn" value="Soumettre">
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
