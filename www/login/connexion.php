<?php

global $con;
include("../conn_db.php");

if ( !isset($_POST['mail'], $_POST['password']) ) {
    // Could not get the data that should have been sent.
    exit('Les deux champs sont obligatoires');
}

if ($stmt = $con->prepare('SELECT mail,password FROM utilisateur WHERE mail = ? AND password = ?')) {
    $stmt->bind_param("ss", $_POST['mail'], $_POST['password']);
    $stmt->execute();
    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Methode cryptage possible ici : password_verify($_POST['password'], $password)
        if ($_POST['password'] === $password) {
            // Verification success! User has logged-in!
            // Création de la session (Ensemble de cookies)
            session_regenerate_id();
            $_SESSION['logged'] = TRUE;
            $_SESSION['mail'] = $_POST['mail'];
            $_SESSION['id'] = $id;
            $_SESSION['admin'] = FALSE;
        } else {
            // Incorrect password
            echo 'Nom utilisateur ou mot de passe incorrect';
        }
    } else {
        // Incorrect username
        echo 'Nom utilisateur ou mot de passe incorrect';
    }

    $stmt->close();
}
?>


?>