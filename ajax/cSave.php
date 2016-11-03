<?php
include("config.php");
$id=$_POST['id'];
$im=$_POST['imie'];
$na=$_POST['nazwisko'];
$te=$_POST['tel'];
$em=$_POST['email'];
$ad=$_POST['adres'];

$data = array(
  "FNAME" => $im,
  "LNAME" => $na,
  "TEL" => $te,
  "EMAIL" => $em,
  "ADRES" => $ad,
);

$where = "ID = $id";

$db->update('clients', $data, $where);

?>
