<?php
session_start();
require_once '../../functions/session.php';
verifierSessionParents();

require_once '../../functions/db.php';
$con = getDatabase();

include '../navigation_parents.php';

// Récupérer le nom du parent à partir de l'Id_connexion
$id_connexion = $_SESSION['Id_connexion'];
$stmt = $con->prepare('SELECT nom FROM TUTEUR WHERE Id_tuteur = ?');
$stmt->bind_param('i', $id_connexion);
$stmt->execute();
$result = $stmt->get_result();
$tuteur = $result->fetch_assoc();
$stmt->close();

// Récupérer l'email de la session
$email = $_SESSION['mail'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de Contact</title>
    <link rel="stylesheet" href="../../styles/main_parent.css">
    <link rel="stylesheet" href="../../styles/form.css">
</head>
<body>
<main class="content">
    <h1>Formulaire de Contact</h1>
    <form action="formulaire_contact.php" method="post">
        <div class="form-group">
            <label for="nom">Nom :</label><br>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($tuteur['nom']); ?>" required><br><br>

            <label for="email">Email :</label><br>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required><br><br>

            <label for="sujet">Sujet :</label><br>
            <input type="text" id="sujet" name="sujet" required><br><br>

            <label for="message">Message :</label><br>
            <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>

            <input type="submit" class="btn" value="Envoyer">
        </div>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $sujet = $_POST['sujet'];
        $message = $_POST['message'];

        // Afficher les informations soumises -> Pas d'envoi de mail pour l'instant
        echo "<h2>Informations soumises :</h2>";
        echo "<p><strong>Nom :</strong> " . htmlspecialchars($nom) . "</p>";
        echo "<p><strong>Email :</strong> " . htmlspecialchars($email) . "</p>";
        echo "<p><strong>Sujet :</strong> " . htmlspecialchars($sujet) . "</p>";
        echo "<p><strong>Message :</strong> " . htmlspecialchars($message) . "</p>";
    }
    ?>
</main>
</body>
</html>

<?php
$con->close();
?>
