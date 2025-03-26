<?php
session_start();
require_once '../../functions/session.php';
verifierSessionAdmin();

require_once '../../functions/db.php';
$con = getDatabase();

include '../navigation_admin.php';

// Récupérer la liste des rapport avec les noms des enfants
$stmt = $con->prepare('
    SELECT R.Id_rapport, R.Commentaire, E.nom
    FROM RAPPORT R
    JOIN ENFANT E ON R.Id_enfant = E.Id_enfant
');
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
<main class="content">
    <h1>Sélectionner un Rapport à Modifier</h1>
    <table>
        <thead>
        <tr>
            <th>ID du rapport</th>
            <th>Commentaire</th>
            <th>Nom de l'enfant</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($rapports as $rapport): ?>
            <tr style="cursor: pointer;" onclick="document.getElementById('form_<?php echo $rapport['Id_rapport']; ?>').submit();">
                <td><?php echo htmlspecialchars($rapport['Id_rapport']); ?></td>
                <td><?php echo htmlspecialchars($rapport['Commentaire']); ?></td>
                <td><?php echo htmlspecialchars($rapport['nom']); ?></td>
                <td>
                    <form id="form_<?php echo $rapport['Id_rapport']; ?>" action="modification_rapport.php" method="post">
                        <input type="hidden" name="rapport" value="<?php echo $rapport['Id_rapport']; ?>">
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
