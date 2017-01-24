<?php
include("config.php");
$start = $_POST['start'];
$title = $_POST['nazwa'];
$repeat = $_POST['rp'];

$array = array(
  'title' => $title,
  'start' => $start,
  'repeat' => $repeat,
);
$db->insert("holidays",$array);
?>
