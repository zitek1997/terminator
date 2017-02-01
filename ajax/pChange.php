<?php
include("config.php");
$id=$_POST['id'];
$pass=$_POST['pass'];
$array=array("ID"=>$id);
$sql="SELECT * FROM users WHERE ID = :ID";
$usr=$db->select($sql, $array);
$usr=$usr[0];
$CS=$usr['C_S'];
$pass0=md5($pass);
$pass0=$pass0.$CS;
$pass0=md5($pass0);
$array = array("PASS"=>$pass0);
$where = "ID = $id";
$result = $db->update("users", $array, $where);
echo $result;
?>
