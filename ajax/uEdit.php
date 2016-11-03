<?php
include("config.php");
$id=$_POST['id'];
$array=array("ID"=>$id);
$sql="SELECT * FROM clients WHERE ID = :ID";
$usr=$db->select($sql, $array);
$usr=$usr['0'];
$u = array(
  "id" => $usr['ID'],
  "imie" => $usr['FNAME'],
  "nazwisko" => $usr['LNAME'],
  "tel" => $usr['TEL'],
  "email" => $usr['EMAIL'],
  "adres" => $usr['ADRES'],
);

echo json_encode($u);
?>
