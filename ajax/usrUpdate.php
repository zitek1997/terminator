<?php
include("config.php");
$id=$_POST['id'];
$fn = $_POST['fname'];
$ln = $_POST['lname'];
$ma = $_POST['mail'];
$ph = $_POST['phone'];
if(isset($_POST['adm'])){
  if($_POST['adm'] == "true"){
    $ad = 1;
  }else{
    $ad = 0;
  }
  $arr = array(
    'FNAME'=>$fn,
    'LNAME'=>$ln,
    'EMAIL'=>$ma,
    'PHONE'=>$ph,
    'admin'=>$ad,
  );
}else{
  $arr = array(
    'FNAME'=>$fn,
    'LNAME'=>$ln,
    'EMAIL'=>$ma,
    'PHONE'=>$ph,
  );
}
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
