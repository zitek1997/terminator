<?php
include("config.php");
$id=$_POST['id'];
$pass=$_POST['pass'];
$array=array("ID"=>$id);
$sql="SELECT * FROM users WHERE ID = :ID";
$usra=$db->select($sql, $array);
foreach ($usra as $key => $usr) {
$CS=$usr['C_S'];
$pass0=md5($pass);
$pass0=$pass0.$CS;
$pass0=md5($pass0);
$pwd=$usr['PASS'];
}
if ($pwd==$pass0)
{
  echo "ok";
}else{
  echo "error";
}
?>
