<?php
session_start();
require_once '../../functions/session.php';
verifierSessionAdmin();

require_once '../../functions/db.php';
$con = getDatabase();

include '../navigation_admin.php';

// Récupérer la liste des utilisateurs
$stmt = $con->prepare('SELECT Id_utilisateur, mail FROM UTILISATEUR');
$stmt->execute();
$result = $stmt->get_result();
$utilisateurs = [];
while ($row = $result->fetch_assoc()) {
    $utilisateurs[] = $row;
}
$stmt->close();

$success_message = "";
// Traitement du formulaire de suppression
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_utilisateur = $_POST['utilisateur'];

    // Requête de suppression de l'utilisateur
    $stmt = $con->prepare('DELETE FROM UTILISATEUR WHERE Id_utilisateur = ?');
    $stmt->bind_param('i', $id_utilisateur);
    if ($stmt->execute()) {
        $success_message = "Compte utilisateur supprimé avec succès !";
    } else {
        echo "Erreur lors de la suppression du compte utilisateur.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Suppression de Compte</title>
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
    <h1>Supprimer un Compte Utilisateur</h1>
    <form action="suppression_compte.php" method="post">
        <div class="form-group">
            <label for="utilisateur">Sélectionnez un compte à supprimer :</label><br>
            <select id="utilisateur" name="utilisateur" required>
                <?php foreach ($utilisateurs as $utilisateur): ?>
                    <option value="<?php echo $utilisateur['Id_utilisateur']; ?>">
                        <?php echo htmlspecialchars("Compte #{$utilisateur['Id_utilisateur']}: {$utilisateur['mail']}"); ?>
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
