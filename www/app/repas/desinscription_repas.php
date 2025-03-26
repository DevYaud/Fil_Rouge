<?php
session_start();
require_once '../../functions/session.php';
verifierSessionParents();

require_once '../../functions/db.php';
$con = getDatabase();

include '../navigation_parents.php';
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


    </main>
</body>
</html>
