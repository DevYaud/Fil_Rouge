<?php
session_start();
require_once '../../functions/session.php';
verifierSessionParents();

require_once '../../functions/db.php';
$con = getDatabase();

include '../navigation_parents.php';

// Récupérer l'ID de l'enfant à partir de la session
$id_enfant = $_SESSION['Id_enfant'];

// Récupérer les rapports liés à l'enfant
$stmt = $con->prepare('SELECT Id_rapport, Commentaire, info_Comportement, date FROM RAPPORT WHERE Id_enfant = ?');
$stmt->bind_param('i', $id_enfant);
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Rapports</title>
    <link rel="stylesheet" href="../../styles/main_parent.css">
</head>
<body>
<main class="content">
    <div class="container">
        <h1 class="text-center">Liste des Rapports</h1>
        <div class="box">
            <?php if (empty($rapports)): ?>
                <p>Aucun rapport trouvé pour cet enfant.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($rapports as $rapport): ?>
                        <strong>Date :</strong> <?php echo htmlspecialchars($rapport['date']); ?><br>
                        <strong>Commentaire :</strong> <?php echo htmlspecialchars($rapport['Commentaire']); ?><br>
                        <strong>Information Comportement :</strong> <?php echo htmlspecialchars($rapport['info_Comportement']); ?>
                        <br>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</main>
</body>
</html>

<?php
$con->close();
?>
