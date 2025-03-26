<?php
session_start();
include 'admin/navigation_admin.php';
?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/main.css">
        <link rel="stylesheet" href="styles/form.css">
        <title>Liste de Présence</title>
        <style>
            tr {cursor: default;}
        </style>
    </head>
    <body>
    <main class="content">
        <h2>Liste de Présence</h2>
        <form id="presence">
            <table>
                <thead>
                <tr>
                    <th>Nom de l'enfant</th>
                    <th>Présent</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Jean Dupont</td>
                    <td><input type="checkbox" name="present" value="Jean Dupont"></td>
                </tr>
                <tr>
                    <td>Marie Curie</td>
                    <td><input type="checkbox" name="present" value="Marie Curie"></td>
                </tr>
                <tr>
                    <td>Paul Martin</td>
                    <td><input type="checkbox" name="present" value="Paul Martin"></td>
                </tr>
                </tbody>
            </table>
            <button class="btn" type="submit">Enregistrer la présence</button>
        </form>
    </main>



    </body>
    </html>