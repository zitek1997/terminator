<?php
include("config.php");
$id=$_POST['id'];
$array = array("ID"=>$id);
$sql = "SELECT * FROM clients WHERE ID = :ID";
$cli=$db->select($sql, $array);
$cli=$cli[0];
$db->insert("waiting",$cli);
?>
