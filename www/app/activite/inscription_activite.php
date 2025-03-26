<?php
session_start();
require_once '../../functions/session.php';
verifierSessionParents();

require_once '../../functions/db.php';
$con = getDatabase();

include '../navigation_parents.php';

// Vérifier si un ID d'événement est passé en paramètre POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_event'])) {
    $id_event = $_POST['id_event'];
    $id_enfant = $_SESSION['Id_enfant'];
    $date_inscription = date('Y-m-d H:i:s');
    $presence = 0;

    // Requête d'ajout de l'inscription
    $stmt = $con->prepare('INSERT INTO INSCRIPTION (date_inscription, presence, Id_enfant, Id_Event) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('siii', $date_inscription, $presence, $id_enfant, $id_event);
    if ($stmt->execute()) {
        $success_message = "Inscription réussie !";
    } else {
        echo "Erreur lors de l'inscription : " . $stmt->error;
    }
    $stmt->close();
} else {
    // Rediriger vers la page de sélection si aucun ID d'événement n'est passé
    header('Location: selection_activite.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription à l'Activité</title>
    <link rel="stylesheet" href="../../styles/main_parent.css">
    <script>
        function showPopup(message) {
            alert(message);
            window.location.href = '../dashboard.php';
        }
    </script>
</head>
<body>
<main class="content">
    <div class="container">
        <h1 class="text-center">Inscription à l'Activité</h1>
        <?php if (isset($success_message)): ?>
            <p><?php echo htmlspecialchars($success_message); ?></p>
            <script>showPopup('<?php echo $success_message; ?>');</script>
        <?php endif; ?>
    </div>
</main>
</body>
</html>

<?php
$con->close();
?>


