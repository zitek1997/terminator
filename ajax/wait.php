<?php
include("config.php");
$id=$_POST['id'];
$array = array("ID"=>$id);
$sql = "SELECT * FROM waiting WHERE ID = :ID";
$ch=$db->select($sql, $array);
$ch=count($ch);
if($ch==0){
  $array = array("ID"=>$id);
  $sql = "SELECT * FROM clients WHERE ID = :ID";
  $cli=$db->select($sql, $array);
  $cli=$cli[0];
  
  $db->insert("waiting",$cli);
}

?>
