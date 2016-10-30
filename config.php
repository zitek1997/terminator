<?php
session_start();
require_once('ajax/Database.php');
require_once('ajax/db.php');
$db = new Database();
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
