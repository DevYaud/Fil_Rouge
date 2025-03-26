<?php
session_start();
require_once '../../functions/session.php';
verifierSessionAdmin();

require_once '../../functions/db.php';
$con = getDatabase();

include '../navigation_admin.php';

verifierSessionAdmin();
$con = getDatabase();

// Traitement du formulaire
$success_message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $entree = $_POST['entree'];
    $plat = $_POST['plat'];
    $dessert = $_POST['dessert'];
    $date = $_POST['date'];
    $id_inscription = $_POST['id_inscription'];

    // Requête d'ajout de données
    $stmt = $con->prepare('INSERT INTO REPAS (nom, plat, dessert, date) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('sssi', $nom, $plat, $dessert, $date);
    if ($stmt->execute()) {
        $success_message = "Menu ajouté avec succès !";
    } else {
        echo "Erreur lors de l'ajout du menu : " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Création de Menu</title>
    <script>
        function showPopup(message) {
            alert(message);
            window.location.href = '../dashboard.php';
        }
    </script>
    <link rel="stylesheet" href="../../styles/main.css">
    <link rel="stylesheet" href="../../styles/form.css">
</head>
<body>
<main class = "content">
<h1>Créer un Menu</h1>
<form action="creation_menu.php" method="post">
    <div class="form-group">
    <label for="nom">Nom du Menu :</label><br>
    <input type="text" id="nom" name="nom" required><br><br>

    <label for="entree">Entrée :</label><br>
    <input type="text" id="entree" name="entree" required><br><br>

    <label for="plat">Plat :</label><br>
    <input type="text" id="plat" name="plat" required><br><br>

    <label for="dessert">Dessert :</label><br>
    <input type="text" id="dessert" name="dessert" required><br><br>

    <label for="date">Date :</label><br>
    <input type="date" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" required><br><br>

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

