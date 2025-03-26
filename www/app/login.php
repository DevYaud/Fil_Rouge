<?php
session_start();
require_once '../functions/session.php';
verifierSessionParents();

require_once '../functions/db.php';
$con = getDatabase();

include './navigation_parents.php';


$con = getDatabase();

if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Vérification des données du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    // Requête pour vérifier les informations d'identification
    $stmt = $con->prepare('SELECT Id_connexion, mail FROM UTILISATEUR WHERE mail = ? AND mot_de_passe = ?');
    $stmt->bind_param('ss', $mail, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Récupérer les données de l'utilisateur
        $user = $result->fetch_assoc();

        // Les informations d'identification sont correctes, création de la session
        $_SESSION['mail'] = $user['mail'];
        $_SESSION['Id_connexion'] = $user['Id_connexion'];

        // Récupérer l'ID de l'enfant associé à l'ID de connexion
        $id_connexion = $user['Id_connexion'];
        $stmt = $con->prepare('SELECT Id_enfant FROM PARENTE WHERE Id_tuteur = ? LIMIT 1');
        $stmt->bind_param('i', $id_connexion);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $enfant = $result->fetch_assoc();
            $_SESSION['Id_enfant'] = $enfant['Id_enfant'];
        }

        echo "Connexion réussie !";
        // Redirection vers le tableau de bord
        header('Location: profil.php');
        exit(); // Assurez-vous que le script s'arrête après la redirection
    } else {
        // Les informations d'identification sont incorrectes
        $error_message = "Email ou mot de passe incorrect.";
    }

    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<h2>Connexion</h2>
<?php if (isset($error_message)): ?>
    <p style="color: red;"><?php echo $error_message; ?></p>
<?php endif; ?>
<form action="login.php" method="POST">
    <label for="mail">Email :</label>
    <input type="email" id="mail" name="mail" required>
    <br>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>
    <br>
    <button type="submit">Se connecter</button>
</form>
</body>
</html>

<?php
$con->close();
?>
