<?php

global $con;
include("../conn_db.php");

if (!isset($_SESSION['logged'])) {
    header('../login/index.php');
    exit;
}

// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
$stmt = $con->prepare('SELECT email FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($email);
$stmt->fetch();
$stmt->close();

$child = $con->prepare('SELECT * FROM * WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);

echo '<blockquote>';
echo "<table id='XXXXX' style='width:80%; float:left'>";
echo "<tr>";
while($row = $child->fetch_assoc()) {
    echo "<td>";
    echo "<table>";
    echo "";

    echo "</table>";
    echo "</td>";
}
echo "</tr>";
echo "</table>";


?>