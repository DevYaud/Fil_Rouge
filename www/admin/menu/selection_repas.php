<?php
session_start();
require_once '../../functions/session.php';
verifierSessionAdmin();

require_once '../../functions/db.php';
$con = getDatabase();

include '../navigation_admin.php';

// Récupérer la liste des repas
$stmt = $con->prepare('SELECT Id_repas, nom FROM REPAS');
$stmt->execute();
$result = $stmt->get_result();
$repas = [];
while ($row = $result->fetch_assoc()) {
    $repas[] = $row;
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Sélection de Repas</title>
    <link rel="stylesheet" href="../../styles/main.css">
</head>
<body>
<main class="content">
    <h1>Sélectionner un Repas à Modifier</h1>
    <table>
        <thead>
        <tr>
            <th>Nom du repas</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($repas as $repas_item): ?>
            <tr style="cursor: pointer;" onclick="document.getElementById('form_<?php echo $repas_item['Id_repas']; ?>').submit();">
                <td>
                    <form id="form_<?php echo $repas_item['Id_repas']; ?>" action="modification_repas.php" method="post">
                        <input type="hidden" name="repas" value="<?php echo $repas_item['Id_repas']; ?>">
                        <?php echo htmlspecialchars("Repas #{$repas_item['Id_repas']}: {$repas_item['nom']}"); ?>
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
