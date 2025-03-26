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
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Sélection d'Activité</title>
    <link rel="stylesheet" href="../../styles/main.css">
</head>
<body>
<main class="content">
    <h1>Sélectionner une Activité à Modifier</h1>
    <table>
        <thead>
        <tr>
            <th>Nom de l'activité</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($activites as $activite): ?>
            <tr style="cursor: pointer;" onclick="document.getElementById('form_<?php echo $activite['Id_activite']; ?>').submit();">
                <td>
                    <form id="form_<?php echo $activite['Id_activite']; ?>" action="modification_activite.php" method="post">
                        <input type="hidden" name="activite" value="<?php echo $activite['Id_activite']; ?>">
                        <?php echo htmlspecialchars("Activité #{$activite['Id_activite']}: {$activite['nom']}"); ?>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</main>
</body>
</html>

<?php
$con->close();
?>
