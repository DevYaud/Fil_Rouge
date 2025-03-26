<?php
session_start();
include '../navigation_admin.php';
require_once '../../functions/db.php';

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
    <main class = "content">
    <h1>Sélectionner un Rapport à Modifier</h1>
    <table>
        <thead>
        <tr>
            <th>Date du rapport</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($rapports as $rapport): ?>
            <tr style="cursor: pointer;" onclick="document.getElementById('form_<?php echo $rapport['Id_rapport']; ?>').submit();">
                <td>
                    <form id="form_<?php echo $rapport['Id_rapport']; ?>" action="modification_rapport.php" method="post">
                        <input type="hidden" name="rapport" value="<?php echo $rapport['Id_rapport']; ?>">
                        <?php echo htmlspecialchars("Rapport #{$rapport['Id_rapport']}: {$rapport['Commentaire']}"); ?>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <!-- CONSERVER la version précédente par précaution.
        <form action="modification_rapport.php" method="post">
        <select id="rapport" name="rapport" required>
            <?php foreach ($rapports as $rapport): ?>
                <option value="<?php echo $rapport['Id_rapport']; ?>">
                    <?php echo htmlspecialchars("Rapport #{$rapport['Id_rapport']}: {$rapport['Commentaire']}"); ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>
        <input type="submit" value="Modifier">
    </form>-->
    </main>
    </body>
    </html>

<?php
$con->close();
?>