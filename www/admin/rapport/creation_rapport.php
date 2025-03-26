<?php
session_start();
include 'navigation_admin.php';

// Informations de connexion à la base de données
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'sc1zuna1689';
$DATABASE_PASS = 'fil_rouge_projet';
$DATABASE_NAME = 'sc1zuna1689_fil_rouge';

// Connexion à la base de données
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Récupérer la liste des enfants
$stmt = $con->prepare('SELECT Id_enfant, nom FROM ENFANT');
$stmt->execute();
$result = $stmt->get_result();
$enfants = [];
while ($row = $result->fetch_assoc()) {
    $enfants[] = $row;
}
$stmt->close();

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $commentaire = $_POST['Commentaire'];
    $info_comportement = $_POST['info_Comportement'];
    $date = $_POST['date'];
    $id_enfant = $_POST['enfant'];

    // Requête d'ajout de données
    $stmt = $con->prepare('INSERT INTO RAPPORT (Commentaire, info_Comportement, date, Id_enfant) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('sssi', $commentaire, $info_comportement, $date, $id_enfant);
    if ($stmt->execute()) {
        echo "Rapport ajouté avec succès !";
    } else {
        echo "Erreur lors de l'ajout du rapport : " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Création de Rapport</title>
</head>
<body>
<h1>Créer un Rapport</h1>
<form action="creation_rapport.php" method="post">
    <label for="Commentaire">Commentaire :</label><br>
    <textarea id="Commentaire" name="Commentaire" rows="4" cols="50" required></textarea><br><br>

    <label for="info_Comportement">Information Comportement :</label><br>
    <textarea id="info_Comportement" name="info_Comportement" rows="4" cols="50" required></textarea><br><br>

    <label for="date">Date du Rapport :</label><br>
    <input type="date" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" required><br><br>

    <label for="enfant">Enfant :</label><br>
    <select id="enfant" name="enfant" required>
        <?php foreach ($enfants as $enfant): ?>
            <option value="<?php echo $enfant['Id_enfant']; ?>"><?php echo htmlspecialchars($enfant['nom']); ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <input type="submit" value="Valider">
</form>
</body>
</html>

<?php
$con->close();
?>
