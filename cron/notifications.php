<?php
include('../ajax/config.php');
$now = strtotime("now");
$now = date("Y-m-d H:i:s", $now);
$now = "'".$now."'";
$array = array(
  "TIME" => $now,
  "SENT" => 0,
);
$sql = "SELECT * FROM notifications WHERE TIME < :TIME AND SENT = :SENT";
$noti = $db->selecto($sql, $array);
foreach($noti as $ts){
  $id = $ts['id'];
  $mail = $ts['EMAIL'];
  $tel = $ts['TEL'];
  $msg = $ts['TEXT'];
  $idc = $ts['IDC'];
  $topic = "Powiadomienie";
  mail($mail,$topic,$msg);
  $where = "id = $id";
  $array = array("SENT" => 1);
  $db->update("notifications", $array, $where);
}
?>
