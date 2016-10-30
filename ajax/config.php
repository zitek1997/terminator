<?php
session_start();
require_once('Database.php');
if (isset($_SESSION['uid']))
{
  $id=$_SESSION['uid'];
  $dbb="db".$dbb.".php";
  require_once("$dbb");
}else{
  require_once("db.php");
}
$db = new Database();
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
