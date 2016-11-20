<?php
include("config.php");
$name = $_POST['name'];
$opis = $_POST['opis'];
$opt = $_POST['opt'];
$id = $_POST['id'];

if($opt == "ch")
{
  $where = "id = $id";
  $data = array(
    "opis" => $name,
  );
  $db->update('calendar', $data, $where);
}else if($opt == "cr"){
  $where = "id = $id";
  $data = array(
    "opis" => $name,
  );
  $db->update('calendar', $data, $where);
  $array = array(
    "name" => $name,
    "opis" => $opis,
  );
  if($name!=""){$db->insert('services', $array);}
}


?>
