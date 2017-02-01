<?php
include("config.php");
$id=$_POST['id'];
$fn = $_POST['fname'];
$ln = $_POST['lname'];
$ma = $_POST['mail'];
$ph = $_POST['phone'];

$arr = array(
  'FNAME'=>$fn,
  'LNAME'=>$ln,
  'EMAIL'=>$ma,
  'PHONE'=>$ph,
);
$wh = "ID = $id";
$result = $db->update("users", $arr, $wh);
if($result == 1){
  $_SESSION['imie']=$fn;
  $_SESSION['nazwisko']=$ln;
  $_SESSION['email']=$ma;
  $_SESSION['phone']=$ph;
}
echo $result;
?>
