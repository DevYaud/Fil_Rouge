<?php
session_start();
require_once '../../functions/session.php';
verifierSessionAdmin();

require_once '../../functions/db.php';
$con = getDatabase();



// Vérifier si un repas a été sélectionné
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['repas'])) {
    $id_repas = $_POST['repas'];

    // Récupérer les détails du repas sélectionné
    $stmt = $con->prepare('SELECT * FROM REPAS WHERE Id_repas = ?');
    $stmt->bind_param('i', $id_repas);
    $stmt->execute();
    $result = $stmt->get_result();
    $repas = $result->fetch_assoc();
    $stmt->close();
} else {
    // Rediriger vers la page de sélection si aucun repas n'est sélectionné
    header('Location: selection_menu.php');
    exit();
}

$success_message = "";
// Traitement du formulaire de modification
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $nom = $_POST['nom'];
    $entree = $_POST['entree'];
    $plat = $_POST['plat'];
    $dessert = $_POST['dessert'];
    $date = $_POST['date'];
    $id_inscription = $_POST['id_inscription'];

    // Requête de mise à jour du repas
    $stmt = $con->prepare('UPDATE REPAS SET nom = ?, entrée = ?, plat = ?, dessert = ?, date = ?, ID_inscription = ? WHERE Id_repas = ?');
    $stmt->bind_param('sssssii', $nom, $entree, $plat, $dessert, $date, $id_inscription, $id_repas);
    if ($stmt->execute()) {
        $success_message = "Repas modifié avec succès !";
    } else {
        echo "Erreur lors de la mise à jour du repas.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modification de Repas</title>
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
<?php include '../navigation_admin.php';?>
<main class="content">
    <h1>Modifier un Repas</h1>
    <form action="modification_menu.php" method="post">
        <div class="form-group">
            <input type="hidden" name="repas" value="<?php echo $id_repas; ?>">
            <label for="nom">Nom du Repas :</label><br>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($repas['nom']); ?>" required><br><br>

            <label for="entree">Entrée :</label><br>
            <input type="text" id="entree" name="entree" value="<?php echo htmlspecialchars($repas['entree']); ?>" required><br><br>

            <label for="plat">Plat :</label><br>
            <input type="text" id="plat" name="plat" value="<?php echo htmlspecialchars($repas['plat']); ?>" required><br><br>

            <label for="dessert">Dessert :</label><br>
            <input type="text" id="dessert" name="dessert" value="<?php echo htmlspecialchars($repas['dessert']); ?>" required><br><br>

            <label for="date">Date :</label><br>
            <input type="date" id="date" name="date" value="<?php echo $repas['date']; ?>" required><br><br>

            <label for="id_inscription">ID Inscription :</label><br>
            <input type="number" id="id_inscription" name="id_inscription" value="<?php echo $repas['ID_inscription']; ?>" required><br><br>
        </div>
            <input type="submit" class="btn" name="update" value="Mettre à jour">
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
