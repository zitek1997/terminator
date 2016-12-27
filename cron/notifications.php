<?php
include('../ajax/config.php');
$now = strtotime("now");
$now = strtotime("+24 hours", $now);
$now = date("Y-m-d H:i:s", $now);
$now = "'".$now."'";
$array = array(
  "TIME" => $now,
  "SENT" => 0,
);
$sql = "SELECT * FROM notifications WHERE TIME < :TIME AND SENT = :SENT";
$noti = $db->selecto($sql, $array);
$def = $db->selecto("SELECT * FROM not_def");
$def = $def[0];
foreach($noti as $ts){
  $id = $ts['id'];
  $idc = $ts['IDC'];
  $ide = $ts['IDE'];
  mail($mail,$topic,$msg);
  $where = "id = $id";
  $array = array("SENT" => 1);
  $db->update("notifications", $array, $where);
}
?>
