<?php
include("config.php");
$hours=$db->selecto("SELECT * FROM hours");

  $h = array(
    $pno = $hours['0']['open'],
    $pnc = $hours['0']['close'],
    $wto = $hours['1']['open'],
    $wtc = $hours['1']['close'],
    $sro = $hours['2']['open'],
    $src = $hours['2']['close'],
    $czo = $hours['3']['open'],
    $czc = $hours['3']['close'],
    $pto = $hours['4']['open'],
    $ptc = $hours['4']['close'],
    $sbo = $hours['5']['open'],
    $sbc = $hours['5']['close'],
  );
echo json_encode($h);
?>
