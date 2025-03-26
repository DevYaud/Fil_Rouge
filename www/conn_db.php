<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$con = getDatabase();

if ($con) {
    echo "connecté";
} else {
    echo "probleme";
}
?>