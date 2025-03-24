<?php
session_start();

// Informations de connexion à la base de données
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'sc1zuna1689';
$DATABASE_PASS = 'fil_rouge_projet';
$DATABASE_NAME = 'sc1zuna1689_fil_rouge';

// Connexion à la base de données
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
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

        $id_tuteur = $user['Id_connexion'];
        $stmt_parente = $con->prepare('SELECT Id_enfant FROM PARENTE WHERE Id_tuteur = ? LIMIT 1');
        $stmt_parente->bind_param('i', $id_tuteur);
        $stmt_parente->execute();
        $result_parente = $stmt_parente->get_result();

        if ($result_parente->num_rows > 0) {
            $parente = $result_parente->fetch_assoc();
            $_SESSION['Id_enfant'] = $parente['Id_enfant'];
        }


        echo "Connexion réussie !";
        // Redirection vers le tableau de bord
        header('Location: profil.php');
    } else {
        // Les informations d'identification sont incorrectes
        echo "Email ou mot de passe incorrect.";
    }

    $stmt->close();
}
?>