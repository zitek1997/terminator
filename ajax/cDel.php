<?php
include("config.php");
$id=$_POST['id'];
$where = "ID = $id";
$db->delete('clients', $where);
$idc=$_POST['idc'];
$where = "idc = $idc";
$db->delete('calendar', $where);
?>
