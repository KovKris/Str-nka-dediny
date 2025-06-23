<?php
include('inc/classes/Database.php');
include('inc/classes/Authenticate.php');

$db = new Database();
$auth = new Authenticate($db);
$auth->logout();

header("Location: login.php");
exit;
?>