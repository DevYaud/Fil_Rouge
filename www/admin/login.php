<?php
session_start();
require_once '../functions/db.php';

$con = getDatabase();

$success_message ="";
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

        $success_message = "Rapport ajouté avec succès !";
        // Redirection vers le tableau de bord
        header('Location: dashboard.php');
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
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/form.css">
    <script>
        function showPopup(message) {
            alert(message);
            window.location.href = 'dashboard.php';
        }
    </script>
</head>
<body>
<div style="width: 400px;" class="container">
<h2>Connexion :</h2>
<?php if (isset($error_message)): ?>
    <p style="color: red;"><?php echo $error_message; ?></p>
<?php endif; ?>
<form action="login.php" method="POST">

    <div style="width: 400px ;" class="form-group">
        <label for="mail">Email :</label>
        <input type="email" id="mail" name="mail" required>
        <br><br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <br>
    </div>
    <button class="btn" style="margin: auto" type="submit">Se connecter</button>
</form>
</div>>
<?php
if ($success_message) {
    echo "<script>showPopup('$success_message');</script>";
}
?>
</body>
</html>



<?php
$con->close();
?>
