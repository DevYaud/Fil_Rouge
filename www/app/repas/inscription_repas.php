<?php
session_start();
require_once './www/functions/session.php';
verifierSessionParents();

require_once './www/functions/db.php';
$con = getDatabase();

include '../navigation_parents.php';
?>