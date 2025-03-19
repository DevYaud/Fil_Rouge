<?php

global $con;
include("../main.php");

if ( !isset($_POST['mail'], $_POST['password']) ) {
    // Could not get the data that should have been sent.
    exit('Les deux champs sont obligatoires');
}

if ($stmt = $con->prepare('SELECT id, mail FROM utilisateur WHERE mail = ?')) {
    // Bind parameters (s = string, i = int), in our case the mail is a string so we use "s"
    $stmt->bind_param('s', $_POST['username']);
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
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['logged'] = TRUE;
            $_SESSION['mail'] = $_POST['mail'];
            $_SESSION['id'] = $id;
        } else {
            // Incorrect password
            echo 'Nom utilisateur ou mot de passe incorrect';
        }
    } else {
        // Incorrect username
        echo 'Incorrect username and/or password!';
    }

    $stmt->close();
}
?>
