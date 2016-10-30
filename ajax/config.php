<?php
session_start();
require_once('Database.php');
if (isset($_SESSION['firma_id']))
{
  $id=$_SESSION['firma_id'];
  $dbb="db".$dbb.".php";
  require_once("$dbb");
}else{
  require_once("db.php");
}
$db = new Database();
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
