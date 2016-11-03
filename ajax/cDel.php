<?php
include("config.php");
$id=$_POST['id'];
$where = "ID = $id";
$db->delete('clients', $where);
?>
