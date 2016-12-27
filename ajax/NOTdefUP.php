<?php
include("config.php");
$sub = $_POST['sub'];
$msg = $_POST['mes'];
$head = $_POST['head'];
$where = "ID = 0";
$array = array(
  "subject" => $sub,
  "message" => $msg,
  "headers" => $head,
);
$db->update("not_def",$array,$where);
?>
