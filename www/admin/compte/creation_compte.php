<?php
session_start();
require_once '../../functions/session.php';
verifierSessionAdmin();

require_once '../../functions/db.php';
$con = getDatabase();

include '../navigation_admin.php';

// Fonction pour générer un mot de passe aléatoire
function genererMotDePasse($longueur = 10) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $longueurMax = strlen($caracteres);
    $chaineAleatoire = '';
    for ($i = 0; $i < $longueur; $i++) {
        $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
    }
    return $chaineAleatoire;
}

// Traitement du formulaire
$success_message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mail = $_POST['mail'];
    $mot_de_passe = genererMotDePasse(); // Générer un mot de passe aléatoire
    $id_connexion = $_POST['id_connexion'];

    // Requête d'ajout de données
    $stmt = $con->prepare('INSERT INTO UTILISATEUR (mail, mot_de_passe, Id_connexion) VALUES (?, ?, ?)');
    $stmt->bind_param('ssi', $mail, $mot_de_passe, $id_connexion);
    if ($stmt->execute()) {
        $success_message = "Compte utilisateur créé avec succès !";
    } else {
        echo "Erreur lors de la création du compte : " . $stmt->error;
    }
    $stmt->close();
}
?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Création de Compte</title>
        <link rel="stylesheet" href="../../styles/main.css">
        <link rel="stylesheet" href="../../styles/form.css">
        <script>
            function showPopup(message) {
                alert(message);
                window.location.href = '../dashboard.php';
            }
        </script>
    </head>
    <body>
    <main class="content">
        <h1>Créer un Compte Utilisateur</h1>
        <form action="creation_compte.php" method="post">
            <div class="form-group">
            <label for="mail">Email :</label><br>
            <input type="email" id="mail" name="mail" required><br><br>

            <label for="id_connexion">ID Connexion :</label><br>
            <input type="number" id="id_connexion" name="id_connexion" required><br><br>
            <input type="submit" class="btn" value="Valider">
            </div>
        </form>

        <?php
        if ($success_message) {
            echo "<script>showPopup('$success_message');</script>";
        }
        ?>
    </main>
    </body>
    </html>

<?php
$con->close();
?>