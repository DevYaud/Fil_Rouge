<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['Id_connexion'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: ../login.php');
    exit();
}

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

// Récupérer la liste des rapports
$stmt = $con->prepare('SELECT Id_rapport, Commentaire FROM RAPPORT');
$stmt->execute();
$result = $stmt->get_result();
$rapports = [];
while ($row = $result->fetch_assoc()) {
    $rapports[] = $row;
}
$stmt->close();
?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Sélection de Rapport</title>
    </head>
    <body>
    <h1>Sélectionner un Rapport à Modifier</h1>
    <form action="modification_rapport.php" method="post">
        <label for="rapport">Sélectionnez un rapport à modifier :</label><br>
        <select id="rapport" name="rapport" required>
            <?php foreach ($rapports as $rapport): ?>
                <option value="<?php echo $rapport['Id_rapport']; ?>">
                    <?php echo htmlspecialchars("Rapport #{$rapport['Id_rapport']}: {$rapport['Commentaire']}"); ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>
        <input type="submit" value="Modifier">
    </form>
    </body>
    </html>

<?php
$con->close();
?>