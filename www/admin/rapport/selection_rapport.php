<?php
session_start();
include '../navigation_admin.php';

verifierSession();
$con = getDatabase();

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
        <link rel="stylesheet" href="../../styles/main.css">
    </head>
    <body>
    <h1>Sélectionner un Rapport à Modifier</h1>
    <form action="modification_rapport.php" method="post">
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