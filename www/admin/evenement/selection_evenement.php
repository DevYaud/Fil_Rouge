<?php
session_start();
require_once '../../functions/session.php';
verifierSessionAdmin();

require_once '../../functions/db.php';
$con = getDatabase();

include '../navigation_admin.php';

// Récupérer la liste des événements
$stmt = $con->prepare('SELECT Id_Event, commentaire, debut, fin, A.nom AS nom_activite, P.nom AS nom_personnel FROM EVENEMENT E JOIN ACTIVITE A ON E.Id_activite = A.Id_activite JOIN PERSONNEL P ON E.Id_personnel = P.Id_personnel');
$stmt->execute();
$result = $stmt->get_result();
$evenements = [];
while ($row = $result->fetch_assoc()) {
    $evenements[] = $row;
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Sélection d'Événement</title>
    <link rel="stylesheet" href="../../styles/main.css">
</head>
<body>
<main class="content">
    <h1>Sélectionner un Événement à Modifier</h1>
    <table>
        <thead>
        <tr>
            <th>Commentaire</th>
            <th>Date de début</th>
            <th>Date de fin</th>
            <th>Activité</th>
            <th>Personnel</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($evenements as $evenement): ?>
            <tr style="cursor: pointer;" onclick="document.getElementById('form_<?php echo $evenement['Id_Event']; ?>').submit();">
                <td>
                    <form id="form_<?php echo $evenement['Id_Event']; ?>" action="modification_evenement.php" method="post">
                        <input type="hidden" name="evenement" value="<?php echo $evenement['Id_Event']; ?>">
                        <?php echo htmlspecialchars($evenement['commentaire']); ?>
                    </form>
                </td>
                <td><?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($evenement['debut']))); ?></td>
                <td><?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($evenement['fin']))); ?></td>
                <td><?php echo htmlspecialchars($evenement['nom_activite']); ?></td>
                <td><?php echo htmlspecialchars($evenement['nom_personnel']); ?></td>
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
